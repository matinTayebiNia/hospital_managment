<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            "title" => "اقا",
            "name" => "متین طیبی نیا",
            "password" => Hash::make("12345678"),
            "username" => "matinTayebnia",
            "email" => "matintayebinia@gmail.com",
            "gender" => "Male",
            "dob" => Carbon::create("2001", 4, 6),

        ]);
//        $this->call(PermissionSeeder::class);
        $this->call(HospitalSettingSeeder::class);
        $this->call(RolesAndPermissionsSeeder::class);
        /* User::factory()->create([
             'name' => 'Test User',
             'email' => 'test@example.com',
         ]);*/
    }
}
