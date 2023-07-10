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
                            <a class="btn btn-sm btn-primary mb-2" href="<?= base_url('cms/create-news-events'); ?>"><i
                                    class="fa fa-plus-circle" aria-hidden="true"></i>
                                Add Post</a>
                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th class="serial">#</th>
                                        <th class="text-center">Type</th>
                                        <th style="width: 30%;">Title</th>
                                        <th>Created</th>
                                        <th>Published</th>
                                        <th class="text-center">Status</th>
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
                                            $text = ($row['type'] == 1) ? 'Events' : (($row['type'] == 2) ? 'News' : 'CSR');
                                            $color = ($row['type'] == 1) ? 'primary' : (($row['type'] == 2) ? 'info' : 'secondary');
                                        ?>
                                        <td class="text-center"><span
                                                class="btn btn-sm btn-<?= $color; ?>"><?= $text; ?></span></td>
                                        <td><?= $row['title_id']; ?></td>
                                        <td><?= date('d/m/Y H:i', $row['c']); ?></td>
                                        <td><?= ($row['tampil'] == 0) ? '' : date('d/m/Y H:i', $row['publish_date']); ?>
                                        </td>
                                        <td class="text-center">
                                            <?php
                                                $condition = $row['publish_date'] >= time() ? 'scheduled' : 'published';
                                                $status = $row['tampil'] == 1 ? ($condition == 'scheduled' ? 'Scheduled' : 'Published') : 'Pending';
                                                $color_s = $row['tampil'] == 1 ? ($condition == 'scheduled' ? 'primary' : 'success') : 'warning';
                                            ?>
                                            <span class="btn btn-sm btn-<?= $color_s; ?>"><?= $status; ?></span>
                                        </td>
                                        <td>
                                            <div class="dropdown float-right">
                                                <a class="btn btn-sm btn-primary text-light dropdown-toggle"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Action
                                                </a>
                                                <div class="user-menu dropdown-menu">
                                                    <a class="nav-link" target="_blank" href="#">
                                                        <i class="fa fa-external-link-square text-primary"></i> Preview
                                                    </a>
                                                    <?php if ($row['tampil'] == 0) : ?>
                                                    <a class="nav-link text-success" data-toggle="modal"
                                                        data-target="#manages_publish_<?= $row['id']; ?>">
                                                        <i class="fa fa-caret-square-o-up"></i> Published
                                                    </a>
                                                    <?php else : ?>
                                                    <a onclick="return confirm('Do you confirm that you want to change the status of this article to pending ?')"
                                                        class="nav-link text-warning"
                                                        href="<?= base_url('cms/pending/'.$row['id'].'/menages-news-events'); ?>">
                                                        <i class="fa fa-caret-square-o-down"></i> Pending
                                                    </a>
                                                    <?php endif; ?>
                                                    <a class="nav-link"
                                                        href="<?= base_url('cms/update-news-events/'.$row['id']); ?>">
                                                        <i class="fa fa-pencil-square-o text-primary"></i> Edit
                                                    </a>
                                                    <a class="nav-link"
                                                        href="<?= base_url('cms/update-header-news-events/'.$row['id']); ?>">
                                                        <i class="fa fa-pencil-square-o text-info"></i> Edit Header
                                                    </a>
                                                    <a onclick="return confirm('Do you confirm your intention to delete this post ?')"
                                                        class="nav-link"
                                                        href="<?= base_url('cms/delete/'.$row['id'].'/menages-news-events'); ?>">
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
<div class="modal fade" id="manages_publish_<?= $row['id']; ?>" tabindex="-1" role="dialog"
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
                        <input type="hidden" name="id" value="<?= $row['id']; ?>">
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