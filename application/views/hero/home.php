<!-- ============ Component Styles (tanpa font & tanpa :root) ============ -->
<style>
    /* ===== Feature / Keunggulan ===== */
    .feature-wrap {
        background: #fff;
        border: 1px solid #e9eef5;
        border-radius: 16px;
        padding: 18px;
        height: 100%;
        box-shadow: 0 8px 20px rgba(0, 0, 0, .06);
        transition: transform .2s ease, box-shadow .2s ease;
    }

    .feature-wrap:hover {
        transform: translateY(-2px);
        box-shadow: 0 16px 36px rgba(0, 0, 0, .12);
    }

    .feature-icon {
        width: 56px;
        height: 56px;
        border-radius: 14px;
        display: grid;
        place-items: center;
        background: rgba(13, 110, 253, .1);
        color: var(--bs-primary);
    }

    /* ===== About (ringan) ===== */
    .about-badge {
        background: rgba(0, 0, 0, .5);
        border-radius: 12px;
        backdrop-filter: blur(2px);
    }

    /* ===== CTA (sama gaya dengan halaman lain) ===== */
    .cta-wrap {
        background:
            radial-gradient(110% 120% at 0% 0%, rgba(13, 110, 253, .10) 0%, rgba(13, 110, 253, .04) 50%, transparent 100%),
            #fff;
        border: 1px solid #e9eef5;
        border-radius: 18px;
        padding: 36px 22px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, .08);
    }

    /* === Modal Styling === */
    .gallery-modal {
        display: none;
        position: fixed;
        z-index: 1050;
        inset: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.85);
        justify-content: center;
        align-items: center;
        padding: 20px;
    }

    .gallery-modal-content {
        max-width: 90%;
        max-height: 90%;
        border-radius: 10px;
        box-shadow: 0 0 20px rgba(255, 255, 255, 0.3);
        animation: zoomIn 0.4s ease;
    }

    .gallery-close {
        position: absolute;
        top: 25px;
        right: 40px;
        color: white;
        font-size: 35px;
        font-weight: bold;
        cursor: pointer;
        transition: color 0.3s ease;
    }

    .gallery-close:hover {
        color: #ffcc00;
    }
</style>

