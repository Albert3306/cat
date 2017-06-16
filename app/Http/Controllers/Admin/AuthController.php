<?php

namespace App\Http\Controllers\Admin;

use Auth;
use Cookie;
use App\Events\UserLogin;
use App\Events\UserLogout;
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
        $this->middleware('guest:admin', ['except' => 'getLogout']);
    }

    /**
     * 登录页
     */
    public function getLogin()
    {
        $uac = Cookie::get('uac');
        // 判断 uac 是否存在
        if (!$uac) {
            $uac = [
                'username' => null,
                'password' => null,
            ];
        }
        return view('admin.auth.login',$uac);
    }

    /**
     * 登录提交页
     */
    public function postLogin(Request $request)
    {
        //控制面板路径
        $redirectTo = site_path('index', 'admin');
        //认证凭证
        $credentials = [
            'username'  => $request->input('username'),
            'password'  => $request->input('password'),
            'is_locked' => 0,
        ];

        // 记住密码
        if ($request->input('checkbox') == 'on') {
            $uac['username'] = $credentials['username'];
            $uac['password'] = $credentials['password'];
        } else {
            $uac['username'] = null;
            $uac['password'] = null;
        }

        // 执行登录
        if (Auth::attempt($credentials, $request->has('remember'))) {
            event(new UserLogin(auth()->user()));  //触发登录事件
            return redirect()->intended($redirectTo)->withCookie(cookie('uac',$uac,7 * 24 * 60));
        } else {
            // 登录失败，跳回
            return redirect()->back()
                             ->withInput()
                             ->withErrors(['attempt' => '“用户名”、“密码”错误或帐号已被禁用，请重新登录或联系超管！']);  //回传错误信息
        }
    }

    /**
     * 退出登录
     */
    public function getLogout()
    {
        @event(new UserLogout(auth()->user()));  //触发登出事件
        Auth::logout();
        return redirect()->to(site_path('auth/login', 'admin'));
    }
}
