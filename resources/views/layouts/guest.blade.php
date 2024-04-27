<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
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
<body class=" {{$classes ?? ""}} ">

{{ $slot }}

@yield("scripts")
</body>
</html>
