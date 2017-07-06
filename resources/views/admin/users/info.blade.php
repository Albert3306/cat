@extends('admin.layout._back')

@section('content')
    <h3 class="page-title">用户管理 <small>个人资料</small></h3>
    @if(session()->has('message'))
    <div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4>  <i class="icon fa fa-check"></i> 提示！</h4>
        {{ session('message') }}
    </div>
    @endif

    @if($errors->any())
    <div class="alert alert-danger alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-ban"></i> 警告！</h4>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="box box-primary">
        <div class="box-header with-border">
            <p>以下为您作为当前用户的个人资料，您仅可修改个人头像、昵称、真实姓名与登录密码。登录密码项留空，则不修改登录密码。</p>
            <div class="basic_info bg-info">
                <ul>
                    <li>账号：<span class="text-primary">{{ $user->username }}</span></li>
                    <li>昵称：<span class="text-primary">{{ $user->nickname }}</span></li>
                    <li>电子邮件：<span class="text-primary">{{ $user->email }}</span></li>
                    <li>手机号码：<b>{{ $user->mobile }}</b></li>
                </ul>
            </div>
        </div><!-- /.box-header -->

        <form method="post" action="/admin/user" accept-charset="utf-8">
            {!! method_field('put') !!}
            {!! csrf_field() !!}
            <div class="box-body">
                <div class="form-group">
                    <label>昵称 <small class="text-red">*</small></label>
                    <input type="text" class="form-control" name="nickname" value="{{ $user->nickname }}" placeholder="昵称">
                </div>
                <div class="form-group">
                    <label>登录密码 <small>（登录密码只能英文字母 [a-zA-Z]、阿拉伯数字 [0-9]、特殊符号 [~!@#%^&*,.?_-/+=]）</small></label>
                    <input type="password" class="form-control" name="password" value="" autocomplete="off" placeholder="登录密码">
                </div>
                <div class="form-group">
                    <label>确认登录密码</label>
                    <input type="password" class="form-control" name="password_confirmation" value="" autocomplete="off" placeholder="登录密码">
                </div>
                <div class="form-group">
                    <label>手机号码</label>
                    <input type="text" class="form-control" name="mobile" value="{{ $user->mobile }}" placeholder="手机号码">
                </div>
            </div><!-- /.box-body -->

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">修改个人资料</button>
            </div>
        </form>
    </div>
@stop

@section('footer_js')
<script>
$(function () {
    // 导航高亮
    highlight_subnav('/admin/user');
});
</script>
@stop
