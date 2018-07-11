@extends('frontend.template')

@section('content')


    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active">Keranjang Belanja</li>
                </ol>
                @if (session()->has('success_message'))
                    <div class="alert alert-success">
                        {{ session()->get('success_message') }}
                    </div>
                @endif

                @if (session()->has('error_message'))
                    <div class="alert alert-danger">
                        {{ session()->get('error_message') }}
                    </div>
                @endif
            </div>
            @if (sizeof(Cart::content()) > 0)
                <div class="table-responsive cart_info">
                    <table class="table table-condensed">
                        <thead>
                        <tr class="cart_menu">
                            <td class="image">Produk</td>
                            <td class="description"></td>
                            <td class="price">Harga</td>
                            <td class="quantity">Jumlah</td>
                            <td class="total">Total</td>
                            <td></td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach (Cart::content() as $item)
                            <tr>
                                <td class="cart_product">
                                    <a href=""><img src="{{ asset("images/products/".$item->model->image) }}"
                                                    alt=""></a>
                                </td>
                                <td class="cart_description">
                                    <h4><a href="">{{ $item->name }}</a></h4>
                                </td>
                                <td class="cart_price">
                                    <p>Rp. {{ number_format($item->price,2) }}</p>
                                </td>
                                <td>
                                    <select class="quantity" name="quantity" id="quantity" data-id="{{ $item->rowId }}">
                                        {{--for($i=1; $i<100; $i++) {--}}
                                        {{----}}
                                        {{--}--}}
                                        @for($i=1; $i<100; $i++)
                                            <option {{ $item->qty == $i ? 'selected' : '' }}>{{ $i }}</option>
                                        @endfor
                                        {{--<option {{ $item->qty == 2 ? 'selected' : '' }}>2</option>--}}
                                        {{--<option {{ $item->qty == 3 ? 'selected' : '' }}>3</option>--}}
                                        {{--<option {{ $item->qty == 4 ? 'selected' : '' }}>4</option>--}}
                                        {{--<option {{ $item->qty == 10 ? 'selected' : '' }}>10</option>--}}
                                    </select>
                                </td>
                                <td class="cart_total">
                                    <p class="cart_total_price">Rp. {{ $item->subtotal }}</p>
                                </td>
                                <td class="cart_delete">
                                    <a class="cart_quantity_delete" href="{{ url('/admin/logout') }}"
                                       onclick="event.preventDefault();
                                   document.getElementById('delete-item').submit();"><i class="fa fa-times"></i></a>

                                    <form id="delete-item" action="{{ url('customer/cart', [$item->rowId]) }}"
                                          method="POST" class="side-by-side">
                                        {!! csrf_field() !!}
                                        <input type="hidden" name="_method" value="DELETE">
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </section> <!--/#cart_items-->

    <section id="do_action">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="chose_area">

                        <ul class="user_info">
                            <h4>Pengiriman</h4>
                            <li class="single_field">
                                <label>Negara:</label>
                                <select name="country" class="country" id="country">
                                    <option value="Indonesia">Indonesia</option>

                                </select>

                            </li>
                            <li class="single_field">
                                <label>Wilayah:</label>
                                <select name="region" class="region" id="region">
                                    <option>--pilih provinsi--</option>
                                    @foreach($provinces['results'] as $province)
                                        <option value="{{ $province['province_id'] }}"
                                                data-region="{{$province['province']}}">{{ $province['province'] }}</option>
                                    @endforeach
                                </select>

                            </li>
                            <li class="city single_field">
                                <label>Kota:</label>
                                <select name="city" class="city" id="city">
                                {{--@foreach($cities['results'] as $city)--}}
                                    <option value="">NA</option>
                                {{--<option value="{{ $city['city_id'] }}" data-city="{{$city['city_id']}}">{{ $city['type'] .' '. $city['city_name'] }}</option>--}}
                                {{--@endforeach--}}
                                </select>

                            </li>
                            <li class="single_field" style="margin-top: 5px; width: 470px">
                                <label>Alamat:</label>
                                <textarea name="address" class="address" id="address"></textarea>
                            </li>
                            <li class="single_field zip-field" style="margin-top: 5px;">
                                <label>Kode Pos:</label>
                                <input name="zip" class="zip" id="zip" type="text">
                            </li>
                        </ul>


                        <ul class="user_info">
                            <li class="single_field">
                                <label>Pembayaran:</label>
                                <select class="payment_ids" name="payment_ids" id="payment_ids">
                                    @foreach($payments as $payment)
                                        <option value="{{ $payment->id }}">{{ $payment->name }}</option>
                                    @endforeach
                                </select>
                            </li>

                            <li class="single_field">
                                <label>Kurir:</label>

                                <select onchange="courier_function(this.value)" class="courier_id" name="courier_id"
                                        id="courier_id">
                                    <option>--pilih kurir--</option>
                                @foreach($couriers as $courier)
                                        {{--<input class="courier_id" name="courier_id" type="radio" value="{{ $courier->id }}">--}}
                                        {{--<span>{{ $courier->name }}</span>--}}
                                        <option value="{{ $courier->id }}">{{ $courier->name }}</option>
                                    @endforeach
                                </select>
                                <a href="#" data-dropdown="#dropdown" class="shipping_price"></a>
                            </li>

                            <li class="single_field">
                                <label>Servis:</label>
                                <select class="service" name="service" id="service">
                                    <option value="">NA</option>
                                </select>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="total_area">
                        <ul>
                            <li>Sub Total <span class="sub_total"
                                                id="sub_total">{{ Cart::instance('default')->subtotal() }}</span></li>
                            <li>Biaya Kirim <span class="shipping_price" id="shipping_price"></span></li>
                            <li>Total <span class="grand_total" id="grand_total">{{ Cart::total() }}</span></li>
                        </ul>
                        <form action="{{ url('customer/emptyCart') }}" method="POST">
                            {!! csrf_field() !!}
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="submit" class="btn btn-danger update" value="Kosongkan Keranjang Belanja"/>
                        </form>
                        <form action="{{ url('customer/checkout') }}" method="POST">
                            {!! csrf_field() !!}
                            <input type="hidden" class="payment_id" id="payment_id" name="payment_id" value="1">
                            <input type="hidden" class="courier_id" id="courier_id" name="courier_id" value="1">
                            <input type="hidden" class="total" id="total" name="total">
                            <input type="hidden" class="delivery" id="delivery" name="delivery">
                            <input type="hidden" class="courier_service" id="courier_service" name="courier_service">
                            <input type="hidden" class="service_price" id="service_price" name="service_price">
                            <input type="submit" class="btn btn-default update" value="Check Out"/>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section><!--/#do_action-->

