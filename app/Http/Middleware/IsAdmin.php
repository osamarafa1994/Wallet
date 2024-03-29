<?php

namespace App\Http\Middleware;


use Closure;
use Illuminate\Support\Facades\Auth;

class IsAdmin
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

      $user =  Auth::user();

      if(Auth::check()){
        if (!$user->isAdmin()) {
          return redirect('/admin/customer');
        }
          return $next($request);
      }
      return redirect('/admin/dashboard');
    }
}
