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
                            <a class="btn btn-sm btn-primary mb-3" href="<?= base_url('cms/add-company'); ?>"><i
                                    class="fa fa-plus-circle" aria-hidden="true"></i>
                                Add Company</a>
                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">Type</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center" style="width: 30%;">Name</th>
                                        <th class="text-center">Cover</th>
                                        <th class="text-center">action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($company as $row) : ?>
                                    <tr>
                                        <?php
                                            $type_color = ($row['type'] == 1) ? 'info' : (($row['type'] == 2) ? 'primary' : 'secondary');
                                            $type_text = ($row['type'] == 1) ? 'I T' : (($row['type'] == 2) ? 'Manufacture' : 'Media');

                                            $status_color = ($row['status'] == 1) ? 'info' : (($row['status'] == 2) ? 'primary' : 'secondary');
                                            $status_text = ($row['status'] == 1) ? 'Holding' : (($row['status'] == 2) ? 'Sub Holding' : 'Operation');
                                        ?>
                                        <td class="text-center"><span
                                                class="btn btn-sm btn-<?= $type_color; ?>"><?= $type_text; ?></span>
                                        </td>
                                        <td class="text-center"><span
                                                class="btn btn-sm btn-<?= $status_color; ?>"><?= $status_text; ?></span>
                                        </td>
                                        <td class="text-center"><?= $row['nama_company']; ?></td>
                                        <td class="text-center"><a href="#" class="btn btn-sm btn-secondary">View</a>
                                        </td>
                                        <td>
                                            <div class="dropdown float-right">
                                                <a class="btn btn-sm btn-primary text-light dropdown-toggle"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Action
                                                </a>
                                                <div class="user-menu dropdown-menu">
                                                    <a class="nav-link" target="_blank" href="#">
                                                        <i class="fa fa-external-link-square text-primary"></i> Details
                                                    </a>
                                                    <a class="nav-link"
                                                        href="<?= base_url('cms/update-company/'.$row['id_company']); ?>">
                                                        <i class="fa fa-pencil-square-o text-primary"></i> Edit
                                                    </a>
                                                    <a class="nav-link"
                                                        href="<?= base_url('cms/update-header-news-events/'.$row['id_company']); ?>">
                                                        <i class="fa fa-pencil-square-o text-info"></i> Edit Header
                                                    </a>
                                                    <a onclick="return confirm('Do you confirm your intention to delete this post ?')"
                                                        class="nav-link"
                                                        href="<?= base_url('cms/delete/'.$row['id_company'].'/menages-news-events'); ?>">
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

<!-- modal -->
<?php foreach ($company as $row) : ?>
<div class="modal fade" id="manages_publish_<?= $row['id_company']; ?>" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Enter Publication Date</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('cms/publish'); ?>" method="post">
                <div class="modal-body">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Date</span>
                        <input type="hidden" name="id" value="<?= $row['id_company']; ?>">
                        <input type="hidden" name="url" value="cms/menages-news-events">
                        <input type="datetime-local" class="form-control" name="date" aria-describedby="basic-addon1">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Publish Article</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php endforeach; ?>