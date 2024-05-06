<?php

namespace App\Http\Controllers;

use App\Helper\Services\Helper;
use App\Http\Requests\BedRequest;
use App\Models\Bed;
use App\Models\BedType;
use App\Models\Room;
use Illuminate\Support\Facades\Gate;

class BedController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            if (Gate::allows("create-bed")) {
                $rooms = Room::all();
                $bedTypes = BedType::all();
                return view("admin.bed.create", compact('rooms', "bedTypes"));
            }
            abort(403, "شما اجازه دسترسی ندارید");
        } catch (\Exception $exception) {
            abort(500, $exception->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BedRequest $request)
    {
//        try {

            $imagePath = Helper::storeAndGetImagePath($request);

            Bed::create([
                "status" => (int)$request->input("status"),
                "image" => $imagePath,
                "in_use" => $request->input("in_use"),
                'bed_no' => $request->input("bed_no"),
                "name" => $request->input("name"),
                "bed_type_id" => $request->input("bed_type_id"),
                "room_id" => $request->input("room_id")
            ]);

            return redirect(route("panel.beds.index"))
                ->with("success", "تخت مورد نظر با موفقیت ثبت شد ");

       /* } catch (\Exception $exception) {
            abort(500, $exception->getMessage());
        }*/
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bed $bed)
    {
        try {
            if (Gate::allows('update-bed')) {
                $rooms = Room::all();
                $bedTypes = BedType::all();
                return view("admin.bed.edit", compact("bed", 'rooms', "bedTypes"));
            }
            abort(403, "شما اجازه دسترسی ندارید.");
        } catch (\Exception $exception) {
            abort(500, $exception->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BedRequest $request, Bed $bed)
    {
//        try {
            $imagePath = Helper::storeAndGetImagePath($request);

            $bed->update([
                "status" => (int)$request->input("status"),
                "image" => $imagePath == null ? $bed->image : $imagePath,
                'bed_no' => $request->input("bed_no"),
                "in_use" => $request->input("in_use"),
                "name" => $request->input("name"),
                "bed_type_id" => $request->input("bed_type_id"),
                "room_id" => $request->input("room_id")
            ]);

            return redirect(route("panel.beds.index"))
                ->with("success", "تخت مورد نظر با موفقیت ویرایش شد ");

       /* } catch (\Exception $exception) {
            abort(500, $exception->getMessage());
        }*/
    }
}
