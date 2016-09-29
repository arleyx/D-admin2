<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('home');
});

Route::auth();

/*
 |
 | ADMIN LOGIN
 |
 */

// Authentication Routes...
Route::get('admin/login', 'AdministratorsController@showLoginForm');
Route::post('admin/login', 'AdministratorsController@login');
Route::get('admin/logout', 'AdministratorsController@logout');

// Password Reset Routes...
// Route::get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');
// Route::post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
// Route::post('password/reset', 'Auth\PasswordController@reset');

Route::group(['prefix' => 'admin', 'middleware' => 'auth:administrators'], function () {
    Route::get('', function () {
        return redirect('admin/login');
    });

    Route::get('dashboard', 'AdministratorsController@admin');
});

/*
 |
 | ABOUT BEERING AND DONATIONS
 |
 */
Route::get('/about-beering', ['uses' => function () {
    return view('about.beering');
}, 'as' => 'about-beering']);

Route::get('/about-donation', ['uses' => function () {
    return view('about.donation');
}, 'as' => 'about-donation']);
