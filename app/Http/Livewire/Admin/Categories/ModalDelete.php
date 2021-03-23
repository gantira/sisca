<?php

namespace App\Http\Livewire\Admin\Categories;

use App\Models\Category;
use Livewire\Component;

class ModalDelete extends Component
{
    public $category;

    protected $listeners = ['modalDelete'];

    public function modalDelete($id)
    {
        $this->category = Category::find($id);
    }

    public function render()
    {
        return view('livewire.admin.categories.modal-delete');
    }

    public function delete()
    {
        $this->category->delete();

        session()->flash('message', 'Category successfully deleted.');

        return redirect(route('admin.categories.index'));
    }
}
