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
                                        <th style="width: 30%;">Judul</th>
                                        <th>Terbit</th>
                                        <th>Publikasi</th>
                                        <th>Status</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $count = 1; foreach ($news as $row) : ?>
                                    <tr>
                                        <td><?= $count++; ?></td>
                                        <td><?= $row['title_article_id']; ?></td>
                                        <td><?= date('Y/m/d H:i', $row['c']); ?></td>
                                        <td><?= date('Y/m/d H:i', $row['publish']); ?></td>
                                        <td>
                                            <?php 
                                               $condition = ($row['publish'] >= time()) ? 'SCHEDULED' : 'PUBLISHED';
                                               $color = ($row['status'] == 1) ? (($condition == 'SCHEDULED') ? 'primary' : 'success') : 'warning';
                                               $text = ($row['status'] == 1) ? (($condition == 'SCHEDULED') ? 'SCHEDULED' : 'PUBLISHED') : 'PENDING';                                               
                                            ?>
                                            <span class="btn btn-sm btn-<?= $color; ?>"><?= $text; ?></span>
                                        </td>
                                        <td>
                                            <div class="dropdown float-right">
                                                <a class="btn btn-sm btn-primary text-light dropdown-toggle"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Action
                                                </a>
                                                <div class="user-menu dropdown-menu">
                                                    <?php if ($row['status'] == 0): ?>
                                                        <a class="nav-link" target="_blank" href="#" data-toggle="modal" data-target="#schedule_<?= $row['id_article']; ?>">
                                                            <i class="fa fa-arrow-up text-success"></i> schedule
                                                        </a>
                                                    <?php else: ?>
                                                        <a class="nav-link" href="<?= base_url('update/pending/'. $row['id_article']); ?>">
                                                            <i class="fa fa-arrow-down text-warning"></i> Pending
                                                        </a>
                                                    <?php endif; ?>

                                                    <a class="nav-link" href="<?= base_url('cms/update-post/'.$row['id_article']); ?>">
                                                        <i class="fa fa-pencil-square-o text-primary"></i> Edit Post
                                                    </a>
                                                    <a onclick="return confirm('Konfirmasi. Postingan yang dihapus akan hilang selamanya, Anda yakin ?')" class="nav-link" href="<?= base_url('cms/delete/post/'.$row['id_article']); ?>">
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

<!-- Modal schedule -->
<?php foreach ($news as $row) : ?>
    <div class="modal fade" id="schedule_<?= $row['id_article']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h5 class="modal-title" id="exampleModalLabel">Setting Time</h5>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('update/publish'); ?>" method="post">
                        <input type="datetime-local" class="form-control" name="date" id="date"> 
                        <input type="hidden" value="<?= $row['id_article']; ?>" name="id" id="id"> 
                        <input type="hidden" value="cms/menages-post" name="url" id="url"> 
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Schedule</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
