<?php

namespace App\Http\Livewire\Admin\Posts;

use App\Models\Post;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
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
        $posts = Post::query()
            ->where('user_id', Auth::user()->id)
            ->orWhereHas('status', function (Builder $query) {
                $query->where('name', 'public')->orWhere('name', 'team');
            })
            ->orderBy('id', $this->sort)
            ->where('title', 'like', '%' . $this->search . '%')
            ->paginate(9);

        return view('livewire.admin.posts.index', [
            'posts' => $posts,
        ]);
    }
}
