<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\LessonRightResource;
use App\Models\Club;
use App\Models\LessonRight;
use App\Models\LessonRightLog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class LessonRightController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = User::find($request->query('member_id'));

        if (!$user) {
            return response()->json([
                'error' => 'User not found.'
            ], status: 404);
        }

        $club = Club::find($request->query('club_id'));

        if (!$club->members()->find($user)) {
            return response()->json([
                'error' => 'User not a club member.'
            ], status: 400);
        }

        $lessonRight = LessonRight::where([
            'club_id' => $club->id,
            'user_id' => $user->id
        ])->first();

        $token = $lessonRight ? $lessonRight->token : 0;

        $logs = LessonRightLog::where([
            'club_id' => $club->id,
            'user_id' => $user->id
        ])->get();

        return response()->json([
            'token' => $token,
            'logs' => $logs,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|integer',
            'token' => 'required|integer',
        ]);

        $club = Club::find($request->query('club_id'));

        if (! Gate::allows('store-lesson-right', $club)) {
            return response()->json([
                'error' => 'You don\'t have permission.'
            ], status: 403);
        }

        $lessonRight = LessonRight::where([
            'club_id' => $club->id,
            'user_id' => $validated['user_id']
        ])->first();

        if (!$lessonRight) {
            $lessonRight = new LessonRight();
            $lessonRight->club_id = $club->id;
            $lessonRight->user_id = $validated['user_id'];
        }

        $lessonRight->token += $validated['token'];
        $lessonRight->save();

        LessonRightLog::create([
            'club_id' => $club->id,
            'user_id' => $validated['user_id'],
            'token' => $validated['token']
        ]);

        return new LessonRightResource($lessonRight);
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
    public function destroy(string $id)
    {
        //
    }
}
