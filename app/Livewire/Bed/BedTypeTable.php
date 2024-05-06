<?php

namespace App\Livewire\Bed;

use App\Http\HttpHelper\Interfaces\HandelFetchDataTableLivewireInterface;
use App\Http\HttpHelper\Traits\FilterAndSelectedProperty;
use App\Models\BedType;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Livewire\Component;

class BedTypeTable extends Component implements HandelFetchDataTableLivewireInterface
{

    use FilterAndSelectedProperty;

    public int $status;

    public function render()
    {
        $bedTypes = $this->getFilterAndPaginateData();
        return view('admin.bedType.index', compact("bedTypes"))
            ->layout("admin.layouts.layouts-panel");
    }

    /**
     * @throws AuthorizationException
     */
    public function mount()
    {
        $this->authorize(['view-bed', 'import-bed', 'export-bed']);
    }


    /**
     * @throws Exception
     */
    public function deleteSelected(): void
    {
        try {
            if (count($this->selected) > 0) {
                $this->authorize("bulk-delete-bed");
                BedType::destroy($this->selected);
                $this->dispatch('alert', title: "حذف شد", message: "  نوع تخت های انتخاب شده با موفقیت حذف شد");
                $this->reset();
            }
        } catch (Exception $exception) {
            throw new $exception;
        }
    }

    /**
     * @throws Exception
     */
    public function destroy(int $id)
    {
        try {
            $this->authorize("delete-bed");
            $bedType=BedType::find($id);
            $bedType->delete();
            $this->dispatch('alert', title: "حذف شد", message: "نوع تخت انتخاب شده با موفقیت حذف شد");
        } catch (Exception $exception) {
            throw new $exception;
        }
    }

    public function getFilterAndPaginateData(): LengthAwarePaginator
    {
        return $this->fetchData()->paginate($this->perPage);
    }

    public function fetchData(): Builder
    {
        $bedTypes = BedType::search($this->search);
        if (isset($this->status)) {
            $bedTypes = $bedTypes->orWhere("status", $this->status);
        }
        return $bedTypes->orderBy("created_at", $this->sortBy);
    }

}
