<?php


namespace App\Providers;


use App\Session;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{

    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(['*'], function ($view) {
            // get active session
            $active_session = Session::where('is_active', '=', 1)->first();

            $view->with([
                'active_session' => $active_session,
            ]);
        });
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
//
    }
}