<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Island;
use App\Models\Contact;

class IslandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $islandsCount = Island::count();
        return view('pages.island.index', compact('islandsCount'));
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
        try {
            $data = $request->validate([
                'name' => 'required|string|max:255|unique:islands,name',
                'latitude' => 'required|numeric',
                'longitude' => 'required|numeric',
            ]);

            Island::create($data);

            return redirect()->route('island.index')->with('success', 'Island created successfully.');
        } catch (\Exception $e) {
            // Redirect back with the specific error message from the exception
            return redirect()->back()->with('error', 'Failed to create the island: ' . $e->getMessage())->withInput();
        }
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
        try {
            $request->validate([
                'name' => 'required|string|max:255|unique:islands,name',
                'latitude_edit' => 'required|numeric',
                'longitude_edit' => 'required|numeric',
            ]);

            // Change keys from latitude_edit and longitude_edit to latitude and longitude
            $request['latitude'] = $request['latitude_edit'];
            unset($request['latitude_edit']);

            $request['longitude'] = $request['longitude_edit'];
            unset($request['longitude_edit']);

            // Retrieve all contacts associated with the island
            $contacts = $island->contacts;

            // Update the location of each contact to the new island name


            // Update the location, latitude, and longitude of each contact to match the new island details
            foreach ($contacts as $contact) {
                $contact->location = $request['name'];
                $contact->latitude = $request['latitude'];
                $contact->longitude = $request['longitude'];
                $contact->save();
            }

            // Update the island
            $island->update($request->all());
            return redirect()->route('island.index')->with('success', 'Island and associated contacts updated successfully.');
        } catch (\Exception $e) {
            return redirect()->route('island.index')->with('error', 'Failed to update island and contacts: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Island $island)
    {
        // Assuming you have a Contact model and it has a 'location' field
        $contactExists = Contact::where('location', 'like', '%' . $island->name . '%')->exists();

        if ($contactExists) {
            // Redirect back with an error message if a contact's location includes the island's name
            return redirect()->route('island.index')->with('error', 'Island cannot be deleted because there is a existing contact associated with it.');
        }

        // Proceed with deletion if no contact's location includes the island's name
        $island->delete();
        return redirect()->route('island.index')->with('success', 'Island deleted successfully.');
    }
}
