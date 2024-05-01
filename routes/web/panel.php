<?php

use App\Http\Controllers\UserController;
use App\Livewire\users\UserTable;
use Illuminate\Support\Facades\Route;

Route::prefix("human-resource")->name("users.")->group(function () {
    Route::get("/users", UserTable::class)->name("index");
    Route::get("/users/create", [UserController::class,"create"])->name("create");
    Route::post("/users/store", [UserController::class,"store"])->name("store");

});
