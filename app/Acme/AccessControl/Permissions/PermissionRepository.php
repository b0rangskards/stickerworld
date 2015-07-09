<?php  namespace Acme\AccessControl\Permissions; 

use Acme\Base\BaseRepositoryInterface;
use Acme\Helpers\RouteHelper;
use Permission;
use Route;

class PermissionRepository implements BaseRepositoryInterface {

    /**
     * @param Permission $permission
     * @return mixed
     */
    public function save(Permission $permission)
    {
        return $permission->save();
    }

    public function deletePermission(Permission $permission)
    {
        return $permission->delete();
    }

    public function getTableData()
    {
        // TODO: Implement getTableData() method.
    }

    public function getTableColumns()
    {
        // TODO: Implement getTableColumns() method.
    }

    public function getRoutesForSelectOption()
    {
        $permissionRoutes = array_flatten(Permission::select('route')->get()->toArray());

        $routeCollection = Route::getRoutes();
        $routeName = '';
        $resultArray = [];

        foreach ( $routeCollection as $route ) {
            if ( array_key_exists('auth', $route->beforeFilters()) ) {

                $routeName = $route->getName();

                if ( !(in_array($routeName, $resultArray) || in_array($routeName, $permissionRoutes))) {
                    $resultArray[$routeName] = ucwords(str_replace('path', '',str_replace('_', ' ', $routeName)));
                }
            }
        }
        return $resultArray;
    }

    public function getAllRoutesForSelectOption()
    {
        $routeCollection = RouteHelper::getAuthRoutes();
        $resultArray = [];

        foreach ( $routeCollection as $route ) {

                if ( !in_array($route, $resultArray) ) {
                    $resultArray[$route] = ucwords(str_replace('path', '', str_replace('_', ' ', $route)));
                }
        }
        return $resultArray;
    }
}