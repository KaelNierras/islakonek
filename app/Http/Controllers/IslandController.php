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
                'latitude_edit' => 'required|numeric',
                'longitude_edit' => 'required|numeric',
            ]);
            
            // Change keys from latitude_edit and longitude_edit to latitude and longitude
            $request['latitude'] = $request['latitude_edit'];
            unset($request['latitude_edit']);
            
            $request['longitude'] = $request['longitude_edit'];
            unset($request['longitude_edit']);

            //dd($request->all());
            
            // Now, $validatedData contains 'latitude' and 'longitude' keys instead of 'latitude_edit' and 'longitude_edit'

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
        try {
            // Check if the island has any associated contacts
            if ($island->contacts()->exists()) {
                return redirect()->route('island.index')->with('error', 'Island cannot be deleted because it has associated contacts.');
            }

            $island->delete();
            return redirect()->route('island.index')->with('success', 'Island deleted successfully.');
        } catch (\Exception $e) {
            // Log the error or handle it as needed
            return redirect()->route('island.index')->with('error', 'Error deleting island: ' . $e->getMessage());
        }
    }
}
