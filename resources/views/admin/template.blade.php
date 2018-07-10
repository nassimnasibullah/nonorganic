<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Modern admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities with bitcoin dashboard.">
    <meta name="keywords" content="admin template, modern admin template, dashboard template, flat admin template, responsive admin template, web app, crypto dashboard, bitcoin dashboard">
    <meta name="author" content="PIXINVENT">
    <title>Dashboard {{ config('app.name') }}</title>
    <link rel="apple-touch-icon" href="{{ asset("admin/app-assets/images/ico/apple-icon-120.png") }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset("admin/app-assets/images/ico/favicon.ico") }}">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700"
          rel="stylesheet">
    <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css"
          rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset("admin/app-assets/css/vendors.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("admin/app-assets/vendors/css/weather-icons/climacons.min.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("admin/app-assets/fonts/meteocons/style.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("admin/app-assets/vendors/css/charts/morris.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("admin/app-assets/vendors/css/charts/chartist.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("admin/app-assets/vendors/css/charts/chartist-plugin-tooltip.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("admin/app-assets/vendors/css/tables/datatable/datatables.min.css")}}">

    <!-- END VENDOR CSS-->
    <!-- BEGIN MODERN CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset("admin/app-assets/css/app.css") }}">
    <!-- END MODERN CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset("admin/app-assets/css/core/menu/menu-types/vertical-menu-modern.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("admin/app-assets/css/core/colors/palette-gradient.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("admin/app-assets/fonts/simple-line-icons/style.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("admin/app-assets/css/core/colors/palette-gradient.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("admin/app-assets/css/pages/timeline.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("admin/app-assets/css/pages/dashboard-ecommerce.css") }}">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset("admin/assets/css/style.css") }}">
    <!-- END Custom CSS-->
</head>
<body class="vertical-layout vertical-menu-modern 2-columns   menu-expanded fixed-navbar"
      data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">

@include('admin.partials.header')

@include('admin.partials.sidebar')
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
    @yield('content')
        </div>
    </div>
</div>

<!-- ////////////////////////////////////////////////////////////////////////////-->
<footer class="footer footer-static footer-light navbar-border navbar-shadow">
    <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2">
      <span class="float-md-left d-block d-md-inline-block">Copyright &copy; 2018 <a class="text-bold-800 grey darken-2" href="https://themeforest.net/user/pixinvent/portfolio?ref=pixinvent"
                                                                                     target="_blank">{{ config('app.name') }} </a>, All rights reserved. </span>
        <span class="float-md-right d-block d-md-inline-blockd-none d-lg-block">Buatan tangan & Dibuat dengan <i class="ft-heart pink"></i></span>
    </p>
</footer>
<!-- BEGIN VENDOR JS-->
<script src="{{ asset("admin/app-assets/vendors/js/vendors.min.js") }}" type="text/javascript"></script>
<!-- BEGIN VENDOR JS-->
<!-- BEGIN PAGE VENDOR JS-->
<script src="{{ asset("admin/app-assets/vendors/js/charts/chartist.min.js") }}" type="text/javascript"></script>
<script src="{{ asset("admin/app-assets/vendors/js/charts/chartist-plugin-tooltip.min.js") }}"
        type="text/javascript"></script>
<script src="{{ asset("admin/app-assets/vendors/js/charts/raphael-min.js") }}" type="text/javascript"></script>
<script src="{{ asset("admin/app-assets/vendors/js/charts/morris.min.js") }}" type="text/javascript"></script>
<script src="{{ asset("admin/app-assets/vendors/js/timeline/horizontal-timeline.js") }}" type="text/javascript"></script>
<!-- END PAGE VENDOR JS-->
<!-- BEGIN MODERN JS-->
<script src="{{ asset("admin/app-assets/js/core/app-menu.js") }}" type="text/javascript"></script>
<script src="{{ asset("admin/app-assets/js/core/app.js") }}" type="text/javascript"></script>
<script src="{{ asset("admin/app-assets/js/scripts/customizer.js") }}" type="text/javascript"></script>
<!-- END MODERN JS-->
<!-- BEGIN PAGE LEVEL JS-->
<script src="{{ asset("admin/app-assets/js/scripts/pages/dashboard-ecommerce.js") }}" type="text/javascript"></script>
<!-- END PAGE LEVEL JS-->
<script src="{{ asset("admin/app-assets/js/scripts/tables/datatables/datatable-basic.js") }}"></script>
<script src="{{ asset("admin/app-assets/vendors/js/tables/datatable/datatables.min.js") }}" type="text/javascript"></script>

</body>
</html>
