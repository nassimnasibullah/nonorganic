<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Login | E-Shopper</title>
    <link href="{{ asset("css/bootstrap.min.css") }}" rel="stylesheet">
    <link href="{{ asset("css/font-awesome.min.css") }}" rel="stylesheet">
    <link href="{{ asset("css/prettyPhoto.css") }}" rel="stylesheet">
    <link href="{{ asset("css/price-range.css") }}" rel="stylesheet">
    <link href="{{ asset("css/animate.css") }}" rel="stylesheet">
    <link href="{{ asset("css/main.css") }}" rel="stylesheet">
    <link href="{{ asset("css/responsive.css") }}" rel="stylesheet">
    <script src="{{ asset("js/html5shiv.js") }}"></script>
    <script src="{{ asset("js/respond.min.js") }}"></script>
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>

@include('frontend.partials.header')

<section id="form"><!--form-->
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-1">
                <div class="login-form"><!--login form-->
                    <h2>Masuk ke akun Anda</h2>
                    <form role="form" method="POST" action="{{ url('/customer/login') }}">
                        {{ csrf_field() }}
                        <input type="email" name="email" placeholder="Email" />
                        <input type="password" name="password" placeholder="Password" />
                        <span>
								<input type="checkbox" class="checkbox">
                                Biarkan saya tetap masuk
                        </span>
                        <button type="submit" class="btn btn-default">Masuk</button>
                    </form>
                </div><!--/login form-->
            </div>
            <div class="col-sm-1">
                <h2 class="or">ATAU</h2>
            </div>
            <div class="col-sm-4">
                <div class="signup-form"><!--sign up form-->
                    <h2>Pendaftaran Pengguna Baru</h2>
                    <form role="form" method="POST" action="{{ url('/customer/register') }}">
                        {{ csrf_field() }}
                        <input type="text" name="name" placeholder="Name"/>
                        <input type="email" name="email" placeholder="Email"/>
                        <input type="password" name="password" placeholder="Password (Min 6 Karakter)"/>
                        <input type="password" name="password_confirmation" placeholder="Konfirmasi Password"/>

                        <button type="submit" class="btn btn-default">Daftar</button>
                    </form>
                </div><!--/sign up form-->
            </div>
        </div>
    </div>
</section><!--/form-->

@include('frontend.partials.footer')


<script src="{{ asset("js/jquery.js") }}"></script>
<script src="{{ asset("js/price-range.js") }}"></script>
<script src="{{ asset("js/jquery.scrollUp.min.js") }}"></script>
<script src="{{ asset("js/bootstrap.min.js") }}"></script>
<script src="{{ asset("js/jquery.prettyPhoto.js") }}"></script>
<script src="{{ asset("js/main.js") }}"></script>
</body>
</html>
