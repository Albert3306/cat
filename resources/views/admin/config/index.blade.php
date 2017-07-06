@extends('admin.layout._back')

@section('content')
<h3 class="page-title">系统管理 <small>系统设置</small></h3>
<div class="row">
    <div class="col-md-12">
        @if(session()->has('fail'))
            <div class="alert alert-warning alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4>  <i class="icon icon fa fa-warning"></i> 提示！</h4>
            {{ session('fail') }}
        </div>
        @endif

        @if(session()->has('message'))
        <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4>  <i class="icon fa fa-check"></i> 提示！</h4>
            {{ session('message') }}
        </div>
        @endif
        <form method="post" action="/admin/seting" accept-charset="utf-8">
            {!! method_field('put') !!}
            {!! csrf_field() !!}
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">网站参数</a></li>
                    <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">系统参数</a></li>
                </ul>
                <div class="tab-content">
                    <p class="text-red">请在超级管理员协助下修改系统配置选项，错误或不合理的修改可能会造成系统运行错误。本表单不对数据做任何校验处理，请务必输入正确与合法的数据。</p>
                    <div class="tab-pane active" id="tab_1">
                        <div class="form-group">
                            <label>网站标题 <small class="text-green">[website_title]</small></label>
                            <input type="text" class="form-control" name="data[website_title]" autocomplete="off" value="{{ $data['website_title'] }}" placeholder="网站标题">
                        </div>
                        <div class="form-group">
                            <label>网站关键词 <small class="text-green">[website_keywords]</small></label>
                            <input type="text" class="form-control" name="data[website_keywords]" autocomplete="off" value="{{ $data['website_keywords'] }}" placeholder="网站关键词，多个词请以英文逗号分隔">
                        </div>
                        <div class="form-group">
                            <label>公司全称 <small class="text-green">[company_full_name]</small></label>
                            <input type="text" class="form-control" name="data[company_full_name]" autocomplete="off" value="{{ $data['company_full_name'] }}" placeholder="公司全称">
                        </div>
                        <div class="form-group">
                            <label>公司简称 <small class="text-green">[company_short_name]</small></label>
                            <input type="text" class="form-control" name="data[company_short_name]" autocomplete="off" value="{{ $data['company_short_name'] }}" placeholder="公司简称">
                        </div>
                        <div class="form-group">
                            <label>公司电话 <small class="text-green">[company_telephone]</small></label>
                            <input type="text" class="form-control" name="data[company_telephone]" autocomplete="off" value="{{ $data['company_telephone'] }}" placeholder="公司电话">
                        </div>
                        <div class="form-group">
                            <label>网站备案号 <small class="text-green">[website_icp]</small></label>
                            <input type="text" class="form-control" name="data[website_icp]" autocomplete="off" value="{{ $data['website_icp'] }}" placeholder="网站备案号">
                        </div>
                        <div class="form-group">
                            <label>后台分页大小 <small class="text-green">[page_size]</small></label>
                            <div class="input-group">
                                <select data-placeholder="后台分页大小" class="chosen-select" style="min-width:200px;" name="data[page_size]">
                                    <option value="10" {{ ($data['page_size'] === "10") ? 'selected':'' }}>10</option>
                                    <option value="15" {{ ($data['page_size'] === "15") ? 'selected':'' }}>15</option>
                                    <option value="20" {{ ($data['page_size'] === "50") ? 'selected':'' }}>20</option>
                                    <option value="25" {{ ($data['page_size'] === "25") ? 'selected':'' }}>25</option>
                                </select>
                            </div>
                        </div>
                    </div><!-- /.tab-pane -->
                    <div class="tab-pane" id="tab_2">
                        <div class="form-group">
                            <label>系统版本号 <small class="text-green">[system_version]</small></label>
                            <input type="text" class="form-control" name="data[system_version]" autocomplete="off" value="{{ $data['system_version'] }}" placeholder="系统版本号">
                        </div>
                        <div class="form-group">
                            <label>系统开发者 <small class="text-green">[system_author]</small></label>
                            <input type="text" class="form-control" name="data[system_author]" autocomplete="off" value="{{ $data['system_author'] }}" placeholder="系统开发者">
                        </div>
                        <div class="form-group">
                            <label>系统开发者网站 <small class="text-green">[system_author_website]</small></label>
                            <input type="text" class="form-control" name="data[system_author_website]" autocomplete="off" value="{{ $data['system_author_website'] }}" placeholder="系统开发者网站">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary" style="margin-left: 15px;">修改系统配置</button>
                </div><!-- /.tab-content -->
            </div>
        </form>
        <div id="layerPreviewPic" class="fn-hide">

        </div>
    </div>
</div>
@stop

@section('extra_plugin')
    <!--引入Chosen组件-->
    @include('admin.scripts.chosen')
@stop

@section('footer_js')
<script type="text/javascript">
$(function(){ 
    // 导航高亮
    highlight_subnav('/admin/seting');
});
</script>
@stop
