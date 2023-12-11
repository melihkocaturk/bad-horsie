<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LessonRequest;
use App\Http\Resources\LessonResource;
use App\Models\Club;
use App\Models\Lesson;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Lesson::class, 'lesson');
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $club = Club::where([
            'id' => $request->query('club_id'),
            'user_id' => $request->user()->id
        ])->first();

        if (!$club) {
            return response()->json([
                'error' => 'Club not found.'
            ], status: 404);
        }

        return LessonResource::collection(
            $club->lessons()->orderBy('id', 'desc')->paginate(10)
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LessonRequest $request)
    {
        $data = $request->validated();

        $club = Club::where([
            'id' => $request->query('club_id'),
            'user_id' => $request->user()->id
        ])->first();
        
        $lesson = $club->lessons()->create($data);

        return new LessonResource($lesson);
    }

    /**
     * Display the specified resource.
     */
    public function show(Lesson $lesson)
    {
        return new LessonResource($lesson);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LessonRequest $request, Lesson $lesson)
    {
        $data = $request->validated();

        $lesson->update($data);

        return new LessonResource($lesson);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lesson $lesson)
    {
        $lesson->delete();

        return response()->json(status: 204);
    }
}
