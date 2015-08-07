<?php

use Acme\Helpers\RouteHelper;

class PermissionsTableSeeder extends MasterTableSeeder{

	public function run()
	{
        $routeCollection = RouteHelper::getAuthRoutesWithGroup();

		foreach( $routeCollection as $groupName => $routeMembers)
		{
            $group = PermissionGroup::whereName($groupName)->first();

            foreach($routeMembers as $route)
            {
                $p = Permission::create([
                    'group_id'      =>      $group->id,
                    'name'          =>      RouteHelper::prettyRouteName($route),
                    'route'         =>      $route
                ]);
            }
		}
	}



    public function createSlug()
    {
        // TODO: Implement createSlug() method.
    }
}