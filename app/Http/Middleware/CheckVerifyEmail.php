<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckVerifyEmail
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
        if(auth()->user() && auth()->user()->hasVerifiedEmail()){
            return $next($request);
        }
        return redirect()->route('index')->with('alert',__('messages.please_verify_your_email'));
    }
}
