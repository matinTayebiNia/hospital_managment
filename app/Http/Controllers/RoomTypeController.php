<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoomTypeRequest;
use App\Models\RoomType;
use Illuminate\Support\Facades\Gate;

class RoomTypeController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            if (Gate::allows("create-room")) {
                return view("admin.roomType.create");
            }
            abort(403, "شما اجازه دسترسی ندارید");
        } catch (\Exception $exception) {
            abort(500, $exception->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoomTypeRequest $request)
    {
        try {

            RoomType::create($request->all());

            return redirect(route("panel.roomTypes.index"))
                ->with("success", "نوع اتاق با موفقیت ثبت شد.");

        } catch (\Exception $exception) {
            abort(500, $exception->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RoomType $roomType)
    {
        try {
            if (Gate::allows('update-room')) {
                return view("admin.roomType.edit", compact("roomType"));
            }
            abort(403, "شما اجازه دسترسی ندارید.");
        } catch (\Exception $exception) {
            abort(500, $exception->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RoomTypeRequest $request, RoomType $roomType)
    {
        try {

            $roomType->update($request->all());

            return redirect(route("panel.roomTypes.index"))
                ->with("success", "نوع اتاق با موفقیت ویرایش شد.");

        } catch (\Exception $exception) {
            abort(500, $exception->getMessage());
        }
    }

}
