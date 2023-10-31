<?php

namespace App\Http\Controllers;

use App\Http\Requests\MyHorseRequest;
use App\Models\MyHorse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MyHorseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('my_horses.index', [
            'myHorses' => auth()->user()->myHorses
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('my_horses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MyHorseRequest $request)
    {
        $data = $request->validated();

        if ($request->has('avatar')) {
            $data['avatar'] = Storage::putFile('horses/' . date("FY"), $request->file('avatar'));
        }

        auth()->user()->myHorses()->create($data);

        return redirect()->route('my-horses.index')
            ->with('success', 'Horse successfully created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(MyHorse $myHorse)
    {
        return view('my_horses.show', ['myHorse' => $myHorse]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MyHorse $myHorse)
    {
        return view('my_horses.edit', ['myHorse' => $myHorse]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MyHorseRequest $request, MyHorse $myHorse)
    {
        $data = $request->validated();

        if ($request->has('avatar')) {
            $data['avatar'] = Storage::putFile('horses/' . date("FY"), $request->file('avatar'));
        }

        $myHorse->update($data);

        return redirect()->route('my-horses.index')
            ->with('success', 'Horse successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MyHorse $myHorse)
    {
        $myHorse->delete();

        return redirect()->route('my-horses.index')
            ->with('success', 'Horse removed.');
    }
}
