<?php

namespace App\Http\Controllers;

use App\Http\Requests\BedTypeRequest;
use App\Models\BedType;
use Illuminate\Support\Facades\Gate;

class BedTypeController extends Controller
{

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            if (Gate::allows('create-bed')) {
                return view("admin.bedType.create");
            }
            abort(403, "شما اجازه دسترسی ندارید");
        } catch (\Exception $exception) {
            abort(500, $exception->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BedTypeRequest $request)
    {
        try {

            BedType::create([
                "name" => $request->input("name"),
                "code" => $request->input("code"),
                "status" => (int)$request->input("status")
            ]);

            return redirect(route("panel.bedTypes.index"))
                ->with("success", "نوع تخت مورد نظر با موفقیت ثبت شد");

        } catch (\Exception $exception) {
            abort(500, $exception->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BedType $bedType)
    {
        if (Gate::allows("update-bed")) {
            return view("admin.bedType.edit", compact("bedType"));
        }
        abort(403, "شما اجازه دسترسی ندارید");
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BedTypeRequest $request, BedType $bedType)
    {
        try {
            $bedType->update([
                "name" => $request->input("name"),
                "code" => $request->input("code"),
                "status" => (int)$request->input("status")
            ]);

            return redirect(route("panel.bedTypes.index"))
                ->with("success", "نوع تخت مورد نظر با موفقیت ویرایش شد");

        } catch (\Exception $exception) {
            abort(500, $exception->getMessage());
        }
    }
}
