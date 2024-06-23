<?php

namespace App\Livewire;

use App\Models\Contact;
use Livewire\Component;

class ContactDetails extends Component
{
    public $count = 1;
    public $selectedContact;
    public $search = '';

    public function mount()
    {
        $this->selectedContact = Contact::first();
    }

    public function showContact($id)
    {
        $this->selectedContact = Contact::find($id);
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