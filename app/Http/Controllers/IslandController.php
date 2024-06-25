<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Island;

class IslandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.island.index'); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        //dd($request->all());
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'latitude' => 'required|decimal:0,6',
            'longitude' => 'required|decimal:0,6',
        ]);

        Island::create($data);
        return redirect()->route('island.index')->with('success', 'Island created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Island $island)
    {
        //dd($request->all());
        try {
            //dd($request->all());
            $request->validate([
                'name' => 'required|string|max:255',
                'latitude' => 'required|decimal:0,6',
                'longitude' => 'required|decimal:0,6',
            ]);

            $island->update($request->all());
            return redirect()->route('island.index')->with('success', 'Island updated successfully.');
        } catch (\Exception $e) {
            return redirect()->route('island.index')->with('error', 'Failed to update island: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Island $island)
    {
        //dd($island);    
        $island->delete();
        return redirect()->route('island.index')->with('success', 'Island deleted successfully.');
    }
}
