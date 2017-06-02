<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class MultiSiteAuthenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $site = null)
    {
        echo 222;exit;
        $admin_login_url   = config('site.route.prefix.admin', 'admin').'/auth/login';
        $desktop_login_url = config('site.route.prefix.desktop', '').'/i/login.html';
        switch ($site) {
            case 'admin':
                $guard = 'web';
                $login_url = $admin_login_url;
                break;
            case 'desktop':
            default:
                # code...
                $guard = 'member';
                $login_url = $desktop_login_url;
                break;
        }
        if (Auth::guard($guard)->guest()) {
            if ($request->ajax() || $request->wantsJson()) {
                return response('Unauthorized.', 401);
            } else {
                return redirect()->guest($login_url);
            }
        }
        return $next($request);
    }
}
