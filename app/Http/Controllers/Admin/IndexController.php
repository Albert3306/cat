<?php

namespace App\Http\Controllers\Admin;

class IndexController extends AdminController
{
    /**
     * 后台首页
     */
    public function index()
    {
        return view('admin.index.index');
    }
}
