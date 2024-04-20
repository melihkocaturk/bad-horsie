<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ScheduleResource;
use App\Models\Event;
use App\Models\Lesson;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $start = Carbon::today();
        $oneWeekLater = Carbon::today()->addDays(7);

        $events = Event::select('name', 'start', 'end')
            ->where('start', '>=', $start)
            ->where('start', '<', $oneWeekLater)
            ->where('user_id', auth()->user()->id)
            ->orderBy('start', 'asc');

        $lessons = Lesson::select('name', 'start', 'end')
            ->where('start', '>=', $start)
            ->where('start', '<', $oneWeekLater)
            ->where('student_id', auth()->user()->id)
            ->orderBy('start', 'asc');

        return ScheduleResource::collection($events->union($lessons)->get());
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
