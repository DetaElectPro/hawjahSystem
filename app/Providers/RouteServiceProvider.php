<?php

namespace App\Providers;

use App\Models\Auth\User\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();

        $this->binds();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        $this->mapSettingRoutes();

        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
            ->middleware('api')
            ->as('api.')
//            ->namespace($this->namespace . "")
            ->namespace($this->namespace . "\\Api")
            ->group(base_path('routes/api.php'));
    }

    /**
     * Bind route models
     */
    protected function binds()
    {
        Route::bind('user_by_code', function ($code) {
            return User::whereConfirmationCode($code)->firstOrFail();
        });

        Route::bind('user_by_email', function ($email) {
            return User::whereEmail($email)->firstOrFail();
        });
    }

    protected function mapSettingRoutes()
    {
        Route::prefix('setting')
//            ->middleware('api')
//            ->as('api.')
            ->namespace($this->namespace)
            ->group(base_path('routes/setting.php'));
    }
}