<!-- ===================== Carousel Start ===================== -->
<div class="container-fluid p-0 mb-5">
    <div id="header-carousel" class="carousel slide" data-bs-ride="carousel" style="max-height:600px;overflow:hidden;">
        <!-- Indicators -->
        <div class="carousel-indicators">
            <?php foreach ($sliders as $i => $s): ?>
                <button type="button" data-bs-target="#header-carousel"
                    data-bs-slide-to="<?= $i; ?>"
                    class="<?= $i === 0 ? 'active' : ''; ?>"
                    aria-label="Slide <?= $i + 1; ?>"></button>
            <?php endforeach; ?>
        </div>

        <div class="carousel-inner">
            <?php foreach ($sliders as $i => $s): ?>
                <div class="carousel-item <?= $i === 0 ? 'active' : ''; ?>">
                    <img class="w-100"
                        src="<?= base_url($s['image_background']); ?>"
                        alt="<?= htmlspecialchars($s['title']); ?>"
                        style="height:600px;object-fit:cover;filter:brightness(0.8);">

                    <div class="carousel-caption d-flex align-items-center">
                        <div class="container">
                            <?php if ($s['tipe'] === 'medsos' || $s['tipe'] === 'promo'): ?>
                                <!-- MEDSOS / PROMO -->
                                <div class="row justify-content-center text-center">
                                    <div class="col-lg-8 text-white animate__animated animate__fadeInUp">
                                        <h3 class="fw-light text-warning mb-2"><?= $s['subtitle']; ?></h3>
                                        <h1 class="display-5 text-light fw-bold mb-4"><?= $s['title']; ?></h1>

                                        <?php if ($s['tipe'] === 'promo' && !empty($s['image_side'])): ?>
                                            <div class="mb-4 d-none d-lg-block">
                                                <img src="<?= base_url($s['image_side']); ?>" alt="Promo Image" class="img-fluid rounded shadow">
                                            </div>
                                        <?php endif; ?>

                                        <div class="d-flex flex-wrap justify-content-center gap-3">
                                            <?php foreach ($s['links'] as $lnk): ?>
                                                <a href="<?= $lnk['url']; ?>" target="_blank"
                                                    class="btn <?= $lnk['btn_style']; ?> py-2 px-4 rounded-pill">
                                                    <i class="<?= $lnk['icon_class']; ?> me-2"></i> <?= $lnk['label']; ?>
                                                </a>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>

                            <?php elseif ($s['tipe'] === 'left' || $s['tipe'] === 'right'): ?>
                                <!-- LEFT / RIGHT -->
                                <div class="row align-items-center justify-content-between">
                                    <?php if ($s['tipe'] === 'left' && !empty($s['image_side'])): ?>
                                        <div class="col-lg-5 d-none d-lg-block text-start animate__animated animate__fadeInLeft">
                                            <img src="<?= base_url($s['image_side']); ?>" class="img-fluid rounded-lg shadow" alt="Image" style="width:100%;">
                                        </div>
                                    <?php endif; ?>

                                    <!-- Konten Desktop -->
                                    <div class="col-lg-6 text-white text-<?= $s['tipe'] === 'left' ? 'end' : 'start'; ?> d-none d-lg-block">
                                        <h3 class="fw-light text-warning mb-2 animate__animated animate__fadeInUp"><?= $s['subtitle']; ?></h3>
                                        <h1 class="display-5 text-light fw-bold mb-4 animate__animated animate__fadeInUp"><?= $s['title']; ?></h1>
                                        <p class="fs-5 mb-4 animate__animated animate__fadeInUp"><?= $s['description']; ?></p>
                                        <div class="animate__animated animate__fadeInUp d-flex flex-wrap justify-content-<?= $s['tipe'] === 'left' ? 'end' : 'start'; ?>">
                                            <?php foreach ($s['links'] as $lnk): ?>
                                                <a href="<?= $lnk['url']; ?>" target="_blank"
                                                    class="btn <?= $lnk['btn_style']; ?> rounded-pill me-2 mb-2 py-2 px-3">
                                                    <i class="<?= $lnk['icon_class']; ?> me-1"></i> <?= $lnk['label']; ?>
                                                </a>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>

                                    <?php if ($s['tipe'] === 'right' && !empty($s['image_side'])): ?>
                                        <div class="col-lg-5 d-none d-lg-block text-end animate__animated animate__fadeInRight">
                                            <img src="<?= base_url($s['image_side']); ?>" class="img-fluid rounded-lg shadow" alt="Image" style="width:100%;">
                                        </div>
                                    <?php endif; ?>

                                    <!-- Konten Mobile (Tambahan Baru) -->
                                    <div class="col-12 text-white text-center d-block d-lg-none mt-3">
                                        <h4 class="fw-light text-warning mb-2"><?= $s['subtitle']; ?></h4>
                                        <h2 class="fw-bold text-light mb-3"><?= $s['title']; ?></h2>
                                        <p class="fs-6 mb-3"><?= $s['description']; ?></p>
                                        <div class="d-flex flex-wrap justify-content-center gap-2">
                                            <?php foreach ($s['links'] as $lnk): ?>
                                                <a href="<?= $lnk['url']; ?>" target="_blank"
                                                    class="btn <?= $lnk['btn_style']; ?> rounded-pill py-2 px-3">
                                                    <i class="<?= $lnk['icon_class']; ?> me-1"></i> <?= $lnk['label']; ?>
                                                </a>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<!-- ===================== Carousel End ===================== -->

