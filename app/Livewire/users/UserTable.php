<?php

namespace App\Livewire\users;

use App\Http\HttpHelper\Interfaces\HandelFetchDataTableLivewireInterface;
use App\Http\HttpHelper\Traits\FilterAndSelectedProperty;
use App\Models\User;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Attributes\Url;
use Livewire\Component;
use function view;

class UserTable extends Component implements HandelFetchDataTableLivewireInterface
{
    // todo change  method names in view
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

    /**
     * @throws Exception
     */
    public function getFilterAndPaginateData(): LengthAwarePaginator|array
    {
        return $this->role == null ?
            [] :
            $this->fetchData()->paginate($this->perPage);
    }

    /**
     * @throws Exception
     */
    public function render(): View
    {
        $roles = getRoles();

        $users = $this->getFilterAndPaginateData();

        return view('admin.users.index', compact("roles", "users"))
            ->layout("admin.layouts.layouts-panel");
    }

    /**
     * @throws AuthorizationException
     */
    public function destroy(int $id)
    {
        $this->authorize("delete-user");
        if (auth()->user()->id != $id) {
            $user = User::find($id);
            $user->delete();
            $this->dispatch('alert', title: "حذف شد", message: "کاربر با موفقیت حذف شد");
        }
    }

    /**
     * @throws Exception
     */
    public function deleteSelected(): void
    {
        try {
            if (count($this->selected) > 0) {
                $this->authorize("delete-user");
                User::destroy($this->selected);
                $this->dispatch('alert', title: "حذف شد", message: "کاربر های انتخاب شده با موفقیت حذف شدند");
                $this->reset();
            }
        } catch (Exception $exception) {
            throw new $exception;
        }
    }

    /**
     * @throws Exception
     */
    public function fetchData(): Builder
    {
        try {
            $users = User::search($this->search)->whereHas("roles", function ($q) {
                $q->where("name", $this->role);
            });
            return $users
                ->orderBy("created_at", $this->sortBy);
        } catch (Exception $exception) {
            throw new  $exception;
        }
    }
}
