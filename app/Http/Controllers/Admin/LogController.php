<?php

namespace App\Http\Controllers\Admin;

use Gate;
use App\Models\SystemLogs;
use Illuminate\Http\Request;

/**
 * 系统日志控制器
 */
class LogController extends AdminController
{
    private $log_db;

    public function __construct()
    {
        parent::__construct();

        $this->log_db = New SystemLogs;
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

        $system_logs = $this->log_db->getLists($where);
        return view('admin.log.index',compact('system_logs'));
    }

    /**
     * 系统日志详情
     */
    public function show($id)
    {
        $sys_log = $this->log_db->getById($id);
        return view('admin.log.show', compact('sys_log'));
    }
}
