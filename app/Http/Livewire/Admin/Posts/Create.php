<?php

namespace App\Http\Livewire\Admin\Posts;

use App\Models\Category;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

use function PHPUnit\Framework\isNull;

class Create extends Component
{
    public $post;
    public $category_id;
    public $tag_id;

    protected $rules = [
        'post.title' => 'required|min:3',
        'post.body' => 'required|min:3',
        'category_id' => 'nullable',
        'tag_id' => 'nullable',
    ];

    protected $validationAttributes = [
        'post.title' => 'title',
        'post.body' => 'body',
        'category_id' => 'category',
        'tag_id' => 'tag',
    ];

    public function render()
    {
        return view('livewire.admin.posts.create', [
            'categories' => Category::select('id', 'name')->get(),
            'tags' => Tag::select('id', 'name')->get(),
        ]);
    }

    public function save()
    {
        $this->validate();

        $post = Auth::user()->posts()->create($this->post);
        if (!empty($this->category_id)) {
            $post->categories()->sync($this->category_id);
        }
        if (!empty($this->tag_id)) {
            $post->tags()->sync($this->tag_id);
        }

        session()->flash('message', 'Post successfully created.');

        return redirect(route('admin.posts.index'));
    }
}
