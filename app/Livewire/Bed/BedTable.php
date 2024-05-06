<?php

namespace App\Livewire\Bed;

use App\Http\HttpHelper\Interfaces\HandelFetchDataTableLivewireInterface;
use App\Http\HttpHelper\Traits\FilterAndSelectedProperty;
use App\Models\Bed;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;

class BedTable extends Component implements HandelFetchDataTableLivewireInterface
{

    // todo change  method names in view

    use FilterAndSelectedProperty;

    public int $status;

    public function render()
    {
        $beds = $this->getFilterAndPaginateData();
        return view('admin.bed.index', compact('beds'))
            ->layout("admin.layouts.layouts-panel");
    }

    /**
     * @throws AuthorizationException
     */
    public function mount()
    {
        $this->authorize(['view-bed', 'import-bed', 'export-bed',]);
    }

    /**
     * @throws AuthorizationException
     */
    public function destroy(int $id)
    {
        try {
            $this->authorize("delete-bed");
            $bed=Bed::find($id);
            $bed->delete();
            $this->dispatch('alert', title: "حذف شد", message: " تخت انتخاب شده با موفقیت حذف شد");
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
        $beds = Bed::search($this->search);
        if (isset($this->status)) {
            $beds = $beds->orWhere("status", $this->status);
        }
        return $beds->orderBy("created_at", $this->sortBy);
    }

    /**
     * @throws Exception
     */
    public function deleteSelected():void
    {
        try {
            if (count($this->selected) > 0) {
                $this->authorize("bulk-delete-bed");
                Bed::destroy($this->selected);
                $this->dispatch('alert', title: "حذف شد", message: " تخت های انتخاب شده با موفقیت حذف شد");
                $this->reset();
            }
        } catch (Exception $exception) {
            throw new $exception;
        }
    }


}
