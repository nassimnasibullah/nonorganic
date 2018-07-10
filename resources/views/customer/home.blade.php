@extends('frontend.template')

@section('content')
    <section id="cart_items">
        <div class="container">
    <div class="register-req">
        <p>Hello, {{ Auth::user()->name }}</p>
    </div><!--/register-req-->

    <div class="shopper-informations">
        <div class="row">
            <div class="col-sm-3">
                <div class="shopper-info">
                    <p>Akun saya</p>
                    <form>
                        <input type="text" placeholder="{{ Auth::user()->name }}">
                        <input type="email" placeholder="{{ Auth::user()->email }}">
                    </form>
                    <a class="btn btn-primary" style="margin-bottom: 20px;" href="{{ url('') }}">Belanja</a>
                </div>
            </div>
            <div class="col-sm-5 clearfix">
                <div class="bill-to">
                    {{--<p>History Pembelian</p>--}}


                </div>
            </div>
            <div class="col-sm-4">
                {{--<div class="order-message">--}}
                    {{--<p>Shipping Order</p>--}}
                    {{--<textarea name="message"  placeholder="Notes about your order, Special Notes for Delivery" rows="16"></textarea>--}}
                    {{--<label><input type="checkbox"> Shipping to bill address</label>--}}
                {{--</div>--}}
            </div>
        </div>
    </div>
        </div>
    </section>
@endsection
