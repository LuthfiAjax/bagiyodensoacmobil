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
                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th class="serial">#</th>
                                        <th class="text-center">Nama</th>
                                        <th class="text-center">Email</th>
                                        <th class="text-center">Waktu</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $count=1; foreach ($subs as $row) : ?>
                                        <tr>
                                            <td class="text-center"><?= $count++; ?></td>
                                            <td class="text-center"><?= $row['name_download']; ?></td>
                                            <td class="text-center"><?= $row['email_download']; ?></td>
                                            <td class="text-center"><?= date('Y/m/d H:i s', $row['time_download']); ?></td>  
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
