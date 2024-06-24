<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Auth;
use Closure;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    public function handle($request, Closure $next, ...$guards)
    {
        if(!Auth::check()){
            return redirect()->route('admin.login');
        }
        $user = Auth::user();
        if($user->TrangThai == 1){
            return $next($request);
        }else{
            Auth::logout();
            return redirect()->route('error');
        }
        // dd($user);
        $route = $request->route()->getName();
        if($user->cant($route)){
            return redirect()->route('error',['code'=>403]);
        }
        return $next($request);
    }
}
