<?php

use App\Http\Middleware\RoutePermission;
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
            'RoutePermission' => RoutePermission::class
        ]);
        $middleware->validateCsrfTokens(except: [
            'payment/success',
            'payment/fail',
            'payment/cancel'
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
