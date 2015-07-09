<?php

use Acme\Helpers\RouteHelper;

class PermissionGroupsTableSeeder extends MasterTableSeeder {

	public function run()
	{
        $routes = RouteHelper::getAuthRouteGroupsForPermission();

        foreach($routes as $route)
		{
			PermissionGroup::create([
                'name' => $route
			]);
		}
	}

    public function createSlug()
    {
        // TODO: Implement createSlug() method.
    }
}