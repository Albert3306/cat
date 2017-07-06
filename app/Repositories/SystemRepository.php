<?php

namespace App\Repositories;

use App\Models\SystemLogs;
use App\Models\SystemConfig;

/**
 * 系统相关仓库SystemRepository
 * [包括对系统配置与系统日志模型操作]
 */
class SystemRepository extends BaseRepository
{
    /**
     * The SystemOption instance.
     *
     * @var App\SystemOption
     */
    protected $config;

    /**
     * Create a new RolePermissionRepository instance.
     * @param  App\SystemLog $log
     * @param  App\SystemOption $option
     * @return void
     */
    public function __construct(SystemLogs $log, SystemConfig $config)
    {
        $this->model  = $log;
        $this->config = $config;
    }

    /**
     * 获取所有系统配置
     * @return Illuminate\Support\Collection
     */
    public function getAllConfig()
    {
        $configs = $this->config->all();
        return $configs;
    }

    /**
     * 批量更新系统配置
     * @param  array $data
     * @return void
     */
    public function updateConfig($data)
    {
        $config = new $this->config;
        foreach ($data as $name=>$value) {
            $map = [
                'name' => $name
            ];
            $config->where($map)->update(['value' => e($value)]);
        }
    }

    /**
     * 系统日志资源列表数据
     * @param  array $data
     * @param  array|string $extra
     * @param  string $size 分页大小
     * @return Illuminate\Support\Collection
     */
    public function index($where = [], $extra = '', $size = null)
    {
        if (!ctype_digit($size)) {
            $size = cache('page_size', '10');
        }
        return $this->model->leftJoin('users', 'system_logs.user_id', '=', 'users.id')
                           ->select('system_logs.*', 'username', 'nickname')
                           ->where(function ($query) use ($where) {
                                if (isset($where['name'])) {
                                    $query->where('username', 'like', '%'.e($where['name']).'%');
                                }
                                if (isset($where['type'])) {
                                    $query->where('system_logs.type', $where['type']);
                                }
                            })
                           ->orderBy('created_at', 'desc')
                           ->paginate($size);
    }

    #********
    #* 空写未使用的接口函数update与edit START
    #********
    public function edit($id = 0, $extra = '') {
        return;
    }
    public function update($id = 0, $inputs = [], $extra = '') {
        return;
    }
    public function store($inputs = [], $extra = '') {
        return;
    }
    #********
    #* 空写未使用的接口函数update与edit END
    #********
}
