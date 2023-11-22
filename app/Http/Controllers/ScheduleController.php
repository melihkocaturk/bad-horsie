<?php

namespace App\Http\Controllers;

use App\Models\Event;
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

        $events = Event::where('start', '>=', $start)
            ->where('start', '<', $oneWeekLater)
            ->where('user_id', auth()->user()->id)
            ->orderBy('start', 'asc')
            ->get();

        return view('schedule.show', [
            'events' => $events
        ]);
    }
}
