<?php

namespace App\Http\Controllers\Desktop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * 前端入口控制器
 */
class IndexController extends Controller
{
    /**
     * 首页
     */
    public function index()
    {
        return view('desktop.index');
    }
}
