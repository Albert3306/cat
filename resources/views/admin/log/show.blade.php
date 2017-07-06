<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>layer</title>
    <!-- bootstrap & fontawesome -->
    <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="/back/css/main.css" rel="stylesheet"/>
</head>
<body>
<div class="layerForm" style="margin: 10px;">
    <div class="box-header with-border">
        <p>系统日志详情</p>
        <div class="basic_info bg-info">
            <ul>
                <li>ID：<span class="text-muted">{{ $sys_log->id }}</span></li>
                <li>操作者：<span class="text-green">{{ $sys_log->user->username or '--' }} / {{ $sys_log->user->nickname or '--' }}</span></li>
                <li>
                    类型：
                    <span class="text-yellow">
                        {{ dict('log_type.'.$sys_log->type) }}
                    </span>
                </li>
                <li>操作URL：<b>{{ $sys_log->url }}</b></li>
                <li>操作内容：<b class="text-red">{{ $sys_log->content }}</b></li>
                <li>操作时间：<span class="text-info">{{ $sys_log->created_at }}</span></li>
            </ul>
        </div>
    </div><!-- /.box-header -->
</div>
</body>
</html>
