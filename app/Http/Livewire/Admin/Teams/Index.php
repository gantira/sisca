<?php

namespace App\Http\Livewire\Admin\Teams;

use App\Models\Team;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $search;
    public $sort = 'asc';

    protected $queryString = ['search' => ['except' => ''], 'sort' => ['except' => 'asc']];
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $teams = Team::orderBy('id', $this->sort)->where('name', 'like', '%' . $this->search . '%')->paginate(9);

        return view('livewire.admin.teams.index', [
            'teams' => $teams
        ]);
    }
}
