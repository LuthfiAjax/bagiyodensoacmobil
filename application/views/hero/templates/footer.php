
    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Alamat</h4>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Jl. Hayam Wuruk No. 71, Kec. Purwodadi, Kab. Grobogan</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+62 81325545071</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>official@bagiyodensoacmobil.com</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-outline-light btn-social" target="_blank" href="https://www.instagram.com/bagiyo.ac/?hl=id"><i class="fab fa-instagram"></i></a>
                        <a class="btn btn-outline-light btn-social" target="_blank" href="https://www.youtube.com/@bagiyoac7144"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Jam Kerja</h4>
                    <h6 class="text-light">Senin - Sabtu:</h6>
                    <p class="mb-4">08.00 - 17.00 WIB</p>
                    <h6 class="text-light">Minggu</h6>
                    <p class="mb-0">08.30 - 14.30 WIB</p>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Layanan</h4>
                    <a class="btn btn-link" href="<?= base_url('#layanan'); ?>">Fresh Service</a>
                    <a class="btn btn-link" href="<?= base_url('#layanan'); ?>">Light Service </a>
                    <a class="btn btn-link" href="<?= base_url('#layanan'); ?>">Heavy Service</a>
                    <a class="btn btn-link" href="<?= base_url('#layanan'); ?>">Cleverin Service</a>
                    <a class="btn btn-link" href="<?= base_url('#layanan'); ?>">Flushing Service</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Berita Terkini</h4>
                    <p>Dapatkan notifikasi terkini dengan mengikuti website kami.</p>
                    <div class="position-relative mx-auto" style="max-width: 400px;">
                        <input class="form-control border-0 w-100 py-3 ps-4 pe-5" type="text" placeholder="Your email">
                        <button type="button" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">Ikuti</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a class="border-bottom" style="text-decoration:none;" href="<?= base_url(''); ?>">Bagiyo Denso AC Mobil</a>, All Right Reserved. <?= date("Y"); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <style>
        .floating-chat {
            position: fixed;
            bottom: 40px;
            right: 40px;
            z-index: 9999;
            }

        .floating-chat .btn {
            animation: float 2s infinite;
            }

            @keyframes float {
            0% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-10px);
            }
            100% {
                transform: translateY(0);
            }
        }
    </style>
    <div class="floating-chat">
        <a href="https://api.whatsapp.com/send/?phone=6281325545071&text=Halo%21%20Apakah%20ini%20BAGIYO%20DENSO%20AC%20MOBIL%3F%20Saya%20memiliki%20beberapa%20pertanyaan%20mengenai%20layanan%20yang%20Anda%20tawarkan.&type=phone_number&app_absent=0" target="_blank" class="btn btn-lg btn-success rounded-circle">
            <i class="fab fa-whatsapp"></i>
        </a>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('assets/'); ?>lib/wow/wow.min.js"></script>
    <script src="<?= base_url('assets/'); ?>lib/easing/easing.min.js"></script>
    <script src="<?= base_url('assets/'); ?>lib/waypoints/waypoints.min.js"></script>
    <script src="<?= base_url('assets/'); ?>lib/counterup/counterup.min.js"></script>
    <script src="<?= base_url('assets/'); ?>lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="<?= base_url('assets/'); ?>lib/tempusdominus/js/moment.min.js"></script>
    <script src="<?= base_url('assets/'); ?>lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="<?= base_url('assets/'); ?>lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="<?= base_url('assets/'); ?>js/main.js"></script>

    <script>
        function getLocation() {
            fetch('https://ipapi.co/json/')
                .then(response => response.json())
                .then(data => {

                var sendData = {
                    ip: data.ip,
                    city: data.city,
                    country_name: data.country_name,
                    url: window.location.href
                };

                var xhr = new XMLHttpRequest();
                xhr.open('POST', "<?= base_url('post-data-viewer'); ?>", true);
                xhr.setRequestHeader('Content-Type', 'application/json');
                xhr.send(JSON.stringify(sendData));
                })
                .catch(error => {
                console.log("Gagal mendapatkan data lokasi: " + error);
                });
            }
        window.addEventListener('load', getLocation);
    </script>
</body>

</html>