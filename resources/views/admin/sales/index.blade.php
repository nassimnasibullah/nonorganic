{{--@extends('admin.template')--}}

{{--@section('content')--}}

    {{--<!-- Recent Transactions -->--}}
    {{--<div class="row">--}}
        {{--<div id="recent-transactions" class="col-12">--}}
            {{--<div class="card">--}}
                {{--<div class="card-header">--}}
                    {{--<h4 class="card-title">Transaksi Penjualan</h4>--}}
                    {{--<a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>--}}
                    {{--<div class="heading-elements">--}}

                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="card-content">--}}
                    {{--<div class="table-responsive">--}}
                        {{--<table id="recent-orders" class="table dataex-visibility-print table-hover table-xl mb-0">--}}
                            {{--<thead>--}}
                            {{--<tr>--}}
                                {{--<th class="border-top-0">Status</th>--}}
                                {{--<th class="border-top-0">ID</th>--}}
                                {{--<th class="border-top-0">Nota</th>--}}
                                {{--<th class="border-top-0">Nama Pelanggan</th>--}}
                                {{--<th class="border-top-0">Pembayaran</th>--}}
                                {{--<th class="border-top-0">Kurir</th>--}}
                                {{--<th class="border-top-0">Total</th>--}}
                            {{--</tr>--}}
                            {{--</thead>--}}
                            {{--<tbody>--}}
                            {{--@foreach($orders as $index => $order)--}}
                            {{--<tr>--}}
                                {{--@if($order->status == 0)--}}
                                    {{--<td class="text-truncate"><i class="la la-dot-circle-o warning font-medium-1 mr-1"></i>Pending</td>--}}
                                {{--@elseif($order->status == 1)--}}
                                    {{--<td class="text-truncate"><i class="la la-dot-circle-o success font-medium-1 mr-1"></i>Lunas</td>--}}
                                {{--@else--}}
                                    {{--<td class="text-truncate"><i class="la la-dot-circle-o danger font-medium-1 mr-1"></i>Ditolak</td>--}}
                                {{--@endif--}}
                                    {{--<td class="text-truncate"><a href="{{ url('admin/sales/'. $order->id) }}">{{ $order->id }}</a></td>--}}
                                    {{--<td class="text-truncate"><a href="{{ url('admin/sales/'. $order->id. '/edit') }}">{{ $order->id }}</a></td>--}}
                                    {{--<td class="text-truncate">--}}
                                    {{--<span>{{ $order->customer->name }}</span>--}}
                                {{--</td>--}}

                                {{--<td>--}}
                                    {{--<button type="button" class="btn btn-sm btn-outline-danger round">{{ $order->payment->name }}</button>--}}
                                {{--</td>--}}
                                {{--<td class="text-truncate">{{ $order->courier->name }}</td>--}}
                                {{--<td class="text-truncate">{{ $order->total }}</td>--}}
                            {{--</tr>--}}
                                {{--@endforeach--}}
                            {{--</tbody>--}}
                        {{--</table>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
    {{--<!--/ Recent Transactions -->--}}
{{--@endsection--}}


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
    <link rel="stylesheet" type="text/css" href="{{ asset("admin/app-assets/vendors/css/tables/datatable/datatables.min.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("admin/app-assets/vendors/css/tables/extensions/buttons.dataTables.min.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("admin/app-assets/vendors/css/tables/datatable/buttons.bootstrap4.min.css") }}">
    <!-- END VENDOR CSS-->
    <!-- BEGIN MODERN CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset("admin/app-assets/css/app.css") }}">
    <!-- END MODERN CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset("admin/app-assets/css/core/menu/menu-types/vertical-menu-modern.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("admin/app-assets/css/core/colors/palette-gradient.css") }}">
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
            <!-- Print button table -->
            <section id="print">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Transaksi Penjualan</h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                        <li><a data-action="close"><i class="ft-x"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-content collapse show">
                                <a href="{{ url('admin/generateSalesReport') }}" class="btn btn-success" style="margin-left: 37px;">Export</a>
                                <div class="card-body card-dashboard">

                                    <table class="table table-striped table-bordered dataex-visibility-print">
                                        <thead>
                                        <tr>
                                            <th class="border-top-0">Status</th>
                                            <th class="border-top-0">ID</th>
                                            <th class="border-top-0">Nota</th>
                                            <th class="border-top-0">Nama Pelanggan</th>
                                            <th class="border-top-0">Pembayaran</th>
                                            <th class="border-top-0">Kurir</th>
                                            <th class="border-top-0">Total</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($orders as $index => $order)
                                        <tr>
                                        @if($order->status == 0)
                                        <td class="text-truncate"><i class="la la-dot-circle-o warning font-medium-1 mr-1"></i>Pending</td>
                                        @elseif($order->status == 1)
                                        <td class="text-truncate"><i class="la la-dot-circle-o success font-medium-1 mr-1"></i>Lunas</td>
                                        @else
                                        <td class="text-truncate"><i class="la la-dot-circle-o danger font-medium-1 mr-1"></i>Ditolak</td>
                                        @endif
                                        <td class="text-truncate"><a href="{{ url('admin/sales/'. $order->id) }}">{{ $order->id }}</a></td>
                                        <td class="text-truncate"><a href="{{ url('admin/sales/'. $order->id. '/edit') }}">{{ $order->id }}</a></td>
                                        <td class="text-truncate">
                                        <span>{{ $order->customer->name }}</span>
                                        </td>

                                        <td>
                                        <button type="button" class="btn btn-sm btn-outline-danger round">{{ $order->payment->name }}</button>
                                        </td>
                                        <td class="text-truncate">{{ $order->courier->name }}</td>
                                        <td class="text-truncate">{{ $order->total }}</td>
                                        </tr>
                                        @endforeach
                                        </tbody>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--/ Print button table -->

            <!--/ Customization of the print view window -->
        </div>
    </div>
</div>
<!-- ////////////////////////////////////////////////////////////////////////////-->
<footer class="footer footer-static footer-light navbar-border navbar-shadow">
    <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2">
      <span class="float-md-left d-block d-md-inline-block">Copyright &copy; 2018 <a class="text-bold-800 grey darken-2" href="https://themeforest.net/user/pixinvent/portfolio?ref=pixinvent"
                                                                                     target="_blank">{{config('app.name')}} </a>, All rights reserved. </span>
        <span class="float-md-right d-block d-md-inline-blockd-none d-lg-block">Hand-crafted & Made with <i class="ft-heart pink"></i></span>
    </p>
</footer>
<!-- BEGIN VENDOR JS-->
<script src="{{ asset("admin/app-assets/vendors/js/vendors.min.js") }}" type="text/javascript"></script>
<!-- BEGIN VENDOR JS-->
<!-- BEGIN PAGE VENDOR JS-->
<script src="{{ asset("admin/app-assets/vendors/js/tables/datatable/datatables.min.js") }}" type="text/javascript"></script>
<script src="{{ asset("admin/app-assets/vendors/js/tables/datatable/dataTables.buttons.min.js") }}"
        type="text/javascript"></script>
<script src="{{ asset("admin/app-assets/vendors/js/tables/datatable/buttons.bootstrap4.min.js") }}"
        type="text/javascript"></script>
<script src="{{ asset("admin/app-assets/vendors/js/tables/buttons.colVis.min.js") }}" type="text/javascript"></script>
<script src="{{ asset("admin/app-assets/vendors/js/tables/buttons.print.min.js") }}" type="text/javascript"></script>
<script src="{{ asset("admin/app-assets/vendors/js/tables/datatable/dataTables.select.min.js") }}"
        type="text/javascript"></script>
<!-- END PAGE VENDOR JS-->
<!-- BEGIN MODERN JS-->
<script src="{{ asset("admin/app-assets/js/core/app-menu.js") }}" type="text/javascript"></script>
<script src="{{ asset("admin/app-assets/js/core/app.js") }}" type="text/javascript"></script>
<script src="{{ asset("admin/app-assets/js/scripts/customizer.js") }}" type="text/javascript"></script>
<!-- END MODERN JS-->
<!-- BEGIN PAGE LEVEL JS-->
<script src="{{ asset("admin/app-assets/js/scripts/tables/datatables-extensions/datatable-button/datatable-print.js") }}"
        type="text/javascript"></script>
<!-- END PAGE LEVEL JS-->
</body>
</html>

