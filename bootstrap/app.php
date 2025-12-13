<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {

        $middleware->alias([
            'pendaftaran.step' => \App\Http\Middleware\CheckPendaftaranStep::class,

            'check.status' => \App\Http\Middleware\CheckAccountStatus::class,

            'admin.verified' => \App\Http\Middleware\EnsureAdminVerified::class,
        ]);
        
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();