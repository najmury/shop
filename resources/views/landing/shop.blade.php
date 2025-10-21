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
                            <div class="category-list">
                                <ul class="list-none">
                                    <li class="pb-10{{ !request('kategori') ? ' active' : '' }}">
                                        <a href="{{ route('shop') }}" class="theme-color d-block">Semua Kategori</a>
                                    </li>
                                    @foreach($kategoris as $kategori)
                                    <li class="pb-10{{ request('kategori') == $kategori->id ? ' active' : '' }}">
                                        <a href="{{ route('shop', ['kategori' => $kategori->id]) }}" class="theme-color d-block">
                                            {{ $kategori->nama_kategori }}
                                            <span class="float-right">({{ $kategori->produks->count() }})</span>
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <div class="sidebar-widget mb-30">
                            <h4 class="sidebar-widget-title border-b-light-gray pb-15 mb-20">Filter Harga</h4>
                            <div class="price-filter">
                                <form action="{{ route('shop') }}" method="GET">
                                    @if(request('kategori'))
                                        <input type="hidden" name="kategori" value="{{ request('kategori') }}">
                                    @endif
                                    @if(request('search'))
                                        <input type="hidden" name="search" value="{{ request('search') }}">
                                    @endif
                                    @if(request('sort'))
                                        <input type="hidden" name="sort" value="{{ request('sort') }}">
                                    @endif
                                    <div class="row">
                                        <div class="col-6">
                                            <input type="number" name="min_price" class="form-control" placeholder="Min" value="{{ request('min_price') }}">
                                        </div>
                                        <div class="col-6">
                                            <input type="number" name="max_price" class="form-control" placeholder="Max" value="{{ request('max_price') }}">
                                        </div>
                                    </div>
                                    <button type="submit" class="web-btn btn-sm theme-bg mt-2 w-100">Filter Harga</button>
                                    @if(request('min_price') || request('max_price'))
                                        <a href="{{ route('shop', array_filter(request()->except(['min_price', 'max_price']))) }}" class="web-btn btn-sm btn-secondary mt-2 w-100">Reset Filter</a>
                                    @endif
                                </form>
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
                                    <p>Menampilkan {{ $produks->firstItem() }}–{{ $produks->lastItem() }} dari {{ $produks->total() }} hasil</p>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="product-sort d-flex justify-content-sm-end">
                                    <form action="{{ route('shop') }}" method="GET" class="w-100">
                                        @if(request('kategori'))
                                            <input type="hidden" name="kategori" value="{{ request('kategori') }}">
                                        @endif
                                        @if(request('min_price'))
                                            <input type="hidden" name="min_price" value="{{ request('min_price') }}">
                                        @endif
                                        @if(request('max_price'))
                                            <input type="hidden" name="max_price" value="{{ request('max_price') }}">
                                        @endif
                                        @if(request('search'))
                                            <input type="hidden" name="search" value="{{ request('search') }}">
                                        @endif
                                        <select name="sort" class="border-0 px-3 w-100" onchange="this.form.submit()">
                                            <option value="latest" {{ request('sort') == 'latest' ? 'selected' : '' }}>Default sorting</option>
                                            <option value="name" {{ request('sort') == 'name' ? 'selected' : '' }}>Sort by name</option>
                                            <option value="price_low" {{ request('sort') == 'price_low' ? 'selected' : '' }}>Sort by price: low to high</option>
                                            <option value="price_high" {{ request('sort') == 'price_high' ? 'selected' : '' }}>Sort by price: high to low</option>
                                        </select>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Product Grid -->
                    <div class="row">
                        @forelse($produks as $produk)
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                            <div class="s-p-wrapper">
                                <div class="single-product mb-35">
                                    <div class="single-product-img position-relative over-hidden">
                                        <a class="position-relative d-block" href="{{ route('product.detail', $produk->id) }}">
                                            @if($produk->gambar)
                                                <img src="{{ asset('storage/'.$produk->gambar) }}" alt="{{ $produk->nama_produk }}" style="object-fit: cover; width: 100%; height: 250px;">
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
                                        <h6><a href="{{ route('product.detail', $produk->id) }}">{{ $produk->nama_produk }}</a></h6>
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
                                <h4 class="text-muted">Tidak ada produk ditemukan</h4>
                                <p class="text-muted">Silakan coba dengan filter yang berbeda.</p>
                            </div>
                        </div>
                        @endforelse
                    </div>

                    <!-- Pagination - Default Laravel -->
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="pagination-area mt-10">
                                {{ $produks->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- shop-area-end -->
</x-layoutUser>
