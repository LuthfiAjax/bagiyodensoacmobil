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
                            <a class="btn btn-sm btn-primary mb-3" href="#">
                                <i class="fa fa-plus-circle"></i> Add Promo
                            </a>

                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 5%;">#</th>
                                        <th>Judul Promo</th>
                                        <th>Periode</th>
                                        <th>Status</th>
                                        <th class="text-center" style="width: 15%;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Promo Akhir Tahun Diskon 30%</td>
                                        <td>01 Des 2025 - 31 Des 2025</td>
                                        <td>
                                            <span class="btn btn-sm btn-success">Aktif</span>
                                        </td>
                                        <td>
                                            <div class="dropdown float-right">
                                                <a class="btn btn-sm btn-primary text-light dropdown-toggle"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Action
                                                </a>
                                                <div class="user-menu dropdown-menu">
                                                    <a class="nav-link" href="#">
                                                        <i class="fa fa-pencil-square-o text-primary"></i> Edit
                                                    </a>
                                                    <a class="nav-link" href="#"
                                                        onclick="return confirm('Konfirmasi. Promo yang dihapus akan hilang selamanya, Anda yakin ?')">
                                                        <i class="fa fa-minus-circle text-danger"></i> Delete
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>2</td>
                                        <td>Promo Pembelian Sparepart Gratis Jasa</td>
                                        <td>01 Jan 2026 - 15 Jan 2026</td>
                                        <td>
                                            <span class="btn btn-sm btn-warning">Pending</span>
                                        </td>
                                        <td>
                                            <div class="dropdown float-right">
                                                <a class="btn btn-sm btn-primary text-light dropdown-toggle"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Action
                                                </a>
                                                <div class="user-menu dropdown-menu">
                                                    <a class="nav-link" href="#">
                                                        <i class="fa fa-pencil-square-o text-primary"></i> Edit
                                                    </a>
                                                    <a class="nav-link" href="#"
                                                        onclick="return confirm('Konfirmasi. Promo yang dihapus akan hilang selamanya, Anda yakin ?')">
                                                        <i class="fa fa-minus-circle text-danger"></i> Delete
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>3</td>
                                        <td>Promo Servis AC Mobil Spesial Ramadhan</td>
                                        <td>15 Mar 2026 - 15 Apr 2026</td>
                                        <td>
                                            <span class="btn btn-sm btn-secondary">Selesai</span>
                                        </td>
                                        <td>
                                            <div class="dropdown float-right">
                                                <a class="btn btn-sm btn-primary text-light dropdown-toggle"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Action
                                                </a>
                                                <div class="user-menu dropdown-menu">
                                                    <a class="nav-link" href="#">
                                                        <i class="fa fa-pencil-square-o text-primary"></i> Edit
                                                    </a>
                                                    <a class="nav-link" href="#"
                                                        onclick="return confirm('Konfirmasi. Promo yang dihapus akan hilang selamanya, Anda yakin ?')">
                                                        <i class="fa fa-minus-circle text-danger"></i> Delete
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>