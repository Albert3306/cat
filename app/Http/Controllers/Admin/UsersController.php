<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UsersRequest;
use Illuminate\Http\Request;
use App\Repositories\UsersRepository;

/**
 * 用户账户管理控制器
 */
class UsersController extends AdminController
{
    private $users;
    public function __construct(UsersRepository $users)
    {
        parent::__construct();
        $this->users = $users;
    }

    /**
     * 获取个人账户信息
     */
    public function getInfo()
    {
        $user = auth()->user();
        return view('admin.users.info',compact('user'));
    }

    /**
     * 修改个人资料
     */
    public function putInfo(UsersRequest $request)
    {
        //使用Bootstrap后台框架，可以废弃ajax提交方式，使用表单自动验证
        $this->user->updateUser(auth()->user(), $request->all());
        return redirect()->back()->with('message', '成功更新个人资料！');
    }
}
