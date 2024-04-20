<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventRequest;
use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Event::class);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $start = Carbon::today();

        $events = Event::where('start', '>=', $start)
            ->where('user_id', auth()->user()->id)
            ->orderBy('start', 'asc')
            ->get();

        $old_events = Event::where('start', '<', $start)
            ->where('user_id', auth()->user()->id)
            ->orderBy('start', 'asc')
            ->paginate(10);
        
        return view('events.index', [
            'events' => $events,
            'old_events' => $old_events
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('events.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EventRequest $request)
    {
        $data = $request->validated();

        auth()->user()->events()->create($data);

        return redirect()->route('events.index')
            ->with('success', trans('Event successfully created.'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        return view('events.edit', ['event' => $event]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EventRequest $request, Event $event)
    {
        $data = $request->validated();

        $event->update($data);

        return redirect()->route('events.index')
            ->with('success', trans('Event successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        $event->delete();

        return redirect()->route('events.index')
            ->with('success', trans('Event removed.'));
    }
}
