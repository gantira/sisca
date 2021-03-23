<?php

namespace App\Http\Livewire\Admin\Categories;

use App\Models\Category;
use Livewire\Component;

class ModalInfo extends Component
{
    public $category;

    protected $listeners = ['modalInfo'];

    public function modalInfo($id)
    {
        $this->category = Category::find($id);
    }

    public function render()
    {
        return view('livewire.admin.categories.modal-info');
    }
}
