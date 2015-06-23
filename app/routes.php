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

/* Page Not Found */
Route::get('/not_found', [
    'as' => 'not_found_path',
    'uses' => 'PagesController@pageNotFound'
]);

/* For Guest Users */
Route::group(['before' => 'guest'], function()
{
    /**
     * Sessions
     */
    Route::get('/', [
        'as' => 'home',
        'uses' => 'SessionsController@create'
    ]);

    /* Log in User */
    Route::get('/login', [
        'as' => 'login_path',
        'uses' => 'SessionsController@create'
    ]);

    Route::post('/login', [
        'as' => 'login_path',
        'uses' => 'SessionsController@store'
    ]);

    /* Activate User */
    Route::get('register/activate/{activationCode}', [
        'as' => 'user_activation_path',
        'uses' => 'UserActivationController@index'
    ]);

    Route::post('register/activate/{activationCode}', [
        'as' => 'user_activation_path',
        'uses' => 'UserActivationController@store'
    ]);

}); /* End of Guest Users */

/* For Members */
Route::group(['before' => 'auth'], function()
{
    /* Dashboard */
    Route::get('/dashboard', [
        'as' => 'home',
        'uses' => 'PagesController@dashboard'
    ]);

    /* Logout *Need to change it to DELETE */
    Route::get('/logout', [
        'as' => 'logout_path',
        'uses' => 'SessionsController@destroy'
    ]);

    /**
     * Profile
     */

    Route::group(['prefix' => 'profile'], function()
    {
        /* Change Password */
        Route::put('change_password', [
            'as' => 'change_password_path',
            'uses' => 'UserProfileController@changePassword'
        ]);

        /* User Profile View */
        Route::get('{username}', [
            'as' => 'user_profile_path',
            'uses' => 'UserProfileController@index'
        ]);

        /* Change Username */
        Route::put('{username}/change_username', [
            'as' => 'update_username_path',
            'uses' => 'UserProfileController@changeUsername'
        ]);

        /* Change Email */
        Route::put('{username}/change_email', [
            'as' => 'update_user_email_path',
            'uses' => 'UserProfileController@changeEmail'
        ]);

    });


    /*
     * User Registration
     */
    Route::group(['prefix' => 'register'], function()
    {
        /* Register a user */
        Route::get('/', [
            'as' => 'register_path',
            'uses' => 'RegistrationController@create'
        ]);

        Route::post('/', [
            'as' => 'register_path',
            'uses' => 'RegistrationController@store'
        ]);

        /* Resend Mail */
        Route::post('resend_email', [
            'as' => 'resend_email_user_path',
            'uses' => 'UsersController@resendActivationEmail'
        ]);
    });


    /**
     * Users
     */
    Route::group(['prefix' => 'user'], function()
    {
        /* Show all Users */
        Route::get('users', [
            'as' => 'users.index',
            'uses' => 'UsersController@index'
        ]);

        /* Deactivate User */
        Route::put('deactivate', [
            'as' => 'deactivate_user_path',
            'uses' => 'UsersController@deactivateUser'
        ]);

        /* Re-Activate User */
        Route::put('reactivate/{id}', [
            'as' => 'reactivate_user_path',
            'uses' => 'UsersController@reactivateUser'
        ]);
    });

    /**
    * Branches
    */
    Route::group(['prefix' => 'branch'], function()
    {
        /* Show all Branches */
        Route::get('branches', [
            'as'   => 'branches_index_path',
            'uses' => 'BranchesController@index'
        ]);

        Route::get('branches/collection', [
            'as'   => 'branches_collection_path',
            'uses' => 'BranchesController@getDatatable'
        ]);

        Route::post('new', [
            'as'   => 'new_branch_path',
            'uses' => 'BranchesController@store'
        ]);

        Route::get('fetchdata/{id}', [
            'as' => 'fetch_branch_data_path',
            'uses' => 'BranchesController@edit'
        ]);

        Route::get('search', [
            'as' => 'search_branch_path',
            'uses' => 'BranchesController@search'
        ]);

        Route::put('update', [
            'as' => 'update_branch_path',
            'uses' => 'BranchesController@update'
        ]);

        Route::delete('close/{id}', [
            'as'   => 'close_branch_path',
            'uses' => 'BranchesController@destroy'
        ]);
    });

    Route::group(['prefix' => 'department'], function () {
        /* Show all Departments */
        Route::get('departments', [
            'as' => 'departments_index_path',
            'uses' => 'DepartmentsController@index'
        ]);

        Route::post('new', [
            'as' => 'new_department_path',
            'uses' => 'DepartmentsController@store'
        ]);

        Route::put('update', [
            'as' => 'update_department_path',
            'uses' => 'DepartmentsController@update'
        ]);

        Route::delete('delete/{id}', [
            'as' => 'delete_department_path',
            'uses' => 'DepartmentsController@destroy'
        ]);

        Route::get('fetchdata/{id}', [
            'as' => 'fetch_department_data_path',
            'uses' => 'DepartmentsController@edit'
        ]);
    });

    Route::group(['prefix' => 'employee'], function () {
        /* Show all Employees */
        Route::get('employees', [
            'as' => 'employees_index_path',
            'uses' => 'EmployeesController@index'
        ]);

        Route::get('new', [
            'as' => 'new_employee_path',
            'uses' => 'EmployeesController@create'
        ]);

        Route::delete('delete/{id}', [
            'as' => 'delete_employee_path',
            'uses' => 'EmployeesController@destroy'
        ]);
    });

}); // End of Route Group auth



