<?php

use App\Http\Controllers\BedController;
use App\Http\Controllers\BedTypeController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\RoomTypeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WardController;
use App\Livewire\Bed\BedTable;
use App\Livewire\Bed\BedTypeTable;
use App\Livewire\Room\RoomTable;
use App\Livewire\Room\RoomTypeTable;
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

Route::prefix("beds")->name("beds.")->group(function () {
    Route::get("/", BedTable::class)->name("index");
    Route::get("/create", [BedController::class, "create"])->name('create');
    Route::post("/store", [BedController::class, "store"])->name('store');
    Route::get("/{bed}/edit", [BedController::class, "edit"])->name('edit');
    Route::put("/{bed}/update", [BedController::class, "update"])->name('update');
});

Route::prefix("room")->name("rooms.")->group(function () {
    Route::get("/", RoomTable::class)->name("index");
    Route::get("/create", [RoomController::class, "create"])->name("create");
    Route::post("/store", [RoomController::class, "store"])->name("store");
    Route::get("/{room}/edit", [RoomController::class, "edit"])->name("edit");
    Route::put("/{room}/update", [RoomController::class, "update"])->name("update");
});

Route::prefix("room-type")->name("roomTypes.")->group(function () {
    Route::get("/", RoomTypeTable::class)->name("index");
    Route::get("/create", [RoomTypeController::class, "create"])->name("create");
    Route::post("/store", [RoomTypeController::class, "store"])->name("store");
    Route::get("/{room_type}/edit", [RoomTypeController::class, "edit"])->name("edit");
    Route::put("/{room_type}/update", [RoomTypeController::class, "update"])->name("update");
});

Route::prefix("bed-types")->name("bedTypes.")->group(function () {
    Route::get("/", BedTypeTable::class)->name("index");
    Route::get("/create", [BedTypeController::class, "create"])->name("create");
    Route::post("/store", [BedTypeController::class, "store"])->name("store");
    Route::get("/{bed_type}/edit", [BedTypeController::class, "edit"])->name("edit");
    Route::put("/{bed_type}/update", [BedTypeController::class, "update"])->name("update");
});

Route::prefix("wards")->name('wards.')->group(function () {
    Route::get("/wards", WardTable::class)->name("index");
    Route::get("/wards/create", [WardController::class, "create"])->name("create");
    Route::post("/wards/store", [WardController::class, "store"])->name("store");
    Route::get("/wards/{ward}/edit", [WardController::class, "edit"])->name("edit");
    Route::put("/wards/{ward}/update", [WardController::class, "update"])->name("update");
});
