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

if (!function_exists('write_log')) {
    /**
     * 写入日志
     * @param  string $content  需要写入日志的内容
     * @param  string $filename 日志名称 默认为默认是日期的年-月-日
     */
    function write_log($content, $filename = '') {
        $savepath = storage_path() . '/logs/';
        $filename = date('Ymd') . $filename . '.txt';
        $fileContent = '【'.date('Y-m-d H:i:s') . '】: ' . $content . "\r\n";
        $fp = fopen($savepath . $filename, "a");
        fwrite($fp, $fileContent);
        fclose($fp);
    }
}

if (!function_exists('site_url')) {
    /**
     * Generate scheme-less url (not for static asset files) for multi sites
     * site_url('auth/login', 'mobile') === '//example.com/m/auth/login'
     *
     * @param string $path
     * @param string $site
     * @param boolean $scheme_less
     * @return string
     */
    function site_url($path, $site = 'desktop', $scheme_less = true)
    {
        if (!in_array($site, config('site.route.group'))) {
            $site = 'desktop';
        }
        $sub_dir = config('site.route.prefix.'.$site, '');
        return internal_link($path, $sub_dir, $scheme_less);
    }
}

if (!function_exists('internal_link')) {
    /**
     * Generate internal link url
     *
     * @param string $path
     * @param string $sub_dir
     * @param boolean $scheme_less
     * @return string
     */
    function internal_link($path, $sub_dir, $scheme_less = true)
    {
        $host = app('url')->asset('');
        $sub_dir = ($sub_dir === '') ? $sub_dir : trim($sub_dir, '/').'/';
        if ($scheme_less) {
            $root = ltrim($host, 'https:');
            $root = ltrim($root, 'http:');
        } else {
            $root = $host;
        }
        return rtrim($root, '/').'/'.$sub_dir.trim($path, '/');
    }
}

if (!function_exists('dict')) {
    /**
     * Get Dictionary config
     *
     * @return mixed
     */
    function dict($dot_key = null, $default = null)
    {
        $dict = app('App\Dict');
        return $dict->getDict($dot_key, $default);
    }
}

if (!function_exists('deny')) {

    /**
     * 40X deny helper
     * only for 401 Unauthorized, 403 Forbidden and 404 Not Found errors
     *
     * @param  string $site site alias name
     * @param 
     * @return \Response
     */
    function deny($site = 'admin', $status = 403)
    {
        if (!in_array($status, [401, 403, 404])) {
            return $status = 403;
        }
        switch ($site) {
            case 'admin':
                return response()->view('admin.errors.'.$status, [], $status);
                break;
            case 'desktop':
                return reponse()->view('desktop.errors.'.$status, [], $status);
                break;
            case 'mobile':
                return reponse()->view('mobile.errors.'.$status, [], $status);
                break;
            default:
                return response()->view('errors.'.$status, [], $status);
                break;
        }
    }
}
