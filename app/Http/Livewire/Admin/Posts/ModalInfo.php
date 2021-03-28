<?php

namespace App\Http\Livewire\Admin\Posts;

use App\Models\Post;
use Livewire\Component;

class ModalInfo extends Component
{
    public $post;

    protected $listeners = ['modalInfo'];

    public function modalInfo($id)
    {
        $this->post = Post::find($id);
    }

    public function render()
    {
        return view('livewire.admin.posts.modal-info');
    }
}