<!-- ===================== Keunggulan Start ===================== -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mb-4">
            <h6 class="text-primary text-uppercase">// Keunggulan Kami //</h6>
            <h2 class="mb-5">Kenapa Kami Dipercaya Sejak Tahun 2000?</h2>
        </div>

        <div class="row g-4">

            <!-- 1. Spesialis AC Mobil Terkemuka -->
            <div class="col-lg-6 col-md-6">
                <div class="feature-wrap d-flex py-4 px-3">
                    <div class="feature-icon flex-shrink-0">
                        <i class="fa fa-snowflake"></i>
                    </div>
                    <div class="ps-3">
                        <h5 class="mb-2 fs-5">Spesialis AC Mobil Terkemuka</h5>
                        <p class="mb-0">Fokus pada servis AC mobil dengan standar tinggi dan penanganan menyeluruh untuk semua tipe kendaraan.</p>
                    </div>
                </div>
            </div>

            <!-- 2. Teknisi Berpengalaman -->
            <div class="col-lg-6 col-md-6">
                <div class="feature-wrap d-flex py-4 px-3">
                    <div class="feature-icon flex-shrink-0">
                        <i class="fa fa-user-cog"></i>
                    </div>
                    <div class="ps-3">
                        <h5 class="mb-2 fs-5">Teknisi Berpengalaman</h5>
                        <p class="mb-0">Dikerjakan oleh tim profesional dengan keahlian teknis dan pengalaman panjang di bidang AC mobil.</p>
                    </div>
                </div>
            </div>

            <!-- 3. Booking Mudah & Cepat -->
            <div class="col-lg-6 col-md-6">
                <div class="feature-wrap d-flex py-4 px-3">
                    <div class="feature-icon flex-shrink-0">
                        <i class="fa fa-mobile-alt"></i>
                    </div>
                    <div class="ps-3">
                        <h5 class="mb-2 fs-5">Booking Mudah & Cepat</h5>
                        <p class="mb-0">Proses reservasi mudah melalui WhatsApp dengan respons cepat, tanpa antre lama.</p>
                    </div>
                </div>
            </div>

            <!-- 4. Garansi Servis & Sparepart -->
            <div class="col-lg-6 col-md-6">
                <div class="feature-wrap d-flex py-4 px-3">
                    <div class="feature-icon flex-shrink-0">
                        <i class="fa fa-shield-alt"></i>
                    </div>
                    <div class="ps-3">
                        <h5 class="mb-2 fs-5">Garansi Servis & Sparepart</h5>
                        <p class="mb-0">Setiap pekerjaan dan suku cadang dilindungi garansi resmi untuk memberikan rasa aman dan kepuasan pelanggan.</p>
                    </div>
                </div>
            </div>

        </div><!-- /.row -->
    </div>
</div>
<!-- ===================== Keunggulan End ===================== -->

