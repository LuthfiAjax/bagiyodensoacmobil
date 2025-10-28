<style>
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
                        <a class="btn-wa w-100 w-lg-50 justify-content-center"
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

<!-- Modal Form WhatsApp -->
<div class="modal fade" id="whatsappModal" tabindex="-1" aria-labelledby="whatsappModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="whatsappForm">
                <div class="modal-header">
                    <h5 class="modal-title" id="whatsappModalLabel">Hubungi Kami via WhatsApp</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="namaCust" class="form-label">Nama Anda</label>
                        <input type="text" class="form-control" id="namaCust" name="namaCust" required autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="waNumber" class="form-label">Nomor WhatsApp</label>
                        <input type="text" class="form-control" id="waNumber" name="waNumber" required autocomplete="off" placeholder="08xxxxxxxxxx">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Kirim WhatsApp</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Footer Start -->
<div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-3 col-md-6">
                <h4 class="text-light mb-4">Alamat Grobogan</h4>
                <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Jl. Hayam Wuruk No. 71, Kec. Purwodadi, Kab. Grobogan</p>
                <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+62 813-2554-5071</p>
                <p class="mb-2"><i class="fa fa-envelope me-3"></i>bagionew23@gmail.com</p>
                <div class="d-flex pt-2">
                    <a class="btn btn-outline-light btn-social" target="_blank" href="https://www.instagram.com/bagiyo.ac/"><i class="fab fa-instagram"></i></a>
                    <a class="btn btn-outline-light btn-social" target="_blank" href="https://www.youtube.com/@bagiyodensoacmobil"><i class="fab fa-youtube"></i></a>
                    <a class="btn btn-outline-light btn-social" target="_blank" href="https://www.tiktok.com/@bagiyo_acmobil"><i class="fab fa-tiktok"></i></a>
                    <a class="btn btn-outline-light btn-social" target="_blank" href="https://m.facebook.com/100025744723411/"><i class="fab fa-facebook"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <h4 class="text-light mb-4">Alamat Kudus</h4>
                <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Jl. Raya Kudus–Jepara No. 519 (Pertigaan RSI Sunan Kudus)</p>
                <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+62 811-620-6668</p>
                <p class="mb-2"><i class="fa fa-envelope me-3"></i>bagiyokudus@gmail.com</p>
                <div class="d-flex pt-2">
                    <a class="btn btn-outline-light btn-social" target="_blank" href="https://www.instagram.com/bagiyoac.kudus/"><i class="fab fa-instagram"></i></a>
                    <a class="btn btn-outline-light btn-social" target="_blank" href="https://www.tiktok.com/@bagiyoac.kudus"><i class="fab fa-tiktok"></i></a>
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
        </div>
    </div>
    <div class="container">
        <div class="copyright">
            <div class="row align-items-center">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    &copy; <a class="border-bottom" style="text-decoration:none;" href="<?= base_url(''); ?>">Bagiyo Denso AC Mobil</a>, All Rights Reserved. <?= date("Y"); ?>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <small>
                        Supported by
                        <a href="https://jaxindo.com" target="_blank" class="text-white fw-semibold" style="text-decoration:none;">
                            Jaxindo Digital Agency
                        </a>
                    </small>
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

    @media (max-width: 768px) {
        .floating-chat {
            bottom: 10px;
            right: 10px;
        }
    }
</style>
<div class="floating-chat" id="whatsapp-btn">
    <img src="https://bagiyodensoacmobil.com/assets/img/icon-wa.svg" alt="WhatsApp">
