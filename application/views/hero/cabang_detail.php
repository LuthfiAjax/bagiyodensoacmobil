<!-- Carousel Start -->
<div class="container-fluid p-0 mb-5">
    <div id="header-carousel" class="carousel slide" data-bs-ride="carousel" style="max-height: 600px; overflow: hidden;">
        <!-- Hanya 1 indikator -->
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#header-carousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        </div>

        <div class="carousel-inner">
            <!-- Slide 1 Saja -->
            <div class="carousel-item active">
                <img class="w-100" src="<?= base_url('assets/img/slide/1.jpg'); ?>" alt="Image" style="height: 600px; object-fit: cover; filter: brightness(0.8);">
                <div class="carousel-caption d-flex align-items-center">
                    <div class="container">
                        <div class="row align-items-center justify-content-between">

                            <!-- Teks Kiri -->
                            <div class="col-lg-6 text-white text-start">
                                <h3 class="fs-4 fw-light text-warning mb-2 animate__animated animate__fadeInUp">CABANG BAGIYO DENSO AC MOBIL</h3>
                                <h1 class="display-5 text-light fw-bold mb-4 animate__animated animate__fadeInUp">KAMI HADIR DI GROBOGAN & KUDUS</h1>
                                <p class="fs-5 mb-4 animate__animated animate__fadeInUp">Kunjungi cabang kami di Grobogan dan Kudus untuk layanan servis dan perawatan AC mobil terpercaya. Teknisi berpengalaman dan harga bersahabat.</p>
                                <div class="animate__animated animate__fadeInUp">
                                    <a href="https://api.whatsapp.com/send/?phone=6281325545071&text=Halo%21%20Saya%20ingin%20mengetahui%20lebih%20lanjut%20tentang%20cabang%20Bagiyo%20Denso.&type=phone_number&app_absent=0" target="_blank" class="btn btn-primary rounded-pill me-2 mb-0 py-md-3 px-md-4 py-2 px-2 fs-md-6 fs-6">
                                        <i class="fas fa-calendar-check me-1"></i> Booking Sekarang
                                    </a>
                                    <a href="https://maps.app.goo.gl/K8wGoELM1fTzSvdJ8" target="_blank" class="btn btn-outline-light rounded-pill py-md-3 px-md-4 py-2 px-2 fs-md-6 fs-6">
                                        <i class="fas fa-map-marker-alt me-1"></i> Cek Rute Purwodadi
                                    </a>
                                </div>
                            </div>

                            <!-- Gambar Kanan -->
                            <div class="col-lg-5 d-none d-lg-block text-end animate__animated animate__fadeInRight">
                                <img src="<?= base_url('assets/img/new/model-1.svg'); ?>" class="img-fluid rounded-lg shadow" alt="Image" style="width: 100%;">
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Carousel End -->


