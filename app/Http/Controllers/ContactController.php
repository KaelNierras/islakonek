<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Island;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class ContactController extends Controller
{
    public function index()
    {

        $locations = Island::all();

        return view('pages.contact.index', compact('locations'));
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        try {
            $complete_location = $request->complete_location;
            list($Longitude, $Latitude, $location, $island_id) = explode(',', $complete_location);

            $request->merge([
                'longitude' => $Longitude,
                'latitude' => $Latitude,
                'location' => $location,
                'island_id' => $island_id,
            ]);

            $request->request->remove('complete_location');

            //dd($request->all());

            $data = $request->validate([
                'island_id' => 'required',
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'age' => 'required|numeric',
                'mobile' => 'nullable|numeric',
                'location' => 'required',
                'longitude' => 'required|numeric',
                'latitude' => 'required|numeric',
            ]);

            Contact::create($data);
            return redirect()->route('contacts.index')->with('success', 'Contact created successfully.');
        } catch (\Exception $e) {
            return redirect()->route('contacts.index')->with('error', 'Failed to create contact: ' . $e->getMessage());
        }
    }


    public function show(Contact $contact)
    {
        return view('contacts.show', compact('contact'));
    }

    public function edit(Contact $contact)
    {
    }

    public function update(Request $request, Contact $contact)
    {
        //dd($request->all());
        try {
            $request->validate([
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'age' => 'required|numeric',
                'phone' => 'nullable|string|max:15',
                'address' => 'nullable|string',
            ]);

            $contact->update($request->all());
            return redirect()->route('contacts.index')->with('success', 'Contact updated successfully.');
        } catch (\Exception $e) {
            return redirect()->route('contacts.index')->with('error', 'Failed to update contact: ' . $e->getMessage());
        }
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->route('contacts.index')->with('success', 'Contact deleted successfully.');
    }
}
