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
use Acme\Helpers\RouteHelper;

Route::get('/not_found', [
    'as'   => 'not_found_path',
    'uses' => 'PagesController@pageNotFound'
]);

/* Unauthorized */
Route::get('/401', [
    'as' => 'unauthorized_path',
    'uses' => 'PagesController@unauthorized'
]);

/* For Guest Users */
Route::group(['before' => 'guest'], function()
{
    /**
     * Sessions
     */

    /* Log in User */
    Route::get('/login', [
        'as'   => 'login_path',
        'uses' => 'SessionsController@create'
    ]);

    Route::post('/login', [
        'as'   => 'login_path',
        'uses' => 'SessionsController@store'
    ]);

    /* Activate User */
    Route::get('register/activate/{activationCode}', [
        'as'   => 'user_activation_path',
        'uses' => 'UserActivationController@index'
    ]);

    Route::post('register/activate/{activationCode}', [
        'as'   => 'user_activation_path',
        'uses' => 'UserActivationController@store'
    ]);

}); /* End of Guest Users */

/* For Members */
Route::group(['before' => 'auth'], function()
{
    /* Dashboard */
    Route::get('/', [
        'as'   => 'home',
        'uses' => 'DashboardController@index'
    ]);

    Route::get('/dashboard', [
        'as'   => 'home',
        'uses' => 'DashboardController@index'
    ]);

    /* Logout *Need to change it to DELETE */
    Route::get('/logout', [
        'as'   => 'logout_path',
        'uses' => 'SessionsController@destroy'
    ]);

    /**
     * Profile
     */

    Route::group(['prefix' => 'profile'], function()
    {
        /* Change Password */
        Route::put('change_password', [
            'as'   => 'change_password_path',
            'uses' => 'UserProfileController@changePassword'
        ]);

        /* User Profile View */
        Route::get('{username}', [
            'as'   => 'user_profile_path',
            'uses' => 'UserProfileController@index'
        ]);

        /* Change Username */
        Route::put('{username}/change_username', [
            'as'   => 'update_username_path',
            'uses' => 'UserProfileController@changeUsername'
        ]);

        /* Change Email */
        Route::put('{username}/change_email', [
            'as'   => 'update_user_email_path',
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
            'as'   => 'register_path',
            'uses' => 'RegistrationController@create'
        ]);

        Route::post('/', [
            'as'   => 'register_path',
            'uses' => 'RegistrationController@store'
        ]);

        /* Resend Mail */
        Route::post('resend_email', [
            'as'   => 'resend_email_user_path',
            'uses' => 'UsersController@resendActivationEmail'
        ]);
    });

    /*
     * Access Control
     * Roles and Permissions
     */
    Route::group(['prefix' => 'access_control'], function ()
    {
        Route::get('/', [
            'as'   => 'access_control_path',
            'uses' => 'AccessControlsController@index'
        ]);

        /* Roles */
        Route::group(['prefix' => 'role'], function()
        {
            Route::post('new', [
               'as'   => 'new_role_path',
               'uses' => 'RolesController@store'
            ]);

            Route::delete('delete/{id}', [
                'as'   => 'delete_role_path',
                'uses' => 'RolesController@destroy'
            ]);

            Route::put('update', [
                'as'   => 'update_role_path',
                'uses' => 'RolesController@update'
            ]);
        });

        /* Permissions */
        Route::group(['prefix' => 'permission'], function ()
        {
            // Permission Groups
            Route::post('new_group', [
                'as'   => 'new_permission_group_path',
                'uses' => 'PermissionGroupsController@store'
            ]);

            Route::delete('delete_group/{id}', [
                'as'   => 'delete_permission_group_path',
                'uses' => 'PermissionGroupsController@destroy'
            ]);

            Route::put('update_group', [
                'as'   => 'update_permission_group_path',
                'uses' => 'PermissionGroupsController@update'
            ]);

            // Permissions
            Route::post('new', [
                'as'   => 'new_permission_path',
                'uses' => 'PermissionsController@store'
            ]);

            Route::put('update', [
                'as' => 'update_permission_path',
                'uses' => 'PermissionsController@update'
            ]);

            Route::delete('delete_permission/{id}', [
                'as'   => 'delete_permission_path',
                'uses' => 'PermissionsController@destroy'
            ]);

            Route::get('fetchdata/{id}', [
                'as' => 'fetch_permission_data_path',
                'uses' => 'PermissionsController@edit'
            ]);

            // Grant / Revoke Permissions from Role
            Route::post('grant_permission_role', [
                'as'   => 'grant_role_permission_path',
                'uses' => 'PermissionRolesController@store'
            ]);

            Route::delete('revoke_permission_role', [
                'as'   => 'revoke_role_permission_path',
                'uses' => 'PermissionRolesController@destroy'
            ]);

        });

    });

    /**
     * Users
     */
    Route::group(['prefix' => 'user'], function()
    {
        /* Show all Users */
        Route::get('users', [
            'as'   => 'users_index_path',
            'uses' => 'UsersController@index'
        ]);

//        Route::get('users/collection', [
//            'as'   => 'users_collection_path',
//            'uses' => 'UsersController@getDatatable'
//        ]);

        /* Deactivate User */
        Route::put('deactivate', [
            'as'   => 'deactivate_user_path',
            'uses' => 'UsersController@deactivateUser'
        ]);

        /* Re-Activate User */
        Route::put('reactivate/{id}', [
            'as'   => 'reactivate_user_path',
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

        Route::post('new', [
            'as'   => 'new_branch_path',
            'uses' => 'BranchesController@store'
        ]);

        Route::get('fetchdata/{id}', [
            'as'   => 'fetch_branch_data_path',
            'uses' => 'BranchesController@edit'
        ]);

        Route::get('search', [
            'as'   => 'search_branch_path',
            'uses' => 'BranchesController@search'
        ]);

        Route::put('update', [
            'as'   => 'update_branch_path',
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
            'as'   => 'departments_index_path',
            'uses' => 'DepartmentsController@index'
        ]);

        Route::post('new', [
            'as'   => 'new_department_path',
            'uses' => 'DepartmentsController@store'
        ]);

        Route::put('update', [
            'as'   => 'update_department_path',
            'uses' => 'DepartmentsController@update'
        ]);

        Route::delete('delete/{id}', [
            'as'   => 'delete_department_path',
            'uses' => 'DepartmentsController@destroy'
        ]);

        Route::get('fetchdata/{id}', [
            'as'   => 'fetch_department_data_path',
            'uses' => 'DepartmentsController@edit'
        ]);
    });

    Route::group(['prefix' => 'employee'], function () {
        /* Show all Employees */
        Route::get('employees', [
            'as'   => 'employees_index_path',
            'uses' => 'EmployeesController@index'
        ]);

        Route::get('new', [
            'as'   => 'hire_employee_path',
            'uses' => 'EmployeesController@create'
        ]);

        Route::post('new', [
            'as' => 'hire_employee_path',
            'uses' => 'EmployeesController@store'
        ]);

        Route::get('show/{id}', [
            'as' => 'show_employee_path',
            'uses' => 'EmployeesController@show'
        ]);

        Route::get('edit/{id}', [
            'as' => 'update_employee_path',
            'uses' => 'EmployeesController@edit'
        ]);

        Route::put('edit/{id}', [
            'as' => 'update_employee_path',
            'uses' => 'EmployeesController@update'
        ]);

        Route::delete('delete/{id}', [
            'as'   => 'terminate_employee_path',
            'uses' => 'EmployeesController@destroy'
        ]);
    });

    Route::get('/groups', function(){
        dd(url());
    });

}); // End of Route Group auth

