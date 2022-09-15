<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

use function PHPUnit\Framework\returnSelf;

class LoginCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (!$request->session()->has('user_id')) {
            return redirect('/login')->with('fail', 'You have to login first');
        }
        return $next($request);
    }
}
