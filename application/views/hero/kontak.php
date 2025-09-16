<!-- Page Header Start -->
<div class="container-fluid page-header mb-5 p-0" style="background-image: url(<?= base_url('assets/img/about.jpg'); ?>);">
    <div class="container-fluid page-header-inner py-5">
        <div class="container text-center">
            <h1 class="display-3 fs-1 text-white mb-3 animated slideInDown">Kontak BAGIYO DENSO</h1>
            <span class="text-white">Kami siap membantu Anda dengan solusi AC mobil terbaik</span>
        </div>
    </div>
</div>
<!-- Page Header End -->

<!-- Contact Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-4">
            <div class="col-12">
                <div class="row gy-4">
                    <div class="col-md-4">
                        <div class="bg-light d-flex flex-column justify-content-center p-4">
                            <h5 class="text-uppercase">// Email //</h5>
                            <p class="m-0"><i class="fas fa-envelope-open text-primary me-2"></i>official@bagiyodensoacmobil.com</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="bg-light d-flex flex-column justify-content-center p-4">
                            <h5 class="text-uppercase">// Telepone //</h5>
                            <p class="m-0"><i class="fas fa-phone-alt text-primary me-2"></i>+62 81325545071</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="bg-light d-flex flex-column justify-content-center p-4">
                            <h5 class="text-uppercase">// Sosial Media //</h5>
                            <p class="m-0"><i class="fab fa-instagram text-primary me-2"></i>bagiyo.ac</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 wow fadeIn" data-wow-delay="0.1s">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3797.963280064623!2d110.91531911850234!3d-7.097380583136126!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e70b013aafd861d%3A0xaffab44599a8f835!2sBengkel%20Bagiyo%20Denso%20AC%20Mobil!5e0!3m2!1sid!2sid!4v1688242510172!5m2!1sid!2sid" width="600" height="450" style="border: 1px;;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="col-md-6">
                <div class="wow fadeInUp" data-wow-delay="0.2s">
                    <p class="mb-4">Hubungi Bagiyo Denso AC Mobil untuk solusi AC mobil terbaik. Layanan profesional kami meliputi perbaikan, perawatan, pemasangan AC baru, dan penggantian suku cadang.</p>
                    <form action="<?= base_url('post/message_kotak'); ?>" method="post">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="nama" id="nama" required autocomplete="off" placeholder="Nama">
                                    <label for="name">Nama</label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="subject" id="subject" required autocomplete="off" placeholder="Subject">
                                    <label for="subject">Subject</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="email" class="form-control" name="email" id="email" required autocomplete="off" placeholder="Email">
                                    <label for="email">Email</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="number" class="form-control" name="tlp" id="tlp" required autocomplete="off" placeholder="Telepone">
                                    <label for="tellphone">Telepone</label>
                                </div>
                            </div>
                            
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control" required autocomplete="off" placeholder="Tulis Pesan anda disini" name="message" id="message" style="height: 100px"></textarea>
                                    <label for="message">Pesan</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-secondary w-100 py-3" type="submit">Kirim Sekarang</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Contact End -->