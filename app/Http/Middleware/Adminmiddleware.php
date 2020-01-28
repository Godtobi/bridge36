<?php

namespace App\Http\Middleware;

use Closure;

class Adminmiddleware
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

            if(auth()->user()->hasAnyRole(['admin','facilitator','canada_admin','nigeria_admin'])){
                return $next($request);
            }
            else{
                return redirect('/dashboard')->with('error','You do not have permission to view the page');
            }
        }


}
