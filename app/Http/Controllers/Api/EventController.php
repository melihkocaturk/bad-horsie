<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\EventRequest;
use App\Http\Resources\EventResource;
use App\Models\Event;
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
    public function index(Request $request)
    {
        return EventResource::collection(
            $request->user()->events()->orderBy('start', 'asc')->paginate(10)
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EventRequest $request)
    {
        $data = $request->validated();

        $event = $request->user()->events()->create($data);

        return new EventResource($event);
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        return new EventResource($event);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EventRequest $request, Event $event)
    {
        $data = $request->validated();

        $event->update($data);

        return new EventResource($event);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        $event->delete();

        return response()->json(status: 204);
    }
}
