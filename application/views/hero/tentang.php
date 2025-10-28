<!-- ===== Component Styles (tanpa font & tanpa :root) ===== -->
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

    /* ABOUT */
    .about-section {
        padding: 60px 0;
    }

    .about-media {
        position: relative;
        height: 100%;
        min-height: 380px;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 10px 25px rgba(0, 0, 0, .08);
    }

    .about-media img {
        position: absolute;
        inset: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .about-media .media-overlay {
        position: absolute;
        inset: 0;
        background: radial-gradient(120% 100% at 70% 0%, rgba(13, 110, 253, .18) 0%, rgba(0, 0, 0, .08) 60%, rgba(0, 0, 0, .22) 100%);
        pointer-events: none;
    }

    .about-card {
        background: #fff;
        border: 1px solid #e9eef5;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 10px 25px rgba(0, 0, 0, .08);
        transition: box-shadow .25s ease, transform .25s ease, border-color .25s ease;
    }

    .about-card:hover {
        box-shadow: 0 18px 45px rgba(0, 0, 0, .14);
        transform: translateY(-2px);
        border-color: rgba(13, 110, 253, .25);
    }

    .about-body {
        padding: 26px;
    }

    .eyebrow {
        display: inline-block;
        padding: 6px 12px;
        border-radius: 999px;
        background: rgba(13, 110, 253, .12);
        color: var(--bs-primary);
        font-weight: 700;
        font-size: .85rem;
    }

    .about-title {
        font-weight: 800;
        line-height: 1.2;
        margin: 12px 0 10px;
    }

    .about-desc {
        color: #6c757d;
    }

    /* FEATURES / KEUNGGULAN */
    .feature-wrap {
        background: #fff;
        border: 1px solid #e9eef5;
        border-radius: 16px;
        padding: 18px;
        height: 100%;
        box-shadow: 0 10px 25px rgba(0, 0, 0, .06);
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

    .feature-title {
        margin: 10px 0 6px;
        font-weight: 700;
        color: #212529;
    }

    .feature-text {
        color: #6c757d;
    }
</style>

<!-- ===================== HERO ===================== -->
<!-- Page Header Start -->
<div class="container-fluid page-header mb-5 p-0" style="background-image: url(<?= base_url('assets/img/new/4.jpg'); ?>);">
    <div class="container-fluid page-header-inner py-5">
        <div class="container text-center">
            <h1 class="display-3 fs-1 text-white mb-3 animated slideInDown">Tentang BAGIYO DENSO</h1>
            <span class="text-white">Sejarah singkat BAGIYO DENSO</span>
        </div>
    </div>
</div>
<!-- Page Header End -->

<!-- ===================== SEJARAH ===================== -->
<div class="container-xxl about-section">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6">
                <div class="position-relative about-media">
                    <img src="<?= base_url('assets/'); ?>img/new/3.jpg" alt="Bengkel BAGIYO DENSO AC Mobil">
                    <span class="media-overlay"></span>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about-card">
                    <div class="about-body">
                        <span class="eyebrow">Sejarah</span>
                        <h2 class="about-title fs-3 mb-2"><span class="text-primary">Subagiyo</span> Pendiri dan pemilik Bengkel BAGIYO DENSO AC Mobil</h2>
                        <p class="about-desc mb-3">Subagiyo, pendiri dan pemilik Bengkel BAGIYO DENSO AC Mobil, telah memulai karirnya sebagai mekanik AC sejak tahun 1993 di PT. DENSO. Setelah mengumpulkan pengalaman berharga selama bertahun-tahun, pada tahun 2004 ia mengambil keputusan berani untuk membuka bengkel sendiri di daerah Purwodadi. Dengan semangat dan dedikasi, Subagiyo menjalankan bengkelnya dengan menggunakan pengalaman serta keahlian yang dimilikinya.</p>
                        <p class="about-desc mb-0">Sebagai seorang yang berdedikasi, Subagiyo secara pribadi menangani setiap mobil yang masuk ke Bengkel BAGIYO AC Mobil, terutama mobil unit entry. Dengan keahliannya yang teruji, ia menghadirkan layanan perbaikan AC mobil yang berkualitas tinggi. Melalui perjalanan panjang dan beberapa kali perpindahan lokasi, Bengkel BAGIYO AC Mobil akhirnya menemukan tempat yang ideal di kawasan bundaran Ganesha, sekitar 1 kilometer ke timur dari simpang lima Purwodadi.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ===================== TIM ===================== -->
<div class="container-xxl about-section">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6 order-lg-2">
                <div class="position-relative about-media">
                    <img src="<?= base_url('assets/'); ?>img/tim.jpg" alt="TIM BAGIYO DENSO AC Mobil">
                    <span class="media-overlay"></span>
                </div>
            </div>
            <div class="col-lg-6 order-lg-1">
                <div class="about-card">
                    <div class="about-body">
                        <span class="eyebrow">Tim</span>
                        <h2 class="about-title fs-3 mb-2"><span class="text-primary">Tim</span> Bengkel BAGIYO AC DENSO Mobil</h2>
                        <p class="about-desc mb-3">Dalam perjalanannya, tim Bengkel BAGIYO AC DENSO Mobil terus berkembang dengan bertambahnya anggota tim. Saat ini, tim Bengkel BAGIYO AC DENSO terdiri dari 10 orang yang memiliki komitmen yang tinggi terhadap kepuasan pelanggan. Mereka bekerja sama untuk memberikan layanan terbaik dan solusi yang efektif dalam perbaikan AC mobil.</p>
                        <p class="about-desc mb-0">Pada tanggal 25 Januari 2022, Bengkel BAGIYO AC dipercaya sebagai bengkel resmi DENSO. Kepercayaan tersebut didasarkan pada penilaian pihak DENSO yang menyimpulkan bahwa Bengkel BAGIYO AC telah memenuhi semua persyaratan yang ditetapkan, termasuk dalam hal peralatan, fasilitas, sumber daya, dan jumlah unit entry sesuai dengan standar operasional yang berlaku. Kepercayaan ini menjadi bukti pengakuan atas dedikasi dan kompetensi Bengkel BAGIYO AC dalam memberikan pelayanan terbaik kepada pelanggan.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ===================== KEUNGGULAN ===================== -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mb-4">
            <h6 class="text-primary text-uppercase">// Keunggulan Kami //</h6>
            <h2 class="mb-2">Kenapa Harus BAGIYO DENSO ?</h2>
        </div>
        <div class="row g-4">
            <div class="col-lg-4 col-md-6">
                <div class="feature-wrap">
                    <div class="d-flex align-items-start gap-3">
                        <div class="feature-icon"><i class="fa fa-toolbox"></i></div>
                        <div>
                            <h5 class="feature-title fs-5">Mekanik Bersertifikasi DENSO</h5>
                            <p class="feature-text mb-0">Mekanik di bengkel kami telah melalui training dan sertifikasi langsung dari tim DENSO.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="feature-wrap">
                    <div class="d-flex align-items-start gap-3">
                        <div class="feature-icon"><i class="fa fa-certificate"></i></div>
                        <div>
                            <h5 class="feature-title fs-5">Bergaransi Resmi</h5>
                            <p class="feature-text mb-0">Spare part dan pekerjaan yang kami tangani memiliki garansi sesuai kualitas barang.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="feature-wrap">
                    <div class="d-flex align-items-start gap-3">
                        <div class="feature-icon"><i class="fa fa-laptop-code"></i></div>
                        <div>
                            <h5 class="feature-title fs-5">Alat Terkomputerisasi</h5>
                            <p class="feature-text mb-0">Kami menggunakan alat canggih dan terkomputerisasi untuk hasil diagnosis yang presisi.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="feature-wrap">
                    <div class="d-flex align-items-start gap-3">
                        <div class="feature-icon"><i class="fa fa-clinic-medical"></i></div>
                        <div>
                            <h5 class="feature-title fs-5">Fasilitas Nyaman dan Bersih</h5>
                            <p class="feature-text mb-0">Ruang tunggu terpisah perokok/non-perokok, area luas dan terawat.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="feature-wrap">
                    <div class="d-flex align-items-start gap-3">
                        <div class="feature-icon"><i class="fa fa-tools"></i></div>
                        <div>
                            <h5 class="feature-title fs-5">Ketersediaan Suku Cadang</h5>
                            <p class="feature-text mb-0">Stok suku cadang lengkap dari bengkel resmi DENSO.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="feature-wrap">
                    <div class="d-flex align-items-start gap-3">
                        <div class="feature-icon"><i class="fa fa-car"></i></div>
                        <div>
                            <h5 class="feature-title fs-5">Layanan Antar Jemput</h5>
                            <p class="feature-text mb-0">Kami menyediakan layanan antar-jemput untuk kenyamanan pelanggan.</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- KEUNGGULAN End -->