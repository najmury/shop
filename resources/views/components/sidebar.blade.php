            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <a class="nav-link {{ request()->routeIs('user') ? 'active' : '' }}" href="{{ route('user') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                                User
                            </a>
                            <a class="nav-link {{ request()->routeIs('kategori.index') ? 'active' : '' }}" href="{{ route('kategori.index') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-solid fa-compass"></i></div>
                                Kategori
                            </a>
                            <a class="nav-link {{ request()->routeIs('produk.index') ? 'active' : '' }}" href="{{ route('produk.index') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-truck-loading"></i></div>
                                Produk
                            </a>
                            <a class="nav-link {{ request()->routeIs('pesanan') ? 'active' : '' }}" href="{{ route('pesanan') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-trailer"></i></div>
                                Pesanan
                            </a>
                            <a class="nav-link {{ request()->routeIs('laporan') ? 'active' : '' }}" href="{{ route('laporan') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-file"></i></div>
                                Laporan
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
