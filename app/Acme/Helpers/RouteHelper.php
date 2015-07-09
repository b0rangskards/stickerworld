<?php  namespace Acme\Helpers; 

use Route;

class RouteHelper {

    public static function getAuthRoutes()
    {
        $routeName = '';
        $resultArray = [];

        foreach ( Route::getRoutes() as $route )
        {
            if ( array_key_exists('auth', $route->beforeFilters()) ) {

                $routeName = $route->getName();

                if ( !in_array($routeName, $resultArray) ) {
                    $resultArray[$routeName] = strtolower($routeName);
                }
            }
        }
        return $resultArray;
    }

    public static function getAuthRoutesWithGroup()
    {
        $routeName = '';
        $parentGroup = '';
        $resultArray = [];
        $exceptGroups = ['profile'];

        foreach ( Route::getRoutes() as $route ) {
            if ( array_key_exists('auth', $route->beforeFilters()) ) {

                $parentGroup = self::getParentGroup($route);
                $routeName = strtolower($route->getName());

                if ( !(in_array($routeName, array_flatten($resultArray)) ||
                    in_array($parentGroup, $exceptGroups) ||
                    empty($parentGroup)
                   ))
                {
                    $resultArray[$parentGroup][] = $routeName;
                }
            }
        }
        return $resultArray;
    }

    public static function getAuthRouteGroupsForPermission()
    {
        $except = ['profile'];

        return RouteHelper::getAuthRouteGroupsExcept($except);
    }

    public static function getAuthRouteGroupsExcept($except)
    {
        return self::getAuthRouteGroups($except);
    }

    public static function getAuthRouteGroups($except = [])
    {
        $resultArray = [];
        $routeArray = [];
        $routeStr = '';

        foreach ( Route::getRoutes() as $route )
        {
            $routeStr = self::getParentGroup($route);

            if( !is_null($routeStr))
            {
                if ( !(in_array($routeStr, $resultArray) || in_array($routeStr, $except))) {
                    $resultArray[] = $routeStr;
                }
            }
        }
        return $resultArray;
    }

    protected static function getParentGroup($route)
    {
        $routeArray = explode('/', $route->getPrefix());

        if ( !empty($routeArray[0]) ) {
            return $routeArray[0];
        } else if ( isset($routeArray[1]) && !empty($routeArray[1]) ) {
            return $routeArray[1];
        }
    }

    public static function prettyRouteName($rawName)
    {
        return str_replace(['path', '_'], ['', ' '], $rawName);
    }

} 