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
        // Calculate population density if total_population and total_area are provided and total_area is not zero
        $totalPopulation = intval($request->input('total_population'));
        $totalArea = intval($request->input('total_area'));
        $populationDensity = null;
        if (!is_null($totalPopulation) && !is_null($totalArea) && $totalArea != 0) {
            $populationDensity = $totalPopulation / $totalArea;
        }

        // Override the values in the request object
        $request->merge([
            'population_density' => $populationDensity,
            'total_population' => $totalPopulation,
            'total_area' => $totalArea,
        ]);

        try {
            $data = $request->validate([
                'name' => 'required|string|max:255|unique:islands,name',
                'latitude' => 'required|numeric',
                'longitude' => 'required|numeric',
                'total_area' => 'nullable|numeric',
                'total_population' => 'nullable|numeric',
                'population_density' => 'nullable|numeric',
                'description' => 'nullable|string',
            ]);

            // Debugging line to dump the validated data
            //dd($data);

            // The population_density is already included in the request merge above, no need to add it again here

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
        $selectedIsland = Island::find($id);
        return view('pages.island.show-island', compact('selectedIsland'));
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
        $description = $request->input('description_edit');
        $longitude = $request->input('longitude_edit');
        $latitude = $request->input('latitude_edit');

        // Calculate population density if total_population and total_area are provided and total_area is not zero
        $totalPopulation = intval($request->input('total_population_edit'));
        $totalArea = intval($request->input('total_area_edit'));
        $populationDensity = null;
        if (!is_null($totalPopulation) && !is_null($totalArea) && $totalArea != 0) {
            $populationDensity = $totalPopulation / $totalArea;
        }

        $request->request->remove('total_population_edit');
        $request->request->remove('total_area_edit');
        $request->request->remove('description_edit');
        $request->request->remove('longitude_edit');
        $request->request->remove('latitude_edit');


        // Override the values in the request object
        $request->merge([
            'population_density' => $populationDensity,
            'total_population' => $totalPopulation,
            'total_area' => $totalArea,
            'description' => $description,
            'longitude' => $longitude,
            'latitude' => $latitude,
        ]);

        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'latitude' => 'required|numeric',
                'longitude' => 'required|numeric',
                'total_area' => 'nullable|numeric',
                'total_population' => 'nullable|numeric',
                'population_density' => 'nullable|numeric',
                'description' => 'nullable|string',
            ]);

            // Retrieve all contacts associated with the island
            $contacts = $island->contacts;

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
