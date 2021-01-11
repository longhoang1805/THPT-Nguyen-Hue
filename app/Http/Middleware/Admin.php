<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class Admin
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
        if(Auth::check()){

            return $next($request);

        }else{
            Auth::guard('giaovien')->logout();
            Auth::guard('hocsinh')->logout();
            return redirect('Dangnhap');
        }
    }
}
