<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if($this->segment(2) == 'user'){ // 修改个人资料
            $rules = [
                'nickname'              => 'required|alpha_dash|min:2|max:32',
                'mobile'                => 'size:11|regex:/^1[34578][0-9]{9}$/i|unique:users,mobile,'.auth()->user()->id,  // 排除当前用户 id
                'password'              => 'min:6|max:16|regex:/^[a-zA-Z0-9~!@#%^&*,.?_-/+=]{6,16}$/i',  // 登录密码只能英文字母[a-zA-Z]、阿拉伯数字[0-9]、特殊符号[~!@#%^&*,.?_-/+=]
                'password_confirmation' => 'same:password',
            ];
        } else if ($this->segment(3)) { // update
            $rules = [
                'nickname'              => 'required|alpha_dash|min:4|max:32',
                'password'              => 'min:6|max:16|regex:/^[a-zA-Z0-9~@#%_]{6,16}$/i',  // 登录密码只能英文字母[a-zA-Z]、阿拉伯数字[0-9]、特殊符号[~!@#%^&*,.?_-/+=]
                'password_confirmation' => 'same:password',
                'role'                  => 'required|exists:roles,id',
                'is_locked'             => 'required|boolean',
            ];
        } else { // store
            $rules = [
                'username'                 => 'required|min:4|max:32|eng_alpha_num|unique:users,username',
                'nickname'                 => 'required|alpha_dash|min:4|max:32',
                'password'                 => 'required|min:6|max:16|regex:/^[a-zA-Z0-9~!@#%^&*,.?_-/+=]{6,16}$/i',  // 登录密码只能英文字母[a-zA-Z]、阿拉伯数字[0-9]、特殊符号[~!@#%^&*,.?_-/+=]
                'password_confirmation'    => 'required|same:password',
                'role'                     => 'required|exists:roles,id',
                'email'                    => 'required|email|unique:users,email',
                'mobile'                   => 'size:11|regex:/^1[34578][0-9]{9}$/i|unique:users,mobile',
            ];
        }
        return $rules;
    }

    /**
     * 自定义验证信息
     *
     * @return array
     */
    public function messages()
    {
        return [
            'nickname.required'   => '请填写昵称',
            'nickname.alpha_dash' => '昵称包含特殊字符',
            'nickname.min'        => '昵称过短，长度不得少于2',
            'nickname.max'        => '昵称过长，长度不得超出32',

            'username.unique'        => '此登录名已存在，请尝试其它名字组合',
            'username.required'      => '请填写登录名',
            'username.max'           => '登录名过长，长度不得超出32',
            'username.min'           => '登录名过短，长度不得少于4',
            'username.eng_alpha_num' => '登录名只能阿拉伯数字与英文字母组合',
            'username.unique'        => '此登录名已存在，请尝试其它名字组合',

            'password.required'              => '请填写登录密码',
            'password.min'                   => '密码长度不得少于6',
            'password.max'                   => '密码长度不得超出16',
            'password.regex'                 => '密码包含非法字符，只能为英文字母[a-zA-Z]、阿拉伯数字[0-9]与特殊符号[~!@#%^&*,.?_-/+=]组合',
            'password_confirmation.required' => '请填写确认密码',
            'password_confirmation.same'     => '2次密码不一致',

            'role.required' => '请选择角色（用户组）',
            'role.exists'   => '系统不存在该角色（用户组）',

            'email.required' => '请填写邮箱地址',
            'email.email'    => '请填写正确合法的邮箱地址',
            'email.unique'   => '此邮箱地址已存在于系统，不能再进行二次关联',

            'mobile.size'    => '国内的手机号码长度为11位',
            'mobile.regex'   => '请填写合法的手机号码',
            'mobile.unique'  => '此手机号码已存在，请重新输入',

            'is_locked.required' => '请选择用户状态',
            'is_locked.boolean'  => '用户状态必须为布尔值',
        ];
    }
}
