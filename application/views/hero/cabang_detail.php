<style>
    /* === Gallery Grid Fix (auto-balance, no gaps) === */
    .gallery-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 15px;
        grid-auto-flow: dense;
        /* 💥 ini penting untuk mengisi celah otomatis */
    }

    .gallery-item {
        position: relative;
        overflow: hidden;
        border-radius: 10px;
        cursor: pointer;
        transition: transform 0.3s ease;
    }

    /* Variasi acak — tetap proporsional, tapi tanpa bolong */
    .gallery-item:nth-child(3n) {
        grid-row: span 2;
    }

    .gallery-item:nth-child(5n) {
        grid-column: span 2;
    }

    .gallery-item img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: all 0.4s ease;
    }

    /* Hover effect */
    .gallery-item:hover img {
        transform: scale(1.08);
        filter: brightness(0.85);
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

    @keyframes zoomIn {
        from {
            transform: scale(0.8);
            opacity: 0;
        }

        to {
            transform: scale(1);
            opacity: 1;
        }
    }

    /* === Responsif === */
    @media (max-width: 992px) {
        .gallery-grid {
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            grid-auto-flow: dense;
        }
    }

    @media (max-width: 768px) {
        .gallery-grid {
            grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
            grid-auto-flow: dense;
        }

        .gallery-item:nth-child(3n),
        .gallery-item:nth-child(5n) {
            grid-column: span 1;
            grid-row: span 1;
        }
    }
</style>

<!-- ===================== HERO CABANG DETAIL ===================== -->
<div class="container-fluid p-0 mb-5">
    <div id="header-carousel" class="carousel slide" data-bs-ride="carousel" style="max-height: 600px; overflow: hidden;">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#header-carousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        </div>

        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="w-100"
                    src="<?= base_url($cabang['image_background']); ?>"
                    alt="Foto Cabang <?= $cabang['name']; ?>"
                    style="height: 600px; object-fit: cover; filter: brightness(0.7);">

                <div class="carousel-caption d-flex align-items-center">
                    <div class="container">
                        <div class="row align-items-center justify-content-between flex-lg-row<?= $cabang['tipe'] === 'left' ? '-reverse' : ''; ?>">

                            <!-- Kolom Teks -->
                            <div class="col-lg-6 text-white text-center text-lg-<?= $cabang['tipe'] === 'left' ? 'end' : 'start'; ?>">
                                <h3 class="fs-5 fw-light text-warning mb-2 animate__animated animate__fadeInUp">
                                    <?= strtoupper($cabang['slide_subtitle']); ?>
                                </h3>

                                <!-- Judul besar hanya tampil di desktop -->
                                <h1 class="display-5 text-light fw-bold mb-4 animate__animated animate__fadeInUp">
                                    <?= strtoupper($cabang['slide_title']); ?>
                                </h1>

                                <p class="fs-6 fs-md-5 mb-4 animate__animated animate__fadeInUp px-2 px-lg-0 d-none d-lg-block">
                                    <?= $cabang['slide_deskripsi']; ?>
                                </p>

                                <?php
                                $justifyClass = $cabang['tipe'] === 'left'
                                    ? 'justify-content-center justify-content-lg-end'
                                    : 'justify-content-center justify-content-lg-start';
                                ?>
                                <div class="animate__animated animate__fadeInUp d-flex flex-wrap <?= $justifyClass; ?> gap-2">
                                    <?php if (!empty($cabang_links)): ?>
                                        <?php foreach ($cabang_links as $link): ?>
                                            <a href="<?= $link['url']; ?>"
                                                target="_blank"
                                                class="btn <?= !empty($link['btn_style']) ? $link['btn_style'] : 'btn-outline-light'; ?> rounded-pill py-md-3 px-md-4 py-2 px-3 fs-md-6 fs-6">
                                                <?php if (!empty($link['icon_class'])): ?>
                                                    <i class="<?= $link['icon_class']; ?> me-1"></i>
                                                <?php endif; ?>
                                                <?= htmlspecialchars($link['label']); ?>
                                            </a>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <!-- Kolom Gambar Model -->
                            <div class="col-lg-5 d-none d-lg-block <?= $cabang['tipe'] === 'left' ? 'text-start' : 'text-end'; ?> animate__animated animate__fadeIn<?= $cabang['tipe'] === 'left' ? 'Left' : 'Right'; ?>">
                                <img src="<?= base_url($cabang['image_side']); ?>"
                                    class="img-fluid rounded-lg shadow"
                                    alt="Model Bagiyo Denso"
                                    style="width: 100%;">
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ===================== HERO END ===================== -->


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
                                <?= $cabang['email']; ?>
                            </p>
                        </div>
                    </div>

                    <!-- Telepon -->
                    <div class="col-md-3">
                        <div class="bg-light d-flex flex-column justify-content-center p-2 h-100">
                            <h5 class="text-uppercase">// Telepon //</h5>
                            <p class="m-0">
                                <i class="fas fa-phone-alt text-primary me-2"></i>
                                <?= $cabang['phone']; ?>
                            </p>
                        </div>
                    </div>

                    <!-- Sosial Media -->
                    <div class="col-md-3">
                        <div class="bg-light d-flex flex-column justify-content-center p-2 h-100">
                            <h5 class="text-uppercase">// Sosial Media //</h5>
                            <p class="m-0">
                                <i class="fab fa-instagram text-primary me-2"></i>
                                <?= $cabang['instagram']; ?>
                            </p>
                        </div>
                    </div>

                    <!-- Jam Operasional -->
                    <div class="col-md-3">
                        <div class="bg-light d-flex flex-column justify-content-center p-3 h-100">
                            <h5 class="text-uppercase">// Jam Operasional //</h5>
                            <div class="d-flex justify-content-between">
                                <?= $cabang['open_hours']; ?>
                            </div>
                            <div class="d-flex justify-content-between">
                                <?= $cabang['open_hours2']; ?>
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
                            <h3 class="fw-bold text-uppercase mb-3">
                                Lokasi Bengkel AC Mobil Bagiyo Denso <?= ucfirst(strtolower($cabang['name'])); ?>
                            </h3>
                            <p class="text-muted mb-0">
                                Temukan dan kunjungi cabang kami di <?= ucfirst(strtolower($cabang['name'])); ?> untuk layanan servis dan perawatan AC mobil terpercaya.
                                Dapatkan kenyamanan berkendara dengan udara sejuk dari teknisi berpengalaman Bagiyo Denso.
                            </p>
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-12 wow fadeIn" data-wow-delay="0.1s">
                            <div class="map-container position-relative" style="width: 100%; height: 500px; border-radius: 10px; overflow: hidden;">
                                <iframe src="<?= $cabang['iframe_map']; ?>" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                                </iframe>
                            </div>

                            <!-- Tombol Aksi -->
                            <div class="text-center mt-4">
                                <a href="<?= $cabang['url_map']; ?>" target="_blank" class="btn btn-primary rounded-pill py-3 px-5">
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
                        <?php if (!empty($cabang_reviews)): ?>
                            <?php foreach ($cabang_reviews as $review): ?>
                                <div class="col-md-3 col-sm-6">
                                    <div class="bg-white shadow-sm rounded p-4 h-100">

                                        <!-- Rating bintang -->
                                        <div class="text-warning mb-2">
                                            <?php
                                            $fullStars = floor($review['rating']);
                                            $halfStar  = ($review['rating'] - $fullStars) >= 0.5;
                                            for ($i = 0; $i < $fullStars; $i++): ?>
                                                <i class="fa fa-star"></i>
                                            <?php endfor; ?>
                                            <?php if ($halfStar): ?>
                                                <i class="fa fa-star-half-alt"></i>
                                            <?php endif; ?>
                                            <?php
                                            $emptyStars = 5 - $fullStars - ($halfStar ? 1 : 0);
                                            for ($i = 0; $i < $emptyStars; $i++): ?>
                                                <i class="far fa-star"></i>
                                            <?php endfor; ?>
                                        </div>

                                        <!-- Isi review -->
                                        <p class="text-muted fst-italic mb-3">
                                            “<?= htmlspecialchars($review['review_text']); ?>”
                                        </p>

                                        <!-- Nama & kota -->
                                        <h6 class="fw-bold mb-0 text-primary">
                                            <?= htmlspecialchars($review['reviewer_name']); ?>
                                        </h6>
                                        <small class="text-muted">
                                            <?= ucfirst(strtolower($review['reviewer_city'])); ?>
                                        </small>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <div class="col-12">
                                <div class="alert alert-light border text-center mb-0">
                                    Belum ada ulasan untuk cabang ini.
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <!-- Review Pelanggan End -->

        </div>
    </div>
</div>
<!-- Contact (Cabang) End -->

<!-- ✅ Gallery Section Start -->
<section class="py-5 bg-white">
    <div class="container">
        <div class="text-center mb-5">
            <h3 class="fw-bold text-uppercase mb-3">
                Galeri Cabang <?= ucfirst(strtolower($cabang['name'])); ?>
            </h3>
            <p class="text-muted">
                Tampilan bengkel, fasilitas, dan suasana pelayanan di Bagiyo Denso AC Mobil Cabang <?= ucfirst(strtolower($cabang['name'])); ?>.
            </p>
        </div>

        <div class="gallery-grid">
            <?php if (!empty($cabang_galery)): ?>
                <?php foreach ($cabang_galery as $img): ?>
                    <div class="gallery-item">
                        <img src="<?= base_url($img['image_path']); ?>"
                            alt="<?= htmlspecialchars($img['caption']); ?>"
                            loading="lazy">
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="text-center text-muted py-5">
                    <p>Belum ada galeri untuk cabang ini.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- ✅ Modal Preview -->
<div id="galleryModal" class="gallery-modal">
    <span class="gallery-close">&times;</span>
    <img class="gallery-modal-content" id="galleryModalImg">
</div>

<script>
    // Script untuk modal preview
    const modal = document.getElementById("galleryModal");
    const modalImg = document.getElementById("galleryModalImg");
    const closeModal = document.querySelector(".gallery-close");

    document.querySelectorAll(".gallery-item img").forEach((img) => {
        img.addEventListener("click", () => {
            modal.style.display = "flex";
            modalImg.src = img.src;
        });
    });

    closeModal.addEventListener("click", () => modal.style.display = "none");
    modal.addEventListener("click", (e) => {
        if (e.target === modal) modal.style.display = "none";
    });
</script>