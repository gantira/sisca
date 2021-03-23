<?php

namespace App\Http\Livewire\Admin\Categories;

use App\Models\Category;
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
        $categories = Category::orderBy('id', $this->sort)->where('name', 'like', '%' . $this->search . '%')->paginate(9);

        return view('livewire.admin.categories.index', [
            'categories' => $categories
        ]);
    }
}
