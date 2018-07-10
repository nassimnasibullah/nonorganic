@extends('admin.template')

@section('content')

    <!-- eCommerce statistic -->
    <div class="row">
        <div class="col-xl-3 col-lg-6 col-12">
            <div class="card pull-up">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="media-body text-left">
                                <h3 class="info">{{ $laku[0]->laku }}</h3>
                                <h6>Products Terjual</h6>
                            </div>
                            <div>
                                <i class="icon-basket-loaded info font-large-2 float-right"></i>
                            </div>
                        </div>
                        <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                            <div class="progress-bar bg-gradient-x-info" role="progressbar" style="width: 80%"
                                 aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-12">
            <div class="card pull-up">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="media-body text-left">
                                <h3 class="warning">Rp. {{  number_format($orders->sum('total'),2) }}</h3>
                                <h6>Pendapatan</h6>
                            </div>
                            <div>
                                {{--<i class="icon-pie-chart warning font-large-2 float-right"></i>--}}
                            </div>
                        </div>
                        <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                            <div class="progress-bar bg-gradient-x-warning" role="progressbar" style="width: 65%"
                                 aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-12">
            <div class="card pull-up">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="media-body text-left">
                                <h3 class="success">{{ $customers->count() }}</h3>
                                <h6>Pelanggan</h6>
                            </div>
                            <div>
                                <i class="icon-user-follow success font-large-2 float-right"></i>
                            </div>
                        </div>
                        <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                            <div class="progress-bar bg-gradient-x-success" role="progressbar" style="width: 75%"
                                 aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-12">
            <div class="card pull-up">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="media-body text-left">
                                <h3 class="danger">{{ $products->count() }}</h3>
                                <h6>Produk</h6>
                            </div>
                            <div>
                                <i class="icon-heart danger font-large-2 float-right"></i>
                            </div>
                        </div>
                        <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                            <div class="progress-bar bg-gradient-x-danger" role="progressbar" style="width: 85%"
                                 aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ eCommerce statistic -->


    <!-- Recent Transactions -->
    <div class="row">
        <div id="recent-transactions" class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Transaksi Terbaru</h4>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a class="btn btn-sm btn-danger box-shadow-2 round btn-min-width pull-right"
                                   href="{{ url('admin/sales') }}" target="_blank">Lihat Semua Transaksi</a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-content">
                    <div class="table-responsive">
                        <table id="recent-orders" class="table table-hover table-xl mb-0">
                            <thead>
                            <tr>
                                <th class="border-top-0">Status</th>
                                <th class="border-top-0">ID</th>
                                <th class="border-top-0">Nama Pelanggan</th>
                                <th class="border-top-0">Pembayaran</th>
                                <th class="border-top-0">Kurir</th>
                                <th class="border-top-0">Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($order_all as $index => $order)
                                <tr>
                                    @if($order->status == 0)
                                        <td class="text-truncate"><i class="la la-dot-circle-o warning font-medium-1 mr-1"></i>Pending</td>
                                    @elseif($order->status == 1)
                                        <td class="text-truncate"><i class="la la-dot-circle-o success font-medium-1 mr-1"></i>Lunas</td>
                                    @else
                                        <td class="text-truncate"><i class="la la-dot-circle-o danger font-medium-1 mr-1"></i>Ditolak</td>
                                    @endif
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
    <!--/ Recent Transactions -->
@endsection
