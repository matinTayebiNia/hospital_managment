<?php

namespace Database\Seeders;

use App\Models\HospitalSetting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HospitalSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        HospitalSetting::firstOrCreate([
            'driver' => 'smtp',
            'encryption' => 'lts',
            'host' => 'localhost',
            'port' => '404',
            'username' => 'admin',
            'email_from' => 'admin@admin.com',
            'email_from_name' => 'admin',
            // 'dashboard' => 0,
            'invoice_number_mood' => "1",
            'invoice_prefix' => 'INV',
            'user_prefix' => 'URN',
            'patient_prefix' => 'PRN',

        ]);
    }
}
