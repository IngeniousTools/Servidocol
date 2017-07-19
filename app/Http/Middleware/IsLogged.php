<?php

namespace App\Http\Middleware;

use Closure;

class IsLogged
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next){

      if (empty(session('identification'))) {
        return redirect('401');
      }
        return $next($request);
    }
}
