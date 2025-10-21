<x-layoutUser>
    <!-- ====== breadcrumb-area-start ============================================ -->
    <div class="breadcrumb-area mt-30">
        <div class="container">
            <div class="breadcrumb-bg pt-40 pb-40 pl-50 pr-50">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="breadcrumb-content text-center mt-5">
                            <h2 class="page-title">Promo & Penawaran Spesial</h2>
                            <ul class="list-none d-flex justify-content-center">
                                <li><a href="{{ url('/') }}" class="theme-color">Home</a></li>
                                <li class="px-2">/</li>
                                <li class="active">Promo</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb-area-end -->

    <!-- ====== promo-banner-area-start ============================================ -->
    <div class="promo-banner-area pt-40">
        <div class="container">
            <div class="row">
                 <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="promo-banner mb-30 position-relative over-hidden">
                        <a href="{{ route('shop') }}">
                            <img src="{{ asset('landing/images/promo/promo-banner3.jpg') }}" alt="Promo Besar" class="width100">
                        </a>
                        <div class="promo-content position-absolute">
                            <span class="d-block white bg-theme px-3 py-1 mb-10">Hingga 50% OFF</span>
                            <h3 class="white">Sale Akhir Tahun</h3>
                            <p class="white">Diskon besar-besaran untuk semua produk</p>
                            <a href="{{ route('shop') }}" class="web-btn btn-sm white-bg theme-color">Beli Sekarang</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="promo-banner mb-30 position-relative over-hidden">
                        <a href="{{ route('shop') }}">
                            <img src="{{ asset('landing/images/promo/promo-banner4.jpg') }}" alt="Promo Flash Sale" class="width100">
                        </a>
                        <div class="promo-content position-absolute">
                            <span class="d-block white bg-theme px-3 py-1 mb-10">Flash Sale</span>
                            <h3 class="white">Hanya 24 Jam!</h3>
                            <p class="white">Diskon khusus untuk produk pilihan</p>
                            <div class="countdown-timer mb-15" data-countdown="2024/12/31"></div>
                            <a href="{{ route('shop') }}" class="web-btn btn-sm white-bg theme-color">Jangan Lewatkan</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- promo-banner-area-end -->

    <!-- ====== promo-products-area-start ============================================ -->
    <div class="promo-products-area pt-40 pb-40">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="section-title text-center mb-30">
                        <h3>Produk Promo Terbaru</h3>
                        <p>Dapatkan penawaran spesial untuk produk-produk berikut</p>
                    </div>
                </div>
            </div>

            <div class="row">
                @forelse($promoProducts as $index => $produk)
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="s-p-wrapper">
                        <div class="single-product mb-35">
                            <div class="single-product-img position-relative over-hidden">
                                <a class="position-relative d-block" href="{{ route('product.detail', $produk->id) }}">
                                    @if($produk->gambar)
                                        <img src="{{ asset('storage/'.$produk->gambar) }}" alt="{{ $produk->nama_produk }}" style="width: 100%; height: 250px; object-fit: cover;">
                                    @else
                                        <div class="bg-light d-flex align-items-center justify-content-center" style="width: 100%; height: 250px;">
                                            <i class="fas fa-image text-muted fa-2x"></i>
                                        </div>
                                    @endif
                                </a>
                                @if($produk->stok == 0)
                                <div class="single-product-label position-absolute bg-danger text-center px-2 transition-3 z-index1">
                                    <span class="white text-uppercase d-block">Habis</span>
                                </div>
                                @else
                                <div class="single-product-label position-absolute theme-bg text-center px-2 transition-3 z-index1">
                                    <span class="white text-uppercase d-block">
                                        <span>{{ ($index % 4 + 1) * 10 }}% </span>off
                                    </span>
                                </div>
                                @endif
                                <ul class="product-action d-flex position-absolute transition-3">
                                    <li data-toggle="tooltip" data-placement="top" title="Add to Cart">
                                        <a href="#" class="text-center mb-10 white-bg primary-color d-block">
                                            <span><i class="far fa-shopping-cart"></i></span>
                                        </a>
                                    </li>
                                    <li data-toggle="tooltip" data-placement="top" title="Add to Wishlist">
                                        <a href="#" class="text-center mb-10 white-bg primary-color d-block">
                                            <span><i class="far fa-heart"></i></span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="single-product-info position-relative mt-25">
                                <h6><a href="{{ route('product.detail', $produk->id) }}">{{ \Illuminate\Support\Str::limit($produk->nama_produk, 40) }}</a></h6>
                                <div class="product-category mb-10">
                                    <span class="badge bg-secondary">{{ $produk->kategori->nama_kategori ?? '-' }}</span>
                                </div>
                                <ul class="single-product-price d-flex transition-3">
                                    <li>
                                        @php
                                            $originalPrice = $produk->harga * 1.3; // Harga asli 30% lebih tinggi
                                            $discountPrice = $produk->harga;
                                        @endphp
                                        <span class="gray-color pr-2"><del>Rp {{ number_format($originalPrice, 0, ',', '.') }}</del></span>
                                        <span class="primary-color">Rp {{ number_format($discountPrice, 0, ',', '.') }}</span>
                                    </li>
                                </ul>
                                <div class="product-stock">
                                    <small class="{{ $produk->stok > 0 ? 'text-success' : 'text-danger' }}">
                                        Stok: {{ $produk->stok }}
                                    </small>
                                </div>
                                <div class="product-progress mt-10">
                                    <div class="progress">
                                        <div class="progress-bar theme-bg" role="progressbar"
                                             style="width: {{ 100 - (($index % 4) * 20) }}%"
                                             aria-valuenow="{{ 100 - (($index % 4) * 20) }}"
                                             aria-valuemin="0"
                                             aria-valuemax="100">
                                        </div>
                                    </div>
                                    <span class="progress-text">Terjual: {{ 50 - (($index % 4) * 10) }}/50</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12">
                    <div class="text-center py-5">
                        <i class="fas fa-tags fa-3x text-muted mb-3"></i>
                        <h4 class="text-muted">Belum ada produk promo</h4>
                        <p class="text-muted">Promo akan segera tersedia</p>
                        <a href="{{ route('shop') }}" class="web-btn btn-sm theme-bg white">Lihat Semua Produk</a>
                    </div>
                </div>
                @endforelse
            </div>
        </div>
    </div>
    <!-- promo-products-area-end -->
</x-layoutUser>