<!-- ===================== About Start ===================== -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-6 pt-4" style="min-height: 400px;">
                <div class="position-relative h-100">
                    <img class="position-absolute img-fluid w-100 h-100 rounded-16" src="<?= base_url('assets/'); ?>img/about.jpg" style="object-fit: cover;" alt="Tentang BAGIYO DENSO">
                    <div class="position-absolute top-0 end-0 mt-n4 me-n4 py-4 px-5 about-badge">
                        <h2 class="display-4 text-white mb-0"><?= date('Y') - 2004; ?> <span class="fs-4">Tahun</span></h2>
                        <h4 class="text-white">Pengalaman</h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <h6 class="text-primary text-uppercase">// Tentang Kami //</h6>
                <h2 class="fs-1 mb-4"><span class="text-primary">BAGIYO</span> DENSO AC Mobil</h2>
                <p class="mb-4">BAGIYO DENSO AC MOBIL adalah bengkel resmi DENSO yang fokus pada spesialisasi AC mobil. Kami menyediakan suku cadang asli DENSO dan layanan perbaikan berkualitas sesuai standar resmi.</p>
                <div class="row g-4 mb-3 pb-3">
                    <div class="col-12">
                        <div class="d-flex">
                            <div class="bg-light d-flex flex-shrink-0 align-items-center justify-content-center mt-1 rounded-16" style="width: 45px; height: 45px;">
                                <span class="fw-bold text-secondary">01</span>
                            </div>
                            <div class="ps-3">
                                <h6>Mekanik Bersertifikasi & Berpengalaman</h6>
                                <span>Dilengkapi sertifikasi langsung dari tim DENSO.</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="d-flex">
                            <div class="bg-light d-flex flex-shrink-0 align-items-center justify-content-center mt-1 rounded-16" style="width: 45px; height: 45px;">
                                <span class="fw-bold text-secondary">02</span>
                            </div>
                            <div class="ps-3">
                                <h6>Bergaransi Resmi</h6>
                                <span>Garansi sesuai kualitas spare part dan pekerjaan.</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="d-flex">
                            <div class="bg-light d-flex flex-shrink-0 align-items-center justify-content-center mt-1 rounded-16" style="width: 45px; height: 45px;">
                                <span class="fw-bold text-secondary">03</span>
                            </div>
                            <div class="ps-3">
                                <h6>Perbaikan dengan Teknologi Terkini</h6>
                                <span>Peralatan canggih untuk diagnosis & perbaikan presisi.</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="d-flex">
                            <div class="bg-light d-flex flex-shrink-0 align-items-center justify-content-center mt-1 rounded-16" style="width: 45px; height: 45px;">
                                <span class="fw-bold text-secondary">04</span>
                            </div>
                            <div class="ps-3">
                                <h6>Fasilitas Nyaman & Bersih</h6>
                                <span>Ruang tunggu perokok/non-perokok yang nyaman.</span>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="<?= base_url('tentang'); ?>" class="btn btn-primary rounded-pill py-3 px-5">Selengkapnya<i class="fa fa-arrow-right ms-3"></i></a>
            </div>
        </div>
    </div>
</div>
<!-- ===================== About End ===================== -->

