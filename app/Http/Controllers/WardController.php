<?php

namespace App\Http\Controllers;

use App\Http\Requests\WardRequest;
use App\Models\Ward;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Gate;

class WardController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        if (Gate::allows("create-ward")) {
            return view("admin.ward.create");
        }
        abort(403, " شما اجازه دسترسی ندارید ");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(WardRequest $request)
    {
        try {
            Ward::create([
                "name" => $request->input("name"),
                "code" => $request->input("code"),
                "status" => (int)$request->input("status"),
            ]);
            return redirect(route("panel.wards.index"))
                ->with("success", "بخش مورد نظر با موفقیت ثبت شد");
        } catch (\Exception $exception) {
            abort(500, $exception->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ward $ward)
    {
        if (Gate::allows("edit-ward")) {
            return view("admin.ward.edit", compact("ward"));
        }
        abort(403, "شما اجازه دسترسی ندارید");
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(WardRequest $request, Ward $ward)
    {
        try {

                $ward->update($request->all());

                return redirect(route("panel.wards.index"))
                    ->with("success", "بخش مورد نظر با موفقیت ویرایش شد");
        } catch (\Exception $exception) {
            abort(500);
        }
    }

}
