<?php

namespace App\Http\Controllers;

use App\Models\Club;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MemberController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Club $club, Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
        ]);

        $user = User::where('email', $validated['email'])
            ->whereIn('type', ['student', 'trainer'])
            ->first();

        if (!$user) {
            return redirect()->back()->with(
                'error',
                'User not found.'
            );
        }

        if ($club->members()->where('user_id', $user->id)->exists()) {
            return redirect()->back()->with(
                'error',
                'User is already a member.'
            );
        } elseif (DB::table('club_user')->where('user_id', $user->id)->count() > 0) {
            return redirect()->back()->with(
                'error',
                'User is a member of another club.'
            );
        } else {
            $club->members()->attach($user);
        }

        return redirect()->back()->with(
            'success',
            'New member added.'
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Club $club, User $member)
    {
        $club->members()->detach($member);

        return redirect()->back()->with(
            'success',
            'Member removed.'
        );
    }
}
