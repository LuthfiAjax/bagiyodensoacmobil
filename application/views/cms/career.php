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
                            <a class="btn btn-sm btn-primary mb-2" href="<?= base_url('cms/add-career'); ?>"><i
                                    class="fa fa-plus-circle" aria-hidden="true"></i>
                                Add Career</a>
                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th class="serial">#</th>
                                        <th class="text-center">Type</th>
                                        <th style="width: 30%;">Title</th>
                                        <th class="text-center">Status</th>
                                        <th>Expired</th>
                                        <th class="text-center">action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $count = 1;
                                        foreach ($news as $row) : 
                                    ?>
                                    <tr>
                                        <td class="serial"><?= $count++; ?></td>
                                        <?php 
                                            $text = ($row['type_jobs'] == 1) ? 'W F H' : 'W F 0';
                                            $color = ($row['type_jobs'] == 1) ? 'primary' : 'secondary';
                                        ?>
                                        <td class="text-center">
                                            <span class="btn btn-sm btn-<?= $color; ?>"><?= $text; ?></span>
                                        </td>
                                        <td><?= $row['title_jobs']; ?></td>
                                        <td class="text-center">
                                            <?php
                                                $condition = $row['expired_jobs'] <= time() ? 'Expired' : 'published';
                                                $status = $row['status_jobs'] == 1 ? ($condition == 'Expired' ? 'Expired' : 'Published') : 'Pending';
                                                $color_s = $row['status_jobs'] == 1 ? ($condition == 'Expired' ? 'secondary' : 'success') : 'warning';
                                            ?>
                                            <span class="btn btn-sm btn-<?= $color_s; ?>"><?= $status; ?></span>
                                        </td>

                                        <td><?= ($row['status_jobs'] == 1) ? date('d/m/Y H:i', $row['expired_jobs']) : '' ; ?>
                                        </td>

                                        <td>
                                            <div class="dropdown float-right">
                                                <a class="btn btn-sm btn-primary text-light dropdown-toggle"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Action
                                                </a>
                                                <div class="user-menu dropdown-menu">

                                                    <?php if ($row['status_jobs'] == 0) : ?>
                                                    <a class="nav-link text-success" data-toggle="modal" href="#"
                                                        data-target="#publish_<?= $row['id_career']; ?>">
                                                        <i class="fa fa-caret-square-o-up"></i> Published
                                                    </a>
                                                    <?php else : ?>
                                                    <a onclick="return confirm('Do you confirm that you want to change the status of this article to pending ?')"
                                                        class="nav-link text-warning"
                                                        href="<?= base_url('cms/pending/'.$row['id_career'].'/career'); ?>">
                                                        <i class="fa fa-caret-square-o-down"></i> Pending
                                                    </a>
                                                    <?php endif; ?>
                                                    <a class="nav-link"
                                                        href="<?= base_url('cms/update-career/'.$row['id_career']); ?>">
                                                        <i class="fa fa-pencil-square-o text-primary"></i> Edit
                                                    </a>
                                                    <a onclick="return confirm('Do you confirm your intention to delete this post ?')"
                                                        class="nav-link"
                                                        href="<?= base_url('cms/delete/'.$row['id_career'].'/career'); ?>">
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
<?php foreach ($news as $row) : ?>
<div class="modal fade" id="publish_<?= $row['id_career']; ?>" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title" id="exampleModalLabel">Enter Expired Date</h5>
            </div>
            <form action="<?= base_url('cms/publish-career'); ?>" method="post">
                <div class="modal-body">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Date</span>
                        <input type="hidden" name="id" value="<?= $row['id_career']; ?>">
                        <input type="datetime-local" class="form-control" name="date" aria-describedby="basic-addon1">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Publish</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php endforeach; ?>