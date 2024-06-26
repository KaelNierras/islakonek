<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Island;
use Livewire\WithPagination;
use Livewire\Attributes\On; 

class IslandTable extends Component
{

    use WithPagination;

    public $editIsland;

    public function mount()
    {
        $this->editIsland = Island::first();
    }

    #[On('get-island')]
    public function getIsland($id)
    {
        //dd($id);
        $this->editIsland = Island::find($id);
        //dd($this->editIsland);
        //$this->dispatch('show-modal');
    }

    public function render()
    {
        $action_icons = [
            "icon:pencil | click:showModalEdit('edit-island', {id})",
            "icon:trash | color:red | click:showModalEdit('delete-island')",
        ];

        $islands = Island::paginate(4);
        return view('livewire.island-table', compact('islands', 'action_icons'));
    }
}
