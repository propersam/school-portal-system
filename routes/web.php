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

// Route::get('/ourstaff', function () {
//     return view('staff-ecopillarsschool');
// });

// Route::get('/eportal', function () {
//     return view('eportal-login');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/home', function () {
    return view('dashboard');
});


// Route::get('/register', function () {
//     return view('register');
// });
Route::get('/ourstaff', 'FrontController@teachersdisplay');
Route::get('/register', 'RegisterController@index');
Route::get('/logout', 'HomeController@logout');
Route::post('/register', 'RegisterController@store');
Route::get('/dashboard/register-student', 'PupilController@index');
Route::post('/dashboard/register-student', 'PupilController@store');
Route::get('/dashboard/sessions', 'SessionsController@index');
Route::get('/dashboard/create-session', 'SessionsController@create');
Route::post('/dashboard/create-session', 'SessionsController@store');
Route::post('/dashboard/update-session/{id}', 'SessionsController@update');
Route::get('/dashboard/classes', 'ClassController@index');
Route::get('/dashboard/create-class', 'ClassController@create');
Route::post('/dashboard/create-class', 'ClassController@store');
Route::get('/dashboard/applications', 'PupilController@applications');
Route::post('/dashboard/accept-student/{id}', 'PupilController@accept');
Route::post('/dashboard/reject-student-application/{id}', 'PupilController@reject_application');
Route::post('/dashboard/admit-student/{id}', 'PupilController@admit');
Route::post('/dashboard/reject-student-admission/{id}', 'PupilController@reject_admission');
Route::get('/dashboard/view-class/{id}', 'ClassController@view_class');
Route::get('/dashboard/subjects', 'SubjectController@index');
Route::get('/dashboard/create-subject', 'SubjectController@create');
Route::post('/dashboard/create-subject', 'SubjectController@store');
Route::post('/dashboard/update-subject/{id}', 'SubjectController@update');
Route::get('/dashboard/subject-registration', 'SubjectRegistrationController@index');
Route::post('/dashboard/add-subject-to-class/{id}', 'SubjectRegistrationController@store');
Route::get('/dashboard/view-class-subjects/{id}', 'SubjectRegistrationController@view_class');
Route::post('/dashboard/remove-class-subject/{id}', 'SubjectRegistrationController@remove_class');
Route::post('/dashboard/update-class/{id}', 'ClassController@update');
Route::get('/change-default-password', 'RegisterController@change_password');
Route::post('/change-password', 'RegisterController@changePassword');
Route::get('change-photo',['as'=>'image.upload','uses'=>'HomeController@imageUpload']);
Route::post('change-photo',['as'=>'image.upload.post','uses'=>'HomeController@imageUploadPost']);

 		// Authentication Routes...
		$this->get('eportal', 'Auth\LoginController@showLoginForm')->name('login');
		$this->post('eportal', 'Auth\LoginController@authenticate');
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

	Route::get('/user/verify/{token}', 'StaffController@verifyUser');