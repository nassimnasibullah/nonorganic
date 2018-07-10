<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" nav-item"><a href="{{ url('/admin/home') }}"><i class="la la-home"></i><span class="menu-title" data-i18n="nav.dash.main">Dashboard</span></a>

            </li>
                        <li class=" navigation-header">
                <span data-i18n="nav.category.layouts">Navigasi</span><i class="la la-ellipsis-h ft-minus" data-toggle="tooltip"
                                                                        data-placement="right" data-original-title="Layouts"></i>
            </li>
            <li class=" nav-item"><a href="#"><i class="la la-columns"></i><span class="menu-title" data-i18n="nav.page_layouts.main">Kategori</span></a>
                <ul class="menu-content">
                    <li><a class="menu-item" href="{{ url('admin/category') }}" data-i18n="nav.page_layouts.1_column"></a>
                    </li>
                    <li class="navigation-divider"></li>
                    <li><a class="menu-item" href="{{ url('admin/category') }}" data-i18n="nav.page_layouts.fixed_navbar">Data Kategori</a>
                    </li>
                    <li><a class="menu-item" href="{{ url('admin/category/create') }}" data-i18n="nav.page_layouts.fixed_navigation">Tambah Kategori</a>
                    </li>
                </ul>
            </li>
            <li class=" nav-item"><a href="#"><i class="la la-navicon"></i><span class="menu-title" data-i18n="nav.navbars.main">Produk</span></a>
                <ul class="menu-content">
                    <li><a class="menu-item" href="{{ url('admin/product') }}" data-i18n="nav.navbars.nav_light">Data Produk</a>
                    </li>
                    <li><a class="menu-item" href="{{ url('admin/product/create') }}" data-i18n="nav.navbars.nav_dark">Tambah Produk</a>
                    </li>

                </ul>
            </li>
            <li class=" nav-item"><a href="#"><i class="la la-users"></i><span class="menu-title" data-i18n="nav.vertical_nav.main">Pelanggan</span></a>
                <ul class="menu-content">
                    <li><a class="menu-item" href="{{ url('admin/customer') }}" data-i18n="nav.vertical_nav.vertical_navigation_types.main">Data Pelanggan</a>

                    </li>
                    <li><a class="menu-item" href="{{ url('admin/customer/create') }}" data-i18n="nav.vertical_nav.vertical_nav_fixed">Tambah Pelanggan</a>
                    </li>

                </ul>
            </li>
            {{--<li class=" nav-item"><a href="#"><i class="la la-comment"></i><span class="menu-title" data-i18n="nav.horz_nav.main">Pesanan</span></a>--}}
                {{--<ul class="menu-content">--}}
                    {{--<li><a class="menu-item" href="{{ url('admin/order') }}" data-i18n="nav.horz_nav.horizontal_navigation_types.main">Data Pesanan</a>--}}
                    {{--</li>--}}
                {{--</ul>--}}
            {{--</li>--}}
            <li class=" nav-item"><a href="#"><i class="la la-clipboard"></i><span class="menu-title" data-i18n="nav.horz_nav.main">Penjualan</span></a>
                <ul class="menu-content">
                    <li><a class="menu-item" href="{{ url('admin/sales') }}" data-i18n="nav.horz_nav.horizontal_navigation_types.main">Data Penjualan</a>
                    </li>
                </ul>
            </li>
            <li class=" nav-item"><a href="#"><i class="la la-cab"></i><span class="menu-title" data-i18n="nav.horz_nav.main">Kurir</span></a>
                <ul class="menu-content">
                    <li><a class="menu-item" href="{{ url('admin/courier') }}" data-i18n="nav.horz_nav.horizontal_navigation_types.main">Data Kurir</a>
                    </li>
                    <li><a class="menu-item" href="{{ url('admin/courier/create') }}" data-i18n="nav.horz_nav.horizontal_navigation_types.main">Tambah Kurir</a>
                    </li>
                </ul>
            </li>
            <li class=" nav-item"><a href="#"><i class="la la-money"></i><span class="menu-title" data-i18n="nav.horz_nav.main">Pembayaran</span></a>
                <ul class="menu-content">
                    <li><a class="menu-item" href="{{ url('admin/payment') }}" data-i18n="nav.horz_nav.horizontal_navigation_types.main">Data Metode Pembayaran</a>
                    </li>
                    <li><a class="menu-item" href="{{ url('admin/payment/create') }}" data-i18n="nav.horz_nav.horizontal_navigation_types.main">Tambah Metode Pembayaran</a>
                    </li>
                </ul>
            </li>
            <li class=" nav-item"><a href="#"><i class="la la-image"></i><span class="menu-title" data-i18n="nav.horz_nav.main">Slider</span></a>
                <ul class="menu-content">
                    <li><a class="menu-item" href="{{ url('admin/slider') }}" data-i18n="nav.horz_nav.horizontal_navigation_types.main">Data Slider</a>
                    </li>
                    <li><a class="menu-item" href="{{ url('admin/slider/create') }}" data-i18n="nav.horz_nav.horizontal_navigation_types.main">Tambah Slider</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
