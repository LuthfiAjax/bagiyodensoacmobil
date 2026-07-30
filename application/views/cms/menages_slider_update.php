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
        min-height: 180px;
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
        max-height: 250px;
        border-radius: 10px;
        object-fit: cover
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

    .button-item {
        border: 1px solid #e3e6f0;
        transition: .2s
    }

    .button-item:hover {
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
</style>

<div class="content">
    <div class="animated fadeIn">
        <div class="clearfix"></div>
        <div class="orders">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card shadow-sm border-0">
                        <!-- Alert Box (JS) -->
                        <div id="alertBox" class="mx-3 mt-3"></div>

                        <div class="card-body px-4 py-4">
                            <h4 class="mb-4 fw-bold text-primary">
                                <i class="fa fa-pencil mr-2"></i> Edit Slider
                            </h4>

                            <!-- Pastikan $slider tersedia -->
                            <form id="formSlider" enctype="multipart/form-data" data-slider-id="<?= isset($slider['id']) ? (int)$slider['id'] : 0; ?>">
                                <div class="row">
                                    <!-- Left -->
                                    <div class="col-md-6 border-right">
                                        <h6 class="text-uppercase text-muted mb-3">Informasi Utama</h6>

                                        <div class="form-group mb-3">
                                            <label for="title">Judul Slider</label>
                                            <input type="text" name="title" id="title" class="form-control" required
                                                value="<?= htmlspecialchars($slider['title'] ?? '', ENT_QUOTES); ?>">
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="subtitle">Sub Judul</label>
                                            <input type="text" name="subtitle" id="subtitle" class="form-control"
                                                value="<?= htmlspecialchars($slider['subtitle'] ?? '', ENT_QUOTES); ?>">
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="description">Deskripsi</label>
                                            <textarea name="description" id="description" class="form-control" rows="4"><?= htmlspecialchars($slider['description'] ?? '', ENT_QUOTES); ?></textarea>
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="tipe">Tipe Slider</label>
                                            <select name="tipe" id="tipe" class="form-control" required>
                                                <?php
                                                $tipe = $slider['tipe'] ?? 'right';
                                                $opts = ['right' => 'Right (Gambar kanan)', 'left' => 'Left (Gambar kiri)', 'medsos' => 'Medsos', 'promo' => 'Promo'];
                                                foreach ($opts as $val => $label) {
                                                    $sel = ($tipe === $val) ? 'selected' : '';
                                                    echo "<option value=\"{$val}\" {$sel}>{$label}</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="position_order">Urutan Tampil</label>
                                            <input type="number" name="position_order" id="position_order" class="form-control"
                                                value="<?= isset($slider['position_order']) ? (int)$slider['position_order'] : 1; ?>">
                                        </div>

                                        <div class="form-group mb-4">
                                            <label for="is_active">Status</label>
                                            <select name="is_active" id="is_active" class="form-control">
                                                <option value="1" <?= (isset($slider['is_active']) && (int)$slider['is_active'] === 1) ? 'selected' : ''; ?>>Aktif</option>
                                                <option value="0" <?= (isset($slider['is_active']) && (int)$slider['is_active'] === 0) ? 'selected' : ''; ?>>Nonaktif</option>
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Right -->
                                    <div class="col-md-6">
                                        <h6 class="text-uppercase text-muted mb-3">Gambar Slider</h6>

                                        <div class="form-group mb-3">
                                            <label for="image_background">Gambar Background</label>
                                            <input type="file" name="image_background" id="image_background" class="form-control" accept="image/*">
                                            <small class="text-muted">Biarkan kosong jika tidak ingin mengganti. Ukuran ideal: 1920x600 px</small>

                                            <div id="previewBg" class="preview-box mt-3">
                                                <?php if (!empty($slider['image_background'])): ?>
                                                    <img src="<?= base_url($slider['image_background']); ?>" alt="Background Lama">
                                                <?php else: ?>
                                                    <div class="preview-placeholder">
                                                        <i class="fa fa-image fa-3x mb-2"></i>
                                                        <p>Preview background akan tampil di sini</p>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="image_side">Gambar Samping (opsional)</label>
                                            <input type="file" name="image_side" id="image_side" class="form-control" accept="image/*">
                                            <small class="text-muted">Biarkan kosong jika tidak ingin mengganti.</small>

                                            <div id="previewSide" class="preview-box mt-3">
                                                <?php if (!empty($slider['image_side'])): ?>
                                                    <img src="<?= base_url($slider['image_side']); ?>" alt="Gambar Samping Lama">
                                                <?php else: ?>
                                                    <div class="preview-placeholder">
                                                        <i class="fa fa-image fa-3x mb-2"></i>
                                                        <p>Preview gambar samping akan tampil di sini</p>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <hr class="my-4">

                                <h5 class="mb-3 text-primary"><i class="fa fa-link mr-2"></i> Button Links</h5>

                                <div id="buttonContainer">
                                    <?php if (!empty($links)): ?>
                                        <?php foreach ($links as $idx => $lnk): ?>
                                            <div class="button-item border rounded p-3 mb-3 bg-light">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group mb-2">
                                                            <label>Label Tombol</label>
                                                            <input type="text" name="btn_label[]" class="form-control" required
                                                                value="<?= htmlspecialchars($lnk['label'] ?? '', ENT_QUOTES); ?>">
                                                        </div>
                                                        <div class="form-group mb-2">
                                                            <label>Icon (Font Awesome)</label>
                                                            <input type="text" name="btn_icon[]" class="form-control"
                                                                value="<?= htmlspecialchars($lnk['icon_class'] ?? '', ENT_QUOTES); ?>"
                                                                placeholder="fa fa-calendar-check">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group mb-2">
                                                            <label>URL Tombol</label>
                                                            <input type="url" name="btn_url[]" class="form-control" required
                                                                value="<?= htmlspecialchars($lnk['url'] ?? '', ENT_QUOTES); ?>">
                                                        </div>
                                                        <div class="form-group mb-2">
                                                            <label>Style Tombol</label>
                                                            <select name="btn_style[]" class="form-control">
                                                                <?php
                                                                $styles = ['btn-primary', 'btn-outline-light', 'btn-warning', 'btn-success'];
                                                                $cur = $lnk['btn_style'] ?? 'btn-primary';
                                                                foreach ($styles as $s) {
                                                                    $sel = ($cur === $s) ? 'selected' : '';
                                                                    echo "<option value=\"{$s}\" {$sel}>{$s}</option>";
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="button" class="btn btn-sm btn-danger mt-2 remove-btn">
                                                    <i class="fa fa-trash"></i> Hapus Button
                                                </button>
                                            </div>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <!-- Jika tidak ada link, tampilkan satu baris kosong -->
                                        <div class="button-item border rounded p-3 mb-3 bg-light">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group mb-2">
                                                        <label>Label Tombol</label>
                                                        <input type="text" name="btn_label[]" class="form-control" required>
                                                    </div>
                                                    <div class="form-group mb-2">
                                                        <label>Icon (Font Awesome) <label>Icon (Font Awesome) <a class="text-primary" href="https://fontawesome.com/v4/icons/" target="_blank">Kunjungi Situs >></a></label></label>
                                                        <input type="text" name="btn_icon[]" class="form-control" placeholder="fa fa-calendar-check">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-2">
                                                        <label>URL Tombol</label>
                                                        <input type="url" name="btn_url[]" class="form-control" required>
                                                    </div>
                                                    <div class="form-group mb-2">
                                                        <label>Style Tombol</label>
                                                        <select name="btn_style[]" class="form-control">
                                                            <option value="btn-primary">btn-primary</option>
                                                            <option value="btn-outline-light">btn-outline-light</option>
                                                            <option value="btn-warning">btn-warning</option>
                                                            <option value="btn-success">btn-success</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="button" class="btn btn-sm btn-danger mt-2 remove-btn">
                                                <i class="fa fa-trash"></i> Hapus Button
                                            </button>
                                        </div>
                                    <?php endif; ?>
                                </div>

                                <button type="button" id="addButton" class="btn btn-sm btn-success mb-4">
                                    <i class="fa fa-plus"></i> Tambah Button
                                </button>

                                <div class="mt-3 text-right">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-save"></i> Update Slider
                                    </button>
                                    <a href="<?= base_url('cms/menages-slider'); ?>" class="btn btn-outline-secondary">
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

<!-- JS -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const form = document.getElementById("formSlider");
        const alertBox = document.getElementById("alertBox");
        const sliderId = form.dataset.sliderId || 0;

        // Submit via AJAX ke API update
        form.addEventListener("submit", async function(e) {
            e.preventDefault();
            alertBox.innerHTML = "";

            const submitBtn = form.querySelector('button[type="submit"]');
            submitBtn.disabled = true;
            submitBtn.innerHTML = `<i class="fa fa-spinner fa-spin"></i> Menyimpan...`;

            const formData = new FormData(form);

            try {
                const response = await fetch("<?= base_url('cms/api/update/slider/'); ?>" + sliderId, {
                    method: "POST",
                    body: formData
                });

                const result = await response.json();

                if (result.status) {
                    alertBox.innerHTML = `<div class="alert alert-success"><i class="fa fa-check-circle"></i> ${result.message}</div>`;
                    setTimeout(() => {
                        window.location.href = "<?= base_url('cms/menages-slider'); ?>";
                    }, 2000);
                } else {
                    alertBox.innerHTML = `<div class="alert alert-error"><i class="fa fa-times-circle"></i> ${result.message}</div>`;
                    submitBtn.disabled = false;
                    submitBtn.innerHTML = `<i class="fa fa-save"></i> Update Slider`;
                }
            } catch (err) {
                alertBox.innerHTML = `<div class="alert alert-error"><i class="fa fa-exclamation-triangle"></i> Terjadi kesalahan koneksi!</div>`;
                submitBtn.disabled = false;
                submitBtn.innerHTML = `<i class="fa fa-save"></i> Update Slider`;
            }
        });

        // Tambah/hapus link button
        const addButton = document.getElementById("addButton");
        const buttonContainer = document.getElementById("buttonContainer");

        addButton.addEventListener("click", () => {
            const newItem = document.createElement("div");
            newItem.classList.add("button-item", "border", "rounded", "p-3", "mb-3", "bg-light");
            newItem.innerHTML = `
      <div class="row">
        <div class="col-md-6">
          <div class="form-group mb-2">
            <label>Label Tombol</label>
            <input type="text" name="btn_label[]" class="form-control" required>
          </div>
          <div class="form-group mb-2">
            <label>Icon (Font Awesome) <a class="text-primary" href="https://fontawesome.com/v4/icons/" target="_blank">Kunjungi Situs >></a></label>
            <input type="text" name="btn_icon[]" class="form-control" placeholder="fa fa-calendar-check">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group mb-2">
            <label>URL Tombol</label>
            <input type="url" name="btn_url[]" class="form-control" required>
          </div>
          <div class="form-group mb-2">
            <label>Style Tombol</label>
            <select name="btn_style[]" class="form-control">
              <option value="btn-primary">btn-primary</option>
              <option value="btn-outline-light">btn-outline-light</option>
              <option value="btn-warning">btn-warning</option>
              <option value="btn-success">btn-success</option>
            </select>
          </div>
        </div>
      </div>
      <button type="button" class="btn btn-sm btn-danger mt-2 remove-btn">
        <i class="fa fa-trash"></i> Hapus Button
      </button>`;
            buttonContainer.appendChild(newItem);
            newItem.querySelector(".remove-btn").addEventListener("click", () => newItem.remove());
        });

        // Hapus baris link yang ada
        document.querySelectorAll(".remove-btn").forEach((btn) => {
            btn.addEventListener("click", function() {
                btn.closest(".button-item").remove();
            });
        });

        // Preview gambar baru (jika dipilih)
        const previewImage = (input, previewBox) => {
            input.addEventListener("change", function() {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = e => previewBox.innerHTML = `<img src="${e.target.result}" alt="Preview">`;
                    reader.readAsDataURL(file);
                } else {
                    // Biarkan gambar lama tetap tampil jika user batalkan pilihan
                }
            });
        };
        previewImage(document.getElementById("image_background"), document.getElementById("previewBg"));
        previewImage(document.getElementById("image_side"), document.getElementById("previewSide"));
    });
</script>