<?php

namespace App\Livewire\Room;

use App\Http\HttpHelper\Interfaces\HandelFetchDataTableLivewireInterface;
use App\Http\HttpHelper\Traits\FilterAndSelectedProperty;
use App\Models\Room;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;

class RoomTable extends Component implements HandelFetchDataTableLivewireInterface
{
    use FilterAndSelectedProperty;

    public int $status;

    public function render()
    {
        $rooms = $this->getFilterAndPaginateData();
        return view('admin.room.index', compact("rooms"))
            ->layout("admin.layouts.layouts-panel");
    }

    /**
     * @throws AuthorizationException
     */
    public function mount()
    {
        $this->authorize(['view-room', 'import-room', 'export-room',]);
    }


    public function getFilterAndPaginateData(): LengthAwarePaginator|array
    {
        return $this->fetchData()->paginate($this->perPage);
    }

    public function fetchData(): Builder
    {
        $rooms = Room::search($this->search);
        if (isset($this->status)) {
            $rooms = $rooms->where("status", $this->status);
        }
        return $rooms->orderBy("created_at", $this->sortBy);
    }

    /**
     * @throws AuthorizationException
     */
    public function deleteSelected(): void
    {
        try {
            if (count($this->selected) > 0) {
                $this->authorize("bulk-delete-room");
                Room::destroy($this->selected);
                $this->dispatch('alert', title: "حذف شد", message: "  اتاق های انتخاب شده با موفقیت حذف شد");
                $this->reset();
            }
        } catch (AuthorizationException $exception) {
            throw new $exception;
        }
    }

    /**
     * @throws AuthorizationException
     */
    public function destroy(int $id)
    {
        $this->authorize('delete-room');
        $room = Room::find($id);
        $room->delete();
        $this->dispatch('alert', title: "حذف شد", message: "  اتاق انتخاب شده با موفقیت حذف شد");
    }
}
