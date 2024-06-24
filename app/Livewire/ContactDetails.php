<?php

namespace App\Livewire;

use App\Models\Contact;
use Livewire\Component;

class ContactDetails extends Component
{
    public $count = 1;
    public $selectedContact;
    public $search = '';

    public $currentLongitude;
    public $currentLatitude;

    public function mount()
    {
        $selectedContactId = session('selectedContactId', Contact::first()->id);
        $this->selectedContact = Contact::find($selectedContactId);
    }
    
    public function showContact($id)
    {
        $this->selectedContact = Contact::find($id);
        session(['selectedContactId' => $id]); // Save the selected contact ID to the session
        return redirect()->to(request()->header('Referer'));
    }
    
    // Optionally, if you need to explicitly save the selected contact ID elsewhere
    public function saveSelectedContactId($id)
    {
        session(['selectedContactId' => $id]);
    }

    public function render()
    {
        $locations = [
            [ 'location' => 'Pangan-an', 'x' => '10.219695' , 'y' => '124.038477' ],
            [ 'location' => 'Cawhagan', 'x' => '10.202674', 'y' => '124.019186' ],
            [ 'location' => 'Gilutongan', 'x' => '10.206961' , 'y' => '123.988824'],
           
        ];

        $contacts = Contact::where(function ($query) {
            $query->where('first_name', 'like', '%' . $this->search . '%')
                ->orWhere('last_name', 'like', '%' . $this->search . '%')
                ->orWhere('location', 'like', '%' . $this->search . '%');
        })->get();

        return view('livewire.contact-details', compact('contacts', 'locations'));
    }

    public function updatedSelectedContact($contact)
    {
        $this->selectedContact = Contact::find($contact);
    }

    public function deleteContact($id)
    {
        return route('contacts.destroy', $id);
    }
}
