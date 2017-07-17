<?php

namespace App\Http\Middleware;

use Closure;

class IncidentCreate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next){
      if (session('rol')!=8 and !empty(session('rol'))) {
        return redirect('401');
      }
      return $next($request);
    }
}
