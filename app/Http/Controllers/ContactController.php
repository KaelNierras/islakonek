<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::all();

        $locations = [
            ['location' => 'Pangan-an', 'x' => '10.219695', 'y' => '124.038477'],
            ['location' => 'Cawhagan', 'x' => '10.202674', 'y' => '124.019186'],
            ['location' => 'Gilutongan', 'x' => '10.206961', 'y' => '123.988824'],

        ];

        return view('pages.contact.index', compact('contacts', 'locations'));
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        try {
            $complete_location = $request->complete_location;
            list($Longitude, $Latitude, $location) = explode(',', $complete_location);

            $request->merge([
                'longitude' => $Longitude,
                'latitude' => $Latitude,
                'location' => $location,
            ]);

            $request->request->remove('complete_location');

            ($request->all());

            $data = $request->validate([
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
