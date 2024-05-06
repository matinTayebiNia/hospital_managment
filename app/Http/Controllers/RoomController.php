<?php

namespace App\Http\Controllers;

use App\Helper\Services\Helper;
use App\Http\Requests\RoomRequest;
use App\Models\Room;
use App\Models\RoomType;
use App\Models\Ward;
use Illuminate\Support\Facades\Gate;

class RoomController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            if (Gate::allows("create-room")) {
                $roomTypes = RoomType::all();
                $wards = Ward::all();
                return view('admin.room.create', compact("roomTypes", "wards"));
            }
            abort(403, "شما اجازه دسترسی ندارید.");
        } catch (\Exception $exception) {
            abort(500, $exception->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoomRequest $request)
    {
        try {
            $imagePath = Helper::storeAndGetImagePath($request);

            Room::create([
                "room_no" => $request->input("room_no"),
                "name" => $request->input("name"),
                "price" => $request->input("price"),
                "capacity" => $request->input("capacity"),
                "status" => (int)$request->input("status"),
                "image" => $imagePath,
                "ward_id" => $request->input("ward_id"),
                "room_type_id" => $request->input("room_type_id"),
            ]);

            return redirect(route("panel.rooms.index"))->
            with("success", "اتاق مورد نظر با موفقیت ثبت شد.");

        } catch (\Exception $exception) {
            abort(500, $exception->getMessage());
        }


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Room $room)
    {
        try {
            if (Gate::allows("edit-room")) {
                $roomTypes = RoomType::all();
                $wards = Ward::all();
                return view("admin.room.edit",
                    compact("room", "roomTypes", "wards"));
            }
            abort(403, "شما اجازه دسترسی ندارید");
        } catch (\Exception $exception) {
            abort(500, $exception->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RoomRequest $request, Room $room)
    {
        try {
            $imagePath = Helper::storeAndGetImagePath($request);

            $room->update([
                "room_no" => $request->input("room_no"),
                "name" => $request->input("name"),
                "price" => $request->input("price"),
                "capacity" => $request->input("capacity"),
                "status" => (int)$request->input("status"),
                "image" => $imagePath == null ? $room->image : $imagePath,
                "ward_id" => $request->input("ward_id"),
                "room_type_id" => $request->input("room_type_id"),
            ]);

            return redirect(route("panel.rooms.index"))->
            with("success", "اتاق مورد نظر با موفقیت ویرایش شد.");

        } catch (\Exception $exception) {
            abort(500, $exception->getMessage());
        }
    }

}
