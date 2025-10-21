<!doctype html>
<html class="no-js" lang="zxx">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>SHOP</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Place favicon.ico in the root directory -->
        <link rel="shortcut icon" href="{{ asset('landing/images/logo/favicon.png') }}" type="image/x-icon">

        <!-- All css here -->
        <link rel="stylesheet" href="{{ asset('landing/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('landing/css/all.min.css') }}">
        <link rel="stylesheet" href="{{ asset('landing/css/animate.css') }}">
        <link rel="stylesheet" href="{{ asset('landing/css/meanmenu.css') }}">
        <link rel="stylesheet" href="{{ asset('landing/css/jquery.fancybox.min.css') }}">
        <link rel="stylesheet" href="{{ asset('landing/css/slick.css') }}">
        <link rel="stylesheet" href="{{ asset('landing/css/nice-select.css') }}">
        <link rel="stylesheet" href="{{ asset('landing/css/icomoon.css') }}">
        <link rel="stylesheet" href="{{ asset('landing/css/flaticon.css') }}">
        <link rel="stylesheet" href="{{ asset('landing/css/default.css') }}">
        <link rel="stylesheet" href="{{ asset('landing/css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('landing/css/responsive.css') }}">
    </head>
    <body>

        <!--  ====== header-area-start=======================================  -->
        <header>
            <div id="header-sticky" class="header-area header-area1 header-transparent">
                <div class="header header-padding ml-185 mr-185">
                    <div class="container-fluid">
                        <div class="header-mega p-relative">
                            <div class="row align-items-center justify-content-lg-between">
                                <div class="col-xl-2  col-lg-2 col-md-3 col-sm-6 col-7 pr-0 d-flex align-items-center">
                                    <div class="logo">
                                        <a href="{{ url('/') }}" class="d-block" data-toggle="tooltip" data-selector="true" data-placement="bottom" title="kingstock">
                                            <img src="{{ asset('landing/images/logo/logo.png') }}" alt="kingstock">
                                        </a>
                                    </div>
                                </div><!-- /col -->
                                <div class="col-xl-6 col-lg-7 col-md-1 col-sm-1 col-1 d-none pr-0 pl-0 pl-lg-15 d-flex align-items-center justify-content-xl-start justify-content-center position-static">
                                    <div class="main-menu">
                                        <nav id="mobile-menu">
                                            <ul class="d-block">
                                                <li class="{{ request()->is('/') ? 'active' : '' }}">
                                                    <a href="{{ url('/') }}">Home</a>
                                                </li>
                                                <li class="{{ request()->is('shop') ? 'active' : '' }}">
                                                    <a href="{{ url('/shop') }}">Shop</a>
                                                </li>
                                                <li class="has-dropdown {{ request()->is('categories', 'category/*') ? 'active' : '' }}">
                                                    <a href="{{ url('/categories') }}">Kategori <i class="far fa-angle-down"></i></a>
                                                    <ul class="submenu">
                                                        @php
                                                            $kategoris = \App\Models\Kategori::where('status', 'Aktif')->get();
                                                        @endphp
                                                        @forelse($kategoris as $kategori)
                                                        <li>
                                                            <a href="{{ route('category', $kategori->id) }}">
                                                                {{ $kategori->nama_kategori }}
                                                                <span class="badge bg-secondary float-right mt-1">
                                                                    {{ $kategori->produks_count ?? $kategori->produks->count() }}
                                                                </span>
                                                            </a>
                                                        </li>
                                                        @empty
                                                        <li><a href="#">Belum ada kategori</a></li>
                                                        @endforelse
                                                    </ul>
                                                </li>
                                                <li class="{{ request()->is('promo') ? 'active' : '' }}">
                                                    <a href="{{ url('/promo') }}">Promo</a>
                                                </li>
                                                <li class="{{ request()->is('contact') ? 'active' : '' }}">
                                                    <a href="{{ url('/contact') }}">Kontak</a>
                                                </li>
                                                <li class="{{ request()->is('about') ? 'active' : '' }}">
                                                    <a href="{{ url('/about') }}">About</a>
                                                </li>
                                            </ul>
                                        </nav>
                                    </div><!-- /main-menu -->
                                </div><!-- /col -->
                                <div class="col-xl-4 col-lg-3 col-md-8 col-sm-5 col-4">
                                    <div class="header-right d-flex justify-content-end align-items-center">
                                        <div class="header-search position-relative d-none d-xl-block" data-toggle="tooltip" data-selector="true" data-placement="bottom" title="Search">
                                            <form action="{{ route('shop') }}" method="GET" class="d-flex">
                                                <input type="text" name="search" placeholder="Search" class="border-0 pl-25 theme-color" value="{{ request('search') }}">
                                                <button type="submit" class="position-absolute black-color border-0 bg-transparent">
                                                    <span><i class="far fa-search"></i></span>
                                                </button>
                                            </form>
                                        </div>
                                        <ul>
                                            <li class="h-shop position-relative ml-30">
                                                <div class="header-shopping-cart position-relative">
                                                    <a href="{{ auth()->check() ? route('cart.index') : route('login') }}" class="dark-black-color">
                                                        <span><i class="far fa-shopping-cart"></i></span>
                                                    </a>
                                                    @auth
                                                        @php
                                                            $cartCount = \App\Models\Cart::where('user_id', auth()->id())->sum('quantity');
                                                        @endphp
                                                        @if($cartCount > 0)
                                                            <span class="s-count position-absolute theme-bg white text-center">{{ $cartCount }}</span>
                                                        @endif
                                                    @endauth
                                                </div>

                                                <!-- Cart Dropdown Content -->
                                                <div class="header-shopping-cart-details position-absolute bg-white border-gray pl-30 pr-30 pt-35 pb-60">
                                                    @auth
                                                        @php
                                                            $cartItems = \App\Models\Cart::with('produk')->where('user_id', auth()->id())->latest()->take(2)->get();
                                                            $cartTotal = 0;
                                                        @endphp

                                                        <div class="h-shop-cart-contetn over-x-hidden over-y-scroll">
                                                            @forelse($cartItems as $item)
                                                            @php
                                                                $subtotal = $item->harga * $item->quantity;
                                                                $cartTotal += $subtotal;
                                                            @endphp
                                                            <ul class="d-flex pb-10 border-b-light-gray">
                                                                <li class="h-shop-cart-img pl-0">
                                                                    @if($item->produk->gambar)
                                                                        <img src="{{ asset('storage/'.$item->produk->gambar) }}" alt="{{ $item->produk->nama_produk }}" width="60" height="60" style="object-fit: cover;">
                                                                    @else
                                                                        <div class="bg-light d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                                                                            <i class="fas fa-image text-muted"></i>
                                                                        </div>
                                                                    @endif
                                                                </li>
                                                                <li class="pl-3">
                                                                    <h6 class="single-product-name pb-1">
                                                                        <a href="{{ route('product.detail', $item->produk->id) }}">{{ \Illuminate\Support\Str::limit($item->produk->nama_produk, 20) }}</a>
                                                                    </h6>
                                                                    <span class="primary-color">{{ $item->quantity }}<span>x</span>Rp {{ number_format($item->harga, 0, ',', '.') }}</span>
                                                                </li>
                                                                <li class="s-p-remove px-1 pl-0">
                                                                    <form action="{{ route('cart.remove', $item->id) }}" method="POST" class="d-inline">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit" class="border-0 bg-transparent text-danger">
                                                                            <i class="fas fa-times"></i>
                                                                        </button>
                                                                    </form>
                                                                </li>
                                                            </ul>
                                                            @empty
                                                            <p class="text-center py-4">Keranjang belanja kosong</p>
                                                            @endforelse
                                                        </div>

                                                        @if($cartItems->count() > 0)
                                                        <div class="s-sub-t mt-2 mb-15">
                                                            <span class="primary-color">Subtotal:</span>
                                                            <span class="primary-color float-right">Rp {{ number_format($cartTotal, 0, ',', '.') }}</span>
                                                        </div>
                                                        <div class="d-sm-flex justify-content-between">
                                                            <a href="{{ route('cart.index') }}" class="web-btn d-inline-block text-uppercase primary-color gray-border2 position-relative over-hidden pl-20 pr-20 pt-10 pb-10 mt-10">Lihat Keranjang</a>
                                                            <a href="{{ route('checkout') }}" class="web-btn d-inline-block text-uppercase theme-bg border-theme02 position-relative over-hidden pl-20 pr-20 pt-10 pb-10 mt-10 white">Checkout</a>
                                                        </div>
                                                        @endif
                                                    @else
                                                        <div class="text-center py-4">
                                                            <p>Silakan login untuk melihat keranjang</p>
                                                            <a href="{{ route('login') }}" class="web-btn btn-sm theme-bg">Login</a>
                                                        </div>
                                                    @endauth
                                                </div>
                                            </li>
                                        </ul>
                                        <ul class="header-wishlist pl-2 d-none d-md-block">
                                            <li class="position-relative">
                                                <a href="#" data-toggle="tooltip" data-selector="true" data-placement="bottom" title="View wishlist" class="dark-black-color"><span><i class="far fa-heart"></i></span>
                                                </a>
                                            </li>
                                        </ul>
                                        <ul class="header-account d-none d-md-block">
                                            <li class="d-none d-md-inline-block pl-20">
                                                <a href="{{ route('login') }}" data-toggle="tooltip" data-selector="true" data-placement="bottom" title="My Account" class="dark-black-color"><span><i class="far fa-user-circle"></i></span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div><!-- /header-right -->
                                </div><!-- /col -->
                            </div><!-- /row -->
                        </div>
                    </div><!-- /container -->
                </div>
            </div><!-- /header-bottom -->
        </header>
        <!--  header-area-end  -->

        <main>
            {{ $slot }}
        </main>

        <!-- ====== footer-area-start ============================================ -->
        <footer>
            <div class="footer-area footer-bg">
                <div class="footer-bottom">
                    <div class="container">
                        <div class="copyright-area pt-25 pb-25 border-t-gray3">
                            <div class="row align-items-center justify-content-center">
                                <div class="col-xl-12  col-lg-12  col-md-12  col-sm-12 col-12">
                                    <div class="copyright-text d-sm-flex justify-content-center align-items-center text-center">
                                        <p class="mb-0">© Copyright 2025
                                             <a href="#" class="c-theme">ECOMMERCE</a>
                                        </p>
                                    </div>
                                </div><!-- /col -->
                            </div><!-- /row -->
                        </div><!-- /copyright-area -->
                    </div><!-- /container -->
                </div>
            </div>
        </footer>

        <!-- back top -->
        <div class="scroll-up" id="scroll">
            <a href="#" class="theme-bg white d-block text-center position-fixed mr-10">
                <span class="icon-chevrons-up"></span>
            </a>
        </div>

        <!-- All js here -->
        <script src="{{ asset('landing/js/vendor/modernizr-3.5.0.min.js') }}"></script>
        <script src="{{ asset('landing/js/vendor/jquery-3.6.0.min.js') }}"></script>
        <script src="{{ asset('landing/js/jquery.inputarrow.js') }}"></script>
        <script src="{{ asset('landing/js/popper.min.js') }}"></script>
        <script src="{{ asset('landing/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('landing/js/wow.min.js') }}"></script>
        <script src="{{ asset('landing/js/jquery.nice-select.min.js') }}"></script>
        <script src="{{ asset('landing/js/jquery.elevateZoom-3.0.8.min.js') }}"></script>
        <script src="{{ asset('landing/js/jquery.fancybox.min.js') }}"></script>
        <script src="{{ asset('landing/js/slick.min.js') }}"></script>
        <script src="{{ asset('landing/js/jquery.meanmenu.min.js') }}"></script>
        <script src="{{ asset('landing/js/plugins.js') }}"></script>
        <script src="{{ asset('landing/js/main.js') }}"></script>

    </body>
</html>
