<?php

namespace App\Http\Middleware;

use Closure;

class Professor
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
        if($request->user()->role->name!='professor'){
            return response()->json(['success' => false, 'message'=> "Not authorized."]);
        }
        return $next($request);
    }
}
