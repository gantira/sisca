<?php

namespace App\Http\Livewire\Admin;

use App\Models\Tag;
use Livewire\Component;

class Modal extends Component
{
    public $tag;
    protected $listeners = ['modal' => 'show'];

    public function show($tag)
    {
        $this->tag = $tag;
    }

    public function render()
    {
        return view('livewire.admin.modal');
    }
}
