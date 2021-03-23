<?php

namespace App\Http\Livewire\Admin\Tags;

use App\Models\Tag;
use Livewire\Component;

class ModalInfo extends Component
{
    public $tag;

    protected $listeners = ['modalInfo'];

    public function modalInfo($id)
    {
        $this->tag = Tag::find($id);
    }

    public function render()
    {
        return view('livewire.admin.tags.modal-info');
    }
}
