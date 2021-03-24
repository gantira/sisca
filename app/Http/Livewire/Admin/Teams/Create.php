<?php

namespace App\Http\Livewire\Admin\Teams;

use App\Models\Team;
use Livewire\Component;

class Create extends Component
{
    public $team;

    protected $rules = [
        'team.name' => 'required|min:3',
    ];

    protected $validationAttributes = [
        'team.name' => 'name'
    ];

    public function render()
    {
        return view('livewire.admin.teams.create');
    }

    public function save()
    {
        $this->validate();

        Team::create([
            'name' => $this->team['name']
        ]);

        session()->flash('message', 'Tag successfully created.');

        return redirect(route('admin.teams.index'));
    }
}
