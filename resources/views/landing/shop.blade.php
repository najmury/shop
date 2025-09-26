<x-layoutUser>
    <!-- ====== breadcrumb-area-start ============================================ -->
    <div class="breadcrumb-area mt-30">
        <div class="container">
            <div class="breadcrumb-bg pt-40 pb-40 pl-50 pr-50">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="breadcrumb-content text-center mt-5">
                            <h2 class="page-title">Shop</h2>
                            <ul class="list-none d-flex justify-content-center">
                                <li><a href="{{ url('/') }}" class="theme-color">Home</a></li>
                                <li class="px-2">/</li>
                                <li class="active">Shop</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb-area-end -->

    <!-- ====== shop-area-start ============================================ -->
    <div class="shop-area pt-40 pb-40">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-4 col-md-12 col-sm-12 col-12">
                    <!-- Sidebar Filter -->
                    <div class="shop-sidebar mb-30">
                        <div class="sidebar-widget mb-30">
                            <h4 class="sidebar-widget-title border-b-light-gray pb-15 mb-20">Kategori</h4>
                            <div class="sidebar-category">
                                <ul>
                                    <li><a href="#" class="d-block pb-10">Furniture <span>(25)</span></a></li>
                                    <li><a href="#" class="d-block pb-10">Dekorasi <span>(18)</span></a></li>
                                    <li><a href="#" class="d-block pb-10">Elektronik <span>(32)</span></a></li>
                                    <li><a href="#" class="d-block pb-10">Fashion <span>(47)</span></a></li>
                                    <li><a href="#" class="d-block">Otomotif <span>(15)</span></a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="sidebar-widget mb-30">
                            <h4 class="sidebar-widget-title border-b-light-gray pb-15 mb-20">Filter Harga</h4>
                            <div class="price-filter">
                                <div id="slider-range" class="mb-20"></div>
                                <div class="price-slider-amount">
                                    <input type="text" id="amount" name="price" placeholder="Add Your Price" />
                                    <button class="web-btn btn-sm theme-bg">Filter</button>
                                </div>
                            </div>
                        </div>

                        <div class="sidebar-widget">
                            <h4 class="sidebar-widget-title border-b-light-gray pb-15 mb-20">Produk Terbaru</h4>
                            <div class="recent-product-wrapper">
                                <div class="recent-product-item d-flex mb-15">
                                    <div class="recent-product-img">
                                        <a href="#"><img src="{{ asset('landing/images/product/product-sm1.jpg') }}" alt=""></a>
                                    </div>
                                    <div class="recent-product-content">
                                        <h6><a href="#">Kursi Minimalis</a></h6>
                                        <span class="primary-color">Rp 450.000</span>
                                    </div>
                                </div>
                                <div class="recent-product-item d-flex mb-15">
                                    <div class="recent-product-img">
                                        <a href="#"><img src="{{ asset('landing/images/product/product-sm2.jpg') }}" alt=""></a>
                                    </div>
                                    <div class="recent-product-content">
                                        <h6><a href="#">Lampu Meja LED</a></h6>
                                        <span class="primary-color">Rp 120.000</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-9 col-lg-8 col-md-12 col-sm-12 col-12">
                    <!-- Shop Top Bar -->
                    <div class="shop-top-bar mb-30">
                        <div class="row align-items-center">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="show-result">
                                    <p>Menampilkan 1–12 dari 25 hasil</p>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="product-sort d-flex justify-content-sm-end">
                                    <select class="border-0 px-3">
                                        <option value="">Default sorting</option>
                                        <option value="">Sort by popularity</option>
                                        <option value="">Sort by average rating</option>
                                        <option value="">Sort by latest</option>
                                        <option value="">Sort by price: low to high</option>
                                        <option value="">Sort by price: high to low</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Product Grid -->
                    <div class="row">
                        @for($i = 1; $i <= 12; $i++)
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                            <div class="s-p-wrapper">
                                <div class="single-product mb-35">
                                    <div class="single-product-img position-relative over-hidden">
                                        <a class="position-relative d-block" href="{{ url('/product-detail') }}">
                                            <img class="width50 height50" src="{{ asset('landing/images/product/product'.$i.'.png') }}" alt="Product {{ $i }}">
                                        </a>
                                        @if($i % 3 == 0)
                                        <div class="single-product-label position-absolute theme-bg text-center px-2 transition-3 z-index1">
                                            <span class="white text-uppercase d-block"><span>15% </span>off</span>
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
                                            <li data-toggle="tooltip" data-placement="top" title="Quick view">
                                                <a href="#" class="text-center mb-10 white-bg primary-color d-block" data-toggle="modal" data-target="#product-modal">
                                                    <span><i class="far fa-expand-wide"></i></span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="single-product-info position-relative mt-25">
                                        <h6><a href="{{ url('/product-detail') }}">Nama Produk {{ $i }}</a></h6>
                                        <div class="product-rating mb-10">
                                            <span class="theme-color"><i class="fas fa-star"></i></span>
                                            <span class="theme-color"><i class="fas fa-star"></i></span>
                                            <span class="theme-color"><i class="fas fa-star"></i></span>
                                            <span class="theme-color"><i class="fas fa-star"></i></span>
                                            <span class="theme-color"><i class="fas fa-star-half-alt"></i></span>
                                        </div>
                                        <ul class="single-product-price d-flex transition-3">
                                            <li>
                                                <span class="gray-color pr-2"><del>Rp 999.000</del></span>
                                                <span class="primary-color">Rp 799.000</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endfor
                    </div>

                    <!-- Pagination -->
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="pagination-area mt-10">
                                <nav>
                                    <ul class="pagination justify-content-center">
                                        <li class="page-item disabled"><a class="page-link" href="#"><i class="far fa-angle-double-left"></i></a></li>
                                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item"><a class="page-link" href="#"><i class="far fa-angle-double-right"></i></a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- shop-area-end -->
</x-layoutUser>
