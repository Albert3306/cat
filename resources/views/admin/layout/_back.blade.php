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
                                <li><a href="/admin/log"><i class="lnr lnr-cog"></i><span>系统管理</span></a></li>
                                <li><a href="/admin/auth/logout"><i class="lnr lnr-exit"></i><span>退出登录</span></a></li>
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
                        <li><a href="/admin" class="active"><i class="lnr lnr-home"></i> <span>控制台</span></a></li>
                        <li>
                            <a href="#subDemo" data-toggle="collapse" class="collapsed"><i class="lnr lnr-file-empty"></i> <span>开发演示</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
                            <div id="subDemo" class="collapse">
                                <ul class="nav">
                                    <li><a href="/admin/demo/typography">Typography</a></li>
                                    <li><a href="/admin/demo/elements">Elements</a></li>
                                    <li><a href="/admin/demo/tables">Tables</a></li>
                                    <li><a href="/admin/demo/notice">Notice</a></li>
                                    <li><a href="/admin/demo/panels">Panels</a></li>
                                    <li><a href="/admin/demo/charts">Charts</a></li>
                                    <li><a href="/admin/demo/icons">Icons</a></li>
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
