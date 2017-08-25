@section('hacker_header')
<!-- 
  _____           _________ 
 / ____|    /\   |___   ___|
| |        /  \      | |
| |       / /\ \     | |
| |____  / ____ \    | |
 \_____|/_/    \_\   |_|
 -->

@show{{-- 黑客头部申明区域 --}}
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>@section('title') CAT - ALBERT3306 @show{{-- 页面标题 --}}</title>
    <link rel="shortcut icon" href="/images/favicon.ico" type="image/x-icon">{{-- favicon --}}
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link rel="stylesheet" href="/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/vendor/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="/vendor/linearicons/style.css">
    <link rel="stylesheet" href="/back/css/main.css">

    @section('head_css')
    @show{{-- head区域css样式表 --}}

    @section('head_js')
    @show{{-- head区域javscript脚本 --}}
</head>
<body>
    @section('body')
    @show{{-- 正文部分 --}}

    @section('footer')
    @show{{-- 底部部分 --}}

</body>
</html>

@section('hacker_footer')

<!--
    ____                                   __   __             __                                __
   / __ \____ _      _____  ________  ____/ /  / /_  __  __   / /   ____ __________ __   _____  / /
  / /_/ / __ \ | /| / / _ \/ ___/ _ \/ __  /  / __ \/ / / /  / /   / __ `/ ___/ __ `/ | / / _ \/ / 
 / ____/ /_/ / |/ |/ /  __/ /  /  __/ /_/ /  / /_/ / /_/ /  / /___/ /_/ / /  / /_/ /| |/ /  __/ /  
/_/    \____/|__/|__/\___/_/   \___/\__,_/  /_.___/\__, /  /_____/\__,_/_/   \__,_/ |___/\___/_/   
                                                  /____/                                           

Powered by Laravel 
v5.4.x
-->
@show{{-- 黑客尾部申明区域 --}}
