<?php

namespace App\Http\Controllers;

use App\Models\Club;
use App\Models\LessonRight;
use App\Models\LessonRightLog;
use App\Models\User;
use Illuminate\Http\Request;

class LessonRightController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request, Club $club)
    {
        $user = User::find($request->query('member'));

        if (!$user) {
            return redirect()->back()->with(
                'error',
                'User not found.'
            );
        }

        if (!$club->members()->find($user)) {
            return redirect()->back()->with(
                'error',
                'User not a club member.'
            );
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

        return view('lesson_rights.create', [
            'club' => $club,
            'user' => $user,
            'token' => $token,
            'logs' => $logs
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Club $club)
    {
        $validated = $request->validate([
            'user_id' => 'required|integer',
            'token' => 'required|integer',
        ]);

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

        return redirect()->route('clubs.show', $club)
            ->with('success', 'Lesson right successfully created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
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
