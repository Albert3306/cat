<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\UsersRequest;
use App\Repositories\SystemRepository;

/**
 * 系统日志控制器
 */
class LogController extends AdminController
{
    private $system;

    public function __construct(SystemRepository $system)
    {
        parent::__construct();
        $this->system = $system;
        // if (Gate::denies('@log')) {
        //     $this->middleware('deny:403');
        // }
    }

    /**
     * 系统日志列表
     */
    public function index(Request $request)
    {
        $con = $request->all();
        $where = [];
        if (isset($con['type']) && !empty($con['type'])) {
            $where['type'] = $con['type'];
        }
        if (isset($con['name']) && !empty($con['name'])) {
            $where['name'] = $con['name'];
        }
        $system_logs = $this->system->index($where);

        return view('admin.log.index',compact('system_logs'));
    }

    /**
     * 系统日志详情
     */
    public function show($id)
    {
        $sys_log = $this->system->getById($id);
        return view('admin.log.show', compact('sys_log'));
    }
}
