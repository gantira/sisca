<?php

namespace App\Http\Livewire\Admin\Tags;

use App\Models\Tag;
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
        $tags = Tag::orderBy('id', $this->sort)->where('name', 'like', '%' . $this->search . '%')->paginate(9);

        return view('livewire.admin.tags.index', [
            'tags' => $tags
        ]);
    }
}
