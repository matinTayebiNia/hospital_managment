<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\CreateUserRequest;
use App\Listeners\StoreUserService;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
    public function create(): View
    {
        if (Gate::allows("create-user")) {
            $permissions = Permission::all();
            return view("admin.users.create-user", compact("permissions"));
        }
        abort(403);
    }

    public function store(CreateUserRequest $request, StoreUserService $userService)
    {
        try {
            $imageName = null;
            if ($request->hasFile("image")) {
                $year = Carbon::now()->year;
                $month = Carbon::now()->month;
                $day = Carbon::now()->day;
                $imageName = $year . '/' . $month . "/" . $day;
                Storage::disk("public")->put($imageName, $request->image);
            }

            $data = (object)["imageName" => $imageName, "request" => $request];

            $user = $userService->handle($data);

            $user->assignRole($request->input("role_id"));
            $user->givePermissionTo($request->input("permissions"));

            return redirect(route("panel.users.index", ["role" => $request->input('role_id')]))
                ->with("success", "ثبت کاربر با موفقیت انجام شد");

        } catch (\Exception $exception) {
            abort(500, $exception->getMessage());
        }
    }

    public function edit()
    {

    }

    public function update()
    {

    }
}
