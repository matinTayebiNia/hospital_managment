<?php

namespace App\Livewire\users;

use App\Helper\Traits\FilterAndSelectedProperty;
use App\Models\User;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Component;
use function view;

class UserTable extends Component
{
    use FilterAndSelectedProperty;

    #[Url(as: "role")]
    public string|null $role = null;

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


    public function getDataBySearchAndRole(): mixed
    {
        return $this->role == null ?
            [] :
            $this->getUserDataByRole()->paginate($this->perPage);
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

        $users = $this->getDataBySearchAndRole();

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
                $this->authorize("delete-user");
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
            $this->selected = $this->getUserDataByRole()->pluck('id');
            $this->selectedCount = $this->selected->count();
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
                $this->selected = $this->getUserDataByRole()->paginate($this->perPage)->pluck("id");
            } else {
                $this->selectedPage = false;
                $this->selected = [];
            }
        } catch (\Exception $exception) {
            throw new $exception;
        }


    }


}
