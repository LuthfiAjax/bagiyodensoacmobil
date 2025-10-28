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
            <h1 class="display-3 fs-1 text-white mb-3 animated slideInDown">Cabang BAGIYO DENSO</h1>
            <span class="text-white">Hadir lebih dekat untuk memberikan layanan terbaik perawatan dan servis AC mobil Anda</span>
        </div>
    </div>
</div>
<!-- Page Header End -->

<!-- ===================== LOOP CABANG ===================== -->
<?php foreach ($cabang as $cbg): ?>
    <?php $isLeft = ($cbg['tipe'] === 'left'); ?>
    <div class="container-xxl service-section">
        <div class="container">
            <div class="row g-5 align-items-center <?= $isLeft ? 'flex-lg-row-reverse' : ''; ?>">
                <!-- Gambar -->
                <div class="col-lg-6">
                    <div class="position-relative service-media">
                        <img src="<?= base_url($cbg['image_background']); ?>" alt="Foto Cabang <?= $cbg['name']; ?>">
                        <span class="media-overlay"></span>
                    </div>
                </div>

                <!-- Konten -->
                <div class="col-lg-6">
                    <div class="service-card">
                        <div class="service-body">
                            <span class="service-eyebrow text-uppercase">Cabang <?= $cbg['name']; ?></span>
                            <h2 class="service-title fs-2 mb-2"><?= $cbg['slide_title']; ?></h2>
                            <p class="mb-3 text-secondary"><?= $cbg['slide_deskripsi']; ?></p>

                            <!-- Kontak -->
                            <ul class="list-unstyled mb-4">
                                <?php if (!empty($cbg['email'])): ?>
                                    <li class="d-flex align-items-start mb-2">
                                        <i class="fa fa-envelope text-primary me-2 mt-1"></i>
                                        <span><?= $cbg['email']; ?></span>
                                    </li>
                                <?php endif; ?>

                                <?php if (!empty($cbg['phone'])): ?>
                                    <li class="d-flex align-items-start mb-2">
                                        <i class="fa fa-phone text-primary me-2 mt-1"></i>
                                        <span><?= $cbg['phone']; ?></span>
                                    </li>
                                <?php endif; ?>

                                <?php if (!empty($cbg['alamat'])): ?>
                                    <li class="d-flex align-items-start mb-2">
                                        <i class="fa fa-map-marker-alt text-primary me-2 mt-1"></i>
                                        <span><?= $cbg['alamat']; ?></span>
                                    </li>
                                <?php endif; ?>

                                <?php if (!empty($cbg['open_hours'])): ?>
                                    <li class="d-flex align-items-start mb-2">
                                        <i class="fa fa-clock text-primary me-2 mt-1"></i>
                                        <span><?= $cbg['open_hours']; ?></span>
                                    </li>
                                <?php endif; ?>

                                <?php if (!empty($cbg['open_hours2'])): ?>
                                    <li class="d-flex align-items-start mb-2">
                                        <i class="fa fa-clock text-primary me-2 mt-1"></i>
                                        <span><?= $cbg['open_hours2']; ?></span>
                                    </li>
                                <?php endif; ?>
                            </ul>

                            <!-- Tombol -->
                            <a href="<?= base_url('cabang/' . $cbg['slug']); ?>" class="btn btn-primary px-4 py-2 rounded-pill fw-semibold">
                                <i class="fa fa-arrow-right me-2"></i> Cek Cabang <?= $cbg['name']; ?>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>