<?php

namespace App\Http\Livewire\Admin\Posts;

use App\Models\Post;
use Livewire\Component;

class ModalDelete extends Component
{
    public $post;

    protected $listeners = ['modalDelete'];

    public function modalDelete($id)
    {
        $this->post = Post::find($id);
    }

    public function render()
    {
        return view('livewire.admin.posts.modal-delete');
    }

    public function delete()
    {
        $this->post->tags()->detach();
        $this->post->categories()->detach();
        $this->post->delete();

        session()->flash('message', 'Post successfully deleted.');

        return redirect(route('admin.posts.index'));
    }
}
