<x-layoutUser>
    <!-- ======slider-area-start=========================================== -->
    <div class="slider-area over-hidden">
        <div class="slider-active">
            <div class="single-slider slider-height d-flex align-items-center" data-background="{{ asset('landing/images/slider/slider-bg.jpg') }}">
                <div class="slider-shape position-absolute">
                    <span class="slider-bg-round d-block"></span>
                </div><!-- /slider-shape -->
                <div class="container">
                    <div class="row pt-65 ">
                        <div class="col-xl-6  col-lg-6  col-md-7  col-sm-12 col-12 d-flex align-items-center">
                            <div class="slider-content mt--15">
                                <span data-animation="fadeInLeft" data-delay=".7s" class="d-block theme-color">Styling Product</span>
                                <h2 data-animation="fadeInLeft" data-delay="1s" class="pt-15 mb-1 text-capitalize pb-10">Midgard <br> Shop</h2>
                                <p class="pr-20" data-animation="fadeInLeft" data-delay="1.5s">Temukan produk terbaik dengan kualitas terjamin</p>
                            </div>
                        </div><!-- /col -->
                        <div class="col-xl-6  col-lg-6  col-md-5  col-sm-12 col-12 d-flex align-items-center">
                            <div class="slider-img mt-35" data-animation="fadeInRight" data-delay="1.5s">
                                <img src="{{ asset('landing/images/slider/home1-slider-img1.jpg') }}" alt="">
                            </div>
                        </div><!-- /col -->
                    </div><!-- /row -->
                </div><!-- /container -->
            </div><!-- /single-slider -->
        </div><!-- /slider-active -->
    </div>
    <!-- slider-area-end=  -->

    <!-- ====== product-area-start================================ -->
    <div class="product-area pb-40 mt-4">
        <div class="container">
            <div class="product-content single-product-tab-content">
                <div class="row">
                    <div class="col-xl-12  col-lg-12  col-md-12  col-sm-12 col-12 pb-15">
                        <div class="section-title text-center">
                            <span class="theme-color d-block pb-2">Featured Product</span>
                            <h3>Produk Unggulan</h3>
                        </div><!-- /section-title -->
                    </div><!-- /col -->
                </div><!-- /row -->
                <div class="popular-product mt-30">
                    <div class="row">
                        @forelse($featuredProducts as $produk)
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
                                    </div><!-- /single-product-img -->
                                    <div class="single-product-info position-relative mt-25">
                                        <h6><a href="{{ route('product.detail', $produk->id) }}">{{ \Illuminate\Support\Str::limit($produk->nama_produk, 50) }}</a></h6>
                                        <div class="product-category mb-10">
                                            <span class="badge bg-secondary">{{ $produk->kategori->nama_kategori ?? '-' }}</span>
                                        </div>
                                        <ul class="single-product-price d-flex transition-3">
                                            <li>
                                                <span class="primary-color">Rp {{ number_format($produk->harga, 0, ',', '.') }}</span>
                                            </li>
                                        </ul><!-- /single-product-price -->
                                        <div class="product-stock">
                                            <small class="{{ $produk->stok > 0 ? 'text-success' : 'text-danger' }}">
                                                Stok: {{ $produk->stok }}
                                            </small>
                                        </div>
                                    </div>
                                </div><!-- /single-product -->
                            </div>
                        </div><!-- /col -->
                        @empty
                        <div class="col-12">
                            <div class="text-center py-5">
                                <i class="fas fa-box-open fa-3x text-muted mb-3"></i>
                                <h4 class="text-muted">Belum ada produk unggulan</h4>
                                <p class="text-muted">Produk akan segera tersedia</p>
                            </div>
                        </div>
                        @endforelse
                    </div><!-- /row -->
                </div>
            </div><!-- /product-content -->
        </div><!-- /container -->
    </div>
    <!-- product-area-end  -->

    <!-- ====== best-seller-product-area-start================================ -->
    <div class="product-area best-seller-product-area pb-40">
        <div class="container">
            <div class="product-content single-product-tab-content">
                <div class="row">
                    <div class="col-xl-12  col-lg-12  col-md-12  col-sm-12 col-12 pb-15">
                        <div class="section-title text-center">
                            <span class="theme-color d-block pb-2">Regular Product</span>
                            <h3>Produk Terlaris</h3>
                        </div><!-- /section-title -->
                    </div><!-- /col -->
                </div><!-- /row -->
                <div class="popular-product mt-30">
                    <div class="row">
                        @forelse($bestSellerProducts as $produk)
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
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
                                        @elseif($produk->created_at->gt(now()->subDays(7)))
                                        <div class="single-product-label position-absolute primary-bg text-center px-2 transition-3 z-index1">
                                            <span class="white text-uppercase d-block">Baru</span>
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
                                    </div><!-- /single-product-img -->
                                    <div class="single-product-info position-relative mt-25">
                                        <h6><a href="{{ route('product.detail', $produk->id) }}">{{ \Illuminate\Support\Str::limit($produk->nama_produk, 40) }}</a></h6>
                                        <div class="product-category mb-10">
                                            <span class="badge bg-secondary">{{ $produk->kategori->nama_kategori ?? '-' }}</span>
                                        </div>
                                        <ul class="single-product-price d-flex transition-3">
                                            <li>
                                                <span class="primary-color">Rp {{ number_format($produk->harga, 0, ',', '.') }}</span>
                                            </li>
                                        </ul><!-- /single-product-price -->
                                        <div class="product-stock">
                                            <small class="{{ $produk->stok > 0 ? 'text-success' : 'text-danger' }}">
                                                Stok: {{ $produk->stok }}
                                            </small>
                                        </div>
                                    </div>
                                </div><!-- /single-product -->
                            </div>
                        </div><!-- /col -->
                        @empty
                        <div class="col-12">
                            <div class="text-center py-5">
                                <i class="fas fa-box-open fa-3x text-muted mb-3"></i>
                                <h4 class="text-muted">Belum ada produk terlaris</h4>
                                <p class="text-muted">Produk akan segera tersedia</p>
                            </div>
                        </div>
                        @endforelse
                    </div><!-- /row -->
                </div>
            </div><!-- /product-content -->
        </div><!-- /container -->
    </div>
    <!-- best-seller-product-area-end  -->
</x-layoutUser>
