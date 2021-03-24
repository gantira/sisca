<?php

namespace App\Http\Livewire\Admin\Teams;

use App\Models\Team;
use Livewire\Component;

class ModalDelete extends Component
{
    public $team;

    protected $listeners = ['modalDelete'];

    public function modalDelete($id)
    {
        $this->team = Team::find($id);
    }

    public function render()
    {
        return view('livewire.admin.teams.modal-delete');
    }

    public function delete()
    {
        $this->team->delete();

        session()->flash('message', 'Team successfully deleted.');

        return redirect(route('admin.teams.index'));
    }
}
