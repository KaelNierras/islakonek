<?php

namespace App\Livewire;

use App\Models\Contact;
use App\Models\Island;
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
        $selectedContactId = session('selectedContactId', Contact::first()->id ?? null);
        $this->selectedContact = Contact::find($selectedContactId);
    }
    
    public function showContact($id)
    {
        $this->selectedContact = Contact::find($id);
        session(['selectedContactId' => $id]);
        return redirect()->to(request()->header('Referer'));
    }
    
    public function saveSelectedContactId($id)
    {
        session(['selectedContactId' => $id]);
    }

    public function render()
    {
        $locations = Island::all();

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
