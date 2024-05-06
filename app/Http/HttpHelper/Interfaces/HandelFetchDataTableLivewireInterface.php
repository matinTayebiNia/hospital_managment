<?php

namespace App\Http\HttpHelper\Interfaces;

use Illuminate\Database\Eloquent\Builder;

interface HandelFetchDataTableLivewireInterface
{


    /**
     * paginate data
     */
    public function getFilterAndPaginateData();


    /**
     * fetch data table from database
     * @return Builder
     */
    public function fetchData(): Builder;

    /**
     * delete selected data
     *
     * @return void
     */
    public function deleteSelected(): void;

    /**
     * delete specific data
     *
     * @param int $id
     * @return void
     */
    public function destroy(int $id);

    /**
     * this method for set some data when livewire component is loading
     */
    public function mount();

}
