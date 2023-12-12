<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MemberResource;
use App\Models\Club;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'club_id' => 'required|integer',
        ]);

        $club = Club::find($validated['club_id']);

        if (! Gate::allows('store-member', $club)) {
            return response()->json([
                'error' => 'You don\'t have permission.'
            ], status: 403);
        }

        $user = User::where('email', $validated['email'])
            ->whereIn('type', ['student', 'trainer'])
            ->first();

        if (!$user) {
            return response()->json([
                'error' => 'User not found.'
            ], status: 404);
        }

        if ($club->members()->where('user_id', $user->id)->exists()) {
            return response()->json([
                'error' => 'User is already a member.'
            ], status: 400);
        } elseif (DB::table('club_user')->where('user_id', $user->id)->count() > 0) {
            return response()->json([
                'error' => 'User is a member of another club.'
            ], status: 400);
        } else {
            $club->members()->attach($user);
        }

        return new MemberResource($user);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, User $member)
    {
        $club = Club::find($request->query('club_id'));

        if (! Gate::allows('destroy-member', $club)) {
            return response()->json([
                'error' => 'You don\'t have permission.'
            ], status: 403);
        }

        $club->members()->detach($member);

        return response()->json(status: 204);
    }
}
