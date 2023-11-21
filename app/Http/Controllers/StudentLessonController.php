<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\LessonRight;
use Illuminate\Http\Request;

class StudentLessonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        $membership = $user->memberships()->first();
        $lessonRight = null;

        if ($membership) {
            $lessonRight = LessonRight::where([
                'club_id' => $membership->id,
                'user_id' => $user->id
            ])->first();
        }

        return view('student_lessons.index', [
            'lessons' => $user->studentLessons,
            'membership' => $membership,
            'lessonRight' => $lessonRight
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Lesson $lesson)
    {
        return view('student_lessons.show', ['lesson' => $lesson]);
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
    public function update(Request $request, Lesson $lesson)
    {
        $validated = $request->validate([
            'student_confirmation' => 'required|boolean',
        ]);

        $lessonRight = LessonRight::where([
            'club_id' => $lesson->club->id,
            'user_id' => $request->user()->id
        ])->first();

        if ($lessonRight && $lessonRight->token > 0) {
            $lessonRight->token -= 1;
            $lessonRight->save();
            $lesson->update($validated);
        } else {
            return redirect()->back()->with(
                'error',
                'You do not have the right to lesson.'
            );
        }

        return redirect()->route('student-lessons.index')
            ->with('success', 'Lesson successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
