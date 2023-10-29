<?php

namespace App\Http\Controllers;

use App\Models\MyHorse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['string', 'max:255'],
            'avatar' => ['image', 'mimes:jpg,jpeg,png,gif', 'max:2048'],
            'height' => ['integer', 'max:255'],
        ]);

        $data = [
            'name' => $validated['name'],
            'description' => $validated['description'],
            'gender' => $request['gender'],
            'race' => $request['race'],
            'color' => $request['color'],
            'height' => $validated['height'],
            'fei_id' => $request['fei_id'],
        ];

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
    public function update(Request $request, MyHorse $myHorse)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['string', 'max:255'],
            'avatar' => ['image', 'mimes:jpg,jpeg,png,gif', 'max:2048'],
            'height' => ['integer', 'max:255'],
        ]);

        $data = [
            'name' => $validated['name'],
            'description' => $validated['description'],
            'gender' => $request['gender'],
            'race' => $request['race'],
            'color' => $request['color'],
            'height' => $validated['height'],
            'fei_id' => $request['fei_id'],
        ];

        if ($request->has('avatar')) {
            $data['avatar'] = Storage::putFile('horses/' . date("FY"), $request->file('avatar'));
        }

        $myHorse->update($data);

        return redirect()->route('my-horses.index')
            ->with('success', 'Horse update successfully.');
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
