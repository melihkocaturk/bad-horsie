<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Update the specified resource in storage.
     */
    public function update(ProfileUpdateRequest $request)
    {
        $validated = $request->validated();
        $user = $request->user();
        $user->fill($validated);

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        if ($request->has('avatar')) {
            $user->avatar = Storage::putFile('users/' . date("FY"), $request->file('avatar'));
        }

        $user->save();

        if (in_array($user->type, ['student', 'trainer'])) {
            $userProfile = $user->userProfile ?: new UserProfile();
            $userProfile->tbf_link = $validated['tbf_link'];
            $userProfile = $user->userProfile()->save($userProfile);
        }

        return response()->json([
            'name' => $user->name,
            'email' => $user->email,
            'avatar' => $user->avatar,
            'tbf_link' => $user->userProfile ? $user->userProfile->tbf_link : $userProfile->tbf_link,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $user = $request->user();

        Auth::logout();
        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return response()->json(status: 204);
    }
}
