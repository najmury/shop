<x-layoutUser>
    @section('title', 'Kategori - KingStock')
    @section('page-class', 'page-categories')
    @section('categories-active', 'active')

    <!-- ====== breadcrumb-area-start ============================================ -->
    <div class="breadcrumb-area mt-30">
        <div class="container">
            <div class="breadcrumb-bg pt-40 pb-40 pl-50 pr-50">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="breadcrumb-content text-center mt-5">
                            <h2 class="page-title">Kategori Produk</h2>
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
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="section-title text-center mb-40">
                        <span class="theme-color d-block pb-2" style="font-size: 18px; font-weight: 600;">🎯 Pilih Kategori Favorit</span>
                        <h3 style="color: #2d3436;">Jelajahi Berbagai Kategori</h3>
                        <p class="mt-2" style="color: #636e72;">Temukan produk yang sesuai dengan kebutuhan Anda</p>
                    </div>
                </div>
            </div>

            <div class="row">
                @php
                    $categories = [
                        ['name' => 'Furniture', 'count' => 25, 'icon' => '🪑'],
                        ['name' => 'Dekorasi Rumah', 'count' => 18, 'icon' => '🏠'],
                        ['name' => 'Elektronik', 'count' => 32, 'icon' => '📱'],
                        ['name' => 'Fashion', 'count' => 47, 'icon' => '👕'],
                        ['name' => 'Otomotif', 'count' => 15, 'icon' => '🚗'],
                        ['name' => 'Olahraga', 'count' => 22, 'icon' => '⚽'],
                        ['name' => 'Kecantikan', 'count' => 28, 'icon' => '💄'],
                        ['name' => 'Mainan & Hobi', 'count' => 19, 'icon' => '🎮']
                    ];
                @endphp

                @foreach($categories as $category)
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="single-category mb-30 text-center">
                        <div class="category-icon mb-3"
                             style="width: 80px; height: 80px; background: color-mix(in srgb, var(--theme-bg) 10%, white 90%);
                                    border-radius: 50%; display: flex; align-items: center; justify-content: center;
                                    margin: 0 auto; font-size: 30px;">
                            {{ $category['icon'] }}
                        </div>
                        <div class="category-content">
                            <h5 style="color: #2d3436;">{{ $category['name'] }}</h5>
                            <span class="theme-color">{{ $category['count'] }} Produk</span>
                            <a href="#" class="web-btn btn-sm theme-bg white mt-2 d-inline-block"
                               style="padding: 8px 20px; border-radius: 20px; font-size: 12px;">
                                Jelajahi
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</x-layoutUser>
