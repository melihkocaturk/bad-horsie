<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MemberResource;
use App\Models\Club;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

        $user = User::where('email', $validated['email'])
            ->whereIn('type', ['student', 'trainer'])
            ->first();

        if (!$user) {
            return response()->json([
                'error' => 'User not found.'
            ], status: 404);
        }

        $club = Club::where([
            'id' => $validated['club_id'],
            'user_id' => $request->user()->id
        ])->first();

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
        $club = Club::where([
            'id' => $request->query('club_id'),
            'user_id' => $request->user()->id
        ])->first();

        $club->members()->detach($member);

        return response()->json(status: 204);
    }
}
