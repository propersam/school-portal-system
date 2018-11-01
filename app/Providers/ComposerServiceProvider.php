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
            $school_name = env('APP_NAME');
            $support_email = env('MAIL_FROM_ADDRESS');
            $school_phone = env('APP_PHONE');

            $view->with([
                'active_session' => $active_session,
                'school_name'    => $school_name,
                'support_email'  => $support_email,
                'school_email'   => $support_email,
                'school_phone'   => $school_phone,
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