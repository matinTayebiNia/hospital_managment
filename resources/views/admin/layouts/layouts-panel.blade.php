<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="fontiran.com:license" content="Y68A9">

    <title>{{env("app_name")}}</title>
    <!-- Bootstrap -->
    <link href="{{asset("/vendor/panel/css/bootstrap.min.css")}}" rel="stylesheet">
    <link href="{{asset("/vendor/panel/css/bootstrap-rtl.min.css")}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{asset("/vendor/panel/css/font-awesome.min.css")}}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{asset("/vendor/panel/css/nprogress.css")}}" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="{{asset("/vendor/panel/css/bootstrap-progressbar-3.3.4.min.css")}}" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{asset("/vendor/panel/css/green.css")}}" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="{{asset("/vendor/panel/css/daterangepicker.css")}}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{asset("/vendor/panel/css/custom.min.css")}}" rel="stylesheet">
    @livewireStyles
</head>
<body class="nav-md">

<div class="container body">
    <div class="main_container">
        <x-sidebar-panel>

        </x-sidebar-panel>
        <!-- top navigation -->
        <x-navigation-panel></x-navigation-panel>
        <!-- /top navigation -->
        <!-- /header content -->
        <!-- page content -->
        {!! $slot !!}
        <!-- /page content -->
        <!-- footer content -->
        <footer class="hidden-print">
            <div class="pull-left">
                {{config("app_name","Laravel")}}
            </div>
            <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
    </div>
</div>

<div id="lock_screen">
    <table>
        <tbody>
        <tr>
            <td>
                <div class="clock"></div>
                <span class="unlock">
                    <span class="fa-stack fa-5x">
                      <i class="fa fa-square-o fa-stack-2x fa-inverse"></i>
                      <i id="icon_lock" class="fa fa-lock fa-stack-1x fa-inverse"></i>
                    </span>
                </span>
            </td>
        </tr>
        </tbody>
    </table>
</div>

<!-- jQuery -->
<script src="{{asset("/vendor/panel/js/jquery.min.js")}}"></script>
<!-- Bootstrap -->
<script src="{{asset("/vendor/panel/js/bootstrap.min.js")}}"></script>
<!-- FastClick -->
<script src="{{asset("/vendor/panel/js/fastclick.js")}}"></script>
<!-- NProgress -->
<script src="{{asset("/vendor/panel/js/nprogress.js")}}"></script>
<!-- bootstrap-progressbar -->
<script src="{{asset("/vendor/panel/js/bootstrap-progressbar.min.js")}}"></script>
<!-- iCheck -->
<script src="{{asset("/vendor/panel/js/icheck.min.js")}}"></script>

<!-- bootstrap-daterangepicker -->
<script src="{{asset("/vendor/panel/js/moment.min.js")}}"></script>

<script src="{{asset("/vendor/panel/js/daterangepicker.js")}}"></script>

<!-- Chart.js -->
<script src="{{asset("/vendor/panel/js/Chart.min.js")}}"></script>
<!-- jQuery Sparklines -->
<script src="{{asset("/vendor/panel/js/jquery.sparkline.min.js")}}"></script>
<!-- gauge.js -->
<script src="{{asset("/vendor/panel/js/gauge.min.js")}}"></script>

<script src="{{asset("/vendor/panel/js/skycons.js")}}"></script>

<!-- Flot -->
<script src="{{asset("/vendor/panel/js/jquery.flot.js")}}"></script>
<script src="{{asset("/vendor/panel/js/jquery.flot.pie.js")}}"></script>
<script src="{{asset("/vendor/panel/js/jquery.flot.time.js")}}"></script>
<script src="{{asset("/vendor/panel/js/jquery.flot.stack.js")}}"></script>
<script src="{{asset("/vendor/panel/js/jquery.flot.resize.js")}}"></script>


<!-- Flot plugins -->
<script src="{{asset("/vendor/panel/js/jquery.flot.orderBars.js")}}"></script>
<script src="{{asset("/vendor/panel/js/jquery.flot.spline.min.js")}}"></script>
<script src="{{asset("/vendor/panel/js/curvedLines.js")}}"></script>

<!-- DateJS -->
<script src="{{asset("/vendor/panel/js/date.min.js")}}"></script>
<!-- JQVMap -->
<script src="{{asset("/vendor/panel/js/jquery.vmap.min.js")}}"></script>
<script src="{{asset("/vendor/panel/js/jquery.vmap.world.js")}}"></script>
<script src="{{asset("/vendor/panel/js/jquery.vmap.sampledata.js")}}"></script>

<!-- Custom Theme Scripts -->
<script src="{{asset("/vendor/panel/js/custom.min.js")}}"></script>

@yield("script")
@livewireScripts
</body>
</html>
