<style>
    .card {
        border-radius: 12px
    }

    .form-group label {
        font-weight: 600;
        color: #34495e
    }

    .preview-box {
        position: relative;
        overflow: hidden;
        min-height: 160px;
        border: 2px dashed #ccc;
        border-radius: 10px;
        background: #fafafa;
        transition: .3s
    }

    .preview-box:hover {
        border-color: #007bff;
        background: #f8fbff
    }

    .preview-box img {
        max-width: 100%;
        max-height: 160px;
        object-fit: cover;
        border-radius: 10px
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
        pointer-events: none
    }

    .item-box {
        border: 1px solid #e3e6f0;
        transition: .2s;
        background: #f9f9f9
    }

    .item-box:hover {
        background: #f5f8fa;
        border-color: #007bff
    }

    .alert {
        border-radius: 8px;
        padding: 12px 18px;
        font-weight: 600;
        margin-bottom: 20px
    }

    .alert-success {
        background: #d1f7d6;
        color: #0b6b1d;
        border: 1px solid #a6e6a7
    }

    .alert-error {
        background: #ffe3e3;
        color: #a10000;
        border: 1px solid #ffb3b3
    }

    .hint {
        font-size: 12px;
        color: #6b7280
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
                                <i class="fa fa-edit mr-2"></i> Edit Cabang: <?= htmlspecialchars($cabang['name']); ?>
                            </h4>

                            <form id="formCabang" enctype="multipart/form-data">
                                <input type="hidden" id="cabang_id" value="<?= (int)$cabang['id']; ?>">

                                <div class="row">
                                    <!-- Left -->
                                    <div class="col-md-6 border-right">
                                        <h6 class="text-uppercase text-muted mb-3">Informasi Cabang</h6>

                                        <div class="form-group mb-3">
                                            <label>Nama Cabang</label>
                                            <input type="text" name="name" class="form-control" value="<?= htmlspecialchars($cabang['name']); ?>" required>
                                        </div>

                                        <div class="form-group mb-3">
                                            <label>Slug (otomatis dari nama saat update di server)</label>
                                            <input type="text" class="form-control" value="<?= htmlspecialchars($cabang['slug']); ?>" disabled>
                                        </div>

                                        <div class="form-group mb-3">
                                            <label>Alamat Cabang</label>
                                            <textarea name="alamat" class="form-control" rows="2"><?= htmlspecialchars($cabang['alamat']); ?></textarea>
                                        </div>

                                        <div class="form-group mb-3">
                                            <label>Embed Iframe Google Maps</label>
                                            <textarea name="iframe_map" class="form-control" rows="3"><?= $cabang['iframe_map']; ?></textarea>
                                            <small class="text-muted">Tempel seluruh tag &lt;iframe ...&gt;&lt;/iframe&gt; dari Google Maps</small>
                                        </div>

                                        <div class="form-group mb-3">
                                            <label>URL Google Maps</label>
                                            <input type="url" name="url_map" class="form-control" value="<?= htmlspecialchars($cabang['url_map']); ?>">
                                        </div>

                                        <div class="form-group mb-3">
                                            <label>Slide Title</label>
                                            <input type="text" name="slide_title" class="form-control" value="<?= htmlspecialchars($cabang['slide_title']); ?>">
                                        </div>

                                        <div class="form-group mb-3">
                                            <label>Slide Subtitle</label>
                                            <input type="text" name="slide_subtitle" class="form-control" value="<?= htmlspecialchars($cabang['slide_subtitle']); ?>">
                                        </div>

                                        <div class="form-group mb-3">
                                            <label>Deskripsi Slide</label>
                                            <textarea name="slide_deskripsi" class="form-control" rows="4"><?= htmlspecialchars($cabang['slide_deskripsi']); ?></textarea>
                                        </div>

                                        <div class="form-group mb-3">
                                            <label>Tipe Tampilan</label>
                                            <select name="tipe" class="form-control" required>
                                                <option value="left" <?= ($cabang['tipe'] === 'left' ? 'selected' : ''); ?>>Left (Gambar kiri)</option>
                                                <option value="right" <?= ($cabang['tipe'] === 'right' ? 'selected' : ''); ?>>Right (Gambar kanan)</option>
                                            </select>
                                        </div>

                                        <div class="form-group mb-3">
                                            <label>Status</label>
                                            <select name="is_active" class="form-control">
                                                <option value="1" <?= ((int)$cabang['is_active'] === 1 ? 'selected' : ''); ?>>Aktif</option>
                                                <option value="0" <?= ((int)$cabang['is_active'] === 0 ? 'selected' : ''); ?>>Nonaktif</option>
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Right -->
                                    <div class="col-md-6">
                                        <h6 class="text-uppercase text-muted mb-3">Gambar Cabang</h6>

                                        <div class="form-group mb-3">
                                            <label>Gambar Background</label>
                                            <input type="file" name="image_background" id="image_background" class="form-control" accept="image/*">
                                            <div class="hint">Kosongkan jika tidak ingin mengganti.</div>
                                            <div id="previewBg" class="preview-box mt-3">
                                                <?php if (!empty($cabang['image_background'])): ?>
                                                    <img src="<?= base_url($cabang['image_background']); ?>" alt="background">
                                                <?php else: ?>
                                                    <div class="preview-placeholder"><i class="fa fa-image fa-3x mb-2"></i>
                                                        <p>Preview background</p>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>

                                        <div class="form-group mb-3">
                                            <label>Gambar Samping (opsional)</label>
                                            <input type="file" name="image_side" id="image_side" class="form-control" accept="image/*">
                                            <div class="hint">Kosongkan jika tidak ingin mengganti.</div>
                                            <div id="previewSide" class="preview-box mt-3">
                                                <?php if (!empty($cabang['image_side'])): ?>
                                                    <img src="<?= base_url($cabang['image_side']); ?>" alt="side">
                                                <?php else: ?>
                                                    <div class="preview-placeholder"><i class="fa fa-image fa-3x mb-2"></i>
                                                        <p>Preview gambar samping</p>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <hr class="my-4">

                                <!-- Kontak & Sosmed -->
                                <h5 class="mb-3 text-primary"><i class="fa fa-address-book mr-2"></i> Informasi Kontak & Sosial Media</h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label>Email Cabang</label>
                                            <input type="email" name="email" class="form-control" value="<?= htmlspecialchars($cabang['email']); ?>">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label>Nomor Telepon / WhatsApp</label>
                                            <input type="text" name="phone" class="form-control" value="<?= htmlspecialchars($cabang['phone']); ?>">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label>Jam Operasional 1</label>
                                            <input type="text" name="open_hours" class="form-control" value="<?= htmlspecialchars($cabang['open_hours']); ?>">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label>Jam Operasional 2 (opsional)</label>
                                            <input type="text" name="open_hours2" class="form-control" value="<?= htmlspecialchars($cabang['open_hours2']); ?>">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label>Instagram</label>
                                            <input type="text" name="instagram" class="form-control" value="<?= htmlspecialchars($cabang['instagram']); ?>">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label>Facebook</label>
                                            <input type="text" name="facebook" class="form-control" value="<?= htmlspecialchars($cabang['facebook']); ?>">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label>TikTok</label>
                                            <input type="text" name="tiktok" class="form-control" value="<?= htmlspecialchars($cabang['tiktok']); ?>">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label>YouTube</label>
                                            <input type="text" name="youtube" class="form-control" value="<?= htmlspecialchars($cabang['youtube']); ?>">
                                        </div>
                                    </div>
                                </div>

                                <hr class="my-4">

                                <!-- ================= LINKS ================= -->
                                <hr class="my-4">
                                <h5 class="mb-3 text-primary"><i class="fa fa-link mr-2"></i> Link Cabang</h5>
                                <div id="linkContainer">
                                    <?php if (!empty($links)): foreach ($links as $i => $l): ?>
                                            <div class="item-box border rounded p-3 mb-3">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label>Label</label>
                                                        <input type="text" name="link_label[]" class="form-control" value="<?= htmlspecialchars($l['label']); ?>" required>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>URL</label>
                                                        <input type="url" name="link_url[]" class="form-control" value="<?= htmlspecialchars($l['url']); ?>" required>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label>Icon</label>
                                                        <input type="text" name="link_icon[]" class="form-control" value="<?= htmlspecialchars($l['icon_class']); ?>">
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label>Style</label>
                                                        <select name="link_style[]" class="form-control">
                                                            <?php $styles = ['btn-primary', 'btn-outline-light', 'btn-success', 'btn-warning'];
                                                            foreach ($styles as $s) {
                                                                $sel = ($l['btn_style'] === $s) ? 'selected' : '';
                                                                echo "<option value=\"$s\" $sel>$s</option>";
                                                            } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <button type="button" class="btn btn-sm btn-danger mt-2 remove-btn"><i class="fa fa-trash"></i> Hapus Link</button>
                                            </div>
                                        <?php endforeach;
                                    else: ?>
                                        <div class="item-box border rounded p-3 mb-3">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label>Label</label>
                                                    <input type="text" name="link_label[]" class="form-control" placeholder="Contoh: Booking Sekarang">
                                                </div>
                                                <div class="col-md-4">
                                                    <label>URL</label>
                                                    <input type="url" name="link_url[]" class="form-control" placeholder="https://wa.me/...">
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
                                                        <option value="btn-warning">btn-warning</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <button type="button" class="btn btn-sm btn-danger mt-2 remove-btn"><i class="fa fa-trash"></i> Hapus Link</button>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <button type="button" id="addLink" class="btn btn-sm btn-success mb-4"><i class="fa fa-plus"></i> Tambah Link</button>

                                <!-- ================= REVIEW ================= -->
                                <hr class="my-4">
                                <h5 class="mb-3 text-primary"><i class="fa fa-star mr-2"></i> Review Pelanggan</h5>
                                <div id="reviewContainer">
                                    <?php if (!empty($review)): foreach ($review as $rv): ?>
                                            <div class="item-box border rounded p-3 mb-3">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label>Nama</label>
                                                        <input type="text" name="review_name[]" class="form-control" value="<?= htmlspecialchars($rv['reviewer_name']); ?>" required>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label>Kota</label>
                                                        <input type="text" name="review_city[]" class="form-control" value="<?= htmlspecialchars($rv['reviewer_city']); ?>">
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label>Rating</label>
                                                        <input type="number" name="review_star[]" class="form-control" min="1" max="5" step="0.5" value="<?= htmlspecialchars($rv['rating']); ?>">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>Ulasan</label>
                                                        <input type="text" name="review_text[]" class="form-control" value="<?= htmlspecialchars($rv['review_text']); ?>" required>
                                                    </div>
                                                </div>
                                                <button type="button" class="btn btn-sm btn-danger mt-2 remove-btn"><i class="fa fa-trash"></i> Hapus Review</button>
                                            </div>
                                        <?php endforeach;
                                    else: ?>
                                        <div class="item-box border rounded p-3 mb-3">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label>Nama</label>
                                                    <input type="text" name="review_name[]" class="form-control">
                                                </div>
                                                <div class="col-md-3">
                                                    <label>Kota</label>
                                                    <input type="text" name="review_city[]" class="form-control">
                                                </div>
                                                <div class="col-md-2">
                                                    <label>Rating</label>
                                                    <input type="number" name="review_star[]" class="form-control" min="1" max="5" step="0.5" value="5">
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Ulasan</label>
                                                    <input type="text" name="review_text[]" class="form-control" placeholder="Komentar pelanggan">
                                                </div>
                                            </div>
                                            <button type="button" class="btn btn-sm btn-danger mt-2 remove-btn"><i class="fa fa-trash"></i> Hapus Review</button>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <button type="button" id="addReview" class="btn btn-sm btn-success mb-4"><i class="fa fa-plus"></i> Tambah Review</button>

                                <!-- ================= GALERI ================= -->
                                <hr class="my-4">
                                <h5 class="mb-3 text-primary"><i class="fa fa-image mr-2"></i> Galeri Cabang</h5>
                                <div id="galleryContainer">
                                    <?php if (!empty($galery)): foreach ($galery as $g):
                                            $imgPath = !empty($g['image_path']) ? $g['image_path'] : (!empty($g['image']) ? $g['image'] : '');
                                            $caption = !empty($g['caption']) ? $g['caption'] : (!empty($g['title']) ? $g['title'] : '');
                                    ?>
                                            <div class="item-box border rounded p-3 mb-3 gallery-item-row">
                                                <input type="hidden" name="gallery_existing_id[]" value="<?= (int)$g['id']; ?>">
                                                <input type="hidden" name="gallery_existing_path[]" value="<?= htmlspecialchars($imgPath); ?>">

                                                <div class="row align-items-center">
                                                    <div class="col-md-4">
                                                        <label>Ganti Gambar (opsional)</label>
                                                        <!-- penting: key by ID -->
                                                        <input type="file" name="gallery_replace[<?= (int)$g['id']; ?>]" class="form-control gallery-input" accept="image/*">
                                                        <div class="hint">Kosongkan jika tetap pakai gambar lama.</div>
                                                        <div class="preview-box mt-2 gallery-preview">
                                                            <?php if (!empty($imgPath)): ?>
                                                                <img src="<?= base_url($imgPath); ?>" alt="gallery-old">
                                                            <?php else: ?>
                                                                <div class="preview-placeholder"><i class="fa fa-image fa-2x mb-2"></i>
                                                                    <p>Preview</p>
                                                                </div>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <label>Caption</label>
                                                        <!-- penting: key by ID -->
                                                        <input type="text" name="caption_existing[<?= (int)$g['id']; ?>]" class="form-control" value="<?= htmlspecialchars($caption); ?>" placeholder="Keterangan foto (opsional)">
                                                    </div>
                                                </div>
                                                <button type="button" class="btn btn-sm btn-danger mt-2 remove-gallery-existing"><i class="fa fa-trash"></i> Hapus Gambar Ini</button>
                                            </div>
                                    <?php endforeach;
                                    endif; ?>

                                    <!-- Template untuk item baru -->
                                    <div class="item-box border rounded p-3 mb-3 gallery-item-row template d-none">
                                        <div class="row align-items-center">
                                            <div class="col-md-4">
                                                <label>Gambar</label>
                                                <input type="file" name="gallery_new[]" class="form-control gallery-input" accept="image/*">
                                                <div class="preview-box mt-2 gallery-preview">
                                                    <div class="preview-placeholder"><i class="fa fa-image fa-2x mb-2"></i>
                                                        <p>Preview</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <label>Caption</label>
                                                <input type="text" name="caption_new[]" class="form-control" placeholder="Keterangan foto (opsional)">
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-sm btn-danger mt-2 remove-btn"><i class="fa fa-trash"></i> Hapus Gambar</button>
                                    </div>
                                </div>
                                <button type="button" id="addGallery" class="btn btn-sm btn-success mb-4"><i class="fa fa-plus"></i> Tambah Gambar Galeri</button>

                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Update Cabang</button>
                                    <a href="<?= base_url('cms/menages-cabang'); ?>" class="btn btn-outline-secondary"><i class="fa fa-arrow-left"></i> Kembali</a>
                                </div>
                            </form>
                        </div><!-- card-body -->
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
        const cabangId = document.getElementById("cabang_id").value;

        // Submit
        form.addEventListener("submit", async function(e) {
            e.preventDefault();
            alertBox.innerHTML = "";
            const submitBtn = form.querySelector('button[type="submit"]');
            submitBtn.disabled = true;
            submitBtn.innerHTML = `<i class="fa fa-spinner fa-spin"></i> Menyimpan...`;

            const fd = new FormData(form);

            try {
                const res = await fetch(`<?= base_url('cms/api/update/cabang/'); ?>${cabangId}`, {
                    method: "POST",
                    body: fd
                });
                const result = await res.json();
                if (result.status) {
                    alertBox.innerHTML = `<div class="alert alert-success"><i class="fa fa-check-circle"></i> ${result.message}</div>`;
                    setTimeout(() => window.location.href = "<?= base_url('cms/menages-cabang'); ?>", 1500);
                } else {
                    alertBox.innerHTML = `<div class="alert alert-error"><i class="fa fa-times-circle"></i> ${result.message}</div>`;
                }
            } catch (err) {
                alertBox.innerHTML = `<div class="alert alert-error"><i class="fa fa-exclamation-triangle"></i> Terjadi kesalahan koneksi!</div>`;
            } finally {
                submitBtn.disabled = false;
                submitBtn.innerHTML = `<i class="fa fa-save"></i> Update Cabang`;
            }
        });

        // Helpers
        const makeRemovable = (root) => {
            root.querySelectorAll(".remove-btn").forEach(btn => {
                btn.onclick = () => btn.closest(".item-box").remove();
            });
        };
        makeRemovable(document);

        // Add Link
        document.getElementById("addLink").addEventListener("click", () => {
            const c = document.getElementById("linkContainer");
            const el = document.createElement("div");
            el.className = "item-box border rounded p-3 mb-3";
            el.innerHTML = `
      <div class="row">
        <div class="col-md-4"><label>Label</label><input type="text" name="link_label[]" class="form-control" placeholder="Contoh: Booking Sekarang" required></div>
        <div class="col-md-4"><label>URL</label><input type="url" name="link_url[]" class="form-control" placeholder="https://wa.me/..." required></div>
        <div class="col-md-2"><label>Icon</label><input type="text" name="link_icon[]" class="form-control" placeholder="fa fa-whatsapp"></div>
        <div class="col-md-2"><label>Style</label>
          <select name="link_style[]" class="form-control">
            <option value="btn-primary">btn-primary</option>
            <option value="btn-outline-light">btn-outline-light</option>
            <option value="btn-success">btn-success</option>
            <option value="btn-warning">btn-warning</option>
          </select>
        </div>
      </div>
      <button type="button" class="btn btn-sm btn-danger mt-2 remove-btn"><i class="fa fa-trash"></i> Hapus Link</button>`;
            c.appendChild(el);
            makeRemovable(el);
        });

        // Add Review
        document.getElementById("addReview").addEventListener("click", () => {
            const c = document.getElementById("reviewContainer");
            const el = document.createElement("div");
            el.className = "item-box border rounded p-3 mb-3";
            el.innerHTML = `
      <div class="row">
        <div class="col-md-3"><label>Nama</label><input type="text" name="review_name[]" class="form-control" required></div>
        <div class="col-md-3"><label>Kota</label><input type="text" name="review_city[]" class="form-control"></div>
        <div class="col-md-2"><label>Rating</label><input type="number" name="review_star[]" class="form-control" min="1" max="5" step="0.5" value="5"></div>
        <div class="col-md-4"><label>Ulasan</label><input type="text" name="review_text[]" class="form-control" placeholder="Komentar pelanggan" required></div>
      </div>
      <button type="button" class="btn btn-sm btn-danger mt-2 remove-btn"><i class="fa fa-trash"></i> Hapus Review</button>`;
            c.appendChild(el);
            makeRemovable(el);
        });

        // Preview helper
        function initGalleryPreview(input, box) {
            input.addEventListener("change", function() {
                const f = this.files && this.files[0];
                if (!f) {
                    box.innerHTML = `<div class="preview-placeholder"><i class="fa fa-image fa-2x mb-2"></i><p>Preview</p></div>`;
                    return;
                }
                const r = new FileReader();
                r.onload = e => box.innerHTML = `<img src="${e.target.result}" alt="preview">`;
                r.readAsDataURL(f);
            });
        }

        // Add Gallery (baru)
        document.getElementById("addGallery").addEventListener("click", () => {
            const cont = document.getElementById("galleryContainer");
            const tpl = cont.querySelector(".template");
            const clone = tpl.cloneNode(true);
            clone.classList.remove("template", "d-none");

            // reset isi
            clone.querySelectorAll('input[type="file"]').forEach(i => i.value = "");
            const box = clone.querySelector(".gallery-preview");
            if (box) box.innerHTML = `<div class="preview-placeholder"><i class="fa fa-image fa-2x mb-2"></i><p>Preview</p></div>`;

            cont.appendChild(clone);
            makeRemovable(clone);

            const input = clone.querySelector(".gallery-input");
            if (input && box) initGalleryPreview(input, box);
        });

        // Preview untuk existing
        document.querySelectorAll("#galleryContainer .gallery-item-row").forEach(row => {
            const input = row.querySelector(".gallery-input");
            const box = row.querySelector(".gallery-preview");
            if (input && box) initGalleryPreview(input, box);
        });

        // Hapus existing (tandai untuk API)
        document.querySelectorAll(".remove-gallery-existing").forEach(btn => {
            btn.addEventListener("click", function() {
                const row = btn.closest(".gallery-item-row");
                const idInput = row.querySelector('input[name="gallery_existing_id[]"]');
                if (idInput && idInput.value) {
                    const del = document.createElement("input");
                    del.type = "hidden";
                    del.name = "gallery_delete_existing[]";
                    del.value = idInput.value;
                    form.appendChild(del);
                }
                row.remove();
            });
        });

        // Preview BG/SIDE
        function previewImage(inputEl, boxEl) {
            inputEl?.addEventListener("change", function() {
                const f = this.files && this.files[0];
                if (!f) return;
                const r = new FileReader();
                r.onload = e => boxEl.innerHTML = `<img src="${e.target.result}" alt="preview">`;
                r.readAsDataURL(f);
            });
        }
        previewImage(document.getElementById("image_background"), document.getElementById("previewBg"));
        previewImage(document.getElementById("image_side"), document.getElementById("previewSide"));
    });
</script>