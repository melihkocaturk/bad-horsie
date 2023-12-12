<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClubRequest;
use App\Http\Resources\ClubResource;
use App\Models\Club;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ClubController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Club::class);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return ClubResource::collection(
            $request->user()->clubs()->paginate(10)
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ClubRequest $request)
    {
        $data = $request->validated();

        if ($request->has('logo')) {
            $data['logo'] = Storage::putFile('clubs/' . date("FY"), $request->file('logo'));
        }

        if ($request->has('banner')) {
            $data['banner'] = Storage::putFile('clubs/' . date("FY"), $request->file('banner'));
        }

        $club = $request->user()->clubs()->create($data);

        if ($request->has('tags')) {
            $club->tags()->sync((array) $data['tags']);
        }

        return new ClubResource($club);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $club = Club::with('members', 'tags', 'horses')->findOrFail($id);

        return new ClubResource($club);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ClubRequest $request, Club $club)
    {
        $data = $request->validated();

        if ($request->has('logo')) {
            $data['logo'] = Storage::putFile('clubs/' . date("FY"), $request->file('logo'));
        }

        if ($request->has('banner')) {
            $data['banner'] = Storage::putFile('clubs/' . date("FY"), $request->file('banner'));
        }

        $club->update($data);

        if ($request->has('tags')) {
            $club->tags()->sync((array) $data['tags']);
        }

        return new ClubResource($club);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Club $club)
    {
        $club->delete();

        return response()->json(status: 204);
    }
}
