<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Session;

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
        if (Auth::check()) {
            $onuser = Auth::user();
            if ($onuser->role->slug == 'super admin' || $onuser->role->slug == 'admin') {
                view()->share('onuser', $onuser);
            }
            else {
                Session::flush();
                Auth::logout();
                return redirect()->route('admin.get.login')->withError('Rolünüz panele giriş yapmak için yetkilendirilmedi!');
            }
        }

        return $next($request);
    }
}
