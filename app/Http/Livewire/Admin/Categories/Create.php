<?php

namespace App\Http\Livewire\Admin\Categories;

use App\Models\Category;
use Livewire\Component;

class Create extends Component
{
    public $category;

    protected $rules = [
        'category.name' => 'required|min:3',
    ];

    protected $validationAttributes = [
        'category.name' => 'name'
    ];

    public function render()
    {
        return view('livewire.admin.categories.create');
    }

    public function save()
    {
        $this->validate();

        Category::create([
            'name' => $this->category['name']
        ]);

        session()->flash('message', 'Category successfully created.');

        return redirect(route('admin.categories.index'));
    }
}
