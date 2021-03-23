<?php

namespace App\Http\Livewire\Admin\Tags;

use App\Models\Tag;
use Livewire\Component;

class ModalDelete extends Component
{
    public $tag;

    protected $listeners = ['modalDelete'];

    public function modalDelete($id)
    {
        $this->tag = Tag::find($id);
    }

    public function render()
    {
        return view('livewire.admin.tags.modal-delete');
    }

    public function delete()
    {
        $this->tag->delete();

        session()->flash('message', 'Tag successfully deleted.');

        return redirect(route('admin.tags.index'));
    }
}
