<!-- Content -->
<div class="content">
    <!-- Animated -->
    <div class="animated fadeIn">
        <!-- Widgets  -->
        <div class="row">
            <!-- news -->
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-five">
                            <div class="stat-icon dib flat-color-2">
                                <i class="pe-7s-news-paper"></i>
                            </div>
                            <div class="stat-content">
                                <div class="text-left dib">
                                    <div class="stat-text"><span class="count"><?= $totalpost; ?></span></div>
                                    <div class="stat-heading">Postingan</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- news -->
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-five">
                            <div class="stat-icon dib flat-color-3">
                                <i class="pe-7s-news-paper"></i>
                            </div>
                            <div class="stat-content">
                                <div class="text-left dib">
                                    <div class="stat-text"><span class="count"><?= $totalklikwa; ?></span></div>
                                    <div class="stat-heading">Klik Whatsapp</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- events -->
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-five">
                            <div class="stat-icon dib flat-color-1">
                                <i class="pe-7s-news-paper"></i>
                            </div>
                            <div class="stat-content">
                                <div class="text-left dib">
                                    <div class="stat-text"><span class="count"><?= $totalmessage; ?></span></div>
                                    <div class="stat-heading">Total Pesan</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- direksi -->
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-five">
                            <div class="stat-icon dib flat-color-4">
                                <i class="pe-7s-users"></i>
                            </div>
                            <div class="stat-content">
                                <div class="text-left dib">
                                    <div class="stat-text"><span class="count"><?= $totalpengunjung; ?></span></div>
                                    <div class="stat-heading">Pengunjung</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Widgets -->
        <div class="clearfix"></div>
        <div class="orders">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="box-title">Klik Whatsapp</h4>
                            <?= $this->session->flashdata('message'); ?>
                        </div>
                        <div class="card-body">
                            <table id="bootstrap-data-wa" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Waktu</th>
                                        <th>Nama</th>
                                        <th>Whatsapp</th>
                                        <th>Kota</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($whatsapp as $row) : ?>
                                    <tr>
                                        <td><?= date('Y/m/d H:i', $row['time']); ?> WIB</td>
                                        <td><?= $row['name']; ?></td>
                                        <td><?= $row['whatsapp']; ?></td>
                                        <td><?= $row['city']; ?></td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Orders -->
        <div class="orders">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="box-title">Pesan Masuk</h4>
                            <?= $this->session->flashdata('message'); ?>
                        </div>
                        <div class="card-body">
                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Waktu</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Tlp</th>
                                        <th>Message</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($messages as $row) : ?>
                                    <tr>
                                        <td><?= date('Y/m/d H:i', $row['created']); ?> WIB</td>
                                        <td><?= $row['nama_pesan']; ?></td>
                                        <td><?= $row['email_pesan']; ?></td>
                                        <td><?= $row['tlp_pesan']; ?></td>
                                        <td><button class="btn btn-sm btn-info" data-toggle="modal" data-target="#details_<?= $row['id_pesan']; ?>">View</button></td>
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

<!-- Modal -->
<?php foreach ($messages as $row) : ?>
<div class="modal fade" id="details_<?= $row['id_pesan']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        <h5 class="modal-title" id="exampleModalLabel">Details Pesan</h5>
      </div>
      <div class="modal-body">
        <ul class="list-group">
            <li class="list-group-item active" aria-current="true">subject : <?= $row['subject_pesan']; ?></li>
            <li class="list-group-item"><?= $row['body_pesan']; ?></li>
        </ul>
      </div>
    </div>
  </div>
</div>
<?php endforeach; ?>