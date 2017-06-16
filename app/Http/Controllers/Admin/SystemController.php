<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SystemController extends Controller
{
    /**
     * 系统日志列表
     */
    public function log()
    {
        return view('admin.system.log');
    }
}
