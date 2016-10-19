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

Route::get('/', 'DonationsController@home');


/*
 |--------------------------------------------------------------------------
 | Admin login
 |--------------------------------------------------------------------------
 */

Route::get('admin/login', 'AdministratorsController@showLoginForm');
Route::post('admin/login', 'AdministratorsController@login');
Route::get('admin/logout', 'AdministratorsController@logout');

// Route::get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');
// Route::post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
// Route::post('password/reset', 'Auth\PasswordController@reset');

Route::group(['prefix' => 'admin', 'middleware' => 'auth:administrators'], function () {
    Route::get('', function () {
        return redirect('admin/login');
    });

    Route::get('dashboard', 'AdministratorsController@dashboard');

    Route::resource('roles', 'RolesController');
    //Route::get('profiles/{id}/destroy', 'ProfilesController@destroy');


    Route::resource('users', 'UsersController');
    //Route::get('users/{id}/destroy', 'UsersController@destroy');
    //Route::resource('profiles', 'ProfilesController');
    //Route::resource('profiles', 'ProfilesController');
});


/*
 |--------------------------------------------------------------------------
 | Users login
 |--------------------------------------------------------------------------
 */

Route::auth();


/*
 |--------------------------------------------------------------------------
 | About Beering and Donations
 |--------------------------------------------------------------------------
 */

Route::get('/about-beering', 'DonationsController@aboutBeering');
Route::get('/about-donation', 'DonationsController@aboutDonation');
Route::get('/donate', 'DonationsController@donate');
