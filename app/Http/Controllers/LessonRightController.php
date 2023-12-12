<?php

namespace App\Http\Controllers;

use App\Models\Club;
use App\Models\LessonRight;
use App\Models\LessonRightLog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class LessonRightController extends Controller
{
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
        if (! Gate::allows('store-lesson-right', $club)) {
            return redirect()->back()->with(
                'error',
                'You don\'t have permission.'
            );
        }

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
}
