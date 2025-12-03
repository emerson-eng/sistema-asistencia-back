<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
// opcional: use App\Http\Middleware\RoleMiddleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )

    ->withMiddleware(function (Middleware $middleware) {

        // Registrar alias globales necesarios
        $middleware->alias([
            'bindings' => \Illuminate\Routing\Middleware\SubstituteBindings::class,
            'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,

            // 👇 NUEVO: alias para tu middleware de roles
            'role' => \App\Http\Middleware\RoleMiddleware::class,
            // si prefieres con use arriba:
            // 'role' => RoleMiddleware::class,
        ]);

        // DEFINIR el grupo API de forma correcta
        $middleware->group('api', [
            \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
            'throttle:60,1',
            'bindings',
        ]);
    })

    ->withExceptions(function (Exceptions $exceptions) {
        //
    })
    ->create();
