<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/**
 * Sessions
*/
Route::get('/', [
    'as'   => 'home',
    'uses' => 'SessionsController@create'
]);

/* Log in User */
Route::get('/login', [
    'as'   => 'login_path',
    'uses' => 'SessionsController@create'
]);

Route::post('/login', [
    'as'   => 'login_path',
    'uses' => 'SessionsController@store'
]);

/* Logout *Need to change it to DELETE */
Route::get('logout', [
    'as'   => 'logout_path',
    'uses' => 'SessionsController@destroy'
]);

/**
 * Base Routes
*/

/* Dashboard */
Route::get('/dashboard', [
    'as'   => 'home',
    'uses' => 'PagesController@dashboard'
]);

/* Page Not Found */
Route::get('/not_found', [
    'as'   => 'not_found_path',
    'uses' => 'PagesController@pageNotFound'
]);

/**
 * Users
 */

/* Profile */

Route::put('profile/change_password', [
    'as' => 'change_password_user_profile_path',
    'uses' => 'UserProfileController@changePassword'
]);

Route::get('profile/{username}', [
    'as'   => 'user_profile_path',
    'uses' => 'UserProfileController@index'
]);

Route::put('profile/{username}', [
    'as'   => 'update_user_profile_path',
    'uses' => 'UserProfileController@update'
]);



/* Register a user */
Route::get('register', [
    'as'    =>  'register_path',
    'uses'  =>  'RegistrationController@create'
]);

Route::post('register', [
    'as'   => 'register_path',
    'uses' => 'RegistrationController@store'
]);

/* Activate User */
Route::get('register/activate/{activationCode}', [
    'as'   => 'user_activation_path',
    'uses' => 'UserActivationController@index'
]);

Route::post('register/activate/{activationCode}', [
    'as' => 'user_activation_path',
    'uses' => 'UserActivationController@store'
]);

/* Show all Users */
Route::get('user/users', [
    'as' => 'users.index',
    'uses' => 'UsersController@index'
]);

/* Resend Mail */
Route::post('register/resend_email', [
    'as' => 'resend_email_user_path',
    'uses' => 'UsersController@resendActivationEmail'
]);

/* Deactivate User */
Route::put('user/deactivate', [
    'as' => 'deactivate_user_path',
    'uses' => 'UsersController@deactivateUser'
]);

/* Re-Activate User */
Route::put('user/reactivate/{id}', [
    'as' => 'reactivate_user_path',
    'uses' => 'UsersController@reactivateUser'
]);

