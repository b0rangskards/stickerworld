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
 * Profile
 */

/* Change Password */
Route::put('profile/change_password', [
    'as' => 'change_password_path',
    'uses' => 'UserProfileController@changePassword'
]);

/* User Profile View */
Route::get('profile/{username}', [
    'as'   => 'user_profile_path',
    'uses' => 'UserProfileController@index'
]);

/* Change Username */
Route::put('profile/{username}/change_username', [
    'as'   => 'update_username_path',
    'uses' => 'UserProfileController@changeUsername'
]);

/* Change Email */
Route::put('profile/{username}/change_email', [
    'as' => 'update_user_email_path',
    'uses' => 'UserProfileController@changeEmail'
]);

/**
 * Users
 */

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

/**
 * Branches
 */

/* Show all Branches */
Route::get('branch/branches', [
    'as'   => 'branches_index_path',
    'uses' => 'BranchesController@index'
]);

Route::get('branch/branches/collection', [
    'as' => 'branches_collection_path',
    'uses' => 'BranchesController@getDatatable'
]);

Route::post('branch/new', [
    'as' => 'new_branch_path',
    'uses' => 'BranchesController@store'
]);

