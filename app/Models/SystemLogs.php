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
     * 根据条件获取系统日志，带分页
     * @param  array   $where 查询条件
     * @param  integer $size  分页大小
     */
    public function getLists($where, $size = null)
    {
        if (!$size) {
            $size = cache('page_size', '15');
        }

        return $this->leftJoin('users', 'system_logs.user_id', '=', 'users.id')
                    ->select('system_logs.*', 'nickname', 'username')
                    ->where(function ($query) use ($where) {
                        if (isset($where['type'])) {
                            $query->where('system_logs.type', $where['type']);
                        }
                        if (isset($where['name'])) {
                            $query->where('username', 'like', '%'.e($where['name']).'%');
                        }
                    })
                    ->orderBy('created_at', 'desc')
                    ->paginate($size);
    }

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
     * 根据数据 ID 获取日志详情数据
     * @param  integer $id 数据 ID
     */
    public function getById($id)
    {
        return $this->leftJoin('users', 'system_logs.user_id', '=', 'users.id')->where('system_logs.id','=',$id)->first(['system_logs.*','nickname','username']);
    }
}
