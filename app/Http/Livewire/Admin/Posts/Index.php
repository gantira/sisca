<?php

namespace App\Http\Livewire\Admin\Posts;

use App\Models\Post;
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
        $posts = Post::orderBy('id', $this->sort)->where('title', 'like', '%' . $this->search . '%')->paginate(9);

        return view('livewire.admin.posts.index', [
            'posts' => $posts,
        ]);
    }
}
