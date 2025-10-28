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
        font-weight: 800;
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

<!-- ===================== LAYANAN: Fresh Service ===================== -->
<div class="container-xxl service-section">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6">
                <div class="position-relative service-media">
                    <img src="<?= base_url('assets/'); ?>img/new/6.jpg" alt="Tentang Bagiyo Denso">
                    <span class="media-overlay"></span>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="service-card">
                    <div class="service-body">
                        <span class="service-eyebrow">Fresh Service</span>
                        <h2 class="service-title fs-2 mb-2">Pengalaman Kesegaran AC Mobil Anda</h2>
                        <p class="mb-3 text-secondary">Fresh Service AC mobil: udara segar, blower bersih, dan filter AC kabin baru. Perjalanan nyaman dengan udara berkualitas terbaik untuk kenyamanan dan kesehatan Anda saat berkendara.</p>

                        <div class="feature-item">
                            <div class="num-badge">01</div>
                            <div>
                                <h6>Udara Segar dan Sejuk</h6>
                                <span>Nikmati AC mobil yang menghasilkan udara segar dan sejuk untuk kenyamanan maksimal.</span>
                            </div>
                        </div>
                        <div class="feature-item">
                            <div class="num-badge">02</div>
                            <div>
                                <h6>Kualitas Udara Bersih</h6>
                                <span>Pastikan udara di dalam kabin mobil bebas dari debu, polusi, dan kuman yang berbahaya</span>
                            </div>
                        </div>
                        <div class="feature-item">
                            <div class="num-badge">03</div>
                            <div>
                                <h6>Efisiensi Energi Optimal</h6>
                                <span>Tingkatkan efisiensi energi AC mobil Anda untuk penggunaan bahan bakar yang lebih efisien.</span>
                            </div>
                        </div>
                    </div><!-- /service-body -->
                </div><!-- /service-card -->
            </div>
        </div>
    </div>
</div>

<!-- ===================== LAYANAN: Light Service ===================== -->
<div class="container-xxl service-section">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6 order-lg-2">
                <div class="position-relative service-media">
                    <img src="<?= base_url('assets/'); ?>img/service-2.jpg" alt="Tentang Bagiyo Denso">
                    <span class="media-overlay"></span>
                </div>
            </div>
            <div class="col-lg-6 order-lg-1">
                <div class="service-card">
                    <div class="service-body">
                        <span class="service-eyebrow">Light Service</span>
                        <h2 class="service-title fs-1 mb-2">Perawatan Ringan untuk AC Mobil Anda!</h2>
                        <p class="mb-3 text-secondary">Light Service : Fresh Service dan Perawatan Komponen AC di ruang mesin</p>

                        <div class="feature-item">
                            <div class="num-badge">01</div>
                            <div>
                                <h6>Pemeliharaan Berkala yang Efisien</h6>
                                <span>Light Service kami menyediakan perawatan ringan yang efisien, menjaga performa AC mobil Anda tanpa memakan waktu lama.</span>
                            </div>
                        </div>
                        <div class="feature-item">
                            <div class="num-badge">02</div>
                            <div>
                                <h6>Udara Segar dan Sejuk yang Konsisten</h6>
                                <span>Dengan perawatan rutin, AC mobil Anda akan terus menghasilkan udara segar dan sejuk, memberikan kenyamanan maksimal saat berkendara.</span>
                            </div>
                        </div>
                        <div class="feature-item">
                            <div class="num-badge">03</div>
                            <div>
                                <h6>Identifikasi Dini Masalah</h6>
                                <span>Tim teknisi kami akan melakukan pemeriksaan menyeluruh, mengidentifikasi potensi masalah, dan memberikan solusi tepat waktu untuk mencegah kerusakan yang lebih serius.</span>
                            </div>
                        </div>
                    </div><!-- /service-body -->
                </div><!-- /service-card -->
            </div>
        </div>
    </div>
</div>

