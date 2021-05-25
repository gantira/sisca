<?php

namespace App\Http\Livewire\Admin\Dashboard;

use App\Models\User;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $users = User::inRandomOrder()->get();

        return view('livewire.admin.dashboard.index', [
            'users' => $users
        ]);
    }
}
