@extends('admin.layout._back')

@section('head_css')
<link rel="stylesheet" href="/vendor/chartist/css/chartist-custom.css">
@stop

@section('content')
<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <!-- OVERVIEW -->
            <div class="panel panel-headline">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="metric">
                                <span class="icon"><i class="fa fa-download"></i></span>
                                <p>
                                    <span class="number">1,252</span>
                                    <span class="title">Downloads</span>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="metric">
                                <span class="icon"><i class="fa fa-shopping-bag"></i></span>
                                <p>
                                    <span class="number">203</span>
                                    <span class="title">Sales</span>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="metric">
                                <span class="icon"><i class="fa fa-eye"></i></span>
                                <p>
                                    <span class="number">274,678</span>
                                    <span class="title">Visits</span>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="metric">
                                <span class="icon"><i class="fa fa-bar-chart"></i></span>
                                <p>
                                    <span class="number">35%</span>
                                    <span class="title">Conversions</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-9">
                            <div id="headline-chart" class="ct-chart"></div>
                        </div>
                        <div class="col-md-3">
                            <div class="weekly-summary text-right">
                                <span class="number">2,315</span> <span class="percentage"><i class="fa fa-caret-up text-success"></i> 12%</span>
                                <span class="info-label">Total Sales</span>
                            </div>
                            <div class="weekly-summary text-right">
                                <span class="number">$5,758</span> <span class="percentage"><i class="fa fa-caret-up text-success"></i> 23%</span>
                                <span class="info-label">Monthly Income</span>
                            </div>
                            <div class="weekly-summary text-right">
                                <span class="number">$65,938</span> <span class="percentage"><i class="fa fa-caret-down text-danger"></i> 8%</span>
                                <span class="info-label">Total Income</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT -->
</div>
@stop

@section('footer_js')
<script src="/vendor/chartist/js/chartist.min.js"></script>
<script>
$(function () {
    var data, options;

    // headline charts
    data = {
        labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
        series: [
            [23, 29, 24, 40, 25, 24, 35],
            [14, 25, 18, 34, 29, 38, 44],
        ]
    };

    options = {
        height: 300,
        showArea: true,
        showLine: false,
        showPoint: false,
        fullWidth: true,
        axisX: {
            showGrid: false
        },
        lineSmooth: false,
    };
    new Chartist.Line('#headline-chart', data, options);
});
</script>
@stop
