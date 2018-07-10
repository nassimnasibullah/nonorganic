@extends('frontend.template')

@section('content')
    <section id="cart_items">
        <div class="container">
            <div class="register-req">
                <p>Terima Kasih Telah Berbelanja By KKM Sangen Madiun</p>
            </div><!--/register-req-->

            <div class="shopper-informations">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="shopper-info">
                            <p>Metode Pembayaran</p>
                            <form>
                                <input type="text" placeholder="{{ $payment->name }}" disabled="">
                            </form>
                            <a class="btn btn-primary" style="margin-bottom: 20px;" href="{{ url('') }}">Kembali</a>
                        </div>
                    </div>
                    <div class="col-sm-5 clearfix">
                        <div class="bill-to">
                            <p>Silahkan Melakukan Transaksi Ke : </p>
                            <div class="form-one">
                                <p>{{ chunk_split($payment->description,100) }}</p>
                            </div>

                        </div>
                    </div>
                    <div class="col-sm-4">

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
