<?php

namespace App\Livewire\Ward;

use App\Http\HttpHelper\Interfaces\HandelFetchDataTableLivewireInterface;
use App\Http\HttpHelper\Traits\FilterAndSelectedProperty;
use App\Models\Ward;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;

class WardTable extends Component implements HandelFetchDataTableLivewireInterface
{
    use FilterAndSelectedProperty;

    public int $status;

    public function render()
    {
        $wards = $this->getFilterAndPaginateData();
        return view('admin.ward.index', compact("wards"))
            ->layout("admin.layouts.layouts-panel");
    }

    public function getFilterAndPaginateData(): LengthAwarePaginator|array
    {
        return $this->fetchData()->paginate($this->perPage);
    }

    public function fetchData(): Builder
    {
        $ward = Ward::search($this->search);
        if (isset($this->status)) {
            $ward = Ward::search($this->search)->orWhere("status", $this->status);
        }
        return $ward->orderBy("created_at", $this->sortBy);
    }

    /**
     * @throws Exception
     */
    public function deleteSelected(): void
    {
        try {
            if (count($this->selected) > 0) {
                $this->authorize("delete-ward");
                Ward::destroy($this->selected);
                $this->dispatch('alert', title: "حذف شد", message: "بخش های انتخاب شده با موفقیت حذف شدند");
                $this->reset();
            }
        } catch (Exception $exception) {
            throw new $exception;
        }
    }

    /**
     * @throws AuthorizationException
     */
    public function mount()
    {
        $this->authorize(["import-wards", "export-wards", "view-wards",]);
    }

    /**
     * @throws AuthorizationException
     */
    public function destroy(int $id)
    {

        $this->authorize("delete-ward");
        $ward = Ward::find($id);
        $ward->delete();
        $this->dispatch('alert', title: "حذف شد", message: "بخش مورد نظر با موفقیت حذف شد");

    }
}
