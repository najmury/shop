<x-layoutUser>
    <!-- Breadcrumb -->
    <div class="breadcrumb-area mt-30">
        <div class="container">
            <div class="breadcrumb-bg pt-40 pb-40 pl-50 pr-50">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="breadcrumb-content text-center mt-5">
                            <h2 class="page-title">Keranjang Belanja</h2>
                            <ul class="list-none d-flex justify-content-center">
                                <li><a href="{{ url('/') }}" class="theme-color">Home</a></li>
                                <li class="px-2">/</li>
                                <li class="active">Keranjang</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Cart Content -->
    <div class="cart-area pt-40 pb-40">
        <div class="container">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @auth
                @if($cartItems->count() > 0)
                <div class="row">
                    <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
                        <div class="cart-table mb-30">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Produk</th>
                                            <th>Harga</th>
                                            <th>Quantity</th>
                                            <th>Subtotal</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($cartItems as $item)
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    @if($item->produk->gambar)
                                                        <img src="{{ asset('storage/'.$item->produk->gambar) }}" alt="{{ $item->produk->nama_produk }}" width="80" height="80" style="object-fit: cover;" class="me-3">
                                                    @else
                                                        <div class="bg-light d-flex align-items-center justify-content-center me-3" style="width: 80px; height: 80px;">
                                                            <i class="fas fa-image text-muted"></i>
                                                        </div>
                                                    @endif
                                                    <div>
                                                        <h6 class="mb-1">{{ $item->produk->nama_produk }}</h6>
                                                        <small class="text-muted">{{ $item->produk->kategori->nama_kategori ?? '-' }}</small>
                                                        @if($item->produk->stok < $item->quantity)
                                                            <div class="text-danger small mt-1">
                                                                Stok tidak mencukupi! Stok tersedia: {{ $item->produk->stok }}
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="align-middle">Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                                            <td class="align-middle">
                                                <form action="{{ route('cart.update', $item->id) }}" method="POST" class="d-flex align-items-center">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="number" name="quantity" value="{{ $item->quantity }}" min="1" max="{{ $item->produk->stok }}" class="form-control form-control-sm" style="width: 80px;">
                                                    <button type="submit" class="btn btn-sm btn-outline-primary ms-2">
                                                        <i class="fas fa-sync-alt"></i>
                                                    </button>
                                                </form>
                                            </td>
                                            <td class="align-middle">Rp {{ number_format($item->harga * $item->quantity, 0, ',', '.') }}</td>
                                            <td class="align-middle">
                                                <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Hapus produk dari keranjang?')">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="cart-actions mb-4">
                            <a href="{{ route('shop') }}" class="web-btn btn-sm theme-bg me-2">
                                <i class="fas fa-arrow-left me-1"></i> Lanjut Belanja
                            </a>
                            <form action="{{ route('cart.clear') }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="web-btn btn-sm btn-danger" onclick="return confirm('Yakin ingin mengosongkan keranjang?')">
                                    <i class="fas fa-trash me-1"></i> Kosongkan Keranjang
                                </button>
                            </form>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                        <div class="cart-totals bg-light p-4 rounded">
                            <h4 class="mb-3 border-bottom pb-2">Ringkasan Belanja</h4>
                            <table class="table">
                                <tr>
                                    <td>Subtotal</td>
                                    <td>Rp {{ number_format($total, 0, ',', '.') }}</td>
                                </tr>
                                <tr>
                                    <td>Ongkos Kirim</td>
                                    <td>Rp 15.000</td>
                                </tr>
                                <tr class="fw-bold fs-5">
                                    <td>Total</td>
                                    <td>Rp {{ number_format($total + 15000, 0, ',', '.') }}</td>
                                </tr>
                            </table>

                            @php
                                $isStockAvailable = true;
                                foreach($cartItems as $item) {
                                    if($item->produk->stok < $item->quantity) {
                                        $isStockAvailable = false;
                                        break;
                                    }
                                }
                            @endphp

                            @if($isStockAvailable)
                                <a href="{{ route('checkout') }}" class="web-btn btn-lg theme-bg w-100 text-center d-block">
                                    <i class="fas fa-credit-card me-2"></i> Checkout Sekarang
                                </a>
                            @else
                                <div class="alert alert-warning">
                                    <small>Beberapa produk stok tidak mencukupi. Silakan perbarui quantity sebelum checkout.</small>
                                </div>
                                <button class="web-btn btn-lg btn-secondary w-100 text-center d-block" disabled>
                                    Tidak Dapat Checkout
                                </button>
                            @endif
                        </div>
                    </div>
                </div>
                @else
                <div class="text-center py-5">
                    <i class="fas fa-shopping-cart fa-3x text-muted mb-3"></i>
                    <h4 class="text-muted">Keranjang belanja kosong</h4>
                    <p class="text-muted mb-4">Silakan tambahkan produk ke keranjang belanja Anda</p>
                    <a href="{{ route('shop') }}" class="web-btn btn-lg theme-bg">
                        <i class="fas fa-shopping-bag me-2"></i> Mulai Belanja
                    </a>
                </div>
                @endif
            @else
            <div class="text-center py-5">
                <i class="fas fa-lock fa-3x text-muted mb-3"></i>
                <h4 class="text-muted">Silakan Login Terlebih Dahulu</h4>
                <p class="text-muted mb-4">Anda perlu login untuk melihat keranjang belanja</p>
                <a href="{{ route('login') }}" class="web-btn btn-lg theme-bg me-2">
                    <i class="fas fa-sign-in-alt me-2"></i> Login
                </a>
                <a href="{{ route('register') }}" class="web-btn btn-lg btn-outline-primary">
                    <i class="fas fa-user-plus me-2"></i> Daftar
                </a>
            </div>
            @endauth
        </div>
    </div>
</x-layoutUser>
