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

    Route::get('init', 'InitController@init');

    Route::resource('administrators', 'AdministratorsController');
    Route::resource('roles', 'RolesController');

    Route::resource('users', 'UsersController');
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

Route::get('/test-paypal', function () {
    return new App\Paypal();
});
