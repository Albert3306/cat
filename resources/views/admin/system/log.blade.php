@extends('admin.layout._back')

@section('content')
    <div class="main">
        <!-- MAIN CONTENT -->
        <div class="main-content">
            <div class="container-fluid">
                <h3 class="page-title">系统管理 <small>系统日志</small></h3>
                <div class="row">
                    <div class="col-md-12">
                        <!-- BASIC TABLE -->
                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title">日志列表</h3>
                            </div>
                            <div class="panel-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>查阅</th>
                                            <th>类型</th>
                                            <th>操作者</th>
                                            <th>操作者IP</th>
                                            <th>操作URL</th>
                                            <th>操作内容</th>
                                            <th>操作时间</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-red">1</td>
                                            <td class="text-green">Steve</td>
                                            <td class="text-yellow">Jobs</td>
                                            <td class="overflow-hidden">@steve</td>
                                            <td class="overflow-hidden">@steve</td>
                                            <td>@steve</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- END BASIC TABLE -->
                    </div>
                </div>
            </div>
        </div>
        <!-- END MAIN CONTENT -->
    </div>
@stop

@section('footer_js')
<script type="text/javascript">
$(function () {
    // 导航高亮
    highlight_subnav('/admin/log');
});
</script>
@stop
