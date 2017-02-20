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
        return Auth::guard('administrators')->check() ? redirect('admin/init') : redirect('admin/login');
    });

    Route::get('init', 'InitController@init');

    Route::resource('administrators', 'AdministratorsController');
    Route::resource('roles', 'RolesController');
    Route::resource('users', 'UsersController');
    Route::resource('groups', 'GroupsController');
    Route::resource('beerings', 'BeeringsController');

    Route::get('donations', ['as' => 'admin.donations.index', 'uses' => 'DonationsController@index']);

    /*// Show LFM
    Route::get('/show', [
        'uses' => 'LfmController@show',
        'as' => 'show'
    ]);

    // upload
    Route::any('/upload', [
        'uses' => 'UploadController@upload',
        'as' => 'upload'
    ]);

    // list images & files
    Route::get('/jsonitems', [
        'uses' => 'ItemsController@getItems',
        'as' => 'getItems'
    ]);

    // folders
    Route::get('/newfolder', [
        'uses' => 'FolderController@getAddfolder',
        'as' => 'getAddfolder'
    ]);
    Route::get('/deletefolder', [
        'uses' => 'FolderController@getDeletefolder',
        'as' => 'getDeletefolder'
    ]);
    Route::get('/folders', [
        'uses' => 'FolderController@getFolders',
        'as' => 'getFolders'
    ]);

    // crop
    Route::get('/crop', [
        'uses' => 'CropController@getCrop',
        'as' => 'getCrop'
    ]);
    Route::get('/cropimage', [
        'uses' => 'CropController@getCropimage',
        'as' => 'getCropimage'
    ]);

    // rename
    Route::get('/rename', [
        'uses' => 'RenameController@getRename',
        'as' => 'getRename'
    ]);

    // scale/resize
    Route::get('/resize', [
        'uses' => 'ResizeController@getResize',
        'as' => 'getResize'
    ]);
    Route::get('/doresize', [
        'uses' => 'ResizeController@performResize',
        'as' => 'performResize'
    ]);

    // download
    Route::get('/download', [
        'uses' => 'DownloadController@getDownload',
        'as' => 'getDownload'
    ]);

    // delete
    Route::get('/delete', [
        'uses' => 'DeleteController@getDelete',
        'as' => 'getDelete'
    ]);

    Route::get('/demo', 'DemoController@index');*/
});


/*
 |--------------------------------------------------------------------------
 | Users login
 |--------------------------------------------------------------------------
 */

Route::auth();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/my-profile', 'Auth\AuthController@showProfile');
    Route::post('/update', 'Auth\AuthController@update');
});

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
