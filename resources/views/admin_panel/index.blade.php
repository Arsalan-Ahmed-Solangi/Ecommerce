@extends('admin_panel/layouts/default')

    {{-- Page title --}}
    @section('title')
        {{ config('app.name') }}
    @parent
@stop

{{-- page level styles --}}

@section('header_styles')
    <!--page level css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/admin_panel_front/vendors/toastr/css/toastr.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/admin_panel_front/vendors/chartist/css/chartist.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/admin_panel_front/vendors/nvd3/css/nv.d3.min.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/admin_panel_front/vendors/morrisjs/morris.css') }}" />

    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/admin_panel_front/vendors/awesomebootstrapcheckbox/css/awesome-bootstrap-checkbox.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/admin_panel_front/vendors/bower-jvectormap/css/jquery-jvectormap-1.2.2.css') }}" />

    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/admin_panel_front/css/custom_css/dashboard1.css') }}" />
    <!--end of page level css-->
@stop

{{-- Page content --}}
@section('content')
        <!--section ends-->
        <section class="content sec-mar">
            <div class="row">
                <div class="col-md-12">
                    <div class="row tiles-row">
                        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 tile-bottom">
                            <div class="canvas-interactive-wrapper1">
                                <canvas id="canvas-interactive1"></canvas>
                                <div class="cta-wrapper1">
                                    <div class="widget" data-count=".num" data-from="0"
                                         data-to="99.9" data-suffix="%" data-duration="2">
                                        <div class="item">
                                            <div class="widget-icon pull-left icon-color animation-fadeIn">
                                                <i class="fa fa-fw fa-shopping-cart fa-size"></i>
                                            </div>
                                        </div>
                                        <div class="widget-count panel-white">
                                            <div class="item-label text-center">
                                                <div id="count-box" class="count-box">119</div>
                                                <span class="title">Today Sales</span>
                                            </div>
                                            <div class="text-center">
                                                <span><i class="fa fa-level-up" aria-hidden="true"></i></span>
                                                <strong>12 more Sales</strong>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 tile-bottom">
                            <div class="widget" data-count=".num" data-from="0"
                                 data-to="512" data-duration="3">
                                <div class="canvas-interactive-wrapper2">
                                    <canvas id="canvas-interactive2"></canvas>
                                    <div class="cta-wrapper2">
                                        <div class="item">
                                            <div class="widget-icon pull-left icon-color animation-fadeIn">
                                                <i class="fa fa-fw fa-paw fa-size"></i>
                                            </div>
                                        </div>
                                        <div class="widget-count panel-white">
                                            <div class="item-label text-center">
                                                <div id="count-box2" class="count-box">316</div>
                                                <span class="title">Daily Visits</span>
                                            </div>
                                            <div class="text-center">
                                                <span><i class="fa fa-level-up" aria-hidden="true"></i></span>
                                                <strong>60 Bounce Rate</strong>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 tile-bottom">
                            <div class="widget" data-suffix="k" data-count=".num"
                                 data-from="0" data-to="310" data-duration="4" data-easing="false">
                                <div class="canvas-interactive-wrapper3">
                                    <canvas id="canvas-interactive3"></canvas>
                                    <div class="cta-wrapper3">
                                        <div class="item">
                                            <div class="widget-icon pull-left icon-color animation-fadeIn">
                                                <i class="fa fa-fw fa-usd fa-size"></i>
                                            </div>
                                        </div>
                                        <div class="widget-count panel-white">
                                            <div class="item-label text-center">
                                                <div id="count-box3" class="count-box">544</div>
                                                <span class="title">Total income</span>
                                            </div>
                                            <div class="text-center">
                                                <span><i class="fa fa-level-up" aria-hidden="true"></i></span>
                                                <strong>120 more income</strong>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 tile-bottom">
                            <div class="widget">
                                <div class="canvas-interactive-wrapper4">
                                    <canvas id="canvas-interactive4"></canvas>
                                    <div class="cta-wrapper4">
                                        <div class="item">
                                            <div class="widget-icon pull-left icon-color animation-fadeIn">
                                                <i class="fa fa-bar-chart-o fa-size"></i>
                                            </div>
                                        </div>
                                        <div class="widget-count panel-white">
                                            <div class="item-label text-center">
                                                <div id="count-box4" class="count-box">1598</div>
                                                <span class="title">Total Sales</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="alert alert-info" style="background-color: #fbfbfd; color: black; font-family: scandia-web,ui-sans-serif,system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji!important; text-align: left;">
                Admin
                <br /><br />{{ date('D d-M-Y H:i:s') }}
            </div>

        </section>
@stop

{{-- page level scripts --}}
@section('footer_scripts')
    <!-- begining of page level js -->
<div id="qn"></div>
<!-- begining of page level js -->
<script src="{{ asset('/assets/admin_panel_front/js/backstretch.js') }}"></script>
<!--sales tiles-->
<script type="text/javascript" src="{{ asset('/assets/admin_panel_front/vendors/countupcircle/js/jquery.countupcircle.js') }}"></script>
<script type="text/javascript" src="{{ asset('/assets/admin_panel_front/vendors/granim/js/granim.min.js') }}"></script>
<!-- end of sales tiles -->
<!-- Flot tab2-->
<script type="text/javascript" src="{{ asset('/assets/admin_panel_front/vendors/flotchart/js/jquery.flot.js') }}" ></script>
<script type="text/javascript" src="{{ asset('/assets/admin_panel_front/vendors/flotchart/js/jquery.flot.resize.js')}}" ></script>
<script type="text/javascript" src="{{ asset('/assets/admin_panel_front/vendors/flotchart/js/jquery.flot.time.js')}}" ></script>
<script type="text/javascript" src="{{ asset('/assets/admin_panel_front/vendors/flotchart/js/jquery.flot.symbol.js')}}" ></script>
<script type="text/javascript" src="{{ asset('/assets/admin_panel_front/vendors/flotchart/js/jquery.flot.pie.js')}}"></script>
<script type="text/javascript" src="{{ asset('/assets/admin_panel_front/vendors/flotchart/js/jquery.flot.stack.js')}}" ></script>
<script type="text/javascript" src="{{ asset('/assets/admin_panel_front/vendors/flot.tooltip/js/jquery.flot.tooltip.js')}}"></script>
<script type="text/javascript" src="{{ asset('/assets/admin_panel_front/vendors/flotspline/js/jquery.flot.spline.min.js')}}" ></script>
<!-- end of flot tab2 -->
<script type="text/javascript" src="{{ asset('/assets/admin_panel_front/vendors/chartist/js/chartist.min.js')}}"></script>
<!--morris donut-->
<script type="text/javascript" src="{{ asset('/assets/admin_panel_front/vendors/morrisjs/morris.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('/assets/admin_panel_front/js/raphael-min.js')}}"></script>
<script type="text/javascript" src="{{ asset('/assets/admin_panel_front/vendors/d3/d3.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('/assets/admin_panel_front/vendors/nvd3/js/nv.d3.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('/assets/admin_panel_front/js/custom_js/stream_layers.js')}}"></script>
<!--maps-->
<script src="{{ asset('/assets/admin_panel_front/vendors/bower-jvectormap/js/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{ asset('/assets/admin_panel_front/vendors/bower-jvectormap/js/jquery-jvectormap-world-mill-en.js')}}"></script>
<!-- end of maps -->
<script type="text/javascript" src="{{ asset('/assets/admin_panel_front/js/dashboard1.js')}}"></script>
    <!-- end of page level js -->
@stop
