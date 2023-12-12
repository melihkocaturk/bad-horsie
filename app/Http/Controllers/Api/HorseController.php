<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\HorseRequest;
use App\Http\Resources\HorseResource;
use App\Models\Club;
use App\Models\Horse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HorseController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Horse::class);
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = $request->user();

        if ($user->type === 'student') {
            $horses = $user->horses();
        } else {
            $club = Club::where([
                'id' => $request->query('club_id'),
                'user_id' => $user->id
            ])->first();

            $horses = $club->horses();
        }

        return HorseResource::collection(
            $horses->paginate(10)
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(HorseRequest $request)
    {
        $data = $request->validated();

        if ($request->has('avatar')) {
            $data['avatar'] = Storage::putFile('horses/' . date("FY"), $request->file('avatar'));
        }

        $user = $request->user();

        if ($user->type === 'student') {
            $horse = $user->horses()->create($data);
        } else {
            $club = Club::where([
                'id' => $request->query('club_id'),
                'user_id' => $user->id
            ])->first();

            $horse = $club->horses()->create($data);
        }

        return new HorseResource($horse);
    }

    /**
     * Display the specified resource.
     */
    public function show(Horse $horse)
    {
        return new HorseResource($horse);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(HorseRequest $request, Horse $horse)
    {
        $data = $request->validated();

        if ($request->has('avatar')) {
            $data['avatar'] = Storage::putFile('horses/' . date("FY"), $request->file('avatar'));
        }

        $horse->update($data);

        return new HorseResource($horse);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Horse $horse)
    {
        $horse->delete();

        return response()->json(status: 204);
    }
}
