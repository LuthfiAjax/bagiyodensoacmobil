<style>
    .card {
        border-radius: 12px;
    }

    .form-group label {
        font-weight: 600;
        color: #34495e;
    }

    .preview-box {
        position: relative;
        overflow: hidden;
        min-height: 180px;
        border: 2px dashed #ccc;
        border-radius: 10px;
        background: #fafafa;
        transition: all 0.3s ease-in-out;
    }

    .preview-box:hover {
        border-color: #007bff;
        background: #f8fbff;
    }

    .preview-box img {
        max-width: 100%;
        max-height: 250px;
        border-radius: 10px;
        object-fit: cover;
    }

    .preview-placeholder {
        position: absolute;
        inset: 0;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        color: #888;
        font-size: 14px;
        pointer-events: none;
    }

    .alert {
        border-radius: 8px;
        padding: 12px 18px;
        font-weight: 600;
        margin-bottom: 20px;
    }

    .alert-success {
        background: #d1f7d6;
        color: #0b6b1d;
        border: 1px solid #a6e6a7;
    }

    .alert-error {
        background: #ffe3e3;
        color: #a10000;
        border: 1px solid #ffb3b3;
    }
</style>

<!-- Content Create Promo -->
<div class="content">
    <div class="animated fadeIn">
        <div class="clearfix"></div>
        <div class="orders">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card shadow-sm border-0">
                        <!-- Alert Box -->
                        <div id="alertBox" class="mx-3 mt-3"></div>

                        <div class="card-body px-4 py-4">
                            <h4 class="mb-4 fw-bold text-primary">
                                <i class="fa fa-bullhorn mr-2"></i> Create Promo
                            </h4>

                            <form id="formPromo" enctype="multipart/form-data">
                                <div class="row">
                                    <!-- Left Column -->
                                    <div class="col-md-6 border-right">
                                        <h6 class="text-uppercase text-muted mb-3">Informasi Utama</h6>

                                        <div class="form-group mb-3">
                                            <label for="judul">Judul Promo</label>
                                            <input type="text" name="judul" id="judul" class="form-control" required>
                                        </div>

                                        <div class="form-group mb-3">
                                            <label>Periode Promo</label>
                                            <div class="d-flex gap-2">
                                                <input type="datetime-local" name="periode_mulai" id="periode_mulai" class="form-control" required>
                                                <span class="px-2 d-flex align-items-center">s/d</span>
                                                <input type="datetime-local" name="periode_selesai" id="periode_selesai" class="form-control" required>
                                            </div>
                                            <small class="text-muted">Pilih tanggal dan jam mulai serta berakhir promo</small>
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="cabang_id">Tampilkan di</label>
                                            <select name="cabang_id" id="cabang_id" class="form-control" required>
                                                <option value="">-- Pilih Lokasi Promo --</option>
                                                <option value="0">Halaman Utama</option>
                                            </select>
                                            <small class="text-muted">Pilih lokasi di mana promo akan ditampilkan</small>
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="url_promo">URL Promo</label>
                                            <input type="url" name="url_promo" id="url_promo" class="form-control" placeholder="https://example.com/promo" required>
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="url_sifat">Sifat URL</label>
                                            <select name="url_sifat" id="url_sifat" class="form-control" required>
                                                <option value="direct">Direct (Buka di tab yang sama)</option>
                                                <option value="newtab">New Tab (Buka di tab baru)</option>
                                            </select>
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="is_active">Status Promo</label>
                                            <select name="is_active" id="is_active" class="form-control">
                                                <option value="1">Aktif</option>
                                                <option value="0">Nonaktif</option>
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Right Column -->
                                    <div class="col-md-6">
                                        <h6 class="text-uppercase text-muted mb-3">Gambar Promo</h6>

                                        <div class="form-group mb-3">
                                            <label for="img_desktop">Gambar Promo Desktop</label>
                                            <input type="file" name="img_desktop" id="img_desktop" class="form-control" accept="image/*" required>
                                            <small class="text-muted">Ukuran ideal: 1920x600 px</small>

                                            <div id="previewDesktop" class="preview-box mt-3">
                                                <div class="preview-placeholder">
                                                    <i class="fa fa-image fa-3x mb-2"></i>
                                                    <p>Preview gambar desktop akan tampil di sini</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="img_mobile">Gambar Promo Mobile</label>
                                            <input type="file" name="img_mobile" id="img_mobile" class="form-control" accept="image/*" required>
                                            <small class="text-muted">Ukuran ideal: 720x1080 px</small>

                                            <div id="previewMobile" class="preview-box mt-3">
                                                <div class="preview-placeholder">
                                                    <i class="fa fa-image fa-3x mb-2"></i>
                                                    <p>Preview gambar mobile akan tampil di sini</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <hr class="my-4">

                                <div class="mt-3 text-right">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-save"></i> Simpan Promo
                                    </button>
                                    <a href="<?= base_url('cms/menages-promo'); ?>" class="btn btn-outline-secondary">
                                        <i class="fa fa-arrow-left"></i> Kembali
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Script JS -->
<script>
    document.addEventListener("DOMContentLoaded", function() {

        /** =======================
         * 1️⃣ Load Cabang List
         ======================== */
        const cabangSelect = document.getElementById("cabang_id");

        fetch("<?= base_url('get-cabang'); ?>")
            .then(res => res.json())
            .then(response => {
                // Cek apakah data di root atau di dalam key data
                const cabangList = Array.isArray(response) ?
                    response :
                    (response.data && Array.isArray(response.data) ? response.data : []);

                if (cabangList.length === 0) {
                    console.warn("⚠️ Tidak ada data cabang diterima dari API.");
                    return;
                }

                cabangList.forEach(cabang => {
                    const opt = document.createElement("option");
                    opt.value = cabang.id;
                    opt.textContent = 'Cabang ' + cabang.name;
                    cabangSelect.appendChild(opt);
                });
            })
            .catch(err => console.error("Gagal memuat cabang:", err));

        /** =======================
         * 2️⃣ Handle Form Submit
         ======================== */
        const form = document.getElementById("formPromo");
        const alertBox = document.getElementById("alertBox");

        form.addEventListener("submit", async function(e) {
            e.preventDefault();
            alertBox.innerHTML = "";

            const submitBtn = form.querySelector('button[type="submit"]');
            submitBtn.disabled = true;
            submitBtn.innerHTML = `<i class="fa fa-spinner fa-spin"></i> Menyimpan...`;

            const formData = new FormData(form);

            try {
                const response = await fetch("<?= base_url('cms/api/post/promo'); ?>", {
                    method: "POST",
                    body: formData
                });

                const result = await response.json();

                if (result.status) {
                    alertBox.innerHTML = `<div class="alert alert-success"><i class="fa fa-check-circle"></i> ${result.message}</div>`;
                    setTimeout(() => {
                        window.location.href = "<?= base_url('cms/menages-promo'); ?>";
                    }, 2000);
                } else {
                    alertBox.innerHTML = `<div class="alert alert-error"><i class="fa fa-times-circle"></i> ${result.message}</div>`;
                    submitBtn.disabled = false;
                    submitBtn.innerHTML = `<i class="fa fa-save"></i> Simpan Promo`;
                }
            } catch (error) {
                console.error(error);
                alertBox.innerHTML = `<div class="alert alert-error"><i class="fa fa-exclamation-triangle"></i> Terjadi kesalahan koneksi!</div>`;
                submitBtn.disabled = false;
                submitBtn.innerHTML = `<i class="fa fa-save"></i> Simpan Promo`;
            }
        });

        /** =======================
         * 3️⃣ Preview Gambar
         ======================== */
        const previewImage = (input, previewBox) => {
            input.addEventListener("change", function() {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = e => previewBox.innerHTML = `<img src="${e.target.result}" alt="Preview">`;
                    reader.readAsDataURL(file);
                } else {
                    previewBox.innerHTML = `<div class="preview-placeholder"><i class="fa fa-image fa-3x mb-2"></i><p>Preview akan tampil di sini</p></div>`;
                }
            });
        };

        previewImage(document.getElementById("img_desktop"), document.getElementById("previewDesktop"));
        previewImage(document.getElementById("img_mobile"), document.getElementById("previewMobile"));
    });
</script>