<?php

namespace App\Http\Middleware;

use Closure;
use App\User;

class IsAdmin
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
        if (!$request->user() || $request->user() && $request->user()->role == User::ROLE_MEMBER) {
            \Auth::logout();

            session()->flash('danger', "You don't have access login page");
            return redirect('/login');
        }
 
        return $next($request);
    }
}
