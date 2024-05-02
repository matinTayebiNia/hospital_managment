<?php

namespace App\Livewire\Ward;

use App\Helper\Traits\FilterAndSelectedProperty;
use App\Models\Ward;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Livewire\Attributes\On;
use Livewire\Component;

class WardTable extends Component
{
    use FilterAndSelectedProperty;

    public int $status;

    public function render()
    {
        $wards = $this->getFilterAndPaginateData();
        return view('admin.ward.index', compact("wards"))
            ->layout("admin.layouts.layouts-panel");
    }

    public function getFilterAndPaginateData()
    {
        return $this->getDataWard()->paginate($this->perPage);
    }

    public function getDataWard()
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
    #[On("select-page")]
    public function updatedSelectedPage($selected)
    {

        try {
            if ($selected) {
                $this->selectedPage = true;
                $this->selected = $this->getFilterAndPaginateData()->pluck("id");
            } else {
                $this->selectedPage = false;
                $this->selected = [];
            }
        } catch (Exception $exception) {
            throw new $exception;
        }


    }

    /**
     * @throws Exception
     */
    public function selectAll()
    {
        try {
            $this->selectedAll = true;
            $this->selected = $this->getDataWard()->pluck('id');
            $this->selectedCount = $this->selected->count();
        } catch (Exception $exception) {
            throw new $exception;
        }
    }

    public function removeSearchFilter()
    {
        $this->search = null;
        $this->getFilterAndPaginateData();
    }

    /**
     * @throws Exception
     */
    public function deleteWards()
    {
        try {
            if (count($this->selected) > 0) {
                $this->authorize("delete-ward");
                Ward::destroy($this->selected);
                $this->dispatch('alert', title: "حذف شد", message: "بخش های انتخاب شده با موفقیت حذف شدند");
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
    public function destroy(Ward $ward)
    {

        $this->authorize("delete-ward");
        $ward->delete();
        $this->dispatch('alert', title: "حذف شد", message: "بخش مورد نظر با موفقیت حذف شد");

    }
}
