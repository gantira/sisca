<?php

namespace App\Http\Livewire\Admin\Tags;

use App\Models\Tag;
use Livewire\Component;

class Create extends Component
{
    public $tag;

    protected $rules = [
        'tag.name' => 'required|min:3',
    ];

    protected $validationAttributes = [
        'tag.name' => 'name'
    ];

    public function render()
    {
        return view('livewire.admin.tags.create');
    }

    public function save()
    {
        $this->validate();

        Tag::create([
            'name' => $this->tag['name']
        ]);

        session()->flash('message', 'Tag successfully created.');

        return redirect(route('admin.tags.index'));
    }
}
