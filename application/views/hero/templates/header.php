<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <title><?= $title; ?></title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <?php $currentLink = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>

    <meta name="description" content="<?= $meta_des; ?>">
    <meta name="keywords" content="<?= $meta_key; ?>">
    <meta name="author" content="Jaxindo Digital Agency">
    <meta name="publisher" content="Bagiyo Denso AC Mobil">
    <meta name="robots" content="index, follow">

    <link rel="canonical" href="<?= $currentLink; ?>" />

    <meta property="og:locale" content="id_ID" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="<?= $title; ?>" />
    <meta property="og:description" content="<?= $meta_des; ?>" />
    <meta property="og:url" content="<?= $currentLink; ?>" />
    <meta property="og:site_name" content="bagiyodensoacmobil" />

    <meta itemprop="name" content="<?= $title; ?>">
    <meta itemprop="description" content="<?= $meta_des; ?>">
    <meta itemprop="image" content="<?= $image; ?>">

    <meta property="og:image" content="<?= $image; ?>" />
    <meta property="og:image:secure_url" content="<?= $image; ?>" />
    <meta property="og:image:type" content="image/jpeg" />
    <meta property="og:image:width" content="1200" />
    <meta property="og:image:height" content="700" />
    <meta property="og:image:alt" content="<?= $title; ?>" />

    <link rel="icon" type="image/x-icon" href="<?= base_url('assets/'); ?>img/logo.svg" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@600;700&family=Ubuntu:wght@400;500&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.6.15/sweetalert2.min.css" integrity="sha512-NvuRGlPf6cHpxQqBGnPe7fPoACpyrjhlSNeXVUY7BZAj1nNhuNpRBq3osC4yr2vswUEuHq2HtCsY2vfLNCndYA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="<?= base_url('assets/'); ?>lib/animate/animate.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/'); ?>lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/'); ?>lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <link href="<?= base_url('assets/'); ?>css/bootstrap.min.css" rel="stylesheet">

    <link href="<?= base_url('assets/'); ?>css/style.css" rel="stylesheet">

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-NBVTWL1GPM"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-NBVTWL1GPM');
    </script>
    <style>
        .marquee {
            display: inline-flex;
            align-items: center;
            white-space: nowrap;
            animation: marquee 20s linear infinite;
        }

        @keyframes marquee {
            0% {
                transform: translateX(100%);
            }

            100% {
                transform: translateX(-100%);
            }
        }
    </style>
</head>


<body>
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Topbar Start -->
    <div class="container-fluid bg-light p-0">
        <div class="row gx-0 d-none d-lg-flex">
            <!-- Jam Operasional -->
            <div class="col-lg-6 px-5 text-start">
                <div class="h-100 d-inline-flex align-items-center py-3">
                    <small class="far fa-clock text-primary me-2"></small>
                    <small>Senin - Sabtu : 08.00 WIB - 17.00 WIB</small>
                </div>
                <div class="h-100 d-inline-flex align-items-center py-3 ms-3">
                    <small class="far fa-clock text-primary me-2"></small>
                    <small>Minggu : 08.30 WIB - 14.30 WIB</small>
                </div>
            </div>

            <!-- Alamat & Kontak (Marquee) -->
            <div class="col-lg-6 text-end overflow-hidden">
                <div class="marquee d-inline-flex align-items-center gap-5 py-3">

                    <!-- Kantor Grobogan -->
                    <div class="d-inline-flex align-items-center gap-2">
                        <small class="fa fa-map-marker-alt text-primary"></small>
                        <small><strong>Grobogan:</strong> Jl. Hayam Wuruk No. 71, Kec. Purwodadi, Kab. Grobogan</small>
                        <small class="fa fa-phone-alt text-primary ms-3"></small>
                        <small>+62 813-2554-5071</small>
                    </div>

                    <!-- Kantor Kudus -->
                    <div class="d-inline-flex align-items-center gap-2">
                        <small class="fa fa-map-marker-alt text-primary"></small>
                        <small><strong>Kudus:</strong> Jl. Raya Kudus–Jepara No. 519 (Pertigaan RSI Sunan Kudus)</small>
                        <small class="fa fa-phone-alt text-primary ms-3"></small>
                        <small>+62 811-620-6668</small>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
        <a href="<?= base_url(''); ?>" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <h2 class="m-0 text-primary fs-4">
                <img src="<?= base_url('assets/'); ?>img/logo.svg" width="50" alt="CarServ" class="me-1">
                BAGIYO DENSO
            </h2>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="<?= base_url(''); ?>" class="nav-item nav-link <?= ($page == 'beranda') ? 'active' : ''; ?>">Beranda</a>
                <a href="<?= base_url('tentang'); ?>" class="nav-item nav-link <?= ($page == 'tentang') ? 'active' : ''; ?>">Tentang</a>
                <a href="<?= base_url('layanan'); ?>" class="nav-item nav-link <?= ($page == 'layanan') ? 'active' : ''; ?>">Layanan</a>
                <a href="<?= base_url('artikel'); ?>" class="nav-item nav-link <?= ($page == 'artikel') ? 'active' : ''; ?>">Artikel</a>
                <a href="<?= base_url('cabang'); ?>" class="nav-item nav-link <?= ($page == 'cabang') ? 'active' : ''; ?>">Cabang</a>
                <a href="https://api.whatsapp.com/send/?phone=6281325545071&text=Halo%21%20Apakah%20ini%20BAGIYO%20DENSO%20AC%20MOBIL%3F%20Saya%20memiliki%20beberapa%20pertanyaan%20mengenai%20layanan%20yang%20Anda%20tawarkan.&type=phone_number&app_absent=0" target="_blank" class="btn btn-primary btn-sm py-4 rounded-pill px-lg-2 rounded d-block d-lg-none">Booking Sekarang<i class="fa fa-paper-plane ms-3"></i></a>
            </div>
            <a href="https://api.whatsapp.com/send/?phone=6281325545071&text=Halo%21%20Apakah%20ini%20BAGIYO%20DENSO%20AC%20MOBIL%3F%20Saya%20memiliki%20beberapa%20pertanyaan%20mengenai%20layanan%20yang%20Anda%20tawarkan.&type=phone_number&app_absent=0" target="_blank" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block">Booking Sekarang<i class="fa fa-paper-plane ms-3"></i></a>
        </div>
    </nav>
    <!-- Navbar End -->

    <div class="modal fade" id="katalog" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Download Company Profile</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('send-katalog'); ?>" method="post">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama <span class="text-primary">*</span></label>
                            <input type="text" class="form-control" id="nama" name="nama" autocomplete="off" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email <span class="text-primary">*</span></label>
                            <input type="email" class="form-control" id="email" name="email" autocomplete="off" required>
                            <div id="emailHelp" class="form-text text->secondary">Pastikan Email Valid dan Benar</div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Kirim</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>