<?php

namespace App\Http\Livewire\Admin\Teams;

use App\Models\Team;
use Livewire\Component;

class ModalInfo extends Component
{
    public $team;

    protected $listeners = ['modalInfo'];

    public function modalInfo($id)
    {
        $this->team = Team::find($id);
    }

    public function render()
    {
        return view('livewire.admin.teams.modal-info');
    }
}
