<?php

namespace App\Livewire\Room;

use App\Http\HttpHelper\Interfaces\HandelFetchDataTableLivewireInterface;
use App\Http\HttpHelper\Traits\FilterAndSelectedProperty;
use App\Models\RoomType;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;

class RoomTypeTable extends Component implements HandelFetchDataTableLivewireInterface
{
    use FilterAndSelectedProperty;

    public int $status;

    public function render()
    {
        $roomTypes = $this->getFilterAndPaginateData();
        return view('admin.roomType.index', compact("roomTypes"))
            ->layout("admin.layouts.layouts-panel");
    }

    public function getFilterAndPaginateData(): LengthAwarePaginator
    {
        return $this->fetchData()->paginate($this->perPage);
    }

    public function fetchData(): Builder
    {
        $roomTypes = RoomType::search($this->search);
        if (isset($this->status)) {
            $roomTypes = $roomTypes->where("status", $this->status);
        }
        return $roomTypes->orderBy("created_at", $this->sortBy);
    }

    /**
     * @throws AuthorizationException
     */
    public function deleteSelected(): void
    {
        if (count($this->selected) > 0) {
            $this->authorize('bulk-delete-room');
            RoomType::destroy($this->selected);
            $this->dispatch('alert', title: "حذف شد", message: "  اتاق های انتخاب شده با موفقیت حذف شد");
            $this->reset();
        }
    }

    /**
     * @throws AuthorizationException
     */
    public function mount()
    {
        $this->authorize(['view-room', 'import-room', 'export-room']);
    }

    /**
     * @throws AuthorizationException
     */
    public function destroy(int $id)
    {
        $this->authorize("delete-room");
        $roomType = RoomType::find($id);
        $roomType->delete();
        $this->dispatch('alert', title: "حذف شد", message: "   نوع اتاق  انتخاب شده با موفقیت حذف شد ");
    }
}
