<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * 系统日志模型
 */
class SystemLogs extends Model
{
    protected $table = 'system_logs';
    protected $fillable = ['user_id', 'type', 'url', 'content', 'operator_ip'];

    /**
     * 记录系统日志
     * @param  array  $data 需要写入的数据
     */
    public function write($data)
    {
        if (is_array($data)) {
            if (array_key_exists('content', $data)) {  //如果操作内容不存在，则拒绝记录系统日志
                $data = array_add($data, 'user_id', 0);  //默认为0，表示操作者为系统
                $data = array_add($data, 'type', 'system');  //默认为系统级操作
                $data = array_add($data, 'url', '-');
                $data = array_add($data, 'operator_ip', app('request')->ip());  //操作者ip
                $this->fill($data);
                return $this->save($data);
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    /**
    * 操作用户
    * 模型对象关系：系统日志对应的操作用户
    *
    * @return Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function user()
    {
        return $this->belongsTo('App\Models\Users', 'user_id', 'id');
    }
}
