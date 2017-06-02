<?php

namespace App\Http\Controllers\Admin;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * 后台验证控制器
 */
class AuthController extends Controller
{
    /**
     * 添加路由过滤中间件
     */
    public function __construct()
    {
        $this->middleware('multi-site.guest:admin', ['except' => 'getLogout']);
    }

    /**
     * 登录页
     */
    public function getLogin()
    {
        echo 11111;exit;
        return view('admin.auth.login');
    }
}
