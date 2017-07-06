<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * 系统配置模型
 */
class SystemConfig extends Model
{
    protected $table = 'system_config';
    public $timestamps = false;  //关闭自动更新时间戳
}
