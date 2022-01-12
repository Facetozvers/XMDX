<?php

namespace App\Http\Middleware;

use Closure;

class xendit
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $token)
    {
        //verify token API
        if($token == 'ZtlQeavg374UAjH7GUpukIDByJ467oBTIDHxj9L2GmWs5RKt'){
            return $next($request);
        }
        
        else{
            abort(403);
        }
    }
}