</div>

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.6.15/sweetalert2.min.js" integrity="sha512-Z4QYNSc2DFv8LrhMEyarEP3rBkODBZT90RwUC7dYQYF29V4dfkh+8oYZHt0R6T3/KNv32/u0W6icGWUUk9V0jA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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

    function getMessage() {
        fetch('https://ipapi.co/json/')
            .then(response => response.json())
            .then(data => {
                var sendData = {
                    ip: data.ip,
                    city: data.city
                };

                var xhr = new XMLHttpRequest();
                xhr.open('POST', "<?= base_url('post/data-messageklik'); ?>", true);
                xhr.setRequestHeader('Content-Type', 'application/json');
                xhr.send(JSON.stringify(sendData));
            })
            .catch(error => {
                console.log("Gagal mendapatkan data lokasi: " + error);
            });
    }
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const whatsappBtn = document.getElementById('whatsapp-btn');
        const whatsappForm = document.getElementById('whatsappForm');

        // Tombol trigger modal
        if (whatsappBtn) {
            whatsappBtn.addEventListener('click', function(event) {
                event.preventDefault();
                const modalElement = document.getElementById('whatsappModal');
                const myModal = new bootstrap.Modal(modalElement);
                myModal.show();
            });
        }

        // Submit form WhatsApp
        if (whatsappForm) {
            whatsappForm.addEventListener('submit', function(event) {
                event.preventDefault();

                // Ambil value saat submit diklik
                const namaInput = document.getElementById('namaCust');
                const waInput = document.getElementById('waNumber');

                console.log(namaInput);
                console.log(waInput);

                if (!namaInput || !waInput) {
                    alert('Form input tidak ditemukan!');
                    return;
                }

                const nama = namaInput.value.trim();
                const wa = waInput.value.trim();


                // Ambil data IP dan lokasi
                fetch('https://ipapi.co/json/')
                    .then(response => response.json())
                    .then(data => {
                        const ip = data.ip || 'Tidak diketahui';
                        const kota = data.city || 'Tidak diketahui';

                        const pesan = `Halo Bagiyo Denso AC Mobil! Nama saya ${nama}. Saya ingin bertanya mengenai layanan Anda `;
                        const encodedPesan = encodeURIComponent(pesan);
                        const linkWA = `https://api.whatsapp.com/send?phone=6281325545071&text=${encodedPesan}`;

                        // Kirim data ke server
                        $.ajax({
                            url: "<?= base_url('post-klik-whatsapp'); ?>",
                            method: "POST",
                            contentType: "application/json",
                            data: JSON.stringify({
                                ip: ip,
                                city: kota,
                                name: nama,
                                whatsapp: wa
                            }),
                            success: function(response) {
                                window.open(linkWA, '_blank');

                                const modalElement = document.getElementById('whatsappModal');
                                const modalInstance = bootstrap.Modal.getInstance(modalElement);
                                if (modalInstance) {
                                    modalInstance.hide();
                                }

                                document.getElementById('nama').value = '';
                                document.getElementById('wa').value = '';
                            },
                            error: function(xhr, status, error) {
                                console.warn("Gagal menyimpan data ke server:", error);
                                window.open(linkWA, '_blank');

                                const modalElement = document.getElementById('whatsappModal');
                                const modalInstance = bootstrap.Modal.getInstance(modalElement);
                                if (modalInstance) {
                                    modalInstance.hide();
                                }

                                document.getElementById('nama').value = '';
                                document.getElementById('wa').value = '';
                            }
                        });
                    })
                    .catch(error => {
                        console.error(error);
                    });
            });
        }
    });
</script>

<?php if ($this->session->flashdata('error')) : ?>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: '<?php echo $this->session->flashdata('error'); ?>'
        });
    </script>
<?php endif; ?>

<?php if ($this->session->flashdata('success')) : ?>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: '<?php echo $this->session->flashdata('success'); ?>'
        });
    </script>
<?php endif; ?>

<?php if ($page == 'artikel') : ?>
    <script>
        $(document).ready(function() {
            $('#search_input').on('keyup', function() {
                var link = "<?= base_url('artikel/'); ?>";
                var query = $(this).val();
                if (query.length > 2) {
                    $.ajax({
                        url: "<?= base_url('get-search-article'); ?>",
                        method: "POST",
                        data: {
                            query: query
                        },
                        dataType: "json",
                        success: function(data) {
                            var results = data.results;
                            var searchResults = '<ul class="list-group">';
                            if (results.length === 0) {
                                searchResults +=
                                    '<li class="list-group-item text-dark text-center">Artikel yang anda cari tidak ditemukan</li>';
                            } else {
                                $.each(results, function(index, value) {
                                    searchResults += '<li class="list-group-item text-start"><a class="text-dark" href="' + link + value.slug_article_id + '">' + value.title_article_id + '</a></li>';
                                });
                            }
                            searchResults += '</ul>';
                            $('#search_results').html(searchResults);
                            $('#search_results').show();
                        }
                    });
                } else {
                    $('#search_results').hide();
                }
            });
        });
    </script>
<?php endif; ?>

</body>

</html>