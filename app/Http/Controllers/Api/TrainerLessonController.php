<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\LessonResource;
use App\Models\Lesson;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class TrainerLessonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $start = Carbon::today();

        $lessons = $request->user()->trainerLessons()
            ->where('start', '>=', $start)
            ->orderBy('start', 'asc')
            ->paginate(10);

        return LessonResource::collection($lessons);
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
        if (! Gate::allows('show-trainer-lesson', $lesson)) {
            return response()->json([
                'error' => 'You don\'t have permission.'
            ], status: 403);
        }

        return new LessonResource($lesson);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lesson $lesson)
    {
        if (! Gate::allows('update-trainer-lesson', $lesson)) {
            return response()->json([
                'error' => 'You don\'t have permission.'
            ], status: 403);
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
                'reason_for_reject' => 'required_if:trainer_confirmation,false|nullable|string',
            ]);
        }

        $lesson->update($validated);

        return new LessonResource($lesson);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
