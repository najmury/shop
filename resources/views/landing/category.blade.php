<x-layoutUser>
    <!-- ====== breadcrumb-area-start ============================================ -->
    <div class="breadcrumb-area mt-30">
        <div class="container">
            <div class="breadcrumb-bg pt-40 pb-40 pl-50 pr-50">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="breadcrumb-content text-center mt-5">
                            <h2 class="page-title">{{ $kategori->nama_kategori }}</h2>
                            <ul class="list-none d-flex justify-content-center">
                                <li><a href="{{ url('/') }}" class="theme-color">Home</a></li>
                                <li class="px-2">/</li>
                                <li><a href="{{ route('categories') }}" class="theme-color">Kategori</a></li>
                                <li class="px-2">/</li>
                                <li class="active">{{ $kategori->nama_kategori }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb-area-end -->

    <!-- ====== category-products-area-start ============================================ -->
    <div class="shop-area pt-40 pb-40">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="shop-top-bar mb-30">
                        <div class="row align-items-center">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="show-result">
                                    <p>Menampilkan {{ $produks->firstItem() }}–{{ $produks->lastItem() }} dari {{ $produks->total() }} hasil</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Product Grid -->
                    <div class="row">
                        @forelse($produks as $produk)
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
                                        <h6><a href="{{ route('product.detail', $produk->id) }}">{{ \Illuminate\Support\Str::limit($produk->nama_produk, 50) }}</a></h6>
                                        <div class="product-category mb-10">
                                            <span class="badge bg-secondary">{{ $produk->kategori->nama_kategori ?? '-' }}</span>
                                        </div>
                                        <ul class="single-product-price d-flex transition-3">
                                            <li>
                                                <span class="primary-color">Rp {{ number_format($produk->harga, 0, ',', '.') }}</span>
                                            </li>
                                        </ul>
                                        <div class="product-stock">
                                            <small class="{{ $produk->stok > 0 ? 'text-success' : 'text-danger' }}">
                                                Stok: {{ $produk->stok }}
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="col-12">
                            <div class="text-center py-5">
                                <i class="fas fa-box-open fa-3x text-muted mb-3"></i>
                                <h4 class="text-muted">Tidak ada produk dalam kategori ini</h4>
                                <p class="text-muted">Silakan lihat kategori lainnya</p>
                                <a href="{{ route('categories') }}" class="web-btn btn-sm theme-bg white">Lihat Semua Kategori</a>
                            </div>
                        </div>
                        @endforelse
                    </div>

                    <!-- Pagination -->
                    @if($produks->hasPages())
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="pagination-area mt-10">
                                {{ $produks->links() }}
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- category-products-area-end -->
</x-layoutUser>
