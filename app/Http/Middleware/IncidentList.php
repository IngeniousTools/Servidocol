<?php

namespace App\Http\Middleware;

use Closure;

class IncidentList
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next){
      if (session('rol')!=1 and session('rol')!=2 and session('rol')!=3 and session('rol')!=8) {
        return redirect('401');
      }
      return $next($request);
    }
}
