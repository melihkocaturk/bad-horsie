<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class TrainerLessonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('trainer_lessons.index', [
            'lessons' => auth()->user()->trainerLessons
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lesson $lesson)
    {
        if (! Gate::allows('edit-trainer-lesson', $lesson)) {
            return redirect()->back()->with(
                'error',
                'You don\'t have permission.'
            );
        }

        return view('trainer_lessons.edit', [
            'lesson' => $lesson,
            'clubHorses' => $lesson->club->horses,
            'studentHorses' => $lesson->student->horses,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lesson $lesson)
    {
        if (! Gate::allows('update-trainer-lesson', $lesson)) {
            return redirect()->back()->with(
                'error',
                'You don\'t have permission.'
            );
        }

        if ($request->has('grade')) {
            $validated = $request->validate([
                'grade' => 'nullable|int',
                'comment' => 'nullable|string',
                'horse_id' => 'nullable|integer',
            ]);
        } else {
            $validated = $request->validate([
                'trainer_confirmation' => 'required|boolean',
                'reason_for_reject' => 'required_if:trainer_confirmation,0|nullable|string',
            ]);
        }

        $lesson->update($validated);

        return redirect()->route('trainer-lessons.edit', ['lesson' => $lesson])
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
