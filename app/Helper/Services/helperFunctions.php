<?php


use Illuminate\Support\Facades\Route;

if (!function_exists("isActive")) {
    function isActive(array|string $name, string $class): string
    {
        if (is_array($name)) {
            return in_array(Route::current()->getName(), $name) ? $class : "";
        }

        return $name == Route::current()->getName() ? $class : "";

    }
}
