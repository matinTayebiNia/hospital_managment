<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Route;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
        then: function (){
            Route::middleware(['web', "auth"])->name("panel.")->prefix("/dashboard")
                ->group(base_path('routes/web/panel.php'));
        },
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
