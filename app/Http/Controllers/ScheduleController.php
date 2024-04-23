<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Lesson;
use Carbon\Carbon;

class ScheduleController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        $start = Carbon::today();
        $oneWeekLater = Carbon::today()->addDays(7);

        $events = Event::select('name', 'start', 'end')
            ->where('start', '>=', $start)
            ->where('start', '<', $oneWeekLater)
            ->where('user_id', auth()->user()->id)
            ->orderBy('start', 'asc');
        
        $user_type = auth()->user()->type == 'student' ? 'student_id' : 'trainer_id';

        $lessons = Lesson::select('name', 'start', 'end')
            ->where('start', '>=', $start)
            ->where('start', '<', $oneWeekLater)
            ->where($user_type, auth()->user()->id)
            ->orderBy('start', 'asc');
        
        return view('schedule.show', [
            'events' => $events->union($lessons)->get()
        ]);
    }
}
