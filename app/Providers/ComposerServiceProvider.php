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
            $google_analytics_id = env('GOOGLE_ANALYTICS_ID');
            $school_name = env('APP_NAME');
            $support_email = env('MAIL_FROM_ADDRESS');
            $school_phone = env('SCHOOL_PHONE');
            $school_address = env('SCHOOL_ADDRESS');

            $blood_groups = ['1'=>'O+', '2'=>'O-',
             '3'=>'A+', '4'=>'A-', '5'=>'B+',
              '6' => 'B-', '7' => 'AB+', '8' => 'AB-'];

            $blood_genotypes = ['1'=>'AA', '2'=>'AS',
             '3'=>'SS', '4'=>'AC'];

            $states = [
                'Abia', 'Abuja', 'Adamawa', 'Akwa Ibom', 'Anambra', 'Bauchi', 'Bayelsa',
                'Benue','Borno','Cross River','Delta','Ebonyi','Edo',
                'Ekiti','Enugu','Gombe','Imo','Jigawa','Kaduna',
                'Kano','Katsina','kebbi','Kogi','Kwara','Lagos',
                'Nasarawa','Niger','Ogun','Ondo','Osun', 'Oyo',
                'Plateau', 'Rivers', 'Sokoto', 'Taraba', 'Yobe', 'Zamfara'

            ];



            $view->with([
                'active_session' => $active_session,
                'school_name'    => $school_name,
                'support_email'  => $support_email,
                'school_email'   => $support_email,
                'school_phone'   => $school_phone,

                'google_analytics_id'=> $google_analytics_id,

                'school_address' => $school_address,
                'blood_groups' => $blood_groups,
                'blood_genotypes' => $blood_genotypes,
                'states' => $states,

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