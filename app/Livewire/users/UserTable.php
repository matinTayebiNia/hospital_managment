<?php

namespace App\Livewire\users;

use App\Models\User;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;
use function view;

class UserTable extends Component
{
    use WithPagination;


    #[Url(as: "role")]
    public string|null $role = null;
    /**
     * @var mixed|string
     */
    #[Url(as: "q")]
    public null|string $search = null;

    /**
     * @throws AuthorizationException
     */
    public function mount()
    {
        $this->authorize(['view-user', 'import-user', 'export-user',]);
    }

    public function removeSearchFilter()
    {
        $this->search = null;
        $this->searching();
    }

    private mixed $users = [];

    public function searching()
    {
        if ($this->search == null && $this->role == null)
            $this->users = [];
        else
            $this->users = $this->getUserDataByRole();
    }

    public function getUserDataByRole()
    {
        try {
            $this->users = User::search($this->search)->whereHas("roles", function ($q) {
                $q->where("name", $this->role);
            });
            return $this->users->latest()->paginate();
        } catch (\Exception $exception) {
            abort(500);
        }
    }

    public function render(): View
    {
        $roles = User::getRoles();

        return view('admin.users.index')->with(compact("roles"))->layout("admin.layouts.layouts-panel");
    }
}
