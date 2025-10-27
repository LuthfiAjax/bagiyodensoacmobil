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
                                        <th class="text-center">Tanggal</th>
                                        <th class="text-center">Nama</th>
                                        <th class="text-center">Phone</th>
                                        <th class="text-center">Kota</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $count = 1;
                                    foreach ($whatsapp as $row) : ?>
                                        <tr>
                                            <td class="text-center"><?= $count++; ?></td>
                                            <td><?= date('Y/m/d H:i', $row['time']); ?> WIB</td>
                                            <td class="text-center"><?= $row['name']; ?></td>
                                            <td class="text-center"><?= $row['whatsapp']; ?></td>
                                            <td class="text-center"><?= $row['city']; ?></td>
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