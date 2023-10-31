<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClubRequest;
use App\Models\Club;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ClubController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('clubs.index', [
            'clubs' => auth()->user()->clubs
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('clubs.create');
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

        auth()->user()->clubs()->create($data);

        return redirect()->route('clubs.index')
            ->with('success', 'Club successfully created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Club $club)
    {
        return view('clubs.show', ['club' => $club]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Club $club)
    {
        return view('clubs.edit', ['club' => $club]);
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

        return redirect()->route('clubs.index')
            ->with('success', 'Club successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Club $club)
    {
        $club->delete();

        return redirect()->route('clubs.index')
            ->with('success', 'Club removed.');
    }
}
