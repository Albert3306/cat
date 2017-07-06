<?php

namespace App\Http\Controllers\Admin;

use Gate;
use App\Cache\DataCache;
use Illuminate\Http\Request;
use App\Repositories\SystemRepository;

class ConfigController extends AdminController
{
    private $system;
    public function __construct(SystemRepository $system)
    {
        parent::__construct();
        $this->system = $system;
    }

    /**
     * 系统配置展示
     */
    public function getConfig()
    {
        $system_config = $this->system->getAllConfig();
        foreach ($system_config as $so) {
            $data[$so['name']] = $so['value'];
        }

        return view('admin.config.index', compact('data'));
    }

    /**
     * 设置系统配置
     */
    public function putConfig(Request $request)
    {
        // if (Gate::denies('option-write')) {
        //     return deny();
        // }

        $data = $request->input('data');
        if ($data && is_array($data)) {
            $this->system->updateConfig($data);
            //更新系统静态缓存
            DataCache::cacheStatic();
            return redirect()->back()->with('message', '成功更新系统配置！');
        } else {
            return redirect()->back()->with('fail', '提交过来的数据异常！');
        }
    }
}
