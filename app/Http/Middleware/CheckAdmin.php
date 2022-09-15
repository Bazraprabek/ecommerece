<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;

class CheckAdmin
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
        if ($request->session()->has('user_id')) {
            $user = User::find(session()->get('user_id'));
            if ($user->role != "admin") {
                return redirect('/');
            }
        } else {
            return redirect('/login')->with('fail', "You don't have access to this page");
        }
        return $next($request);
    }
}
