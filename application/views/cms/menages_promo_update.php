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

<div class="content">
    <div class="animated fadeIn">
        <div class="orders">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card shadow-sm border-0">
                        <div id="alertBox" class="mx-3 mt-3"></div>

                        <div class="card-body px-4 py-4">
                            <h4 class="mb-4 fw-bold text-primary">
                                <i class="fa fa-edit mr-2"></i> Update Promo
                            </h4>

                            <form id="formPromo" enctype="multipart/form-data">
                                <input type="hidden" id="promo_id" value="<?= $promo['id']; ?>">

                                <div class="row">
                                    <!-- Left -->
                                    <div class="col-md-6 border-right">
                                        <h6 class="text-uppercase text-muted mb-3">Informasi Utama</h6>

                                        <div class="form-group mb-3">
                                            <label>Judul Promo</label>
                                            <input type="text" name="judul" id="judul" class="form-control"
                                                value="<?= htmlspecialchars($promo['judul']); ?>" required>
                                        </div>

                                        <div class="form-group mb-3">
                                            <label>Periode Promo</label>
                                            <div class="d-flex gap-2">
                                                <input type="datetime-local" name="periode_mulai" id="periode_mulai"
                                                    class="form-control" required
                                                    value="<?= date('Y-m-d\TH:i', strtotime($promo['periode_mulai'])); ?>">
                                                <span class="px-2 d-flex align-items-center">s/d</span>
                                                <input type="datetime-local" name="periode_selesai" id="periode_selesai"
                                                    class="form-control" required
                                                    value="<?= date('Y-m-d\TH:i', strtotime($promo['periode_selesai'])); ?>">
                                            </div>
                                        </div>

                                        <div class="form-group mb-3">
                                            <label>Tampilkan di</label>
                                            <select name="cabang_id" id="cabang_id" class="form-control" required></select>
                                            <small class="text-muted">Pilih lokasi promo</small>
                                        </div>

                                        <div class="form-group mb-3">
                                            <label>URL Promo</label>
                                            <input type="url" name="url_promo" id="url_promo" class="form-control"
                                                value="<?= htmlspecialchars($promo['url_promo']); ?>" required>
                                        </div>

                                        <div class="form-group mb-3">
                                            <label>Sifat URL</label>
                                            <select name="url_sifat" id="url_sifat" class="form-control" required>
                                                <option value="direct" <?= $promo['url_sifat'] == 'direct' ? 'selected' : ''; ?>>Direct</option>
                                                <option value="newtab" <?= $promo['url_sifat'] == 'newtab' ? 'selected' : ''; ?>>New Tab</option>
                                            </select>
                                        </div>

                                        <div class="form-group mb-3">
                                            <label>Status Promo</label>
                                            <select name="is_active" id="is_active" class="form-control">
                                                <option value="1" <?= $promo['is_active'] == 1 ? 'selected' : ''; ?>>Aktif</option>
                                                <option value="0" <?= $promo['is_active'] == 0 ? 'selected' : ''; ?>>Nonaktif</option>
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Right -->
                                    <div class="col-md-6">
                                        <h6 class="text-uppercase text-muted mb-3">Gambar Promo</h6>

                                        <div class="form-group mb-3">
                                            <label>Gambar Desktop</label>
                                            <input type="file" name="img_desktop" id="img_desktop" class="form-control" accept="image/*">
                                            <small class="text-muted">Kosongkan jika tidak diubah</small>
                                            <div id="previewDesktop" class="preview-box mt-3">
                                                <?php if ($promo['img_desktop']): ?>
                                                    <img src="<?= base_url($promo['img_desktop']); ?>" alt="Desktop Promo">
                                                <?php else: ?>
                                                    <div class="preview-placeholder"><i class="fa fa-image fa-3x mb-2"></i>
                                                        <p>Belum ada gambar</p>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>

                                        <div class="form-group mb-3">
                                            <label>Gambar Mobile</label>
                                            <input type="file" name="img_mobile" id="img_mobile" class="form-control" accept="image/*">
                                            <small class="text-muted">Kosongkan jika tidak diubah</small>
                                            <div id="previewMobile" class="preview-box mt-3">
                                                <?php if ($promo['img_mobile']): ?>
                                                    <img src="<?= base_url($promo['img_mobile']); ?>" alt="Mobile Promo">
                                                <?php else: ?>
                                                    <div class="preview-placeholder"><i class="fa fa-image fa-3x mb-2"></i>
                                                        <p>Belum ada gambar</p>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <hr class="my-4">
                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-save"></i> Update Promo
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

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const cabangSelect = document.getElementById("cabang_id");
        const promoId = document.getElementById("promo_id").value;

        /** 🔹 Load Cabang dari API */
        fetch("<?= base_url('get-cabang'); ?>")
            .then(res => res.json())
            .then(result => {
                const selectedCabang = parseInt("<?= $promo['cabang_id']; ?>");
                const cabangSelect = document.getElementById("cabang_id");

                cabangSelect.innerHTML = "";

                // Tambahkan default
                const defaultOpt = document.createElement("option");
                defaultOpt.disabled = true;
                defaultOpt.textContent = "-- Pilih Lokasi Promo --";
                cabangSelect.appendChild(defaultOpt);

                // Ambil list cabang dari result.data
                const cabangList = Array.isArray(result.data) ? result.data : [];

                // Tambahkan Halaman Utama di akhir
                const utamaOpt = document.createElement("option");
                utamaOpt.value = 0;
                utamaOpt.textContent = "Halaman Utama";
                if (selectedCabang === 0) utamaOpt.selected = true;
                cabangSelect.appendChild(utamaOpt);

                // Tambahkan semua cabang
                cabangList.forEach(cabang => {
                    const opt = document.createElement("option");
                    opt.value = cabang.id;
                    opt.textContent = "Cabang " + cabang.name;
                    if (parseInt(cabang.id) === selectedCabang) opt.selected = true;
                    cabangSelect.appendChild(opt);
                });
            });


        /** 🔹 Handle Form Submit */
        const form = document.getElementById("formPromo");
        const alertBox = document.getElementById("alertBox");

        form.addEventListener("submit", async function(e) {
            e.preventDefault();
            alertBox.innerHTML = "";

            const submitBtn = form.querySelector('button[type="submit"]');
            submitBtn.disabled = true;
            submitBtn.innerHTML = `<i class="fa fa-spinner fa-spin"></i> Mengupdate...`;

            const formData = new FormData(form);
            try {
                const response = await fetch("<?= base_url('cms/api/update/promo/'); ?>" + promoId, {
                    method: "POST",
                    body: formData
                });
                const result = await response.json();

                if (result.status) {
                    alertBox.innerHTML = `<div class="alert alert-success"><i class="fa fa-check-circle"></i> ${result.message}</div>`;
                    setTimeout(() => window.location.href = "<?= base_url('cms/menages-promo'); ?>", 2000);
                } else {
                    alertBox.innerHTML = `<div class="alert alert-error"><i class="fa fa-times-circle"></i> ${result.message}</div>`;
                }
            } catch (error) {
                console.error(error);
                alertBox.innerHTML = `<div class="alert alert-error"><i class="fa fa-exclamation-triangle"></i> Terjadi kesalahan koneksi!</div>`;
            } finally {
                submitBtn.disabled = false;
                submitBtn.innerHTML = `<i class="fa fa-save"></i> Update Promo`;
            }
        });

        /** 🔹 Preview Gambar */
        const previewImage = (input, previewBox) => {
            input.addEventListener("change", function() {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = e => previewBox.innerHTML = `<img src="${e.target.result}" alt="Preview">`;
                    reader.readAsDataURL(file);
                }
            });
        };
        previewImage(document.getElementById("img_desktop"), document.getElementById("previewDesktop"));
        previewImage(document.getElementById("img_mobile"), document.getElementById("previewMobile"));
    });
</script>