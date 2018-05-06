<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/burs', function()
// {
	
// 	$bursar = App\Bursar::find(1); 
// 	var_dump($bursar->getEmail());

// });

// Route::get('/test', function()
// {
// 	$beautymail = app()->make(Snowfire\Beautymail\Beautymail::class);
//     $beautymail->send('emails.teachers.new', [], function($message)
//     {
//         $message
// 			->from('support@ecopillarsschool.org')
// 			->to('e.felix@fexioictcenter.com', 'John Smith')
// 			->subject('Welcome!');
//     });

// });

Route::get('/', function () {
    return view('welcome');
});

Route::get('/aboutecopillars', function () {
    return view('about-ecopillarsschool');
});

Route::get('/contactecopillars', function () {
    return view('contact-ecopillarsschool');
});

Route::get('/ourstaff', function () {
    return view('staff-ecopillarsschool');
});

// Route::get('/eportal', function () {
//     return view('eportal-login');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/home', function () {
    return view('dashboard');
});


 		// Authentication Routes...
		$this->get('eportal', 'Auth\LoginController@showLoginForm')->name('login');
		$this->post('eportal', 'Auth\LoginController@login');
		$this->post('logout', 'Auth\LoginController@logout')->name('logout');

		// Registration Routes...
		$this->get('admin/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
		$this->post('admin/register', 'Auth\RegisterController@register');
		
		// Password Reset Routes...
		$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
		 $this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
		$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
		$this->post('password/reset', 'Auth\ResetPasswordController@reset');

		Route::resources([
		    'teacher' => 'TeacherController',
		   
		]);

		Route::resources([
		    'headteacher' => 'HeadTeacherController',
		   
		]);

		Route::resources([
		    'pupil' => 'PupilController',
		   
		]);
		Route::resources([
		    'bursar' => 'BursarController',
		   
		]);

		Route::resources([
		    'staff' => 'StaffController',
		   
		]);

		Route::resources([
		    'section' => 'SectionController',
		   
		]);

		Route::resources([
		    'level' => 'LevelController',
		   
		]);

		Route::resources([
		    'class' => 'ClassController',
		   
		]);

	Route::get('/user/verify/{token}', 'StaffController@verifyUser');