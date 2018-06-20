<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\User;
Use Auth;
class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

      $user = Auth::user();

      if(!$user){
          abort (401);

      }
      else {

        $users = User::all()->count();
        if (!($users == 1)) {
            if (!Auth::user()->hasPermissionTo('access.dashboard')) //If user does //not have this permission
            {  abort(401, 'Access Denied');  }

        }

        return $next($request);
      }
} }
