<?php

namespace App\Http\Livewire\Admin\Teams;

use App\Models\Team;
use Livewire\Component;

class Edit extends Component
{
    public Team $team;

    protected $rules = [
        'team.name' => 'required|min:3',
    ];

    public function render()
    {
        return view('livewire.admin.teams.edit');
    }

    public function save()
    {
       $this->validate();

        $this->team->save();

        session()->flash('message', 'Team successfully updated.');

        return redirect(route('admin.teams.index'));
    }
}
