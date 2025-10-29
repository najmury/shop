<!doctype html>
<html class="no-js" lang="zxx">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>SHOP</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

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

        <style>
            /* Custom styles untuk responsif */
            .user-dropdown {
                position: relative;
            }

            .user-dropdown-menu {
                display: none;
                position: absolute;
                right: 0;
                top: 100%;
                min-width: 200px;
                background: white;
                border: 1px solid #ddd;
                border-radius: 4px;
                box-shadow: 0 2px 10px rgba(0,0,0,0.1);
                z-index: 1000;
                margin-top: 10px;
            }

            .user-dropdown-menu.show {
                display: block;
            }

            .user-toggle {
                text-decoration: none;
                color: inherit;
            }

            .user-toggle:hover {
                color: #ff3d00;
            }

            .mobile-menu-btn {
                display: none;
                background: none;
                border: none;
                font-size: 24px;
                color: #333;
            }

            @media (max-width: 1199px) {
                .header-padding {
                    padding: 15px 0;
                }

                .main-menu {
                    position: fixed;
                    top: 0;
                    left: -300px;
                    width: 300px;
                    height: 100vh;
                    background: white;
                    z-index: 9999;
                    transition: all 0.3s ease;
                    overflow-y: auto;
                    padding: 20px;
                }

                .main-menu.active {
                    left: 0;
                }

                .mobile-menu-btn {
                    display: block;
                }

                .menu-overlay {
                    display: none;
                    position: fixed;
                    top: 0;
                    left: 0;
                    width: 100%;
                    height: 100%;
                    background: rgba(0,0,0,0.5);
                    z-index: 9998;
                }

                .menu-overlay.active {
                    display: block;
                }
            }

            @media (max-width: 767px) {
                .header-right ul {
                    margin-left: 10px;
                }

                .user-name {
                    display: none;
                }

                .user-dropdown-menu {
                    right: -50px;
                    min-width: 180px;
                }
            }
        </style>
    </head>
    <body>

        <!--  ====== header-area-start=======================================  -->
        <header>
            <div id="header-sticky" class="header-area header-area1 header-transparent">
                <div class="header header-padding">
                    <div class="container-fluid">
                        <div class="header-mega p-relative">
                            <div class="row align-items-center">
                                <!-- Logo -->
                                <div class="col-6 col-md-3 col-lg-2">
                                    <div class="logo">
                                        <a href="{{ url('/') }}" class="d-block">
                                            <img src="{{ asset('landing/images/logo/logo.png') }}" alt="kingstock" class="img-fluid">
                                        </a>
                                    </div>
                                </div>

                                <!-- Mobile Menu Button -->
                                <div class="col-6 d-lg-none text-right">
                                    <button class="mobile-menu-btn" type="button">
                                        <i class="fas fa-bars"></i>
                                    </button>
                                </div>

                                <!-- Navigation Menu -->
                                <div class="col-lg-6 d-none d-lg-block">
                                    <div class="main-menu">
                                        <nav>
                                            <ul class="d-flex align-items-center">
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

                                                <!-- Menu tambahan untuk user yang sudah login -->
                                                @auth
                                                <li class="{{ request()->is('orders', 'order/*') ? 'active' : '' }} d-lg-none">
                                                    <a href="{{ route('orders.index') }}">Pesanan Saya</a>
                                                </li>
                                                <li class="{{ request()->is('profile') ? 'active' : '' }} d-lg-none">
                                                    <a href="{{ route('profile') }}">Profil</a>
                                                </li>
                                                @endauth
                                            </ul>
                                        </nav>
                                    </div>
                                </div>

                                <!-- Header Right Section -->
                                <div class="col-lg-4 col-md-9 d-none d-md-block">
                                    <div class="header-right d-flex justify-content-end align-items-center">
                                        <!-- Search -->
                                        <div class="header-search position-relative d-none d-xl-block mr-3">
                                            <form action="{{ route('shop') }}" method="GET" class="d-flex">
                                                <input type="text" name="search" placeholder="Search" class="border-0 pl-25 theme-color" value="{{ request('search') }}">
                                                <button type="submit" class="position-absolute black-color border-0 bg-transparent">
                                                    <span><i class="far fa-search"></i></span>
                                                </button>
                                            </form>
                                        </div>

                                        <!-- Cart -->
                                        <ul class="list-unstyled d-flex align-items-center mb-0">
                                            <li class="h-shop position-relative mx-2">
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
                                            </li>

                                            <!-- Wishlist -->
                                            <li class="position-relative mx-2">
                                                <a href="#" class="dark-black-color">
                                                    <span><i class="far fa-heart"></i></span>
                                                </a>
                                            </li>

                                            <!-- User Account -->
                                            <li class="position-relative mx-2">
                                                <a href="{{ route('login') }}" class="dark-black-color">
                                                    <span><i class="far fa-user-circle"></i></span>
                                                    <span class="d-none d-md-inline ml-1">Login</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Mobile Menu Overlay -->
            <div class="menu-overlay"></div>

            <!-- Mobile Menu -->
            <div class="main-menu mobile-menu">
                <div class="menu-header d-flex justify-content-between align-items-center p-3 border-bottom">
                    <h5 class="mb-0">Menu</h5>
                    <button class="close-menu-btn border-0 bg-transparent">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <nav class="p-3">
                    <ul class="list-unstyled">
                        <li class="{{ request()->is('/') ? 'active' : '' }} mb-2">
                            <a href="{{ url('/') }}" class="d-block py-2 text-dark">Home</a>
                        </li>
                        <li class="{{ request()->is('shop') ? 'active' : '' }} mb-2">
                            <a href="{{ url('/shop') }}" class="d-block py-2 text-dark">Shop</a>
                        </li>
                        <li class="mb-2">
                            <a href="{{ url('/categories') }}" class="d-block py-2 text-dark">Kategori</a>
                            <ul class="list-unstyled pl-3 mt-1">
                                @php
                                    $kategoris = \App\Models\Kategori::where('status', 'Aktif')->get();
                                @endphp
                                @forelse($kategoris as $kategori)
                                <li class="mb-1">
                                    <a href="{{ route('category', $kategori->id) }}" class="d-block py-1 text-muted">
                                        {{ $kategori->nama_kategori }}
                                    </a>
                                </li>
                                @empty
                                <li><a href="#" class="text-muted">Belum ada kategori</a></li>
                                @endforelse
                            </ul>
                        </li>
                        <li class="{{ request()->is('promo') ? 'active' : '' }} mb-2">
                            <a href="{{ url('/promo') }}" class="d-block py-2 text-dark">Promo</a>
                        </li>
                        <li class="{{ request()->is('contact') ? 'active' : '' }} mb-2">
                            <a href="{{ url('/contact') }}" class="d-block py-2 text-dark">Kontak</a>
                        </li>
                        <li class="{{ request()->is('about') ? 'active' : '' }} mb-2">
                            <a href="{{ url('/about') }}" class="d-block py-2 text-dark">About</a>
                        </li>

                        @auth
                        <li class="border-top pt-2 mt-2">
                            <h6 class="text-muted mb-2">Akun Saya</h6>
                            <ul class="list-unstyled">
                                <li class="mb-1">
                                    <a href="{{ route('profile') }}" class="d-block py-1 text-dark">
                                        <i class="far fa-user mr-2"></i>Profil Saya
                                    </a>
                                </li>
                                <li class="mb-1">
                                    <a href="{{ route('orders.index') }}" class="d-block py-1 text-dark">
                                        <i class="far fa-shopping-bag mr-2"></i>Pesanan Saya
                                    </a>
                                </li>
                                <li class="mb-1">
                                    <a href="{{ route('cart.index') }}" class="d-block py-1 text-dark">
                                        <i class="far fa-shopping-cart mr-2"></i>Keranjang
                                        @php
                                            $cartCount = \App\Models\Cart::where('user_id', auth()->id())->sum('quantity');
                                        @endphp
                                        @if($cartCount > 0)
                                            <span class="badge bg-theme text-white ml-2">{{ $cartCount }}</span>
                                        @endif
                                    </a>
                                </li>
                                <li class="mb-1">
                                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn btn-link p-0 text-danger">
                                            <i class="far fa-sign-out mr-2"></i>Logout
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                        @else
                        <li class="border-top pt-2 mt-2">
                            <a href="{{ route('login') }}" class="d-block py-2 text-dark">
                                <i class="far fa-user mr-2"></i>Login
                            </a>
                            <a href="{{ route('register') }}" class="d-block py-2 text-dark">
                                <i class="far fa-user-plus mr-2"></i>Daftar
                            </a>
                        </li>
                        @endauth
                    </ul>
                </nav>
            </div>
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
                                <div class="col-12">
                                    <div class="copyright-text text-center">
                                        <p class="mb-0">© Copyright 2025
                                             <a href="#" class="c-theme">ECOMMERCE</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

        <!-- back top -->
        <div class="scroll-up" id="scroll">
            <a href="#" class="theme-bg white d-block text-center position-fixed">
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

        <!-- Custom JavaScript -->
        <script>
            $(document).ready(function() {
                // Mobile Menu Toggle
                $('.mobile-menu-btn').click(function() {
                    $('.mobile-menu').addClass('active');
                    $('.menu-overlay').addClass('active');
                });

                $('.close-menu-btn, .menu-overlay').click(function() {
                    $('.mobile-menu').removeClass('active');
                    $('.menu-overlay').removeClass('active');
                });

                // User Dropdown Toggle
                $('.user-toggle').click(function(e) {
                    e.preventDefault();
                    $(this).siblings('.user-dropdown-menu').toggleClass('show');
                });

                // Close dropdown ketika klik di luar
                $(document).click(function(e) {
                    if (!$(e.target).closest('.user-dropdown').length) {
                        $('.user-dropdown-menu').removeClass('show');
                    }
                });

                // Prevent dropdown close ketika klik dropdown content
                $('.user-dropdown-menu').click(function(e) {
                    e.stopPropagation();
                });
            });
        </script>

    </body>
</html>