<!-- ===================== Service Tabs Start ===================== -->
<div id="layanan" class="container-xxl service py-5">
    <div class="container">
        <div class="text-center">
            <h6 class="text-primary text-uppercase">// Layanan AC Mobil Terbaik! //</h6>
            <h2 class="mb-5">Layanan Servis AC Mobil BAGIYO DENSO</h2>
        </div>

        <div class="row g-4">

            <!-- ========= MENU KIRI ========= -->
            <div class="col-lg-4">
                <div class="nav w-100 nav-pills me-4">
                    <button class="nav-link w-100 d-flex align-items-center text-start p-4 mb-4 active"
                        data-bs-toggle="pill" data-bs-target="#tab-pane-1" type="button">
                        <i class="fa fa-tools fa-2x me-3"></i>
                        <h4 class="m-0">Perawatan AC Mobil</h4>
                    </button>

                    <button class="nav-link w-100 d-flex align-items-center text-start p-4 mb-4"
                        data-bs-toggle="pill" data-bs-target="#tab-pane-2" type="button">
                        <i class="fa fa-wrench fa-2x me-3"></i>
                        <h4 class="m-0">Perbaikan AC Mobil</h4>
                    </button>

                    <button class="nav-link w-100 d-flex align-items-center text-start p-4 mb-4"
                        data-bs-toggle="pill" data-bs-target="#tab-pane-3" type="button">
                        <i class="fa fa-snowflake fa-2x me-3"></i>
                        <h4 class="m-0">Pemasangan AC Baru</h4>
                    </button>

                    <button class="nav-link w-100 d-flex align-items-center text-start p-4 mb-4"
                        data-bs-toggle="pill" data-bs-target="#tab-pane-4" type="button">
                        <i class="fa fa-cogs fa-2x me-3"></i>
                        <h4 class="m-0">Penjualan Spare Part</h4>
                    </button>

                    <button class="nav-link w-100 d-flex align-items-center text-start p-4 mb-0"
                        data-bs-toggle="pill" data-bs-target="#tab-pane-5" type="button">
                        <i class="fa fa-tachometer-alt fa-2x me-3"></i>
                        <h4 class="m-0">Penggantian Air Coolant</h4>
                    </button>
                </div>
            </div>

            <!-- ========= KONTEN KANAN ========= -->
            <div class="col-lg-8">
                <div class="tab-content w-100">

                    <!-- ========= TAB 1: Perawatan ========= -->
                    <div class="tab-pane fade show active" id="tab-pane-1">
                        <div class="row g-4">
                            <div class="col-md-6" style="min-height: 350px;">
                                <div class="position-relative h-100">
                                    <img class="position-absolute img-fluid w-100 h-100 rounded-16"
                                        src="<?= base_url('assets/'); ?>img/service-1.jpg"
                                        style="object-fit: cover;" alt="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h3 class="mb-3">Perawatan AC Mobil</h3>
                                <p class="mb-4">Layanan perawatan rutin untuk menjaga sistem AC mobil tetap dingin,
                                    bersih, dan awet sebelum terjadi kerusakan.</p>

                                <p><i class="fa fa-check text-success me-3"></i>Cuci evaporator & blower</p>
                                <p><i class="fa fa-check text-success me-3"></i>Ganti filter kabin</p>
                                <p><i class="fa fa-check text-success me-3"></i>Isi ulang freon</p>
                                <p><i class="fa fa-check text-success me-3"></i>Pengecekan tekanan & suhu AC</p>
                                <p><i class="fa fa-check text-success me-3"></i>Pembersihan saluran udara</p>

                                <h5 class="mt-3">Manfaat:</h5>
                                <p><i class="fa fa-check text-success me-3"></i>AC tetap dingin maksimal</p>
                                <p><i class="fa fa-check text-success me-3"></i>Udara kabin bersih & sehat</p>
                                <p><i class="fa fa-check text-success me-3"></i>Menghemat biaya kerusakan besar</p>
                            </div>
                        </div>
                    </div>

                    <!-- ========= TAB 2: Perbaikan ========= -->
                    <div class="tab-pane fade" id="tab-pane-2">
                        <div class="row g-4">
                            <div class="col-md-6" style="min-height: 350px;">
                                <div class="position-relative h-100">
                                    <img class="position-absolute img-fluid w-100 h-100 rounded-16"
                                        src="<?= base_url('assets/'); ?>img/service-2.jpg"
                                        style="object-fit: cover;" alt="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h3 class="mb-3">Perbaikan AC Mobil</h3>
                                <p class="mb-4">Solusi profesional untuk mengatasi segala masalah pada sistem AC mobil.</p>

                                <p><i class="fa fa-check text-success me-3"></i>Deteksi & perbaikan kebocoran freon</p>
                                <p><i class="fa fa-check text-success me-3"></i>Perbaikan kompresor, kondensor, evaporator</p>
                                <p><i class="fa fa-check text-success me-3"></i>Perbaikan pipa & selang AC</p>
                                <p><i class="fa fa-check text-success me-3"></i>Penggantian expansion valve & dryer</p>
                                <p><i class="fa fa-check text-success me-3"></i>Penanganan AC tidak dingin / keluar angin /
                                    bau / berisik</p>

                                <h5 class="mt-3">Manfaat:</h5>
                                <p><i class="fa fa-check text-success me-3"></i>Kerusakan cepat teratasi</p>
                                <p><i class="fa fa-check text-success me-3"></i>AC kembali normal seperti baru</p>
                                <p><i class="fa fa-check text-success me-3"></i>Bergaransi pekerjaan & sparepart</p>
                            </div>
                        </div>
                    </div>

                    <!-- ========= TAB 3: Pemasangan ========= -->
                    <div class="tab-pane fade" id="tab-pane-3">
                        <div class="row g-4">
                            <div class="col-md-6" style="min-height: 350px;">
                                <div class="position-relative h-100">
                                    <img class="position-absolute img-fluid w-100 h-100 rounded-16"
                                        src="<?= base_url('assets/'); ?>img/service-3.jpg"
                                        style="object-fit: cover;" alt="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h3 class="mb-3">Pemasangan AC Baru</h3>
                                <p class="mb-4">Layanan instalasi AC baru lengkap untuk mobil penumpang maupun mobil angkutan.</p>

                                <h5 class="mb-2">Jenis Pemasangan:</h5>
                                <p><i class="fa fa-check text-success me-3"></i>Pemasangan unit AC full set</p>
                                <p><i class="fa fa-check text-success me-3"></i>Pemasangan AC double blower / AC tambahan</p>

                                <h5 class="mt-3">Keunggulan:</h5>
                                <p><i class="fa fa-check text-success me-3"></i>Instalasi rapi & aman</p>
                                <p><i class="fa fa-check text-success me-3"></i>Penyesuaian kapasitas AC sesuai kendaraan</p>
                                <p><i class="fa fa-check text-success me-3"></i>Sparepart original dengan garansi resmi</p>
                            </div>
                        </div>
                    </div>

                    <!-- ========= TAB 4: Spare Part ========= -->
                    <div class="tab-pane fade" id="tab-pane-4">
                        <div class="row g-4">
                            <div class="col-md-6" style="min-height: 350px;">
                                <div class="position-relative h-100">
                                    <img class="position-absolute img-fluid w-100 h-100 rounded-16"
                                        src="<?= base_url('assets/'); ?>img/service-4.jpg"
                                        style="object-fit: cover;" alt="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h3 class="mb-3">Penjualan Spare Part</h3>
                                <p class="mb-4">Bagiyo AC Mobil menyediakan berbagai spare part AC mobil yang lengkap dan bergaransi.</p>

                                <p><i class="fa fa-check text-success me-3"></i>Kompresor AC</p>
                                <p><i class="fa fa-check text-success me-3"></i>Kondensor & evaporator</p>
                                <p><i class="fa fa-check text-success me-3"></i>Expansion valve & dryer</p>
                                <p><i class="fa fa-check text-success me-3"></i>Freon, oli kompresor, kipas, relay, sensor</p>
                                <p><i class="fa fa-check text-success me-3"></i>Selang AC & pipa AC custom</p>

                                <h5 class="mt-3">Kenapa beli di BAGIYO AC Mobil:</h5>
                                <p><i class="fa fa-check text-success me-3"></i>Stok lengkap & ready</p>
                                <p><i class="fa fa-check text-success me-3"></i>Kualitas original & bergaransi</p>
                                <p><i class="fa fa-check text-success me-3"></i>Harga kompetitif</p>
                            </div>
                        </div>
                    </div>

                    <!-- ========= TAB 5: Coolant ========= -->
                    <div class="tab-pane fade" id="tab-pane-5">
                        <div class="row g-4">
                            <div class="col-md-6" style="min-height: 350px;">
                                <div class="position-relative h-100">
                                    <!-- memakai foto service-4 sebagai placeholder -->
                                    <img class="position-absolute img-fluid w-100 h-100 rounded-16"
                                        src="<?= base_url('assets/'); ?>img/service-4.jpg"
                                        style="object-fit: cover;" alt="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h3 class="mb-3">Penggantian Air Coolant</h3>
                                <p class="mb-4">Layanan penggantian cairan coolant radiator untuk menjaga suhu mesin tetap stabil dan mencegah overheat.</p>

                                <h5 class="mb-2">Manfaat:</h5>
                                <p><i class="fa fa-check text-success me-3"></i>Mesin tetap dingin meskipun perjalanan jauh</p>
                                <p><i class="fa fa-check text-success me-3"></i>Mencegah kerusakan radiator & water pump</p>
                                <p><i class="fa fa-check text-success me-3"></i>Performa mesin lebih halus & efisien</p>
                                <p><i class="fa fa-check text-success me-3"></i>AC lebih awet dan dingin maksimal</p>
                            </div>
                        </div>
                    </div>

                </div><!-- /.tab-content -->
            </div>
        </div>

    </div>
