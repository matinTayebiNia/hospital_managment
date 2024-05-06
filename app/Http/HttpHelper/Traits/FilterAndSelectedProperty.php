<?php

namespace App\Http\HttpHelper\Traits;

use Exception;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\WithPagination;

trait FilterAndSelectedProperty
{
    use WithPagination;

    public int $selectedCount = 0;

    public bool $selectedAll = false;

    public mixed $selected = [];

    public bool $selectedPage = false;

    public int $perPage = 50;

    public string $sortBy = "desc";

    /**
     * @var mixed|string
     */
    #[Url(as: "search")]
    public null|string $search = null;

    #[On("update-selected")]
    public function selectedChange()
    {
        try {
            $this->selectedAll = $this->selectedCount === count($this->selected);
        } catch (Exception $exception) {
            throw new $exception;
        }
    }

    /**
     * @throws Exception
     */
    public function removeSearchFilter(): LengthAwarePaginator
    {
        $this->search = null;
        return $this->getFilterAndPaginateData();
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
            $this->selected = $this->fetchData()->pluck('id');
            $this->selectedCount = $this->selected->count();
        } catch (Exception $exception) {
            throw new $exception;
        }
    }
}
