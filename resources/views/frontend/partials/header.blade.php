<header id="header"><!--header-->
    <div class="header_top"><!--header_top-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="contactinfo">
                        <ul class="nav nav-pills">
                            <li><a href="#"><i class="fa fa-phone"></i> Lembaga Kursus Keterampilan Menjahit Sangen Kab. Madiun</a></li>
                            <li><a href="#"><i class="fa fa-envelope"></i> Nonorganic-Shop</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="social-icons pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header_top-->

    <div class="header-middle"><!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="logo pull-left">
                        <a href="{{ url('') }}"><img src="{{ asset("images/home/logo.png") }}" alt="" /></a>
                    </div>

                </div>
                <div class="col-sm-8">
                    <div class="shop-menu pull-right">
                        <ul class="nav navbar-nav">

                                <li><a href="{{ url('/customer/login') }}"><i class="fa fa-lock"></i> Masuk</a></li>

                                <li><a href="{{ url('customer/home') }}"><i class="fa fa-user"></i> Akun saya</a></li>
                                <li><a href="{{ url('customer/cart') }}"><i class="fa fa-shopping-cart"></i><span>{{ Cart::count() }}</span> Cart</a></li>

                                    {{--<li><a href="{{ url('/customer/payment') }}"><i class="fa fa-crosshairs"></i> Checkout</a></li>--}}
                                    <li><a href="{{ url('/customer/logout') }}" onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();"><i class="fa fa-lock"></i> Logout</a>
                                    <form id="logout-form"
                                          action="{{ url('/customer/logout') }}"
                                          method="POST"
                                          style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-middle-->

    <div class="header-bottom"><!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="mainmenu pull-left">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li><a href="{{ url('') }}" class="active">Home</a></li>
                            <li><a href="{{ url('/about') }}">Tentang Kami</a></li>
                            <li><a href="{{ url('/contact') }}">Hubungi Kami</a></li>
                            <li><a href="{{ url('/tos') }}">Ketentuan Layanan</a></li>

                        </ul>
                    </div>
                </div>
                {{--<div class="col-sm-3">--}}
                    {{--<div class="search_box pull-right">--}}
                        {{--<input type="text" placeholder="Search"/>--}}
                    {{--</div>--}}
                {{--</div>--}}
            </div>
        </div>
    </div><!--/header-bottom-->
</header><!--/header-->
