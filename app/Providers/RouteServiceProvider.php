<?php

namespace App\Providers;

use App\Http\Controllers\Settings\SettingsController;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->group(base_path('routes/web.php'));
        });

        $this->devlopperRoutes();
        $this->settingsRoutes();
    }

    private function devlopperRoutes()
    {
        Route::middleware('web')
            ->prefix('dev')
            ->namespace($this->namespace)
            ->group(base_path('routes/dev/dev.php'));
    }

    private function settingsRoutes()
    {
        
        Route::macro('settingsRoutes', function ($prefix) {
            Route::group([
                'prefix' => $prefix,
            ], function () {
                Route::get('/', [SettingsController::class, 'index'])->name("settings.index");
                Route::post('/update', [SettingsController::class, 'update'])->name("settings.update");
            })->middleware('web');
        });
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });
    }
}
