<x-layoutUser>
    <!-- ====== breadcrumb-area-start ============================================ -->
    <div class="breadcrumb-area mt-30">
        <div class="container">
            <div class="breadcrumb-bg pt-40 pb-40 pl-50 pr-50">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="breadcrumb-content text-center mt-5">
                            <h2 class="page-title">Tentang Kami</h2>
                            <ul class="list-none d-flex justify-content-center">
                                <li><a href="{{ url('/') }}" class="theme-color">Home</a></li>
                                <li class="px-2">/</li>
                                <li class="active">Tentang Kami</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb-area-end -->

    <!-- ====== about-content-area-start ============================================ -->
    <div class="about-content-area pt-40 pb-40">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                    <div class="about-content pr-30">
                        <div class="section-title mb-30">
                            <span class="theme-color d-block pb-2">Tentang KingStock</span>
                            <h3>Platform E-commerce Terpercaya Sejak 2022</h3>
                        </div>
                        <p class="mb-3">KingStock adalah platform e-commerce terdepan yang berkomitmen untuk menyediakan produk-produk berkualitas dengan harga terjangkau. Kami hadir untuk memenuhi kebutuhan belanja online masyarakat Indonesia.</p>
                        <p class="mb-3">Dengan pengalaman lebih dari 2 tahun dalam industri e-commerce, kami telah melayani ribuan pelanggan dengan produk-produk pilihan dari berbagai kategori.</p>

                        <div class="about-features mt-30">
                            <div class="row">
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="feature-item d-flex align-items-center mb-20">
                                        <div class="feature-icon theme-bg rounded-circle mr-3">
                                            <i class="fas fa-shipping-fast white"></i>
                                        </div>
                                        <div class="feature-content">
                                            <h6 class="mb-1">Gratis Ongkir</h6>
                                            <p class="mb-0">Min. pembelian Rp 300k</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="feature-item d-flex align-items-center mb-20">
                                        <div class="feature-icon theme-bg rounded-circle mr-3">
                                            <i class="fas fa-shield-alt white"></i>
                                        </div>
                                        <div class="feature-content">
                                            <h6 class="mb-1">Garansi Produk</h6>
                                            <p class="mb-0">Garansi 30 hari</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="feature-item d-flex align-items-center mb-20">
                                        <div class="feature-icon theme-bg rounded-circle mr-3">
                                            <i class="fas fa-headset white"></i>
                                        </div>
                                        <div class="feature-content">
                                            <h6 class="mb-1">Support 24/7</h6>
                                            <p class="mb-0">Customer service siap membantu</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="feature-item d-flex align-items-center mb-20">
                                        <div class="feature-icon theme-bg rounded-circle mr-3">
                                            <i class="fas fa-undo white"></i>
                                        </div>
                                        <div class="feature-content">
                                            <h6 class="mb-1">Return Mudah</h6>
                                            <p class="mb-0">Kebijakan return yang fleksibel</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                    <div class="about-img position-relative">
                        <img src="{{ asset('landing/images/about/about-img.png') }}" alt="About Us" class="width100 rounded">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- about-content-area-end -->

    <!-- ====== team-area-start ============================================ -->
    <div class="team-area pt-40 pb-40 bg-light-gray">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="section-title text-center mb-30">
                        <span class="theme-color d-block pb-2">Tim Kami</span>
                        <h3>Bertemu dengan Tim Profesional</h3>
                    </div>
                </div>
            </div>

            <div class="row">
                @php
                    $team = [
                        ['name' => 'Ahmad Wijaya', 'position' => 'CEO & Founder', 'image' => 'team1.jpg'],
                        ['name' => 'Siti Rahma', 'position' => 'Marketing Director', 'image' => 'team2.jpg'],
                        ['name' => 'Budi Santoso', 'position' => 'Operation Manager', 'image' => 'team3.jpg'],
                        ['name' => 'Maya Sari', 'position' => 'Customer Service Head', 'image' => 'team4.jpg']
                    ];
                @endphp

                @foreach($team as $member)
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="single-team text-center mb-30">
                        <div class="team-img position-relative mb-20">
                            <img src="{{ asset('landing/images/team/' . $member['image']) }}"
                                 alt="{{ $member['name'] }}"
                                 class="width100 rounded-circle">
                            <div class="team-social position-absolute">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-instagram"></i></a>
                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                        <div class="team-content">
                            <h5 class="mb-1">{{ $member['name'] }}</h5>
                            <span class="theme-color">{{ $member['position'] }}</span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- team-area-end -->

    <!-- ====== stats-area-start ============================================ -->
    <div class="stats-area pt-40 pb-40">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="single-stat text-center mb-30">
                        <div class="stat-icon theme-color mb-2">
                            <i class="fas fa-users fa-3x"></i>
                        </div>
                        <h3 class="mb-1"><span class="counter">5000</span>+</h3>
                        <span class="theme-color">Pelanggan Bahagia</span>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="single-stat text-center mb-30">
                        <div class="stat-icon theme-color mb-2">
                            <i class="fas fa-box-open fa-3x"></i>
                        </div>
                        <h3 class="mb-1"><span class="counter">10000</span>+</h3>
                        <span class="theme-color">Produk Terjual</span>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="single-stat text-center mb-30">
                        <div class="stat-icon theme-color mb-2">
                            <i class="fas fa-store fa-3x"></i>
                        </div>
                        <h3 class="mb-1"><span class="counter">500</span>+</h3>
                        <span class="theme-color">Mitra Seller</span>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="single-stat text-center mb-30">
                        <div class="stat-icon theme-color mb-2">
                            <i class="fas fa-trophy fa-3x"></i>
                        </div>
                        <h3 class="mb-1"><span class="counter">25</span>+</h3>
                        <span class="theme-color">Penghargaan</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- stats-area-end -->
</x-layoutUser>
