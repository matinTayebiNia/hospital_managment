<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\CreateUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Models\User;
use App\Services\User\StoreUserService;
use App\Services\User\UpdateUserService;
use Carbon\Carbon;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Morilog\Jalali\CalendarUtils;
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

            if (Gate::allows("create-user")) {

                $imageName = $this->getImage($request);

                $data = (object)["imageName" => $imageName, "request" => $request];

                $user = $userService->handle($data);

                $user->assignRole($request->input("role_id"));
                $user->givePermissionTo($request->input("permissions"));

                return redirect(route("panel.users.index", ["role" => $request->input('role_id')]))
                    ->with("success", "ثبت کاربر با موفقیت انجام شد");

            }
            abort(403, "شما اجازه دسترسی ندارید");
        } catch (Exception $exception) {
            abort(500, $exception->getMessage());
        }
    }

    public function edit(User $user)
    {
        try {
            if (Gate::allows("update-user")) {
                $permissions = Permission::all();
                $user->dob = CalendarUtils::strftime('Y-m-d', strtotime($user->dob)); // 1395-02-19
                return view("admin.users.edit", compact("user", "permissions"));
            }
            abort(403, "شما اجازه دسترسی ندارید");
        } catch (Exception $exception) {
            abort(500, $exception->getMessage());
        }
    }

    public function update(UpdateUserRequest $request, User $user, UpdateUserService $userService)
    {
        try {
            if (Gate::allows("user-update")) {

                $imageName = $this->getImage($request);

                $data = (object)["imageName" => $imageName, "request" => $request, "user" => $user];

                $user = $userService->handle($data);

                $user->assignRole($request->input("role_id"));
                $user->givePermissionTo($request->input("permissions"));

                return redirect(route("panel.users.index", ["role" => $request->input('role_id')]))
                    ->with("success", "ویرایش کاربر با موفقیت انجام شد");
            }
            abort(403, "شما اجازه دسترسی ندارید");
        } catch (\Exception $exception) {
            abort(500, $exception->getMessage());
        }
    }

    /**
     * @param CreateUserRequest $request
     * @return string
     */
    private function getImage(mixed $request): ?string
    {
        $imageName = null;

        if ($request->hasFile("image")) {
            $year = Carbon::now()->year;
            $month = Carbon::now()->month;
            $day = Carbon::now()->day;
            $imageName = $year . '/' . $month . "/" . $day;
            Storage::disk("public")->put($imageName, $request->image);
        }
        return $imageName;
    }
}
