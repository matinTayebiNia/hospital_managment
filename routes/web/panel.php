<?php

use App\Livewire\users\UserTable;
use Illuminate\Support\Facades\Route;

Route::prefix("human-resource")->group(function () {
    Route::get("/users", UserTable::class)->name("users");
});
