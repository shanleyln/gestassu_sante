<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{

    protected $middlewareGroups = [
        'web' => [
            // middlewares globaux pour les routes web
            // \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            // \App\Http\Middleware\VerifyCsrfToken::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],
    
        'api' => [
            'throttle:api',
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],
    ];
    
    // ✅ c’est ICI que tu dois enregistrer les middlewares personnalisés :
    protected $routeMiddleware = [
        // 'auth' => \App\Http\Middleware\Authenticate::class,
        'check.prestataire' => \App\Http\Middleware\CheckPrestataire::class,
        'check.assureur' => \App\Http\Middleware\CheckAssureur::class,
        'check.client' => \App\Http\Middleware\CheckClient::class,
        // autres...
    ];
    
}