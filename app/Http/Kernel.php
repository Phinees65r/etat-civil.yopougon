<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    // ...

    protected $routeMiddleware = [
        'admin' => \App\Http\Middleware\IsAdmin::class,
        'agent' => \App\Http\Middleware\IsAgent::class,
        // autres middlewares...
    ];
}
