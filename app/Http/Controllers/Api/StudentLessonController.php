<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\LessonResource;
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
    public function index(Request $request)
    {
        $start = Carbon::today();
        
        $lessons = $request->user()->studentLessons()
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
        if (! Gate::allows('show-student-lesson', $lesson)) {
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
        if (! Gate::allows('update-student-lesson', $lesson)) {
            return response()->json([
                'error' => 'You don\'t have permission.'
            ], status: 403);
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
            return response()->json([
                'error' => 'You do not have the right to lesson.'
            ], status: 406);
        }

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
