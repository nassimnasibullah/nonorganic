@extends('frontend.template')

@section('content')
    <section id="cart_items">
        <div class="container">
            <div class="register-req">
                <h4>Tentang {{ config('app.name') }}</h4>
                <p><b>Apa itu {{ config('app.name') }}?</b></p>
                <p>Kreativitas adalah potensi terbesar Indonesia</p>
                <p>Kerajinan dan produk handmade Indonesia telah diakui di mata dunia. Di {{ config('app.name') }} Anda akan temukan berbagai produk unik yang tidak dijual di tempat lain mulai dari kerajinan tradisional sampai dengan produk rancangan modern! </p>
            </div><!--/register-req-->

        </div>
    </section>
@endsection
