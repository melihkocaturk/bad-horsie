<?php

namespace App\Http\Controllers;

use App\Http\Requests\HorseRequest;
use App\Models\Horse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StudentHorseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('student_horses.index', [
            'horses' => auth()->user()->horses
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('student_horses.create');
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

        auth()->user()->horses()->create($data);

        return redirect()->route('horses.index')
            ->with('success', 'Horse successfully created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Horse $horse)
    {
        return view('student_horses.show', ['horse' => $horse]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Horse $horse)
    {
        return view('student_horses.edit', ['horse' => $horse]);
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

        return redirect()->route('horses.index')
            ->with('success', 'Horse successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Horse $horse)
    {
        $horse->delete();

        return redirect()->route('horses.index')
            ->with('success', 'Horse removed.');
    }
}