<!-- ===================== LAYANAN: Heavy Service ===================== -->
<div class="container-xxl service-section">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6">
                <div class="position-relative service-media">
                    <img src="<?= base_url('assets/'); ?>img/service-3.jpg" alt="Tentang Bagiyo Denso">
                    <span class="media-overlay"></span>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="service-card">
                    <div class="service-body">
                        <span class="service-eyebrow">Heavy Service</span>
                        <h2 class="service-title fs-1 mb-2">Perawatan Intensif untuk AC Mobil Anda!</h2>
                        <p class="mb-3 text-secondary">Heavy Service : Light Service dan Perawatan Komponen di ruang kabin</p>

                        <div class="feature-item">
                            <div class="num-badge">01</div>
                            <div>
                                <h6>Pemeliharaan Mendalam</h6>
                                <span>Heavy Service kami melibatkan perawatan yang komprehensif dan mendalam, termasuk pemeriksaan menyeluruh dan pemeliharaan komponen-komponen penting AC mobil Anda.</span>
                            </div>
                        </div>
                        <div class="feature-item">
                            <div class="num-badge">02</div>
                            <div>
                                <h6>Perbaikan Spesialis</h6>
                                <span>Tim ahli kami dilengkapi dengan pengetahuan dan pengalaman dalam perbaikan AC mobil. Mereka dapat mengatasi masalah kompleks dan memberikan solusi yang tepat.</span>
                            </div>
                        </div>
                        <div class="feature-item">
                            <div class="num-badge">03</div>
                            <div>
                                <h6>Performa Optimal</h6>
                                <span>Dengan Heavy Service, AC mobil Anda akan berfungsi dengan maksimal, menghasilkan udara segar, sejuk, dan bebas polusi, memberikan kenyamanan yang Anda butuhkan saat berkendara.</span>
                            </div>
                        </div>
                    </div><!-- /service-body -->
                </div><!-- /service-card -->
            </div>
        </div>
    </div>
</div>

<!-- ===================== LAYANAN: Improvement Service ===================== -->
<div class="container-xxl service-section">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6 order-lg-2">
                <div class="position-relative service-media">
                    <img src="<?= base_url('assets/'); ?>img/new/8.jpg" alt="Tentang Bagiyo Denso">
                    <span class="media-overlay"></span>
                </div>
            </div>
            <div class="col-lg-6 order-lg-1">
                <div class="service-card">
                    <div class="service-body">
                        <span class="service-eyebrow">Improvement Service</span>
                        <h2 class="service-title fs-1 mb-2">Penyempurnaan Layanan kami untuk AC mobil Anda!</h2>
                        <p class="mb-3 text-secondary">Tingkatkan pengalaman berkendara dengan Penyempurnaan Layanan kami untuk AC mobil Anda! Cleverin hadir dengan layanan tambahan yang menyegarkan udara kabin dan melawan virus, sedangkan Flushing Service membersihkan sistem AC secara menyeluruh untuk kinerja optimal.</p>

                        <div class="feature-item">
                            <div class="num-badge">01</div>
                            <div>
                                <h6>Cleverin Service</h6>
                                <span>Udara Segar dan Perlindungan Aktif - Layanan Cleverin kami menghasilkan udara kabin yang segar sambil memberikan perlindungan aktif melawan virus dan bakteri yang mengancam kesehatan Anda.</span>
                            </div>
                        </div>
                        <div class="feature-item">
                            <div class="num-badge">02</div>
                            <div>
                                <h6>Flushing Service</h6>
                                <span>Pembersihan Sistem AC yang Mendalam - Layanan Flushing Service kami membersihkan sistem AC mobil secara menyeluruh, termasuk ganti oli dan penggantian dryer baru, untuk memastikan kinerja optimal AC mobil Anda.</span>
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
                <h2 class="fs-1 mb-4 text-center"><span>Saran Periode Service Berkala</h2>
                <div class="steps-timeline" id="milestone">
                    <div class="step">
                        <div class="step-milestone"></div>
                        <span class="step-title">
                            6 Bulan <br>
                        </span>
                        <p class="step-description">
                            Fresh Service
                        </p>
                    </div>

                    <div class="step">
                        <div class="step-milestone"></div>
                        <span class="step-title">
                            12 Bulan <br>
                        </span>
                        <p class="step-description">
                            Light Service
                        </p>
                    </div>

                    <div class="step">
                        <div class="step-milestone"></div>
                        <span class="step-title">
                            18 Bulan <br>
                        </span>
                        <p class="step-description">
                            Fresh Service
                        </p>
                    </div>

                    <div class="step">
                        <div class="step-milestone"></div>
                        <span class="step-title">
                            24 Bulan <br>
                        </span>
                        <p class="step-description">
                            Heavy Service
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