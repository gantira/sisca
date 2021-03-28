<?php

namespace App\Http\Livewire\Admin\Posts;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Livewire\Component;

class Edit extends Component
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

    public function mount(Post $post)
    {
        $this->post = $post;
        $this->category_id = $post->categories()->first() ? $post->categories()->first()->id : null;
        $this->tag_id = $post->tags()->pluck('id')->toArray();
    }

    public function render()
    {
        return view('livewire.admin.posts.edit', [
            'categories' => Category::select('id', 'name')->get(),
            'tags' => Tag::select('id', 'name')->get(),
        ]);
    }

    public function save()
    {
        $this->validate();

        $this->post->update();
        $this->post->categories()->sync($this->category_id);
        $this->post->tags()->sync($this->tag_id);

        session()->flash('message', 'Post successfully updated.');

        return redirect(route('admin.posts.index'));
    }
}
