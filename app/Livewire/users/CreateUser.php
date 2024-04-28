<?php

namespace App\Livewire\Users;

use Livewire\Component;

class CreateUser extends Component
{
    public function render()
    {
        return view('admin.users.create-user')->layout("admin.layouts.layouts-panel");;
    }
}
