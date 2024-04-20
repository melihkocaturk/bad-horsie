<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\LessonRight;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

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

        $start = Carbon::today();

        $lessons = $user->studentLessons()
            ->where('start', '>=', $start)
            ->orderBy('start', 'asc')
            ->get();

        $old_lessons = $user->studentLessons()
            ->where('start', '<', $start)
            ->orderBy('start', 'asc')
            ->paginate(10);

        return view('student_lessons.index', [
            'lessons' => $lessons,
            'old_lessons' => $old_lessons,
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
        if (! Gate::allows('show-student-lesson', $lesson)) {
            return redirect()->back()->with(
                'error',
                trans("You don't have permission.")
            );
        }

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
        if (! Gate::allows('update-student-lesson', $lesson)) {
            return redirect()->back()->with(
                'error',
                trans("You don't have permission.")
            );
        }

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
                trans('You do not have the right to lesson.')
            );
        }

        return redirect()->route('student-lessons.index')
            ->with('success', trans('Lesson successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
