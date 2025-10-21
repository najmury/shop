<x-layoutUser>
    <!-- ====== breadcrumb-area-start ============================================ -->
    <div class="breadcrumb-area mt-30">
        <div class="container">
            <div class="breadcrumb-bg pt-40 pb-40 pl-50 pr-50">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="breadcrumb-content text-center mt-5">
                            <h2 class="page-title">Semua Kategori</h2>
                            <ul class="list-none d-flex justify-content-center">
                                <li><a href="{{ url('/') }}" class="theme-color">Home</a></li>
                                <li class="px-2">/</li>
                                <li class="active">Kategori</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb-area-end -->

    <!-- ====== categories-area-start ============================================ -->
    <div class="categories-area pt-40 pb-40">
        <div class="container">
            <div class="row">
                @forelse($kategoris as $kategori)
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-30">
                    <div class="single-category text-center position-relative over-hidden">
                        <a href="{{ route('category', $kategori->id) }}" class="d-block">
                            <div class="category-img mb-20">
                                <div class="bg-light d-flex align-items-center justify-content-center rounded-circle mx-auto" style="width: 120px; height: 120px;">
                                    <i class="fas fa-folder text-muted fa-3x"></i>
                                </div>
                            </div>
                            <div class="category-content">
                                <h5 class="mb-2">{{ $kategori->nama_kategori }}</h5>
                                <span class="theme-color">{{ $kategori->produks_count ?? 0 }} Produk</span>
                            </div>
                        </a>
                    </div>
                </div>
                @empty
                <div class="col-12">
                    <div class="text-center py-5">
                        <i class="fas fa-folder-open fa-3x text-muted mb-3"></i>
                        <h4 class="text-muted">Belum ada kategori</h4>
                        <p class="text-muted">Kategori akan segera tersedia</p>
                    </div>
                </div>
                @endforelse
            </div>
        </div>
    </div>
    <!-- categories-area-end -->
</x-layoutUser>
