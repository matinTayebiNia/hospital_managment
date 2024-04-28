<?php

namespace App\Livewire\users;

use App\Models\User;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\WithPagination;
use function view;

class UserTable extends Component
{
    use WithPagination;

    /**
     * @throws AuthorizationException
     */
    public function mount()
    {
        $this->authorize(['view-user', 'import-user', 'export-user',]);
    }

    private mixed $users = [];

    public function getUserDataByRole($role)
    {
        $this->users = User::role([$role])->paginate();
    }

    public function render(): View
    {
        $roles = User::getRoles();
        return view('admin.users.index')->with(compact("roles",))->layout("admin.layouts.layouts-panel");
    }
}
