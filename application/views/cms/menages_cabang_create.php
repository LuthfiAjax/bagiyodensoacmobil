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
        min-height: 160px;
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
        max-height: 160px;
        object-fit: cover;
        border-radius: 10px;
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

    .item-box {
        border: 1px solid #e3e6f0;
        transition: 0.2s;
        background: #f9f9f9;
    }

    .item-box:hover {
        background-color: #f5f8fa;
        border-color: #007bff;
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
                                <i class="fa fa-plus-circle mr-2"></i> Create Cabang
                            </h4>

                            <form id="formCabang" enctype="multipart/form-data">
                                <div class="row">
                                    <!-- Left Column -->
                                    <div class="col-md-6 border-right">
                                        <h6 class="text-uppercase text-muted mb-3">Informasi Cabang</h6>

                                        <div class="form-group mb-3">
                                            <label>Nama Cabang</label>
                                            <input type="text" name="name" class="form-control" required>
                                        </div>

                                        <div class="form-group mb-3">
                                            <label>Alamat Cabang</label>
                                            <textarea name="alamat" class="form-control" rows="2" placeholder="contoh: Jl. Hayam Wuruk No.71, Purwodadi, Grobogan"></textarea>
                                        </div>

                                        <div class="form-group mb-3">
                                            <label>Embed Iframe Google Maps</label>
                                            <textarea name="iframe_map" class="form-control" rows="3"
                                                placeholder="Masukkan iframe embed dari Google Maps"></textarea>
                                            <small class="text-muted">Contoh: &lt;iframe src='https://www.google.com/maps/embed?...' ... &gt;&lt;/iframe&gt;</small>
                                        </div>

                                        <div class="form-group mb-3">
                                            <label>URL Google Maps</label>
                                            <input type="url" name="url_map" class="form-control"
                                                placeholder="contoh: https://maps.app.goo.gl/K8wGoELM1fTzSvdJ8">
                                        </div>

                                        <div class="form-group mb-3">
                                            <label>Slide Title</label>
                                            <input type="text" name="slide_title" class="form-control">
                                        </div>

                                        <div class="form-group mb-3">
                                            <label>Slide Subtitle</label>
                                            <input type="text" name="slide_subtitle" class="form-control">
                                        </div>

                                        <div class="form-group mb-3">
                                            <label>Deskripsi Slide</label>
                                            <textarea name="slide_deskripsi" class="form-control" rows="4"></textarea>
                                        </div>

                                        <div class="form-group mb-3">
                                            <label>Tipe Tampilan</label>
                                            <select name="tipe" class="form-control" required>
                                                <option value="left">Left (Gambar kiri)</option>
                                                <option value="right">Right (Gambar kanan)</option>
                                            </select>
                                        </div>

                                        <div class="form-group mb-3">
                                            <label>Status</label>
                                            <select name="is_active" class="form-control">
                                                <option value="1">Aktif</option>
                                                <option value="0">Nonaktif</option>
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Right Column -->
                                    <div class="col-md-6">
                                        <h6 class="text-uppercase text-muted mb-3">Gambar Cabang</h6>

                                        <div class="form-group mb-3">
                                            <label>Gambar Background</label>
                                            <input type="file" name="image_background" id="image_background" class="form-control" accept="image/*" required>
                                            <div id="previewBg" class="preview-box mt-3">
                                                <div class="preview-placeholder">
                                                    <i class="fa fa-image fa-3x mb-2"></i>
                                                    <p>Preview background</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group mb-3">
                                            <label>Gambar Samping (opsional)</label>
                                            <input type="file" name="image_side" id="image_side" class="form-control" accept="image/*">
                                            <div id="previewSide" class="preview-box mt-3">
                                                <div class="preview-placeholder">
                                                    <i class="fa fa-image fa-3x mb-2"></i>
                                                    <p>Preview gambar samping</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <hr class="my-4">

                                <!-- =============== KONTAK & SOSIAL MEDIA =============== -->
                                <h5 class="mb-3 text-primary"><i class="fa fa-address-book mr-2"></i> Informasi Kontak & Sosial Media</h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label>Email Cabang</label>
                                            <input type="email" name="email" class="form-control" placeholder="contoh: info@bagiyaodenso.id">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label>Nomor Telepon / WhatsApp</label>
                                            <input type="text" name="phone" class="form-control" placeholder="contoh: +62 813-2554-5071">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label>Jam Operasional 1</label>
                                            <input type="text" name="open_hours" class="form-control" placeholder="contoh: Senin - Sabtu, 08.00 - 17.00">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label>Jam Operasional 2 (opsional)</label>
                                            <input type="text" name="open_hours2" class="form-control" placeholder="contoh: Minggu, 08.00 - 14.00">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label>Instagram</label>
                                            <input type="text" name="instagram" class="form-control" placeholder="contoh: bagiyodenso">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label>Facebook</label>
                                            <input type="text" name="facebook" class="form-control" placeholder="contoh: bagiyodenso">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label>TikTok</label>
                                            <input type="text" name="tiktok" class="form-control" placeholder="contoh: @bagiyodenso">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label>YouTube</label>
                                            <input type="text" name="youtube" class="form-control" placeholder="contoh: @bagiyodenso">
                                        </div>
                                    </div>
                                </div>

                                <hr class="my-4">

                                <!-- =============== LINK CABANG =============== -->
                                <h5 class="mb-3 text-primary"><i class="fa fa-link mr-2"></i> Link Cabang</h5>
                                <div id="linkContainer">
                                    <div class="item-box border rounded p-3 mb-3">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label>Label</label>
                                                <input type="text" name="link_label[]" class="form-control" placeholder="Contoh: Booking Sekarang" required>
                                            </div>
                                            <div class="col-md-4">
                                                <label>URL</label>
                                                <input type="url" name="link_url[]" class="form-control" placeholder="https://wa.me/..." required>
                                            </div>
                                            <div class="col-md-2">
                                                <label>Icon</label>
                                                <input type="text" name="link_icon[]" class="form-control" placeholder="fa fa-whatsapp">
                                            </div>
                                            <div class="col-md-2">
                                                <label>Style</label>
                                                <select name="link_style[]" class="form-control">
                                                    <option value="btn-primary">btn-primary</option>
                                                    <option value="btn-outline-light">btn-outline-light</option>
                                                    <option value="btn-success">btn-success</option>
                                                </select>
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-sm btn-danger mt-2 remove-btn"><i class="fa fa-trash"></i> Hapus Link</button>
                                    </div>
                                </div>
                                <button type="button" id="addLink" class="btn btn-sm btn-success mb-4"><i class="fa fa-plus"></i> Tambah Link</button>

                                <!-- =============== REVIEW =============== -->
                                <h5 class="mb-3 text-primary"><i class="fa fa-star mr-2"></i> Review Pelanggan</h5>
                                <div id="reviewContainer">
                                    <div class="item-box border rounded p-3 mb-3">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label>Nama</label>
                                                <input type="text" name="review_name[]" class="form-control" required>
                                            </div>
                                            <div class="col-md-3">
                                                <label>Kota</label>
                                                <input type="text" name="review_city[]" class="form-control">
                                            </div>
                                            <div class="col-md-2">
                                                <label>Rating</label>
                                                <input type="number" name="review_star[]" class="form-control" min="1" max="5" value="5" step="0.5">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Ulasan</label>
                                                <input type="text" name="review_text[]" class="form-control" placeholder="Komentar pelanggan" required>
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-sm btn-danger mt-2 remove-btn"><i class="fa fa-trash"></i> Hapus Review</button>
                                    </div>
                                </div>
                                <button type="button" id="addReview" class="btn btn-sm btn-success mb-4"><i class="fa fa-plus"></i> Tambah Review</button>

                                <!-- =============== GALERI =============== -->
                                <h5 class="mb-3 text-primary"><i class="fa fa-image mr-2"></i> Galeri Cabang</h5>
                                <div id="galleryContainer">
                                    <div class="item-box border rounded p-3 mb-3">
                                        <div class="row align-items-center">
                                            <div class="col-md-4">
                                                <label>Gambar</label>
                                                <input type="file" name="gallery_image[]" class="form-control gallery-input" accept="image/*" required>
                                                <div class="preview-box mt-2 gallery-preview">
                                                    <div class="preview-placeholder">
                                                        <i class="fa fa-image fa-2x mb-2"></i>
                                                        <p>Preview</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <label>Caption</label>
                                                <input type="text" name="gallery_caption[]" class="form-control" placeholder="Keterangan foto (opsional)">
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-sm btn-danger mt-2 remove-btn"><i class="fa fa-trash"></i> Hapus Gambar</button>
                                    </div>
                                </div>
                                <button type="button" id="addGallery" class="btn btn-sm btn-success mb-4"><i class="fa fa-plus"></i> Tambah Gambar Galeri</button>

                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan Cabang</button>
                                    <a href="<?= base_url('cms/menages-cabang'); ?>" class="btn btn-outline-secondary">
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
        const form = document.getElementById("formCabang");
        const alertBox = document.getElementById("alertBox");

        // ===== Submit via AJAX =====
        form.addEventListener("submit", async function(e) {
            e.preventDefault();
            alertBox.innerHTML = "";
            const submitBtn = form.querySelector('button[type="submit"]');
            submitBtn.disabled = true;
            submitBtn.innerHTML = `<i class="fa fa-spinner fa-spin"></i> Menyimpan...`;

            const formData = new FormData(form);
            try {
                const res = await fetch("<?= base_url('cms/api/post/cabang'); ?>", {
                    method: "POST",
                    body: formData
                });
                const result = await res.json();
                if (result.status) {
                    alertBox.innerHTML = `<div class="alert alert-success"><i class="fa fa-check-circle"></i> ${result.message}</div>`;
                    setTimeout(() => window.location.href = "<?= base_url('cms/menages-cabang'); ?>", 2000);
                } else {
                    alertBox.innerHTML = `<div class="alert alert-error"><i class="fa fa-times-circle"></i> ${result.message}</div>`;
                }
            } catch {
                alertBox.innerHTML = `<div class="alert alert-error"><i class="fa fa-exclamation-triangle"></i> Terjadi kesalahan koneksi!</div>`;
            } finally {
                submitBtn.disabled = false;
                submitBtn.innerHTML = `<i class="fa fa-save"></i> Simpan Cabang`;
            }
        });

        // ===== Dynamic Section =====
        const addDynamic = (btnId, containerId) => {
            const btn = document.getElementById(btnId);
            const container = document.getElementById(containerId);
            btn.addEventListener("click", () => {
                const clone = container.firstElementChild.cloneNode(true);
                clone.querySelectorAll("input").forEach(i => i.value = "");
                clone.querySelectorAll(".gallery-preview").forEach(p => p.innerHTML = `<div class="preview-placeholder"><i class="fa fa-image fa-2x mb-2"></i><p>Preview</p></div>`);
                container.appendChild(clone);
                clone.querySelectorAll(".remove-btn").forEach(b => b.onclick = () => clone.remove());
                if (containerId === "galleryContainer") initGalleryPreview(clone.querySelector(".gallery-input"), clone.querySelector(".gallery-preview"));
            });
        };
        addDynamic("addLink", "linkContainer");
        addDynamic("addReview", "reviewContainer");
        addDynamic("addGallery", "galleryContainer");

        // ===== Preview Utama =====
        const previewImage = (input, box) => {
            input.addEventListener("change", function() {
                const f = this.files[0];
                if (f) {
                    const r = new FileReader();
                    r.onload = e => box.innerHTML = `<img src="${e.target.result}">`;
                    r.readAsDataURL(f);
                } else box.innerHTML = `<div class='preview-placeholder'><i class='fa fa-image'></i><p>Preview</p></div>`;
            });
        };
        previewImage(document.getElementById("image_background"), document.getElementById("previewBg"));
        previewImage(document.getElementById("image_side"), document.getElementById("previewSide"));

        // ===== Gallery Preview (per item) =====
        function initGalleryPreview(input, previewBox) {
            input.addEventListener("change", function() {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = e => previewBox.innerHTML = `<img src="${e.target.result}">`;
                    reader.readAsDataURL(file);
                } else {
                    previewBox.innerHTML = `<div class="preview-placeholder"><i class="fa fa-image"></i><p>Preview</p></div>`;
                }
            });
        }
        document.querySelectorAll(".gallery-input").forEach((inp, i) => initGalleryPreview(inp, document.querySelectorAll(".gallery-preview")[i]));
    });
</script>