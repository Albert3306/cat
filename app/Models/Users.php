<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * 用户表模型
 */
class Users extends Model
{
    protected $table = 'users';
    protected $fillable = ['id', 'username', 'email', 'mobile', 'nickname', 'login', 'reg_at', 'reg_ip', 'last_login_at', 'last_login_ip', 'is_locked', 'type', 'remember_token', 'updated_at'];
}
