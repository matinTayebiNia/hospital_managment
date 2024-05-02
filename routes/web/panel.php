<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\WardController;
use App\Livewire\users\UserTable;
use App\Livewire\Ward\WardTable;
use Illuminate\Support\Facades\Route;

Route::prefix("human-resource")->name("users.")->group(function () {
    Route::get("/users", UserTable::class)->name("index");
    Route::get("/users/create", [UserController::class, "create"])->name("create");
    Route::post("/users/store", [UserController::class, "store"])->name("store");
    Route::get("/users/edit/{user}", [UserController::class, "edit"])->name("edit");
    Route::put("/users/update/{user}", [UserController::class, "update"])->name("update");
});

Route::prefix("wards")->name('wards.')->group(function () {
    Route::get("/wards", WardTable::class)->name("index");
    Route::get("/wards/create", [WardController::class, "create"])->name("create");
    Route::post("/wards/store", [WardController::class, "store"])->name("store");
    Route::get("/wards/{ward}/edit", [WardController::class, "edit"])->name("edit");
    Route::put("/wards/{ward}/update", [WardController::class, "update"])->name("update");
});
