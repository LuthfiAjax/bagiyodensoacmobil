<!-- ===== Styles (komponen saja; tanpa font & tanpa :root) ===== -->
<style>
    /* HERO */
    .page-header {
        background-size: cover;
        background-position: center;
        position: relative;
        min-height: 320px;
        display: flex;
        align-items: center;
    }

    .page-header::after {
        content: "";
        position: absolute;
        inset: 0;
        background: linear-gradient(180deg, rgba(0, 0, 0, .55), rgba(0, 0, 0, .35));
    }

    .page-header-inner {
        position: relative;
        z-index: 2;
    }

    .page-header h1 {
        text-shadow: 0 6px 28px rgba(0, 0, 0, .35);
    }

    /* SECTION LAYANAN (boleh di edit) */
    .service-section {
        padding-top: 60px;
        padding-bottom: 60px;
    }

    .service-media {
        position: relative;
        height: 100%;
        min-height: 380px;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 10px 25px rgba(0, 0, 0, .08);
    }

    .service-media img {
        position: absolute;
        inset: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .service-media .media-overlay {
        position: absolute;
        inset: 0;
        background: radial-gradient(120% 100% at 70% 0%, rgba(13, 110, 253, .18) 0%, rgba(0, 0, 0, .08) 60%, rgba(0, 0, 0, .28) 100%);
        pointer-events: none;
    }

    .service-card {
        background: #fff;
        border: 1px solid #e9eef5;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 10px 25px rgba(0, 0, 0, .08);
        transition: box-shadow .25s ease, transform .25s ease, border-color .25s ease;
    }

    .service-card:hover {
        box-shadow: 0 18px 45px rgba(0, 0, 0, .14);
        transform: translateY(-2px);
        border-color: rgba(13, 110, 253, .25);
    }

    .service-body {
        padding: 26px;
    }

    .service-eyebrow {
        display: inline-block;
        padding: 6px 12px;
        border-radius: 999px;
        background: rgba(13, 110, 253, .12);
        color: var(--bs-primary);
        font-weight: 700;
        font-size: .85rem;
        letter-spacing: .2px;
    }

    .service-title {
        font-weight: 700;
        line-height: 1.2;
        margin: 12px 0 10px;
    }

    .feature-item {
        display: flex;
        gap: 12px;
        align-items: flex-start;
        padding: 14px 0;
        border-bottom: 1px dashed #e9eef5;
    }

    .feature-item:last-child {
        border-bottom: 0;
    }

    .num-badge {
        width: 46px;
        height: 46px;
        border-radius: 12px;
        display: grid;
        place-items: center;
        flex-shrink: 0;
        background: #f2f6ff;
        color: #2c6fff;
        font-weight: 800;
        border: 1px solid rgba(13, 110, 253, .25);
    }

    .feature-item h6 {
        margin: 0 0 4px;
        font-weight: 700;
        color: #212529;
    }

    .feature-item span {
        color: #6c757d;
        display: block;
    }
</style>

<!-- ===================== HERO (struktur tidak diubah) ===================== -->
<!-- Page Header Start -->
<div class="container-fluid page-header mb-5 p-0" style="background-image: url(<?= base_url('assets/img/new/4.jpg'); ?>);">
    <div class="container-fluid page-header-inner py-5">
        <div class="container text-center">
            <h1 class="display-3 fs-1 text-white mb-3 animated slideInDown">Layanan BAGIYO DENSO</h1>
            <span class="text-white">Solusi Terbaik untuk Kenyamanan dan Kinerja Optimal AC Mobil Anda</span>
        </div>
    </div>
</div>
<!-- Page Header End -->

<!-- ===================== Layanan Kami ===================== -->
<!-- ===================== LAYANAN: Perawatan AC Mobil ===================== -->
<div class="container-xxl service-section">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6">
                <div class="position-relative service-media">
                    <img src="<?= base_url('assets/'); ?>img/new/6.jpg" alt="Perawatan AC Mobil">
                    <span class="media-overlay"></span>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="service-card">
                    <div class="service-body">
                        <span class="service-eyebrow">Perawatan AC Mobil</span>
                        <h2 class="service-title fs-2 mb-2">Menjaga AC Tetap Dingin & Sehat</h2>
                        <p class="mb-3 text-secondary">
                            Layanan perawatan rutin untuk menjaga sistem AC mobil tetap dingin, bersih, dan awet.
                        </p>

                        <div class="feature-item">
                            <div class="num-badge">01</div>
                            <div>
                                <h6>Cuci evaporator & blower</h6>
                                <span>Membersihkan evaporator dan blower agar aliran udara maksimal.</span>
                            </div>
                        </div>
                        <div class="feature-item">
                            <div class="num-badge">02</div>
                            <div>
                                <h6>Ganti filter kabin</h6>
                                <span>Filter kabin baru membuat udara lebih bersih dan higienis.</span>
                            </div>
                        </div>
                        <div class="feature-item">
                            <div class="num-badge">03</div>
                            <div>
                                <h6>Isi ulang freon</h6>
                                <span>Freon diukur & disesuaikan untuk hasil dingin optimal.</span>
                            </div>
                        </div>

                    </div><!-- /service-body -->
                </div><!-- /service-card -->
            </div>
        </div>
    </div>
</div>

<!-- ===================== LAYANAN: Perbaikan AC Mobil ===================== -->
<div class="container-xxl service-section">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6 order-lg-2">
                <div class="position-relative service-media">
                    <img src="<?= base_url('assets/'); ?>img/service-2.jpg" alt="Perbaikan AC Mobil">
                    <span class="media-overlay"></span>
                </div>
            </div>

            <div class="col-lg-6 order-lg-1">
                <div class="service-card">
                    <div class="service-body">
                        <span class="service-eyebrow">Perbaikan AC Mobil</span>
                        <h2 class="service-title fs-1 mb-2">Solusi untuk Semua Masalah AC Mobil</h2>
                        <p class="mb-3 text-secondary">
                            Layanan perbaikan komprehensif untuk menangani segala jenis kerusakan AC mobil.
                        </p>

                        <div class="feature-item">
                            <div class="num-badge">01</div>
                            <div>
                                <h6>Deteksi & perbaikan kebocoran</h6>
                                <span>Pengecekan kebocoran freon & perbaikan titik kerusakan.</span>
                            </div>
                        </div>
                        <div class="feature-item">
                            <div class="num-badge">02</div>
                            <div>
                                <h6>Perbaikan komponen AC</h6>
                                <span>Kompresor, kondensor, evaporator, hingga selang & pipa AC.</span>
                            </div>
                        </div>
                        <div class="feature-item">
                            <div class="num-badge">03</div>
                            <div>
                                <h6>Penggantian valve & dryer</h6>
                                <span>Mengoptimalkan sirkulasi freon untuk hasil dingin maksimal.</span>
                            </div>
                        </div>

                    </div><!-- /service-body -->
                </div><!-- /service-card -->
            </div>
        </div>
    </div>
</div>

<!-- ===================== LAYANAN: Pemasangan AC Baru ===================== -->
<div class="container-xxl service-section">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6">
                <div class="position-relative service-media">
                    <img src="<?= base_url('assets/'); ?>img/service-3.jpg" alt="Pemasangan AC Mobil Baru">
                    <span class="media-overlay"></span>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="service-card">
                    <div class="service-body">
                        <span class="service-eyebrow">Pemasangan AC Baru</span>
                        <h2 class="service-title fs-1 mb-2">Instalasi AC Baru yang Rapi & Aman</h2>
                        <p class="mb-3 text-secondary">
                            Layanan pemasangan AC mobil baru full set maupun AC tambahan/double blower.
                        </p>

                        <div class="feature-item">
                            <div class="num-badge">01</div>
                            <div>
                                <h6>Pemasangan AC full set</h6>
                                <span>Instalasi lengkap untuk AC mobil baru.</span>
                            </div>
                        </div>

                        <div class="feature-item">
                            <div class="num-badge">02</div>
                            <div>
                                <h6>Pemasangan double blower</h6>
                                <span>Menambah unit blower untuk kabin lebih dingin merata.</span>
                            </div>
                        </div>

                    </div><!-- /service-body -->
                </div><!-- /service-card -->
            </div>
        </div>
    </div>
</div>

<!-- ===================== LAYANAN: Penjualan Spare Part ===================== -->
<div class="container-xxl service-section">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6 order-lg-2">
                <div class="position-relative service-media">
                    <img src="<?= base_url('assets/'); ?>img/new/8.jpg" alt="Sparepart AC Mobil">
                    <span class="media-overlay"></span>
                </div>
            </div>
            <div class="col-lg-6 order-lg-1">
                <div class="service-card">
                    <div class="service-body">
                        <span class="service-eyebrow">Penjualan Spare Part</span>
                        <h2 class="service-title fs-1 mb-2">Spare Part AC Mobil Original & Bergaransi</h2>
                        <p class="mb-3 text-secondary">
                            Tersedia berbagai komponen AC mobil lengkap dan terjamin kualitasnya.
                        </p>

                        <div class="feature-item">
                            <div class="num-badge">01</div>
                            <div>
                                <h6>Kompresor & kondensor</h6>
                                <span>Komponen utama untuk sirkulasi AC mobil.</span>
                            </div>
                        </div>

                        <div class="feature-item">
                            <div class="num-badge">02</div>
                            <div>
                                <h6>Evaporator, valve & dryer</h6>
                                <span>Unit pendingin dan pengering untuk sirkulasi freon optimal.</span>
                            </div>
                        </div>

                        <div class="feature-item">
                            <div class="num-badge">03</div>
                            <div>
                                <h6>Freon, oli & pipa AC</h6>
                                <span>Kebutuhan lengkap servis dan perbaikan AC mobil.</span>
                            </div>
                        </div>

                    </div><!-- /service-body -->
                </div><!-- /service-card -->
            </div>
        </div>
    </div>
</div>

<!-- ===================== LAYANAN: Penggantian Air Coolant ===================== -->
<div class="container-xxl service-section">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6">
                <div class="position-relative service-media">
                    <img src="<?= base_url('assets/'); ?>img/service-4.jpg" alt="Penggantian Coolant Radiator">
                    <span class="media-overlay"></span>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="service-card">
                    <div class="service-body">
                        <span class="service-eyebrow">Penggantian Air Coolant</span>
                        <h2 class="service-title fs-1 mb-2">Menjaga Suhu Mesin Tetap Stabil & Aman</h2>
                        <p class="mb-3 text-secondary">
                            Penggantian cairan coolant radiator untuk mencegah overheat dan menjaga performa mesin.
                        </p>

                        <div class="feature-item">
                            <div class="num-badge">01</div>
                            <div>
                                <h6>Flushing coolant lama</h6>
                                <span>Pembersihan cairan radiator lama sebelum pengisian baru.</span>
                            </div>
                        </div>

                        <div class="feature-item">
                            <div class="num-badge">02</div>
                            <div>
                                <h6>Isi coolant baru</h6>
                                <span>Cairan coolant berkualitas untuk menjaga suhu tetap stabil.</span>
                            </div>
                        </div>

                    </div><!-- /service-body -->
                </div><!-- /service-card -->
            </div>
        </div>
    </div>
</div>
<!-- Layanan End -->

<!-- ===================== Saran Periode Service Berkala ===================== -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-12">
                <h2 class="fs-1 mb-4 text-center"><span>Saran Periode Service Berkala</span></h2>

                <div class="steps-timeline" id="milestone">

                    <div class="step">
                        <div class="step-milestone"></div>
                        <span class="step-title">Setiap 6 Bulan</span>
                        <p class="step-description">
                            Perawatan AC Mobil
                        </p>
                    </div>

                    <div class="step">
                        <div class="step-milestone"></div>
                        <span class="step-title">Setiap 12 Bulan</span>
                        <p class="step-description">
                            Penggantian Air Coolant
                        </p>
                    </div>

                    <div class="step">
                        <div class="step-milestone"></div>
                        <span class="step-title">Setiap 18 Bulan</span>
                        <p class="step-description">
                            Perawatan AC Mobil (Ulang)
                        </p>
                    </div>

                    <div class="step">
                        <div class="step-milestone"></div>
                        <span class="step-title">Setiap 24 Bulan</span>
                        <p class="step-description">
                            Pengecekan & Penggantian Spare Part
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- ===================== Estimasi Jarak Tempuh ===================== -->
<!-- Saran -->
<div class="container-xxl py-5"> <!-- // jangan di edit -->
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-12">
                <h2 class="fs-1 mb-4 text-center"><span>Estimasi Jarak Tempuh</h2>
                <div class="ontainer-tabel">
                    <div class="post-body">
                        <table>
                            <tbody>
                                <tr>
                                    <th class="text-center">6 Bulan</th>
                                    <th class="text-center">12 Bulan</th>
                                    <th class="text-center">24 Bulan</th>
                                </tr>
                                <tr>
                                    <td class="text-center">10.000 Km</td>
                                    <td class="text-center">20.000 Km</td>
                                    <td class="text-center">40.000 Km</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Saran End -->