<!-- Contact (Cabang) Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-4">
            <div class="col-12">
                <div class="row g-4">
                    <!-- Email -->
                    <div class="col-md-3">
                        <div class="bg-light d-flex flex-column justify-content-center p-2 h-100">
                            <h5 class="text-uppercase">// Email //</h5>
                            <p class="m-0">
                                <i class="fas fa-envelope-open text-primary me-2"></i>
                                official@bagiyodensoacmobil.com
                            </p>
                        </div>
                    </div>

                    <!-- Telepon -->
                    <div class="col-md-3">
                        <div class="bg-light d-flex flex-column justify-content-center p-2 h-100">
                            <h5 class="text-uppercase">// Telepon //</h5>
                            <p class="m-0">
                                <i class="fas fa-phone-alt text-primary me-2"></i>
                                +62 813-2554-5071
                            </p>
                        </div>
                    </div>

                    <!-- Sosial Media -->
                    <div class="col-md-3">
                        <div class="bg-light d-flex flex-column justify-content-center p-2 h-100">
                            <h5 class="text-uppercase">// Sosial Media //</h5>
                            <p class="m-0">
                                <i class="fab fa-instagram text-primary me-2"></i>
                                @bagiyo.ac
                            </p>
                        </div>
                    </div>

                    <!-- Jam Operasional -->
                    <div class="col-md-3">
                        <div class="bg-light d-flex flex-column justify-content-center p-3 h-100">
                            <h5 class="text-uppercase">// Jam Operasional //</h5>
                            <div class="d-flex justify-content-between">
                                <span>Senin - Sabtu</span>
                                <span>: 08.00 - 17.00 WIB</span>
                            </div>
                            <div class="d-flex justify-content-between">
                                <span>Minggu</span>
                                <span>: 08.30 - 14.30 WIB</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Lokasi Cabang Grobogan -->
            <div class="container-xxl py-5">
                <div class="container">
                    <div class="row justify-content-center text-center mb-4">
                        <div class="col-lg-8">
                            <h3 class="fw-bold text-uppercase mb-3">Lokasi Kami di Cabang Grobogan</h3>
                            <p class="text-muted">Kunjungi bengkel kami untuk layanan perawatan dan servis AC mobil terbaik di wilayah Purwodadi, Grobogan, Jawa Tengah.</p>
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-12 wow fadeIn" data-wow-delay="0.1s">
                            <div class="map-container position-relative" style="width: 100%; height: 500px; border-radius: 10px; overflow: hidden;">
                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3797.963280064623!2d110.91531911850234!3d-7.097380583136126!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e70b013aafd861d%3A0xaffab44599a8f835!2sBengkel%20Bagiyo%20Denso%20AC%20Mobil!5e0!3m2!1sid!2sid!4v1688242510172!5m2!1sid!2sid"
                                    width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                                </iframe>
                            </div>

                            <!-- Tombol Aksi -->
                            <div class="text-center mt-4">
                                <a href="https://maps.app.goo.gl/K8wGoELM1fTzSvdJ8" target="_blank" class="btn btn-primary rounded-pill py-3 px-5">
                                    <i class="fas fa-map-marker-alt me-2"></i> Kunjungi Lokasi
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Review Pelanggan Start -->
            <div class="container-xxl py-5 bg-light-subtle">
                <div class="container">
                    <div class="text-center mb-5">
                        <h3 class="fw-bold text-uppercase mb-3">Ulasan Pelanggan Kami</h3>
                        <p class="text-muted">Pendapat jujur pelanggan yang telah mempercayakan perawatan AC mobilnya kepada Bagiyo Denso.</p>
                    </div>

                    <div class="row g-4">
                        <!-- Review 1 -->
                        <div class="col-md-3 col-sm-6">
                            <div class="bg-white shadow-sm rounded p-4 h-100">
                                <div class="text-warning mb-2">
                                    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                                </div>
                                <p class="text-muted fst-italic mb-3">“Pelayanannya cepat dan ramah. AC mobil saya kembali dingin seperti baru!”</p>
                                <h6 class="fw-bold mb-0 text-primary">Rizki A.</h6>
                                <small class="text-muted">Grobogan</small>
                            </div>
                        </div>

                        <!-- Review 2 -->
                        <div class="col-md-3 col-sm-6">
                            <div class="bg-white shadow-sm rounded p-4 h-100">
                                <div class="text-warning mb-2">
                                    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half-alt"></i>
                                </div>
                                <p class="text-muted fst-italic mb-3">“Harga bersahabat dan hasil servisnya memuaskan. Rekomendasi banget!”</p>
                                <h6 class="fw-bold mb-0 text-primary">Lukman S.</h6>
                                <small class="text-muted">Kudus</small>
                            </div>
                        </div>

                        <!-- Review 3 -->
                        <div class="col-md-3 col-sm-6">
                            <div class="bg-white shadow-sm rounded p-4 h-100">
                                <div class="text-warning mb-2">
                                    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                                </div>
                                <p class="text-muted fst-italic mb-3">“Teknisi profesional dan penjelasan sangat detail. AC mobil adem maksimal.”</p>
                                <h6 class="fw-bold mb-0 text-primary">Dwi P.</h6>
                                <small class="text-muted">Purwodadi</small>
                            </div>
                        </div>

                        <!-- Review 4 -->
                        <div class="col-md-3 col-sm-6">
                            <div class="bg-white shadow-sm rounded p-4 h-100">
                                <div class="text-warning mb-2">
                                    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half-alt"></i>
                                </div>
                                <p class="text-muted fst-italic mb-3">“Datang tanpa janji langsung dilayani cepat. Terima kasih Bagiyo Denso!”</p>
                                <h6 class="fw-bold mb-0 text-primary">Sinta R.</h6>
                                <small class="text-muted">Kudus</small>
                            </div>
                        </div>

                        <!-- Review 5 -->
                        <div class="col-md-3 col-sm-6">
                            <div class="bg-white shadow-sm rounded p-4 h-100">
                                <div class="text-warning mb-2">
                                    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                                </div>
                                <p class="text-muted fst-italic mb-3">“Sudah langganan di sini. Kualitas servisnya konsisten dari dulu.”</p>
                                <h6 class="fw-bold mb-0 text-primary">Bambang T.</h6>
                                <small class="text-muted">Demak</small>
                            </div>
                        </div>

                        <!-- Review 6 -->
                        <div class="col-md-3 col-sm-6">
                            <div class="bg-white shadow-sm rounded p-4 h-100">
                                <div class="text-warning mb-2">
                                    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                                </div>
                                <p class="text-muted fst-italic mb-3">“Ruang tunggu nyaman, teknisi informatif, hasil kerja rapi.”</p>
                                <h6 class="fw-bold mb-0 text-primary">Nur H.</h6>
                                <small class="text-muted">Grobogan</small>
                            </div>
                        </div>

                        <!-- Review 7 -->
                        <div class="col-md-3 col-sm-6">
                            <div class="bg-white shadow-sm rounded p-4 h-100">
                                <div class="text-warning mb-2">
                                    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half-alt"></i><i class="fa fa-star"></i>
                                </div>
                                <p class="text-muted fst-italic mb-3">“Servis cepat dan hasil bagus. Stafnya sangat sopan dan membantu.”</p>
                                <h6 class="fw-bold mb-0 text-primary">Fauzan L.</h6>
                                <small class="text-muted">Jepara</small>
                            </div>
                        </div>

                        <!-- Review 8 -->
                        <div class="col-md-3 col-sm-6">
                            <div class="bg-white shadow-sm rounded p-4 h-100">
                                <div class="text-warning mb-2">
                                    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                                </div>
                                <p class="text-muted fst-italic mb-3">“Harga sesuai kualitas, hasil memuaskan. Pasti balik lagi kalau butuh servis.”</p>
                                <h6 class="fw-bold mb-0 text-primary">Maya D.</h6>
                                <small class="text-muted">Kudus</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Review Pelanggan End -->

        </div>
    </div>
</div>
<!-- Contact (Cabang) End -->