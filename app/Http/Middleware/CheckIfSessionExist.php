<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Session\Session;

class CheckIfSessionExist
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $session = new Session();  
        
        if (
            $session->has('rooms') &&
            $session->has('duration')  &&
            $session->has('total_cost') &&
            $session->has('booking_type') && 
            $session->has('check_in_date') && 
            $session->has('check_out_date') && 
            $session->has('no_of_adult') && 
            $session->has('no_of_children')  
            ) 
        {
            return $next($request);
        } else {
            return redirect(url('/'));
        }
    }
}