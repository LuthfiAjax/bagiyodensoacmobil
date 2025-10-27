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

    .btn-wa {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        border-radius: 999px;
        padding: 12px 18px;
        font-weight: 700;
        border: 2px solid var(--bs-primary);
        color: var(--bs-primary);
        background: #fff;
        transition: all .25s ease;
    }

    .btn-wa:hover {
        color: #fff;
        background: var(--bs-primary);
        border-color: var(--bs-primary);
        transform: translateY(-1px);
    }

    /* Small utility */
    .rounded-16 {
        border-radius: 16px;
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
                                            <div class="mb-4">
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
            <h2 class="mb-5">Kenapa Harus BAGIYO DENSO ?</h2>
        </div>
        <div class="row g-4">
            <div class="col-lg-4 col-md-6">
                <div class="feature-wrap d-flex py-4 px-3">
                    <div class="feature-icon flex-shrink-0"><i class="fa fa-toolbox"></i></div>
                    <div class="ps-3">
                        <h5 class="mb-2 fs-5">Mekanik Bersertifikasi DENSO</h5>
                        <p class="mb-0">Mekanik kami telah melalui training & sertifikasi langsung dari DENSO.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="feature-wrap d-flex py-4 px-3">
                    <div class="feature-icon flex-shrink-0"><i class="fa fa-certificate"></i></div>
                    <div class="ps-3">
                        <h5 class="mb-2 fs-5">Bergaransi Resmi</h5>
                        <p class="mb-0">Spare part & pekerjaan bergaransi sesuai kualitas barang.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="feature-wrap d-flex py-4 px-3">
                    <div class="feature-icon flex-shrink-0"><i class="fa fa-laptop-code"></i></div>
                    <div class="ps-3">
                        <h5 class="mb-2 fs-5">Alat Terkomputerisasi</h5>
                        <p class="mb-0">Peralatan diagnosis modern untuk hasil yang presisi.</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="feature-wrap d-flex py-4 px-3">
                    <div class="feature-icon flex-shrink-0"><i class="fa fa-clinic-medical"></i></div>
                    <div class="ps-3">
                        <h5 class="mb-2 fs-5">Fasilitas Nyaman & Bersih</h5>
                        <p class="mb-0">Ruang tunggu perokok/non-perokok, area luas dan terawat.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="feature-wrap d-flex py-4 px-3">
                    <div class="feature-icon flex-shrink-0"><i class="fa fa-tools"></i></div>
                    <div class="ps-3">
                        <h5 class="mb-2 fs-5">Ketersediaan Suku Cadang</h5>
                        <p class="mb-0">Stok lengkap dari bengkel resmi DENSO.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="feature-wrap d-flex py-4 px-3">
                    <div class="feature-icon flex-shrink-0"><i class="fa fa-car"></i></div>
                    <div class="ps-3">
                        <h5 class="mb-2 fs-5">Layanan Antar Jemput</h5>
                        <p class="mb-0">Lebih nyaman, kami sediakan antar jemput kendaraan.</p>
                    </div>
                </div>
            </div>

        </div>
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

<!-- ===================== Service Tabs (tetap seperti aslinya) ===================== -->
<div id="layanan" class="container-xxl service py-5">
    <div class="container">
        <div class="text-center">
            <h6 class="text-primary text-uppercase">// Layanan AC Mobil Terbaik! //</h6>
            <h2 class="mb-5">Penawaran Servis Berkala AC Mobil BAGIYO DENSO</h2>
        </div>
        <div class="row g-4">
            <div class="col-lg-4">
                <div class="nav w-100 nav-pills me-4">
                    <button class="nav-link w-100 d-flex align-items-center text-start p-4 mb-4 active" data-bs-toggle="pill" data-bs-target="#tab-pane-1" type="button">
                        <i class="fa fa-car fa-2x me-3"></i>
                        <h4 class="m-0">Utama - Fresh Service</h4>
                    </button>
                    <button class="nav-link w-100 d-flex align-items-center text-start p-4 mb-4" data-bs-toggle="pill" data-bs-target="#tab-pane-2" type="button">
                        <i class="fa fa-car fa-2x me-3"></i>
                        <h4 class="m-0">Utama - Light Service</h4>
                    </button>
                    <button class="nav-link w-100 d-flex align-items-center text-start p-4 mb-4" data-bs-toggle="pill" data-bs-target="#tab-pane-3" type="button">
                        <i class="fa fa-car fa-2x me-3"></i>
                        <h4 class="m-0">Utama - Heavy Service</h4>
                    </button>
                    <button class="nav-link w-100 d-flex align-items-center text-start p-4 mb-0" data-bs-toggle="pill" data-bs-target="#tab-pane-4" type="button">
                        <i class="fa fa-folder-plus fa-2x me-3"></i>
                        <h4 class="m-0">Service Tambahan</h4>
                    </button>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="tab-content w-100">
                    <div class="tab-pane fade show active" id="tab-pane-1">
                        <div class="row g-4">
                            <div class="col-md-6" style="min-height: 350px;">
                                <div class="position-relative h-100">
                                    <img class="position-absolute img-fluid w-100 h-100 rounded-16" src="<?= base_url('assets/'); ?>img/service-1.jpg" style="object-fit: cover;" alt="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h3 class="mb-3">Fresh Service - Pengalaman Kesegaran AC Mobil Anda!</h3>
                                <p class="mb-4">Nikmati AC mobil yang menghembuskan udara segar dengan Fresh Service kami. Kami memastikan kualitas udara di kabin mobil Anda tetap segar dan bersih.</p>
                                <p><i class="fa fa-check text-success me-3"></i>Blower bersih untuk hembusan maksimal.</p>
                                <p><i class="fa fa-check text-success me-3"></i>Filter kabin baru untuk udara lebih sehat.</p>
                                <p><i class="fa fa-check text-success me-3"></i>Layanan cepat & berkualitas.</p>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="tab-pane-2">
                        <div class="row g-4">
                            <div class="col-md-6" style="min-height: 350px;">
                                <div class="position-relative h-100">
                                    <img class="position-absolute img-fluid w-100 h-100 rounded-16" src="<?= base_url('assets/'); ?>img/service-2.jpg" style="object-fit: cover;" alt="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h3 class="mb-3">Light Service - Perawatan Ringan untuk AC Mobil Anda!</h3>
                                <p class="mb-4">Fresh Service + perawatan komponen ruang mesin.</p>
                                <p><i class="fa fa-check text-success me-3"></i>Bersihkan kondensor untuk kinerja optimal.</p>
                                <p><i class="fa fa-check text-success me-3"></i>Ganti dryer baru agar pengeringan maksimal.</p>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="tab-pane-3">
                        <div class="row g-4">
                            <div class="col-md-6" style="min-height: 350px;">
                                <div class="position-relative h-100">
                                    <img class="position-absolute img-fluid w-100 h-100 rounded-16" src="<?= base_url('assets/'); ?>img/service-3.jpg" style="object-fit: cover;" alt="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h3 class="mb-3">Heavy Service - Perawatan Intensif untuk AC Mobil Anda!</h3>
                                <p class="mb-4">Light Service + perawatan mendalam di ruang kabin.</p>
                                <p><i class="fa fa-check text-success me-3"></i>Pembersihan evaporator menyeluruh.</p>
                                <p><i class="fa fa-check text-success me-3"></i>Ganti expansion valve untuk penyejukan optimal.</p>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="tab-pane-4">
                        <div class="row g-4">
                            <div class="col-md-6" style="min-height: 350px;">
                                <div class="position-relative h-100">
                                    <img class="position-absolute img-fluid w-100 h-100 rounded-16" src="<?= base_url('assets/'); ?>img/service-4.jpg" style="object-fit: cover;" alt="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h3 class="mb-3">Penyempurnaan Layanan untuk AC Mobil Anda!</h3>
                                <p class="mb-4">Cleverin menyegarkan udara kabin & melawan virus. Flushing membersihkan sistem AC + ganti oli & dryer baru.</p>
                                <p><i class="fa fa-check text-success me-3"></i>Cleverin: perlindungan aktif virus & bakteri.</p>
                                <p><i class="fa fa-check text-success me-3"></i>Flushing: bersih menyeluruh, kinerja optimal.</p>
                            </div>
                        </div>
                    </div>
                </div><!-- /.tab-content -->
            </div>
        </div>
    </div>
</div>
<!-- ===================== Service End ===================== -->

<!-- ===================== Quote Start ===================== -->
<div class="container-fluid bg-secondary booking my-5">
    <div class="container">
        <div class="row gx-5">
            <div class="col-lg-12 py-5">
                <div class="py-5 text-center">
                    <h3 class="fs-4 text-white mb-4">Kesuksesan bengkel terletak pada pengerjaan yang berkualitas, <br> diiringi dengan kesadaran akan ibadah dan menjaga keselamatan kerja setiap saat.</h3>
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
            <h2 class="mb-5">Tim BAGIYO DENSO AC Mobil</h2>
        </div>
        <div class="row g-5">
            <div class="col-lg-7 pt-2" style="min-height: 400px;">
                <div class="position-relative h-100">
                    <img class="position-absolute img-fluid w-100 h-100 rounded-16" src="<?= base_url('assets/'); ?>img/tim.jpg" style="object-fit: cover;" alt="Tim">
                </div>
            </div>
            <div class="col-lg-5">
                <h2 class="mb-4"><span class="text-primary">BAGIYO DENSO</span> Tim Solid dan Teknisi Berpengalaman</h2>
                <p class="mb-4">Tim solid dan teknisi berpengalaman siap membantu permasalahan AC mobil Anda dengan profesionalisme tinggi.</p>
                <p class="mb-0">Kami berharap dapat bekerjasama menjaga kualitas & performa AC mobil Anda. Terima kasih atas kepercayaan Anda.</p>
            </div>
        </div>
    </div>
</div>
<!-- ===================== Team End ===================== -->

<!-- ===================== CTA (sama gaya dengan halaman lain) ===================== -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10 col-sm-12 text-center">
                <div class="cta-wrap">
                    <div class="mb-4">
                        <img src="<?= base_url('assets/img/logo.svg'); ?>" alt="ic-logo" width="60" class="img-fluid">
                    </div>
                    <div class="cta-title">
                        <h3 class="fs-4 fw-bold">Minat dengan Layanan Kami? <br> Hubungi Kami Sekarang</h3>
                    </div>
                    <div class="mb-3">
                        <p class="cta-txt text-secondary mb-0">Nikmati kenyamanan dan kesegaran AC Mobil Anda</p>
                    </div>
                    <div class="mt-3">
                        <a class="btn-wa w-50 justify-content-center"
                            href="https://api.whatsapp.com/send/?phone=6281325545071&text=Halo%21%20Apakah%20ini%20BAGIYO%20DENSO%20AC%20MOBIL%3F%20Saya%20memiliki%20beberapa%20pertanyaan%20mengenai%20layanan%20yang%20Anda%20tawarkan.&type=phone_number&app_absent=0"
                            target="_blank" rel="noreferrer">
                            <i class="fab fa-whatsapp"></i> Hubungi via WhatsApp
                        </a>
                    </div>
                </div><!-- /cta-wrap -->
            </div>
        </div>
    </div>
</div>
<!-- ===================== CTA End ===================== -->