</div>
<!-- ===================== Service Tabs End ===================== -->

<!-- ===================== Quote Start ===================== -->
<div class="container-fluid bg-secondary booking my-5">
    <div class="container">
        <div class="row gx-5">
            <div class="col-lg-12 py-5">
                <div class="py-5 text-center">
                    <h3 class="fs-4 text-white mb-4">
                        Kami berkomitmen memberikan layanan AC mobil yang profesional, teliti, dan aman. Setiap pengerjaan kami lakukan dengan penuh tanggung jawab dan integritas, karena kepercayaan pelanggan adalah amanah bagi kami.
                    </h3>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ===================== Quote End ===================== -->

<!-- ===================== Team Start ===================== -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mb-4">
            <h6 class="text-primary text-uppercase">// Tim BAGIYO DENSO //</h6>
            <h2 class="mb-5">Tim BAGIYO AC Mobil</h2>
        </div>
        <div class="row g-5">
            <div class="col-lg-7 pt-2" style="min-height: 400px;">
                <div class="position-relative h-100">
                    <img class="position-absolute img-fluid w-100 h-100 rounded-16"
                        src="<?= base_url('assets/'); ?>img/tim.jpg"
                        style="object-fit: cover;" alt="Tim">
                </div>
            </div>
            <div class="col-lg-5">
                <h2 class="mb-4">
                    <span class="text-primary">Tim Profesional</span> BAGIYO DENSO AC Mobil
                </h2>

                <p class="mb-4">
                    Didukung 10 teknisi profesional berpengalaman, tim kami siap menangani berbagai
                    permasalahan AC mobil dengan pengerjaan rapi, cepat, dan bergaransi.
                </p>

                <p class="mb-0">
                    Sebagai Bengkel Resmi DENSO Indonesia, kami berkomitmen memberikan layanan terbaik
                    untuk pelanggan di Purwodadi, Kudus, Pati, dan sekitarnya.
                </p>
            </div>
        </div>
    </div>