@section('script')
    <script type="text/javascript">
        function courier_function(e) {

        }
    </script>


    <script type="text/javascript">
        function addCommas(nStr) {
            nStr += '';
            x = nStr.split('.');
            x1 = x[0];
            x2 = x.length > 1 ? '.' + x[1] : '';
            var rgx = /(\d+)(\d{3})/;
            while (rgx.test(x1)) {
                x1 = x1.replace(rgx, '$1' + ',' + '$2');
            }
            return x1 + x2;
        }
    </script>
    <script type="text/javascript">
        (function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('.quantity').on('change', function (e) {

                var id = $(this).attr('data-id')
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: "PATCH",
                    url: '{{ url("customer/cart") }}' + '/' + id,
                    data: {
                        'quantity': this.value,
                    },
                    success: function (data) {
                        window.location.href = '{{ url('customer/cart') }}';
                    }
                });
            });
        })();
    </script>


    <script type="text/javascript">
        (function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('.cities').on('change', function (e) {

                var id = $(this).attr('data-id')
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    //type: "PATCH",
                    //url: '{{ url("customer/cart") }}' + '/' + id,
                    data: {
                        'cities': this.value,
                    },
                    success: function (data) {
                        window.location.href = '{{ url('customer/cart') }}';
                    }
                });
            });
        })();
    </script>



    <script type="text/javascript">

        jQuery("select[name='region']").change(function () {
            $.getJSON("http://localhost:8000/customer/getCityByProvince/"+$("#region option:selected").val(), function (data) {
                console.log(data);
                var temp = [];
                //CONVERT INTO ARRAY
                $.each(data['results'], function (key, value) {
                    temp.push({i: value['city_id'] , v: value['type'] +' '+ value['city_name'], k: key});
                });
                //SORT THE ARRAY
                temp.sort(function (a, b) {
                    if (a.v > b.v) {
                        return 1
                    }
                    if (a.v < b.v) {
                        return -1
                    }
                    return 0;
                });
                //APPEND INTO SELECT BOX
                $('#city').empty();
                $('#city').append('<option>--pilih kota/kabupaten--</option>');
                $.each(temp, function(key, obj) {
                    $('#city').append('<option value="' + obj.i +'">' + obj.v + '</option>');
                });
            });

        });

        jQuery("select[name='city']").change(function () {
            // $('#courier_id').empty();
            $('#service').empty();
        });


        jQuery("select[name='courier_id']").change(function () {
            // console.log($("#city option:selected").val());

            var kurir = $("#courier_id option:selected").text();
            var courier = kurir.toLowerCase();
            $.getJSON("http://localhost:8000/customer/getShippingCost/" + $("#city option:selected").val() + "/"+courier, function(data) {
                // console.log(courier);
                var temp = [];
                var temp2= [];
                var vharga= [];
                var tmph = [];
                //CONVERT INTO ARRAY
                $.each(data, function(key, value) {
                    temp.push({v:value['name'], k: key});
                    // console.log(value['name']);
                    temp2 = value;
                });

                var costs = [];
                var temp3 = [];
                $.each(temp2['costs'], function (ke, va) {
                   // costs.push({v: va['service'], k: ke});
                   console.log(va);
                   console.log('---------sdas----------');
                   // $.each(temp2['costs'], function () {
                   //
                   // })
                    $.each(va['cost'], function (a, b) {
                       console.log(b['value']);
                       vharga.push({vh: b['value'], kh: a});
                       tmph.push({harga: b['value']});
                       // costs.push({harga: b['value']});
                        costs.push({v: va['service'], k: b['value']});

                    });
                   console.log(va.service);
                   temp3 = va;
                });

                var harga = [];
                $.each(temp3['cost'], function (kei, val) {
                    harga.push({vi: val['value'], ki: kei, });
                    // console.log(val['value'])
                });
                //SORT THE ARRAY
                costs.sort(function(a,b){
                    if(a.v > b.v){ return 1}
                    if(a.v < b.v){ return -1}
                    return 0;
                });

                vharga.sort(function(a,b){
                    if(a.vi > b.vi){ return 1}
                    if(a.vi < b.vi){ return -1}
                    return 0;
                });
                //APPEND INTO SELECT BOX
                $('#service').empty();
                $('#service').append('<option>--pilih servis--</option>');
                $.each(costs, function(key, obj) {
                        $('#service').append('<option value="' + obj.k +'" data-price="'+obj.k+'">' + obj.v + '</option>');
                    // $.each(costs, function (kk, oo) {
                    //     $('#service').append('<option value="' + obj.k +'" data-price="'+vharga+'">' + obj.v + '</option>');
                        console.log(vharga.values());
                    console.log(vharga.vh);
                    console.log(vharga['value']);
                    console.log(vharga['vh']);
                    console.log(vharga);

                    // });
                });
            });

        });

        jQuery("select[name='service']").change(function () {
            var hrg = $("#service option:selected").data('price');
            var service_name = $("#service option:selected").text();
            var gd = 0;
            var sub_total = $("#sub_total").text()
            console.log("========================");
            console.log(service_name);

            var grand_total = 0;
            var city = $("#city option:selected").data('city');
            var region = $("#region option:selected").data('region');
            // var shipping = $("#courier_id option:selected").data('price');
            var shipping = hrg;
            var sub_total = $("#sub_total").text();
            var delivery = $("#address").val() + ", " + $("#city option:selected").text() + ", " + $("#region option:selected").text() + ", " + $("#country option:selected").text() + ", " + document.getElementById("zip").value;
            grand_total = parseFloat(shipping) + parseFloat(sub_total);
            document.getElementById("shipping_price").innerHTML = $("#courier_id option:selected").value;


            document.getElementById("shipping_price").innerHTML = shipping;
            document.getElementById("grand_total").innerHTML = grand_total;
            var courier = $("#courier_id").val();
            var payment = $("#payment_ids").val();
            // document.getElementById("total").innerHTML = grand_total;
            // $('#grand_total').priceFormat();
            $(document).ready(function () {
                $('input[name="total"]').val(grand_total);
                $('input[name="delivery"]').val(delivery);
                $('input[name="courier_id"]').val(courier);
                $('input[name="payment_id"]').val(payment);
                $('input[name="courier_service"]').val(service_name);
                $('input[name="service_price"]').val(hrg);

            });
            // console.log(city);
        });

    </script>
@endsection
@endsection
