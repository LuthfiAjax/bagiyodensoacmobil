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
                                <i class="fa fa-plus-circle"></i> Add Cabang
                            </a>

                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 5%;">#</th>
                                        <th>Nama Cabang</th>
                                        <th>Alamat</th>
                                        <th>Telepon</th>
                                        <th>Status</th>
                                        <th class="text-center" style="width: 15%;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Purwodadi</td>
                                        <td>Jl. Hayam Wuruk No. 71, Purwodadi</td>
                                        <td>0813-2554-5071</td>
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
                                                        onclick="return confirm('Konfirmasi. Cabang yang dihapus akan hilang selamanya, Anda yakin ?')">
                                                        <i class="fa fa-minus-circle text-danger"></i> Delete
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>2</td>
                                        <td>Kudus</td>
                                        <td>Jl. Sunan Kudus No. 12, Kudus</td>
                                        <td>0857-1111-5678</td>
                                        <td>
                                            <span class="btn btn-sm btn-warning">Maintenance</span>
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
                                                        onclick="return confirm('Konfirmasi. Cabang yang dihapus akan hilang selamanya, Anda yakin ?')">
                                                        <i class="fa fa-minus-circle text-danger"></i> Delete
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>3</td>
                                        <td>Pati</td>
                                        <td>Jl. Jendral Sudirman No. 88, Pati</td>
                                        <td>0812-3456-7890</td>
                                        <td>
                                            <span class="btn btn-sm btn-secondary">Nonaktif</span>
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
                                                        onclick="return confirm('Konfirmasi. Cabang yang dihapus akan hilang selamanya, Anda yakin ?')">
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