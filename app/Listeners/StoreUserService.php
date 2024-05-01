<?php

namespace App\Listeners;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Morilog\Jalali\CalendarUtils;

class StoreUserService
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(object $event): User
    {

        $request = $event->request;
        $imageName = $event->imageName . "/" . $request->image;
        $dob = CalendarUtils::createCarbonFromFormat('Y/m/d', $request->input("dob"))->format('Y/m/d');

        return User::updateOrCreate(["id" => $request->route("user_id")], [
            "title" => $request->gender == "Male" ? 'اقا' : "خانم ",
            'name' => $request->name,
            "username" => $request->username,
            'email' => $request->email,
            "gender" => $request->gender,
            "dob" => $dob,
            'password' => Hash::make($request->role_id),
            "image" => $imageName,
            "religion" => $request->religion,
            "address_1" => $request->address_1,
            "age" => $request->age,
            "address_2" => $request->address_2,
            "status" => (int)$request->status,
        ]);
    }
}
