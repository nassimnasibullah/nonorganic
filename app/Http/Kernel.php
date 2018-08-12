<?php

namespace App\Http;

/**
 * THlvcUNpQXFJRU52Y0hseWFXZG9kQ0F5TURFNElGZHBibTVsY21GM1lXNGdWQW9nS2lCVmJtRjFkR2h2Y21sNlpXUWdZMjl3ZVdsdVp5QnZaaUIwYUdseklHWnBiR1VzSUhacFlTQmhibmtnYldWa2FYVnRJR2x6SUhOMGNtbGpkR3g1Q2lBcUlIQnliMmhwWW1sMFpXUWdVSEp2Y0hKcFpYUmhjbmtnWVc1a0lHTnZibVpwWkdWdWRHbGhiQW9nS2lCVmJteGxjM01nY21WeGRXbHlaV1FnWW5rZ1lYQndiR2xqWVdKc1pTQnNZWGNnYjNJZ1lXZHlaV1ZrSUhSdklHbHVJSGR5YVhScGJtY3VDaUFxSUZkeWFYUjBaVzRnWW5rZ1YybHVibVZ5WVhkaGJpQlVJRHgzYVc1dVpYSmhkMkZ1UUdkdFlXbHNMbU52YlQ0c0lFRjFaM1Z6ZENBeU1ERTRDaUFxS2k4=
 */

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array
     */
    protected $middleware = [
        \Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode::class,
        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,
        \App\Http\Middleware\TrimStrings::class,
        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
        \App\Http\Middleware\TrustProxies::class,
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array
     */
    protected $middlewareGroups = [
        'web' => [
            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            // \Illuminate\Session\Middleware\AuthenticateSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \App\Http\Middleware\VerifyCsrfToken::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],

        'api' => [
            'throttle:60,1',
            'bindings',
        ],
    ];

    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'customer' => \App\Http\Middleware\RedirectIfNotCustomer::class,
        'customer.guest' => \App\Http\Middleware\RedirectIfCustomer::class,
        'admin' => \App\Http\Middleware\RedirectIfNotAdmin::class,
        'admin.guest' => \App\Http\Middleware\RedirectIfAdmin::class,
        'auth' => \Illuminate\Auth\Middleware\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'bindings' => \Illuminate\Routing\Middleware\SubstituteBindings::class,
        'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
        'can' => \Illuminate\Auth\Middleware\Authorize::class,
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
        'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
    ];
}
