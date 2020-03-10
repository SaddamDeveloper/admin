<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Auth;
class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request, $guard=NULL)
    {
        if (! $request->expectsJson()) {
            if (Auth::guard($guard)->check()) {
                switch ($guard) {
                   case 'admin':
                       $route = 'admin/dashboard';
                       break;
                   case 'branch':
                       $route = 'branch/dashboard';
                       break;
                   case 'restaurant':
                       $route = 'restaurant/dashboard';
                       break;
                   case 'rider':
                       $route = 'rider/dashboard';
                       break;
                  default:
                       $route = 'web.userLoginForm';
               }
               return redirect($route);
           }
        }
    }
}
