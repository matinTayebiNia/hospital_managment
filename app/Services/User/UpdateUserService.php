<?php

namespace App\Services\User;

use App\Models\User;
use Illuminate\Support\Str;
use Morilog\Jalali\CalendarUtils;

class UpdateUserService
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
        $request->dob = Str::replace("/", "-", $request->dob);
        $imageName = $event->imageName;
        $dob = CalendarUtils::createCarbonFromFormat('Y-m-d', $request->dob)->format('Y-m-d');
        $event->user->update(
            [
                "title" => $request->gender == "Male" ? 'اقا' : "خانم ",
                'name' => $request->name,
                "username" => $request->username,
                'email' => $request->email,
                "gender" => $request->gender,
                "dob" => $dob,
                "image" => $imageName == null ? $event->user->image : $imageName,
                "religion" => $request->religion,
                "address_1" => $request->address_1,
                "age" => $request->age,
                "address_2" => $request->address_2,
                "status" => (int)$request->status,
            ]);
        return $event->user;
    }
}
