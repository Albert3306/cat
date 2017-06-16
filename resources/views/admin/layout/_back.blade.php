@extends('admin.layout._base')

@section('body')
    <div id="wrapper">
        <!-- NAVBAR -->
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="brand">
                <a href="/admin">CAT-ALBERT3306</a>
            </div>
            <div class="container-fluid">
                <div class="navbar-btn">
                    <button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
                </div>
                <div id="navbar-menu">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle icon-menu" data-toggle="dropdown">
                                <i class="lnr lnr-alarm"></i>
                                <span class="badge bg-danger">5</span>
                            </a>
                            <ul class="dropdown-menu notifications">
                                <li><a href="#" class="notification-item"><span class="dot bg-warning"></span>系统空间几乎已满</a></li>
                                <li><a href="#" class="notification-item"><span class="dot bg-danger"></span>你有9个未完成的任务</a></li>
                                <li><a href="#" class="notification-item"><span class="dot bg-success"></span>每月报告可用</a></li>
                                <li><a href="#" class="notification-item"><span class="dot bg-warning"></span>1小时每周例会</a></li>
                                <li><a href="#" class="notification-item"><span class="dot bg-success"></span>您的请求已获批准。</a></li>
                                <li><a href="#" class="more">看到所有的通知</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="/back/images/user.png" class="img-circle" alt="Avatar"> <span>{{ auth()->user()->nickname }}</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="#"><i class="lnr lnr-user"></i><span>个人资料</span></a></li>
                                <li><a href="/admin/seting"><i class="lnr lnr-sync"></i><span>重置密码</span></a></li>
                                <li><a href="/admin/auth/logout"><i class="lnr lnr-power-switch"></i><span>退出登录</span></a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- END NAVBAR -->
        <!-- LEFT SIDEBAR -->
        <div id="sidebar-nav" class="sidebar">
            <div class="sidebar-scroll">
                <nav>
                    <ul class="nav">
                        <li><a href="/admin"><i class="lnr lnr-home"></i> <span>首页</span></a></li>
                        <li>
                            <a href="#subDemo" data-toggle="collapse" class="collapsed"><i class="lnr lnr-file-empty"></i> <span>开发演示</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
                            <div id="subDemo" class="collapse">
                                <ul class="nav">
                                    <li><a href="/admin/demo/icons"><i class="lnr lnr-screen"></i><span>Icons</span></a></li>
                                    <li><a href="/admin/demo/charts"><i class="lnr lnr-chart-bars"></i><span>Charts</span></a></li>
                                    <li><a href="/admin/demo/panels"><i class="lnr lnr-layers"></i><span>Panels</span></a></li>
                                    <li><a href="/admin/demo/tables"><i class="lnr lnr-list"></i><span>Tables</span></a></li>
                                    <li><a href="/admin/demo/notice"><i class="lnr lnr-alarm"></i><span>Notice</span></a></li>
                                    <li><a href="/admin/demo/elements"><i class="lnr lnr-select"></i><span>Elements</span></a></li>
                                    <li><a href="/admin/demo/typography"><i class="fa fa-code"></i><span>Typography</span></a></li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <a href="#subSystem" data-toggle="collapse" class="collapsed"><i class="lnr lnr-cog"></i> <span>系统管理</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
                            <div id="subSystem" class="collapse">
                                <ul class="nav">
                                    <li><a href="/admin/seting"><i class="fa fa-wrench"></i> <span>系统设置</span></a></li>
                                    <li><a href="/admin/log"><i class="fa fa-file-text-o"></i> <span>系统日志</span></a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- END LEFT SIDEBAR -->
        <!-- MAIN -->
        @section('content')
        @show{{-- 内容主体区域 --}}
        <!-- END MAIN -->
    </div>
@stop

@section('footer')
    <!-- jQuery 2.1.3 -->
    <script src="/vendor/jquery/jquery.min.js" type="text/javascript"></script>
    <!-- Bootstrap 3.3.7 JS -->
    <script src="/vendor/bootstrap/js/bootstrap.js" type="text/javascript"></script>
    <script src="/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <script src="/back/js/common.js"></script>

    @section('footer_js')
    @show{{-- 自定义js文件 --}}
@stop
