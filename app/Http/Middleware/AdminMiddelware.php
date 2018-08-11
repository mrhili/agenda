<?php

namespace App\Http\Middleware;

use Closure;
use App\{
  User
};
use Auth;

class AdminMiddelware
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
      if( Auth::check() || Auth::user()->role >= 2 ){

        return $next($request);


      }else{

        return redirect('/');

      }
    }
}
