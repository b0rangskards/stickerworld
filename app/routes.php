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
    /* Log in User */
    Route::get('/login', [
        'as'   => 'login_path',
        'uses' => 'SessionsController@create'
    ]);

    Route::post('/login', [
        'as'   => 'login_path',
        'uses' => 'SessionsController@store'
    ]);
}); /* End of Guest Users */

/* Activate User */
Route::group(['before' => 'guest_logout'], function ()
{
    Route::get('register/activate/{activationCode}', [
        'as' => 'user_activation_path',
        'uses' => 'UserActivationController@index'
    ]);

    Route::post('register/activate/{activationCode}', [
        'as' => 'user_activation_path',
        'uses' => 'UserActivationController@store'
    ]);
});

/* For Members */
Route::group(['before' => 'auth'], function()
{
    /* Dashboard */
    Route::get('/', [
        'as'   => 'home',
        'uses' => 'DashboardController@index'
    ]);

    Route::get('/dashboard', [
        'as'   => 'dashboard',
        'uses' => 'DashboardController@index'
    ]);

    Route::delete('/logout', [
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

	/* Settings */
	Route::group(['prefix' => 'settings'], function () {

		Route::get('/', [
			'as'   => 'user_settings_path',
			'uses' => 'UserSettingsController@index'
		]);

		Route::put('edit', [
			'as'   => 'update_company_settings_path',
			'uses' => 'UserSettingsController@update'
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

	    Route::get('fetchdata', [
		    'as' => 'fetch_employee_data_path',
		    'uses' => 'EmployeesController@fetchData'
	    ]);

    });

    Route::group(['prefix' => 'supplier'], function () {
        /* Show all Suppliers */
        Route::get('suppliers', [
            'as'   => 'suppliers_index_path',
            'uses' => 'SuppliersController@index'
        ]);

        Route::get('new', [
            'as'    => 'new_supplier_path',
            'uses'  => 'SuppliersController@create'
        ]);

        Route::post('new', [
            'as'   => 'new_supplier_path',
            'uses' => 'SuppliersController@store'
        ]);

	    Route::get('show/{id}', [
		    'as'   => 'show_supplier_path',
		    'uses' => 'SuppliersController@show'
	    ]);

        Route::get('edit/{id}', [
            'as'   => 'update_supplier_path',
            'uses' => 'SuppliersController@edit'
        ]);

        Route::put('edit/{id}', [
            'as'   => 'update_supplier_path',
            'uses' => 'SuppliersController@update'
        ]);

        Route::delete('cancel/{id}', [
            'as'   => 'cancel_supplier_path',
            'uses' => 'SuppliersController@destroy'
        ]);

	    /* Supplier Item Routes */

	    Route::post('{supplierId}/item', [
		    'as'   => 'create_item_path',
		    'uses' => 'ItemsController@store'
	    ]);

	    Route::post('{supplierId}/item/update', [
		    'as' => 'update_item_path',
		    'uses' => 'ItemsController@update'
	    ]);

	    Route::delete('item/{id}', [
		    'as'   => 'delete_item_path',
		    'uses' => 'ItemsController@destroy'
	    ]);

	    Route::get('item/fetchdata/{id}', [
		    'as' => 'fetch_item_data_path',
		    'uses' => 'ItemsController@fetchData'
	    ]);

    });

	Route::group(['prefix' => 'item'], function () {

		Route::get('items', [
			'as'   => 'items_index_path',
			'uses' => 'ItemsController@index'
		]);

		Route::get('new', [
			'as'   => 'new_item_path',
			'uses' => 'ItemsController@create'
		]);

		Route::post('new', [
			'as'   => 'new_item_index_path',
			'uses' => 'ItemsController@newItem'
		]);

		Route::get('edit/{item}', [
			'as'   => 'update_item_index_path',
			'uses' => 'ItemsController@edit'
		]);

		Route::put('edit', [
			'as'   => 'update_item_index_path',
			'uses' => 'ItemsController@updateItem'
		]);

		Route::get('search', [
			'as' => 'search_item_path',
			'uses' => 'ItemsController@search'
		]);

	});


	Route::group(['prefix' => 'client'], function () {

		Route::get('clients', [
			'as' => 'clients_index_path',
			'uses' => 'ClientsController@index'
		]);

		Route::get('new', [
			'as' => 'new_client_path',
			'uses' => 'ClientsController@create'
		]);

		Route::post('new', [
			'as' => 'new_client_path',
			'uses' => 'ClientsController@store'
		]);

		Route::get('edit/{client}', [
			'as'   => 'update_client_path',
			'uses' => 'ClientsController@edit'
		]);

		Route::put('edit/{client}', [
			'as'   => 'update_client_path',
			'uses' => 'ClientsController@update'
		]);

		Route::delete('client/{client}', [
			'as' => 'delete_client_path',
			'uses' => 'ClientsController@destroy'
		]);

		Route::get('fetchdata', [
			'as'   => 'fetch_client_data_path',
			'uses' => 'ClientsController@fetchData'
		]);

	});


	Route::group(['prefix' => 'project'], function () {

		Route::get('projects', [
			'as'   => 'projects_index_path',
			'uses' => 'ProjectsController@index'
		]);

		Route::get('new', [
			'as'   => 'new_project_path',
			'uses' => 'ProjectsController@create'
		]);

		Route::post('new', [
			'as'   => 'new_project_path',
			'uses' => 'ProjectsController@store'
		]);

		Route::get('confirm/{projectname}', [
			'as'   => 'confirm_project_path',
			'uses' => 'ProjectsController@getConfirm'
		]);

		Route::post('confirm', [
			'as'   => 'confirm_project_path',
			'uses' => 'ProjectsController@postConfirm'
		]);

		Route::put('new/add-material', [
			'as'   => 'add_material_path',
			'uses' => 'NewProjectController@addMaterial'
		]);

		Route::put('new/add-labor-cost', [
			'as'   => 'add_labor_cost_from_project_path',
			'uses' => 'NewProjectController@addLaborCost'
		]);

		Route::put('new/add-logistics-cost', [
			'as'   => 'add_logistics_cost_from_project_path',
			'uses' => 'NewProjectController@addLogisticsCost'
		]);

		Route::put('new/update-quantity', [
			'as'   => 'update_quantity_path',
			'uses' => 'NewProjectController@updateMaterialQuantity'
		]);

		Route::put('new/update-utility-quantity', [
			'as'   => 'update_utility_quantity_path',
			'uses' => 'NewProjectController@updateUtilityQuantity'
		]);

		Route::put('new/update-logistics-quantity', [
			'as'   => 'update_logistics_quantity_path',
			'uses' => 'NewProjectController@updateLogisticsQuantity'
		]);

		Route::delete('cancel-material/{itemId}', [
			'as'   => 'cancel_project_material_path',
			'uses' => 'NewProjectController@cancelMaterial'
		]);

		/* Validate New Project Fields with Xeditable */
		Route::post('new/validate', [
			'as'   => 'validate_project_path',
			'uses' => 'NewProjectController@validate'
		]);

		/* Generate Cost Estimation Section on New Project */

		Route::get('new/generate-cost-estimation-section', [
			'as'   => 'generate_cost_estimation_section_path',
			'uses' => 'NewProjectController@generateCostEstimationSection'
		]);


		/* Labor Costs */
		Route::group(['prefix' => 'labor-cost'], function () {

			Route::get('labor-costs', [
				'as'   => 'labor_costs_index_path',
				'uses' => 'LaborCostsController@index'
			]);

			Route::get('new', [
				'as'   => 'new_labor_cost_path',
				'uses' => 'LaborCostsController@create'
			]);

			Route::post('new', [
				'as'   => 'new_labor_cost_path',
				'uses' => 'LaborCostsController@store'
			]);

			Route::get('edit/{utilitycost}', [
				'as'   => 'update_labor_cost_path',
				'uses' => 'LaborCostsController@edit'
			]);

			Route::put('edit/{id}', [
				'as'   => 'update_labor_cost_path',
				'uses' => 'LaborCostsController@update'
			]);

			Route::delete('delete/{utilitycost}', [
				'as'   => 'delete_labor_cost_path',
				'uses' => 'LaborCostsController@destroy'
			]);

		}); /* End of Labor Cost Route Group */

		/* Labor Costs */
		Route::group(['prefix' => 'logistics-cost'], function () {

			Route::get('logistics-costs', [
				'as'   => 'logistics_costs_index_path',
				'uses' => 'LogisticsCostsController@index'
			]);

			Route::get('new', [
				'as'   => 'new_logistics_cost_path',
				'uses' => 'LogisticsCostsController@create'
			]);

			Route::post('new', [
				'as'   => 'new_logistics_cost_path',
				'uses' => 'LogisticsCostsController@store'
			]);

			Route::get('edit/{utilitycost}', [
				'as'   => 'update_logistics_cost_path',
				'uses' => 'LogisticsCostsController@edit'
			]);

			Route::put('edit/{id}', [
				'as'   => 'update_logistics_cost_path',
				'uses' => 'LogisticsCostsController@update'
			]);

			Route::delete('delete/{utilitycost}', [
				'as'   => 'delete_logistics_cost_path',
				'uses' => 'LogisticsCostsController@destroy'
			]);

		}); /* End of Labor Cost Route Group */
	}); /* End of Project Route Group */

	Route::get('test', function(){
//		dd(CartMaterials::getLabors());
//		dd(CartMaterials::generateCostEstimatesFromCart());
//dd(Cart::contents(true));
		dd(UtilityCost::find(44));
	});

	Route::model('item', 'Item');
	Route::model('client', 'Client');
	Route::model('utilitycost', 'UtilityCost');
	Route::bind('projectname', function($value){
		return Project::where('name', $value)->first();
	});

}); // End of Route Group auth

