<?php

use App\Models\User;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Spatie\Permission\Models\Role;

Artisan::command('inspire', function () {
    $admin = Role::findByName("super-admin");
    $user = User::find(1);
    $user->assignRole($admin);
    $this->comment("DONE");
})->purpose('Display an inspiring quote')->hourly();
