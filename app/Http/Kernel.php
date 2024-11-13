<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    protected $middlewareGroups = [
        'api' => [
            \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
            'throttle:api',
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
            \Laravel\Sanctum\Http\Middleware\CheckAbilities::class,
        ],
    ];

    protected $routeMiddleware = [
        // Otros middlewares...
        'role' => \App\Http\Middleware\RoleMiddleware::class,
    ];
}
