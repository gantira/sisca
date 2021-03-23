<?php

namespace App\Http\Livewire\Admin\Tags;

use App\Models\Tag;
use Livewire\Component;

class Edit extends Component
{
    public Tag $tag;

    protected $rules = [
        'tag.name' => 'required|min:3',
    ];

    public function render()
    {
        return view('livewire.admin.tags.edit');
    }

    public function save()
    {
       $this->validate();

        $this->tag->save();

        session()->flash('message', 'Tag successfully updated.');

        return redirect(route('admin.tags.index'));
    }
}
