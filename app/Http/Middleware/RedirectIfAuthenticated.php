<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $site
     * @return mixed
     */
    public function handle($request, Closure $next, $site = null)
    {
        $backend_home_url = config('site.route.prefix.admin', 'admin').'/index';
        $desktop_home_url = config('site.route.prefix.desktop', '').'/i/welcome.html';
        switch ($site) {
            case 'admin':
                $guard = 'web';
                $home_url = $backend_home_url;
                break;
            case 'desktop':
            default:
                $guard = 'member';
                $home_url = $desktop_home_url;
                break;
        }
        if (Auth::guard($guard)->check()) {
            return redirect($home_url);
        }

        return $next($request);
    }
}
