<?php

use App\Models\User;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Spatie\Permission\Models\Role;

Artisan::command('inspire', function () {
 /*   $admin = Role::findByName("admin");
    $user = User::find(2);
    $user->removeRole($admin);
    $this->comment(Inspiring::quote());*/
})->purpose('Display an inspiring quote')->hourly();
