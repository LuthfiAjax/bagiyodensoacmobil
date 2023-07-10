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
                            <a class="btn btn-sm btn-primary mb-3" href="#" data-toggle="modal" data-target="#add">
                                <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                Add Direksi</a>
                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Nama</th>
                                        <th class="text-center">Jabatan</th>
                                        <th class="text-center">Perusahaan</th>
                                        <th class="text-center">Sortir</th>
                                        <th class="text-center">action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1; foreach ($direksi as $row) : ?>
                                    <tr>
                                        <td class="text-center"><?= $i++; ?></td>
                                        <td class="text-center"><?= $row['nama_direksi']; ?></td>
                                        <td class="text-center"><?= $row['jabatan_direksi']; ?></td>
                                        <td class="text-center"><?= $row['perusahaan']; ?></td>
                                        <td class="text-center">
                                            <a class="mx-1 btn btn-sm btn-success" title="Naik 1 Tingkat"
                                                href="<?= base_url('cms/sortir/naik/'.$row['id_direksi']); ?>"><i
                                                    class="fa fa-arrow-up" aria-hidden="true"></i></a>

                                            <a class="mx-1 btn btn-sm btn-warning" title="Turun 1 Tingkat"
                                                href="<?= base_url('cms/sortir/turun/'.$row['id_direksi']); ?>"><i
                                                    class="fa fa-arrow-down" aria-hidden="true"></i></a>
                                        </td>
                                        <td>
                                            <div class="row justify-content-center">
                                                <div class="dropdown">
                                                    <a class="btn btn-sm btn-secondary dropdown-toggle" href="#"
                                                        role="button" id="dropdownMenuLink" data-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false">
                                                        Action
                                                    </a>

                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                        <a class="dropdown-item text-success" href="#"
                                                            data-toggle="modal"
                                                            data-target="#photo_<?= $row['id_direksi']; ?>">
                                                            <i class="fa fa-picture-o"></i> Photo</a>

                                                        <a class="dropdown-item text-primary" href="#"
                                                            data-toggle="modal"
                                                            data-target="#edit_<?= $row['id_direksi']; ?>">
                                                            <i class="fa fa-pencil-square-o"></i> Edit</a>

                                                        <a class="dropdown-item text-danger"
                                                            href="<?= base_url('cms/delete/'.$row['id_direksi'].'/menages-direksi'); ?>">
                                                            <i class="fa fa-minus-circle"></i> Delete</a>
                                                    </div>
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

<!-- Modal Add -->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="addLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title" id="addLabel">Add Direksi R17 Group</h5>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('cms/save-direksi'); ?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nama">Nama Direksi</label>
                        <input type="text" class="form-control" id="nama" required name="nama" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="jabatan">Jabatan Direksi</label>
                        <input type="text" class="form-control" id="jabatan" required name="jabatan" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="perusahaan">Nama Perusahaan</label>
                        <input type="text" class="form-control" id="perusahaan" value="R17 Group" required
                            name="perusahaan" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="header1">Foto (4x3)</label>
                        <input type="file" class="form-control" id="header1" required name="header1">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit -->
<?php foreach ($direksi as $row) : ?>
<div class="modal fade" id="edit_<?= $row['id_direksi']; ?>" tabindex="-1" role="dialog" aria-labelledby="addLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title" id="addLabel">Add Direksi R17 Group</h5>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('cms/update-direksi'); ?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nama">Nama Direksi</label>
                        <input type="text" class="form-control" id="nama" required name="nama"
                            value="<?= $row['nama_direksi']; ?>" autocomplete="off">
                        <input type="hidden" name="id" value="<?= $row['id_direksi']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="jabatan">Jabatan Direksi</label>
                        <input type="text" class="form-control" id="jabatan" required name="jabatan"
                            value="<?= $row['jabatan_direksi']; ?>" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="perusahaan">Nama Perusahaan</label>
                        <input type="text" class="form-control" id="perusahaan" value="R17 Group" required
                            name="perusahaan" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="header1">Foto (4x3) <small class="text-danger">(Optional)</small></label>
                        <input type="file" class="form-control" id="header1" name="header1">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php endforeach; ?>

<!-- Modal photo -->
<style>
.with-border {
    border: 2px solid black;
}
</style>
<?php foreach ($direksi as $row) : ?>
<div class="modal fade" id="photo_<?= $row['id_direksi']; ?>" tabindex="-1" role="dialog" aria-labelledby="photo"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title" id="photo">Photo Direksi R17 Group</h5>
            </div>
            <div class="modal-body">
                <div style="text-align: center;">
                    <img src="<?= base_url('assets/images/direksi/'.$row['foto_direksi']); ?>"
                        class="img-fluid with-border" alt="Responsive image">
                </div>
            </div>
        </div>
    </div>
</div>
<?php endforeach; ?>