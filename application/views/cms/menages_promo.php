<!-- Content -->
<div class="content">
    <div class="animated fadeIn">
        <div class="clearfix"></div>
        <div class="orders">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="row mx-3 mt-2">
                            <?= $this->session->flashdata('message'); ?>
                        </div>

                        <div class="card-body">
                            <a class="btn btn-sm btn-primary mb-3" href="<?= base_url('cms/create-promo'); ?>">
                                <i class="fa fa-plus-circle"></i> Add Promo
                            </a>

                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 5%;">#</th>
                                        <th>Judul Promo</th>
                                        <th>Mulai</th>
                                        <th>Selesai</th>
                                        <th>Status</th>
                                        <th class="text-center" style="width: 15%;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $count = 1;
                                    foreach ($promos as $row) : ?>
                                        <tr>
                                            <td class="text-center"><?= $count++; ?></td>
                                            <td><?= $row['judul']; ?></td>
                                            <td class="text-center"><?= $row['periode_mulai']; ?></td>
                                            <td class="text-center"><?= $row['periode_selesai']; ?></td>
                                            <td class="text-center">
                                                <?php if ($row['is_active'] == 1): ?>
                                                    <span class="text-light badge bg-success">Active</span>
                                                <?php else: ?>
                                                    <span class="text-light badge bg-warning text-dark">Inactive</span>
                                                <?php endif; ?>
                                            </td>
                                            <td class="text-center">
                                                <div class="dropdown float-right">
                                                    <a class="btn btn-sm btn-primary text-light dropdown-toggle"
                                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Action
                                                    </a>
                                                    <div class="user-menu dropdown-menu">
                                                        <a class="nav-link" href="<?= base_url('cms/update-promo/' . $row['id']); ?>">
                                                            <i class="fa fa-pencil-square-o text-primary"></i> Edit
                                                        </a>
                                                        <a href="javascript:void(0)"
                                                            class="nav-link"
                                                            onclick="deletePromo(<?= $row['id']; ?>)">
                                                            <i class="fa fa-minus-circle text-danger"></i> Delete
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function deletePromo(id) {
        const confirmDelete = confirm('Konfirmasi. Promo yang dihapus akan hilang selamanya, Anda yakin ?');
        if (!confirmDelete) return;

        fetch(`<?= base_url('cms/api/delete/promo/'); ?>${id}`, {
                method: 'GET'
            })
            .then(response => {
                if (response.ok) {
                    // Kalau respon 200, berarti sukses
                    alert('Berhasil dihapus!');
                    location.reload();
                } else {
                    // Kalau bukan 200, tampilkan pesan gagal
                    alert('Gagal menghapus data. Status: ' + response.status);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Terjadi kesalahan saat menghapus data.');
            });
    }
</script>