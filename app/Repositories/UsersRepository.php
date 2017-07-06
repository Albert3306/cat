<?php

namespace App\Repositories;

use App\Models\Users;

/**
 * 用户仓库UserRepository
 */
class UsersRepository extends BaseRepository
{
    protected $role;
    public function __construct(Users $users)
    {
        $this->model = $users;
    }

    #********
    #* 资源 REST 相关的接口函数 START
    #********
    /**
     * 用户资源列表数据
     *
     * @param  array $data
     * @param  string $extra
     * @param  string $size 分页大小
     * @return Illuminate\Support\Collection
     */
    public function index($data = [], $extra = '', $size = null)
    {
        if (!ctype_digit($size)) {
            $size = cache('page_size', '10');
        }

        $s_phone = e($data['s_phone']);
        if (!empty($s_phone)) {
            $users = $this->model->where('phone', '=', $s_phone)
                                ->where(function ($query) use ($data) {
                                    $s_name = e($data['s_name']);
                                    if (!empty($s_name)) {
                                        $query->where('username', 'like', '%'.$s_name.'%')
                                              ->orWhere('nickname', 'like', '%'.$s_name.'%')
                                              ->orWhere('realname', 'like', '%'.$s_name.'%');
                                    }
                                })
                                ->paginate($size);
        } else {
            $users = $this->model->where(function ($query) use ($data) {
                                    $s_name = e($data['s_name']);
                                    if (!empty($s_name)) {
                                        $query->where('username', 'like', '%'.$s_name.'%')
                                              ->orWhere('nickname', 'like', '%'.$s_name.'%')
                                              ->orWhere('realname', 'like', '%'.$s_name.'%');
                                    }
                                })
                                ->paginate($size);
        }

        return $users;
    }

    /**
     * 存储用户
     *
     * @param  array $inputs
     * @param  string $extra
     * @return App\User
     */
    public function store($inputs, $extra = '')
    {
        $user = new $this->model;

        $user = $this->saveManager($user, $inputs);

        return $user;
    }

    /**
     * 获取编辑的用户
     *
     * @param  int $id
     * @param  string $extra
     * @return App\User
     */
    public function edit($id, $extra = '')
    {
        $user = $this->model->findOrFail($id);
        return $user;
    }

    /**
     * 更新用户
     *
     * @param  int $id
     * @param  array $inputs
     * @param  string $extra
     * @return void
     */
    public function update($id, $inputs, $extra = '')
    {
        $user = $this->model->findOrFail($id);
        $user = $this->updateManager($user, $inputs);
    }

    /**
     * 更新当前用户资料
     * @param  array $user   当前登录用户信息
     * @param  array $inputs 提交数据
     */
    public function updateUser($user,$inputs)
    {
        $user->nickname = e($inputs['nickname']);
        if (!empty($inputs['mobile'])) {
            $user->mobile = e($inputs['mobile']);
        }
        if ((!empty($inputs['password'])) && (!empty($inputs['password_confirmation']))) {
            $user->password = bcrypt(e($inputs['password']));
        }
        dd($user);
        if ($user->save()) {
            //触发更新个人资料事件，这里将触发事件放置在仓库里可能有些不妥
            //event(new UserUpdate($user));
        }
    }
}
