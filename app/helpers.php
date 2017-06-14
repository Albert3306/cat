<?php

/**
 * 公共函数库
 */

if (!function_exists('site_path')) {
    /**
     * Generate site path (relative to root path)
     * site_path('role/create', 'admin') === 'admin/role/create'
     *
     * @param string $path
     * @param string $site
     * @return string
     */
    function site_path($path, $site = 'desktop')
    {
        if (!in_array($site, config('site.route.group'))) {
            $site = 'desktop';
        }
        $sub_dir = config('site.route.prefix.'.$site, '');
        return $sub_dir.'/'.trim($path, '/');
    }
}

if (!function_exists('site_path')) {
    /**
     * Generate site path (relative to root path)
     * site_path('role/create', 'admin') === 'admin/role/create'
     *
     * @param string $path
     * @param string $site
     * @return string
     */
    function site_path($path, $site = 'desktop')
    {
        if (!in_array($site, config('site.route.group'))) {
            $site = 'desktop';
        }
        $sub_dir = config('site.route.prefix.'.$site, '');
        return $sub_dir.'/'.trim($path, '/');
    }
}
