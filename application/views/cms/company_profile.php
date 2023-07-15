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
                            <button class="btn btn-sm btn-primary mb-2"  data-toggle="modal" data-target="#add_company">
                                <i class="fa fa-plus-circle" aria-hidden="true"></i> Add Company Profile</button>
                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th class="serial">#</th>
                                        <th class="text-center">File Name</th>
                                        <th class="text-center">Terbit</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $count=1; foreach ($companies as $row) : ?>
                                        <tr>
                                            <td class="text-center"><?= $count++; ?></td>
                                            <td class="text-center"><?= $row['filename']; ?></td>
                                            <td class="text-center"><?= date('Y/m/d H:i:s', $row['created']); ?></td>
                                            <td class="text-center"><a onclick="return confirm('Konfirmasi. File Company Profile Akan hilang dari server ?')" class="btn btn-sm btn-danger" href="<?= base_url('cms/delete/company/'. $row['id_company_profile']); ?>">Hapus</a></td>
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

<!-- Modal add -->
<div class="modal fade" id="add_company" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title" id="exampleModalLabel">Company Profile</h5>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('cms/save-company'); ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="company">Upload Company Profile <small class="text-danger">(PDF)</small></label>
                        <input type="file" class="form-control" id="company" name="company" accept="application/pdf" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
