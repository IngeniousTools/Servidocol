<?php

namespace App\Http\Middleware;

use Closure;

class OperationsManager
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next){

      if (session('rol')!=1) {
        return redirect('401');
      }

      return $next($request);
    }
}
