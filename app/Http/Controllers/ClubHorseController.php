<?php

namespace App\Http\Controllers;

use App\Http\Requests\HorseRequest;
use App\Models\Club;
use App\Models\Horse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ClubHorseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(int $id)
    {
        return view('club_horses.index', [
            'club' => Club::with('horses')
                ->findOrFail($id),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Club $club)
    {
        return view('club_horses.create', [
            'club' => $club, 
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(HorseRequest $request, Club $club)
    {
        $data = $request->validated();

        if ($request->has('avatar')) {
            $data['avatar'] = Storage::putFile('horses/' . date("FY"), $request->file('avatar'));
        }

        $club->horses()->create($data);

        return redirect()->route('clubs.horses.index', $club)
            ->with('success', 'Horse successfully created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Club $club, Horse $horse)
    {
        return view('club_horses.show', [
            'club' => $club, 
            'horse' => $horse,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Club $club, Horse $horse)
    {
        return view('club_horses.edit', [
            'club' => $club, 
            'horse' => $horse,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(HorseRequest $request, Club $club, Horse $horse)
    {
        $data = $request->validated();

        if ($request->has('avatar')) {
            $data['avatar'] = Storage::putFile('horses/' . date("FY"), $request->file('avatar'));
        }

        $horse->update($data);

        return redirect()->route('clubs.horses.index', $club)
            ->with('success', 'Horse successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Club $club, Horse $horse)
    {
        $horse->delete();

        return redirect()->route('clubs.horses.index', $club)
            ->with('success', 'Horse removed.');
    }
}
