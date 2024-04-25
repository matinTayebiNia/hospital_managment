<?php

namespace App\Livewire;

use Illuminate\Contracts\View\View;
use Livewire\Component;

class UserTable extends Component
{
    public function render(): View
    {
        return view('admin.users.index')->layout("admin.layouts.layouts-panel");
    }
}
