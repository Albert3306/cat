@extends('admin.layout._base')

@section('body')
    <div id="wrapper">
        <div class="vertical-align-wrap">
            <div class="vertical-align-middle">
                <div class="auth-box">
                    <div class="content">
                        <div class="header">
                            <p class="lead">登录您的CAT</p>
                        </div>
                        @if (count($errors) > 0)
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h4><i class="icon fa fa-ban"></i> 警告!</h4>
                            <p>{!! $errors->first('attempt') !!}</p>
                        </div>
                        @endif
                        <form class="form-auth-small" method="post" action="/admin/auth/login" accept-charset="utf-8">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <input type="text" class="form-control" maxlength="20" name="username" placeholder="账号" autocomplete="new-username">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" maxlength="20" name="password" placeholder="密码" autocomplete="new-password">
                            </div>
                            <div class="form-group clearfix">
                                <label class="fancy-checkbox element-left">
                                    <input type="checkbox" name="checkbox">
                                    <span>记住密码</span>
                                </label>
                            </div>
                            <button type="submit" class="btn btn-primary btn-lg btn-block">登录</button>
                        </form>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('footer')
    <!-- jQuery 2.1.3 -->
    <script src="/vendor/jquery/jquery.min.js" type="text/javascript"></script>
    <!-- Bootstrap 3.3.7 JS -->
    <script src="/vendor/bootstrap/js/bootstrap.js" type="text/javascript"></script>
@stop
