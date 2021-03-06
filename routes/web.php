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

use App\Student;

// Authentication Routes...
$this->get('/', 'Auth\LoginController@showLoginForm')->name('login');
$this->post('/', 'Auth\LoginController@authenticate');
$this->post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
$this->get('/admin/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
$this->post('/admin/register', 'Auth\RegisterController@register');

// Password Reset Routes...
$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
$this->post('password/reset', 'Auth\ResetPasswordController@reset');

Route::get('/dashboard', 'HomeController@index');
Route::get('/home', 'HomeController@index');
Route::get('/register', 'RegisterController@index');
Route::get('/logout', 'HomeController@logout');
Route::post('/register', 'RegisterController@store');
Route::get('/dashboard/register-student', 'PupilController@index')->middleware('active_session');
Route::post('/dashboard/register-student', 'PupilController@store');
Route::get('/dashboard/all-staffs', 'StaffController@all_staffs');
Route::get('/dashboard/delete-staff/{id}', 'StaffController@delete_staff');
Route::get('/dashboard/delete-teacher/{id}', 'StaffController@delete_teacher');
Route::get('/dashboard/delete-headteacher/{id}', 'StaffController@delete_headteacher');
Route::get('/dashboard/delete-bursar/{id}', 'StaffController@delete_bursar');
Route::get('/dashboard/delete-assistant/{id}', 'StaffController@delete_assistant');
Route::post('/dashboard/update-staff/{id}', 'StaffController@update_staff');
Route::post('/dashboard/update-teacher/{id}', 'StaffController@update_teacher');
Route::post('/dashboard/update-headteacher/{id}', 'StaffController@update_headteacher');
Route::post('/dashboard/update-bursar/{id}', 'StaffController@update_bursar');
Route::post('/dashboard/update-assistant/{id}', 'StaffController@update_assistant');
Route::get('/dashboard/sessions', 'SessionsController@index');
Route::get('/dashboard/create-session', 'SessionsController@create');
Route::post('/dashboard/create-session', 'SessionsController@store');
Route::post('/dashboard/update-session/{id}', 'SessionsController@update');
Route::get('/dashboard/classes', 'ClassController@index')->middleware('active_session');
Route::get('/dashboard/create-class', 'ClassController@create')->middleware('active_session');
Route::post('/dashboard/create-class', 'ClassController@store');
Route::get('/dashboard/applications', 'PupilController@applications');
Route::get('/dashboard/all-pupils', 'PupilController@all_pupils')->middleware('active_session');
Route::get('/dashboard/assistants', 'StaffController@all_assistants');

Route::post('/dashboard/accept-student/{id}', 'PupilController@accept');
Route::post('/dashboard/reject-student-application/{id}', 'PupilController@reject_application');
Route::post('/dashboard/admit-student/{id}', 'PupilController@admit');
Route::post('/dashboard/reject-student-admission/{id}', 'PupilController@reject_admission');
Route::get('/dashboard/view-class/{id}', 'ClassController@view_class');
Route::get('/dashboard/subjects', 'SubjectController@index')->middleware('active_session');
Route::get('/dashboard/create-subject', 'SubjectController@create')->middleware('active_session');
Route::post('/dashboard/create-subject', 'SubjectController@store');
Route::post('/dashboard/update-subject/{id}', 'SubjectController@update');
Route::get('/dashboard/subject-registration', 'SubjectRegistrationController@index')->middleware('active_session');
Route::post('/dashboard/add-subject-to-class/{id}', 'SubjectRegistrationController@store')->middleware('active_session');
Route::get('/dashboard/view-class-subjects/{id}', 'SubjectRegistrationController@view_class')->middleware('active_session');
Route::post('/dashboard/remove-class-subject/{id}', 'SubjectRegistrationController@remove_class');
Route::post('/dashboard/update-class/{id}', 'ClassController@update');
Route::get('/change-default-password', 'RegisterController@change_password');
Route::post('/change-password', 'RegisterController@changePassword');
Route::get('/change-photo', ['as' => 'image.upload', 'uses' => 'HomeController@imageUpload']);
Route::post('/change-photo', ['as' => 'image.upload.post', 'uses' => 'HomeController@imageUploadPost']);
Route::get('/dashboard/create-level', 'HomeController@create_level')->middleware('active_session');
Route::post('/dashboard/create-level', 'HomeController@storelevel')->middleware('active_session');
Route::post('/dashboard/update-level/{id}', 'HomeController@updatelevel')->middleware('active_session');
Route::get('/dashboard/delete-level/{id}', 'HomeController@delete_level')->middleware('active_session');
Route::get('/dashboard/levels', 'HomeController@allLevels')->middleware('active_session');
Route::get('/dashboard/all-results/{id}', 'ResultsController@index')->middleware('active_session');
Route::get('/dashboard/view-subject-results/', 'ResultsController@view_subject_results')->middleware('active_session');
Route::post('/dashboard/profile', ['as' => 'image.dp_upload.post', 'uses' => 'TeacherController@imageUploadPost']);
Route::post('/dashboard/update-profile/', 'TeacherController@updateProfile');
Route::get('/dashboard/create-fee/', 'BursarController@create');
Route::get('/dashboard/fee-types/', 'BursarController@fee_types');
Route::post('/dashboard/add-fee-type', 'BursarController@store_type');
Route::post('/dashboard/send-fee-reminder', 'BursarController@send_fee_reminder');
// Route::post('/dashboard/send-fee-reminder', function () {

//     $student = Student::where('admission_status', 'admitted')->first();
//     return new App\Mail\SendSchoolFeesReminder($student);
// });
Route::post('/dashboard/update-fee-type/{id}', 'BursarController@update_fee_type');
Route::get('/dashboard/delete-fee-type/{id}', 'BursarController@delete_fee_type');
Route::get('/dashboard/term-owing-fees/', 'BursarController@term_owing_fees');
Route::get('/dashboard/term-paid-fees/', 'BursarController@term_paid_fees');
Route::get('/dashboard/payment-settings/', 'BursarController@payment_settings');
Route::post('/dashboard/payment-settings/', 'BursarController@updateSetting');
Route::post('/dashboard/confirm-fees-as-paid/', 'BursarController@confirm_fees_as_paid');

Route::get('/dashboard/all-fees/', 'BursarController@show_all_fees');
Route::post('/dashboard/add-fee/', 'BursarController@add_fee');
Route::post('/dashboard/update-fee/{id}', 'BursarController@update_fee');
Route::get('/dashboard/delete-fee/{id}', 'BursarController@delete_fee');

Route::post('/dashboard/update-student-photo', ['as' => 'image.student_passport_upload.post', 'uses' => 'PupilController@imageUploadPost']);

// Route::post('dashboard/profile',['as'=>'profile.update_profile.post','uses'=>'TeacherController@updateProfile']);
Route::get('/dashboard/create-level', 'HomeController@create_level')->middleware('active_session');
Route::post('/dashboard/create-level', 'HomeController@storelevel')->middleware('active_session');
Route::get('/dashboard/levels', 'HomeController@allLevels')->middleware('active_session');
Route::get('/dashboard/all-results/{id}', 'ResultsController@index')->middleware('active_session');
Route::get('/dashboard/view-subject-results/', 'ResultsController@view_subject_results')->middleware('active_session');
Route::post('/dashboard/add-student-exam-result/', 'ResultsController@store');
Route::post('/dashboard/add-student-assessment-result/', 'ResultsController@store_assessment');
Route::get('/dashboard/teacher-view-class/', 'TeacherController@view_class');
Route::get('/dashboard/teacher-view-results/', 'TeacherController@view_results');
Route::get('/dashboard/profile/', 'TeacherController@edit');
Route::get('/dashboard/parent-view-results/', 'ParentController@view_results');
Route::get('/dashboard/children/', 'ParentController@view_children');
Route::get('/dashboard/child-results/{id}', 'ParentController@view_child_results');
Route::get('/dashboard/parent-new-child', 'ParentController@register');
Route::post('/dashboard/parent-new-child', 'ParentController@store');
Route::get('/dashboard/parent-view-records/', 'ParentController@load_record');
Route::get('/dashboard/child-record/{id}', 'ParentController@view_child_record');
Route::get('/school-fees/{id}', 'ParentController@student_fees');

Route::get('/api/get-subject-results', 'ApiController@view_subject_results');
Route::get('/api/get-class-students', 'ApiController@get_class_students');
Route::post('/api/submit-subject-results', 'ApiController@submit_results');
Route::post('/api/submit-subject-assessment-results', 'ApiController@submit_assessment');
Route::post('/api/payment-response', 'ApiController@payment_response');
Route::get('pdfview', array('as' => 'pdfview', 'uses' => 'ParentController@pdfview'));
Route::get('resultpdfview', array('as' => 'resultpdfview', 'uses' => 'ParentController@resultpdfview'));


Route::resources([
    'teacher' => 'TeacherController',
]);

Route::resources([
    '/dashboard/headteachers' => 'HeadTeacherController',
   
]);

Route::resources([
    'pupil' => 'PupilController',
]);

Route::resources([
    '/dashboard/bursars' => 'BursarController',
   
]);

Route::resources([
    '/dashboard/teachers' => 'StaffController',
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
Route::match(['get', 'post'], '/user/verify-phone', ['as' => 'verify_by_phone', 'uses' => 'PupilController@verifyUserByPhone']);
Route::match(['get', 'post'], '/user/request-verify-token', ['as' => 'request_verify_token', 'uses' => 'PupilController@RequestVerificationToken']);
