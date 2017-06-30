@extends('admin.layout._back')

@section('content')
<h3 class="page-title">系统管理 <small>系统日志</small></h3>
<div class="row">
    <div class="col-md-12">
        <!-- BASIC TABLE -->
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">日志列表</h3>
                <div class="box-tools">
                    <form action="/admin/log" method="get" class="form-inline">
                        <div class="form-group">
                            <select data-placeholder="选择类型 ..." class="form-control input-sm chosen-select" name="type">
                                <option value="">选择类型</option>
                                @foreach (dict('log_type') as $k => $v)
                                <option value="{{ $k }}" {{ (request('type') == $k) ? 'selected' : '' }}>{{ $v }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control input-sm pull-right" name="name" value="{{ request('name') }}" style="width: 150px;" placeholder="搜索操作者账号">
                        </div>

                        <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                    </form>
                </div>
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
                        @foreach ($system_logs as $sys_log)
                        <tr>
                            <td>
                                <a href="/admin/log/{{ $sys_log->id }}" class="layer_open" data-title="查看" data-width="400"><i class="fa fa-link" title="查看"></i></a>
                            </td>
                            <td class="text-red">{{ dict('log_type.'.$sys_log->type) }}</td>
                            <td class="text-green">{{ $sys_log->username or '--' }} / {{ $sys_log->nickname or '--' }}</td>
                            <td class="text-yellow">{{ $sys_log->operator_ip }}</td>
                            <td class="overflow-hidden" title="{{ $sys_log->url }}">{{ $sys_log->url }}</td>
                            <td class="overflow-hidden" title="{{ $sys_log->content }}">{{ $sys_log->content }}</td>
                            <td>{{ $sys_log->created_at }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="box-footer clearfix">
                {!! $system_logs->appends([
                    'type' => request('type'),
                    's_operator_realname' => request('s_operator_realname'),
                    's_operator_ip' => request('s_operator_ip'),
                  ])->render(); !!}
            </div>
        </div>
        <!-- END BASIC TABLE -->
    </div>
</div>
@stop

@section('footer_js')
<script type="text/javascript" src="/vendor/layer/layer.js"></script>
<script type="text/javascript">
$(function () {
    // 导航高亮
    highlight_subnav('/admin/log');

    $('a.layer_open').on('click', function(evt){
        evt.preventDefault();
        var that = this;
        var src = $(this).attr("href");
        var title = $(this).data('title');
        layer.tips('这是你当前查看的日志', that);
        layer.open({
            type: 2,
            title: title,
            shadeClose: false,
            shade: 0,
            area: ['600px', '360px'],
            content: src //iframe的url
        });
    });
});
</script>
@stop
