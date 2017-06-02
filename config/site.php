<?php

/**
 * 多站点 域名、路由、静态资源、存储CDN 等相关配置
 *
 * @author alert <albert3306@alyun.com>
 */

return [
    //路由相关配置
    'route' => [
        #路由站点分组(对应block中间件参数)
        'group' => [
            'desktop',
            'admin',
        ],

        #路由域名绑定
        'domain' => [
            'desktop' => env('DESKTOP_SITE', ''),
            'admin'   => env('ADMIN_SITE', ''),
        ],

        #路由前缀绑定
        'prefix' => [
            'desktop' => '',
            'admin'   => 'admin',
        ],
    ],
];
