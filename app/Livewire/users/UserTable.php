<?php

namespace App\Livewire\users;

use App\Models\User;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;
use function view;

class UserTable extends Component
{
    use WithPagination;

    public int $selectedCount;

    public bool $selectedAll = false;

    public mixed $selected = [];

    private mixed $users = [];

    public bool $selectedPage = false;

    public string $sortBy = "desc";

    #[Url(as: "role")]
    public string|null $role = null;

    /**
     * @var mixed|string
     */
    #[Url(as: "q")]
    public null|string $search = null;

    public int $perPage = 2;

    public int $userId = 0;


    /**
     * @throws AuthorizationException
     */
    public function changeStatus(User $user, $status)
    {
        $this->authorize("update-user");
        $updateStatus = $status == "0" ? 1 : 0;
        $titleStatus = $status == "0" ? "فعال" : "غیر فعال";

        $user->update(["status" => $updateStatus]);
        $this->dispatch('alert', title: $titleStatus, message: "کاربر با موفقیت {$titleStatus} شد");

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


    public function getDataBySearchAndRole()
    {
        return $this->role == null ?
            [] :
            $this->getUserDataByRole();
    }

    public function getUserDataByRole()
    {
        try {
            $users = User::search($this->search)->whereHas("roles", function ($q) {
                $q->where("name", $this->role);
            });
            return $users
                ->orderBy("created_at", $this->sortBy);
        } catch (\Exception $exception) {
            abort(500, $exception->getMessage());
        }
    }

    public function render(): View
    {
        $roles = getRoles();

        $users = $this->getDataBySearchAndRole()->paginate($this->perPage);

        return view('admin.users.index', compact("roles", "users"))
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
            $this->dispatch('alert', title: "حذف شد", message: "کاربر با موفقیت حذف شد");
        }
    }

    /**
     * @throws \Exception
     */
    public function deleteDataSelected()
    {
        try {
            if (count($this->selected) > 0) {
                User::destroy($this->selected);
                $this->dispatch('alert', title: "حذف شد", message: "کاربر  با موفقیت حذف شد");
            }
        } catch (\Exception $exception) {
            throw new $exception;
        }
    }

    /**
     * @throws \Exception
     */
    public function deleteUsers()
    {
        try {
            if (count($this->selected) > 0) {
                User::destroy($this->selected);
                $this->dispatch('alert', title: "حذف شد", message: "کاربر های انتخاب شده با موفقیت حذف شدند");
            }
        } catch (\Exception $exception) {
            throw new $exception;
        }
    }

    /**
     * @throws \Exception
     */
    public function selectAll()
    {
        try {
            $this->selectedAll = true;
            $this->selected = $this->getDataBySearchAndRole()->pluck('id');
            $this->selectedCount = $this->selected->count();
        } catch (\Exception $exception) {
            throw new $exception;
        }
    }

    #[On("update-selected")]
    public function selectedChange()
    {
        try {
            $this->selectedAll = $this->selectedCount === count($this->selected);
        } catch (\Exception $exception) {
            throw new $exception;
        }
    }

    /**
     * @throws \Exception
     */
    #[On("select-page")]
    public function updatedSelectedPage($selected)
    {

        try {
            if ($selected) {
                $this->selectedPage = true;
                $this->selected = $this->getDataBySearchAndRole()->paginate($this->perPage)->pluck("id");
            } else {
                $this->selectedPage = false;
                $this->selected = [];
            }
        } catch (\Exception $exception) {
            throw new $exception;
        }


    }

}
