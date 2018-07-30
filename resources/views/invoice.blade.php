<page>
    <div id="invoice-template" class="card-body invoice-template">
        <!-- Invoice Company Details -->
        <div id="invoice-company-details" class="row">
            <div class="col-md-6 col-sm-12 text-center text-md-left">
                <div class="media">

                    <div class="media-body">
                        <ul class="ml-2 px-0 list-unstyled">
                            <li class="text-bold-800">{{ config('app.name') }}</li>
                            <li>Kursus Keterampilan Menjahit</li>
                            <li>Jalan Bahagia 01</li>
                            <li>Desa Sangen</li>
                            <li>Kabupaten Madiun, Jawa Timur</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-12 text-center text-md-right">
                <h2>NOTA</h2>
                <p class="pb-3">No. {{ $order->id }}</p>
                <ul class="px-0 list-unstyled">
                    <li>Total Bayar</li>
                    <li class="lead text-bold-800">Rp. {{ number_format($order->total,2) }}</li>
                </ul>
            </div>
        </div>
        <!--/ Invoice Company Details -->
        <!-- Invoice Customer Details -->
        <div id="invoice-customer-details" class="row pt-2">
            <div class="col-sm-12 text-center text-md-left">
                <p class="text-muted">Kepada</p>
            </div>
            <div class="col-md-6 col-sm-12 text-center text-md-left">
                <ul class="px-0 list-unstyled">
                    <li class="text-bold-800">{{ $order->customer->name }}</li>
                    <p>{{ $order->delivery }}</p>

                </ul>
            </div>
            <div class="col-md-6 col-sm-12 text-center text-md-right">
                <p>
                    <span class="text-muted">Tanggal :</span> {{ $order->created_at->format('Y-m-d') }}</p>
            </div>
        </div>
        <!--/ Invoice Customer Details -->
        <!-- Invoice Items Details -->
        <div id="invoice-items-details" class="pt-2">
            <div class="row">
                <div class="table-responsive col-sm-12">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>NO</th>
                            <th>Produk & Deskripsi</th>
                            <th class="text-right">Harga</th>
                            <th class="text-right">Jumlah</th>
                            <th class="text-right">Amount</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($order_details as $index => $od)
                            <tr>
                                <th scope="row">{{ ++$index }}</th>
                                <td>
                                    <p>{{ $od->product->name }}</p>
                                    <p class="text-muted">{{ $od->description }}</p>
                                </td>
                                <td class="text-right">{{ $od->product->price }}</td>
                                <td class="text-right">{{ $od->quantity }}</td>
                                <td class="text-right">
                                    Rp. {{ number_format($od->product->price * $od->quantity, 2) }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-md-7 col-sm-12 text-center text-md-left">
                    <p class="lead">Metode Pembayaran:</p>
                    <div class="row">
                        <div class="col-md-8">
                            <table class="table table-borderless table-sm">
                                <tbody>
                                <tr>
                                    <td>{{ $order->payment->name }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 col-sm-12">
                    <p class="lead">Total</p>
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                            <tr>
                                <td>Sub Total</td>
                                <td class="text-right">{{ number_format($order->total - $order->service_price,2) }}</td>
                            </tr>
                            <tr>
                                <td>Ongkos Kirim</td>
                                <td class="text-right">{{ number_format($order->service_price, 2) }}</td>
                            </tr>
                            <tr>
                                <td>TOTAL</td>
                                <td class="pink text-right">{{ number_format($order->total, 2) }}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="text-center">
                        {{--                                <p>{{ Auth::user()->name }}</p>--}}
                        <img src="admin/app-assets/images/pages/signature-scan.png" alt="signature"
                             class="height-100"
                        />
                        {{--                                <h6>{{ Auth::user()->name }}</h6>--}}
                        <p class="text-muted">Hj. Siti Amiyatin</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Invoice Footer -->
        <div id="invoice-footer">
            <div class="row">
                <div class="col-md-7 col-sm-12">
                    <h6>Hormat Kami</h6>
                    <p>{{ config('app.name') }}</p>
                </div>
                <div class="col-md-5 col-sm-12 text-center">
                </div>
            </div>
        </div>
        <!--/ Invoice Footer -->
    </div>
</page>
