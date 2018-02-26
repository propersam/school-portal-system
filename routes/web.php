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

Route::get('/e-portal', function () {
    return view('portal-login');
});