</div>
<!-- ===================== Team End ===================== -->

<!-- ✅ Modal Promo -->
<div id="PromoModal" class="gallery-modal">
    <span class="gallery-close">&times;</span>
    <img class="gallery-modal-content" id="PromoModalImg">
</div>

<script>
    document.addEventListener("DOMContentLoaded", async () => {
        const promoApiUrl = "<?= base_url('cek/promo/0'); ?>";

        try {
            const res = await fetch(promoApiUrl);
            const result = await res.json();

            // 🚫 Jika promo tidak aktif / kosong
            if (!result.status || !result.data) return;

            const promo = result.data;

            // ✅ Deteksi perangkat (mobile / desktop)
            const isMobile = window.innerWidth <= 768;
            const promoImg = isMobile ? promo.img_mobile : promo.img_desktop;

            // ✅ Ambil elemen modal
            const modal = document.getElementById("PromoModal");
            const modalImg = document.getElementById("PromoModalImg");
            const closeModal = modal.querySelector(".gallery-close");

            // Set gambar & alt (belum ditampilkan)
            modalImg.src = promoImg;
            modalImg.alt = promo.judul || "Promo Aktif";

            // ✅ Klik gambar → buka link promo
            modalImg.style.cursor = "pointer";
            modalImg.addEventListener("click", () => {
                if (!promo.url_promo) return;
                if (promo.url_sifat === "newtab") {
                    window.open(promo.url_promo, "_blank");
                } else {
                    window.location.href = promo.url_promo;
                }
            });

            // ✅ Tutup modal saat klik ikon X
            closeModal.addEventListener("click", () => modal.style.display = "none");

            // ✅ Tutup modal jika klik di luar gambar
            modal.addEventListener("click", (e) => {
                if (e.target === modal) modal.style.display = "none";
            });

            // ⏳ TUNGGU 2 DETIK SEBELUM MUNCUL
            setTimeout(() => {
                modal.style.display = "flex";
            }, 2000);

        } catch (err) {
            console.error("Gagal memuat promo:", err);
        }
    });
</script>