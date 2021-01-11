<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class Giaovien
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
        if(Auth::guard('giaovien')->check() || !Auth::guard('hocsinh')->check()){
             return $next($request);
        } else {
            Auth::guard('giaovien')->logout();
            Auth::guard('hocsinh')->logout();
            return redirect('Dangnhap');
        }

    }
}
