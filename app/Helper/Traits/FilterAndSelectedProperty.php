<?php

namespace App\Helper\Traits;

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
    #[Url(as: "q")]
    public null|string $search = null;

    #[On("update-selected")]
    public function selectedChange()
    {
        try {
            $this->selectedAll = $this->selectedCount === count($this->selected);
        } catch (\Exception $exception) {
            throw new $exception;
        }
    }

}
