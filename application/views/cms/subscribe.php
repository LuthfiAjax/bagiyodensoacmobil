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
                                        <th class="text-center">Nama</th>
                                        <th class="text-center">Email</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $count=1; foreach ($subs as $row) : ?>
                                        <tr>
                                            <td class="text-center"><?= $count++; ?></td>
                                            <td class="text-center"><?= $row['nama_subscriber']; ?></td>
                                            <td class="text-center"><?= $row['email_subscriber']; ?></td>
                                            <td class="text-center"><a onclick="return confirm('Konfirmasi. Data Subscriber Akan hilang dari server ?')" class="btn btn-sm btn-danger" href="<?= base_url('cms/delete/subs/'. $row['id_subscriber']); ?>">Hapus</a></td>
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
