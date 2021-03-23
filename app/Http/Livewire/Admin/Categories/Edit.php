<?php

namespace App\Http\Livewire\Admin\Categories;

use App\Models\Category;
use Livewire\Component;

class Edit extends Component
{
    public Category $category;

    protected $rules = [
        'category.name' => 'required|min:3',
    ];

    public function render()
    {
        return view('livewire.admin.categories.edit');
    }

    public function save()
    {
       $this->validate();

        $this->category->save();

        session()->flash('message', 'Category successfully updated.');

        return redirect(route('admin.categories.index'));
    }
}
