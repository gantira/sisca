<?php

namespace App\Http\Livewire\Admin\Tags;

use App\Models\Tag;
use Livewire\Component;

class Create extends Component
{
    public $name;

    protected $rules = [
        'name' => 'required|min:3',
    ];

    public function render()
    {
        return view('livewire.admin.tags.create');
    }

    public function save()
    {
        $this->validate();

        Tag::create([
            'name' => $this->name
        ]);

        return redirect(route('admin.tags.index'));
    }
}
