<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Redis;

/**
 * 后台入口控制器
 */
class IndexController extends AdminController
{
    /**
     * 后台首页
     */
    public function index()
    {
        return view('admin.index.index');
    }
}
