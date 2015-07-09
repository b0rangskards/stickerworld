<?php

/*
|--------------------------------------------------------------------------
| Application & Route Filters
|--------------------------------------------------------------------------
|
| Below you will find the "before" and "after" events for the application
| which may be used to do any work before or after a request into your
| application. Here you may also register your custom route filters.
|
*/

use Symfony\Component\HttpFoundation\Response as ResponseCode;

App::before(function($request)
{
    //
});

// Prevent from going back to a page after log out
App::after(function ($request, $response) {
    $response->headers->set("Cache-Control", "no-cache,no-store, must-revalidate");
    $response->headers->set("Pragma", "no-cache"); //HTTP 1.0
    $response->headers->set("Expires", " Mon, 01 Jan 1990 05:00:00 GMT"); // Date in the past
});


App::after(function($request, $response)
{
	//
});

/*
|--------------------------------------------------------------------------
| Authentication Filters
|--------------------------------------------------------------------------
|
| The following filters are used to verify that the user of the current
| session is logged into this application. The "basic" filter easily
| integrates HTTP Basic authentication for quick, simple checking.
|
*/

Route::filter('auth', function()
{
	if ( !Session::has('currentUser'))
	{
		if (Request::ajax())
		{
			return Response::make('Unauthorized', ResponseCode::HTTP_UNAUTHORIZED);
		}
		else
		{
            Flash::error('Please Log in to Continue');
            return Redirect::to('/login');
		}
	}
});


Route::filter('auth.basic', function()
{
	return Auth::basic();
});

/*
|--------------------------------------------------------------------------
| Guest Filter
|--------------------------------------------------------------------------
|
| The "guest" filter is the counterpart of the authentication filters as
| it simply checks that the current user is not logged in. A redirect
| response will be issued if they are, which you may freely change.
|
*/

Route::filter('guest', function()
{
	if (Auth::check()) return Redirect::to('/dashboard');
});

/*
|--------------------------------------------------------------------------
| CSRF Protection Filter
|--------------------------------------------------------------------------
|
| The CSRF filter is responsible for protecting your application against
| cross-site request forgery attacks. If this special token in a user
| session does not match the one given in this request, we'll bail.
|
*/

Route::filter('csrf', function()
{
	if (Session::token() !== Input::get('_token'))
	{
		throw new Illuminate\Session\TokenMismatchException;
	}
});

/** TODO
 * cache user permissions, check if permissions exists in cache if not then get from db and store in cache
 * filter to check user permissions
 * redirect to intented if grant
 */
Route::filter('permission', function()
{
    $currentRouteName = Route::currentRouteName();
    $user = Auth::user();

    if( !($user->isAdmin() || in_array($currentRouteName, ['home', 'logout_path']) || $user->hasPermission($currentRouteName)) )
    {
        if ( Request::ajax() ) {
            return Response::make('Unauthorized', ResponseCode::HTTP_UNAUTHORIZED);
        }

        return Redirect::route('unauthorized_path');
    }

});


//Route::filter('admin', function($route, $request)
//{
//   if( ! Auth::user()->isAdmin()) {
//       return App::abort(401, 'You are not authorized');
//   }
//});