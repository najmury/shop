<x-layoutUser>
    <!-- ====== breadcrumb-area-start ============================================ -->
    <div class="breadcrumb-area mt-30">
        <div class="container">
            <div class="breadcrumb-bg pt-40 pb-40 pl-50 pr-50">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="breadcrumb-content text-center mt-5">
                            <h2 class="page-title">Hubungi Kami</h2>
                            <ul class="list-none d-flex justify-content-center">
                                <li><a href="{{ url('/') }}" class="theme-color">Home</a></li>
                                <li class="px-2">/</li>
                                <li class="active">Kontak</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb-area-end -->

    <!-- ====== contact-info-area-start ============================================ -->
    <div class="contact-info-area pt-40 pb-40">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                    <div class="contact-info-item text-center mb-30">
                        <div class="contact-icon theme-bg rounded-circle d-inline-flex align-items-center justify-content-center mb-20">
                            <i class="fas fa-map-marker-alt white"></i>
                        </div>
                        <div class="contact-info-content">
                            <h5 class="mb-2">Alamat Kami</h5>
                            <p class="mb-0">Jl. Contoh Alamat No. 123<br>Jakarta Selatan, 12345</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                    <div class="contact-info-item text-center mb-30">
                        <div class="contact-icon theme-bg rounded-circle d-inline-flex align-items-center justify-content-center mb-20">
                            <i class="fas fa-phone white"></i>
                        </div>
                        <div class="contact-info-content">
                            <h5 class="mb-2">Telepon</h5>
                            <p class="mb-0">+62 21 1234 5678<br>+62 812 3456 7890</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                    <div class="contact-info-item text-center mb-30">
                        <div class="contact-icon theme-bg rounded-circle d-inline-flex align-items-center justify-content-center mb-20">
                            <i class="fas fa-envelope white"></i>
                        </div>
                        <div class="contact-info-content">
                            <h5 class="mb-2">Email</h5>
                            <p class="mb-0">info@kingstock.com<br>support@kingstock.com</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- contact-info-area-end -->

    <!-- ====== contact-form-area-start ============================================ -->
    <div class="contact-form-area pb-40">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12 mx-auto">
                    <div class="section-title text-center mb-30">
                        <h3>Kirim Pesan kepada Kami</h3>
                        <p>Silakan isi form berikut untuk menghubungi kami</p>
                    </div>

                    <div class="contact-form bg-light-gray pt-40 pb-40 pl-50 pr-50">
                        <form id="contact-form" action="#" method="POST">
                            <div class="row">
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                    <div class="form-group mb-20">
                                        <input type="text" name="name" placeholder="Nama Lengkap" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                    <div class="form-group mb-20">
                                        <input type="email" name="email" placeholder="Alamat Email" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group mb-20">
                                        <input type="text" name="subject" placeholder="Subjek Pesan" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group mb-20">
                                        <textarea name="message" placeholder="Pesan Anda" class="form-control" rows="5" required></textarea>
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group mb-0">
                                        <button type="submit" class="web-btn theme-bg white d-block w-100">Kirim Pesan</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- contact-form-area-end -->

    <!-- ====== map-area-start ============================================ -->
    <div class="map-area">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="map-wrapper">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.521260322283!2d106.8195613506391!3d-6.194741395493371!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f5390917b759%3A0x6b45e67356080477!2sMonumen%20Nasional!5e0!3m2!1sen!2sid!4v1643013957291!5m2!1sen!2sid"
                            width="100%"
                            height="450"
                            style="border:0;"
                            allowfullscreen=""
                            loading="lazy">
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- map-area-end -->
</x-layoutUser>
