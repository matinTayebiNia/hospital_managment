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

    public array $selectAll = [];

    public object $select;

    public string $sortBy = "desc";

    #[Url(as: "role")]
    public string|null $role = null;
    /**
     * @var mixed|string
     */
    #[Url(as: "q")]
    public null|string $search = null;

    public int $perPage = 50;

    public int $userId = 0;

    public function changeStatus(User $user, $status)
    {
        $updateStatus = $status == "0" ? 1 : 0;

        $user->update(["status" => $updateStatus]);
    }

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
        $this->getDataBySearchAndRole();
    }

    public function selectAll()
    {

    }

    public function select()
    {

    }

    private mixed $users = [];

    public function getDataBySearchAndRole()
    {
        $this->role == null ?
            $this->users = [] :
            $this->users = $this->getUserDataByRole();
        return $this->users;
    }

    public function getUserDataByRole()
    {
        try {
            $this->users = User::search($this->search)->whereHas("roles", function ($q) {
                $q->where("name", $this->role);
            });
            return $this->users
                ->orderBy("created_at", $this->sortBy)
                ->paginate($this->perPage);
        } catch (\Exception $exception) {
            abort(500, $exception->getMessage());
        }
    }

    public function render(): View
    {
        $roles = getRoles();

        $this->users = $this->getDataBySearchAndRole();
        return view('admin.users.index')->with(compact("roles"))
            ->layout("admin.layouts.layouts-panel");
    }

    /**
     * @throws AuthorizationException
     */
    public function destroy(User $user)
    {
        $this->authorize("delete-user");
        if (auth()->user()->id != $user->id) {
            $user->delete();
            $this->dispatch('delete-user', title: "حذف شد", message: "کاربر با موفقیت حذف شد");
        }
    }

}
