<?php

namespace App\Http\Controllers;

use App\Http\Requests\LessonRequest;
use App\Models\Club;
use App\Models\Lesson;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Lesson::class);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Club $club)
    {
        $start = Carbon::today();

        $lessons = $club->lessons()
            ->where('start', '>=', $start)
            ->orderBy('start', 'asc')
            ->get();

        $old_lessons = $club->lessons()
            ->where('start', '<', $start)
            ->orderBy('start', 'asc')
            ->paginate(10);

        return view('lessons.index', [
            'club' => $club,
            'lessons' => $lessons,
            'old_lessons' => $old_lessons
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(int $id)
    {
        return view('lessons.create', [
            'club' => Club::with('members')
                ->findOrFail($id),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LessonRequest $request, Club $club)
    {
        $club->lessons()->create($request->validated());

        return redirect()->route('clubs.lessons.index', $club)
            ->with('success', trans('Lesson successfully created.'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Club $club, Lesson $lesson)
    {
        return view('lessons.show', [
            'club' => $club, 
            'lesson' => $lesson,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id, Lesson $lesson)
    {
        return view('lessons.edit', [
            'club' => Club::with('members')
                ->findOrFail($id),
            'lesson' => $lesson
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LessonRequest $request, Club $club, Lesson $lesson)
    {
        $lesson->update($request->validated());

        return redirect()->route('clubs.lessons.index', $club)
            ->with('success', trans('Lesson updated.'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Club $club, Lesson $lesson)
    {
        $lesson->delete();

        return redirect()->route('clubs.lessons.index', $club)
            ->with('success', trans('Lesson removed.'));
    }
}
