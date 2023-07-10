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
                            <a class="btn btn-sm btn-<?= ($active == 'waiting') ? 'info' : 'secondary'; ?>"
                                href="<?= base_url('cms/candidate/'); ?>">Waiting</a>
                            <a class="btn btn-sm btn-<?= ($active == 'follow') ? 'info' : 'secondary'; ?>"
                                href="<?= base_url('cms/candidate/follow-up'); ?>">Follow up</a>
                            <a class="btn btn-sm btn-<?= ($active == 'assessment') ? 'info' : 'secondary'; ?>"
                                href="<?= base_url('cms/candidate/assessment'); ?>">Assessment</a>
                            <a class="btn btn-sm btn-<?= ($active == 'final') ? 'info' : 'secondary'; ?>"
                                href="<?= base_url('cms/candidate/final-evaluation'); ?>">Final
                                Evaluation</a>
                            <a class="btn btn-sm btn-<?= ($active == 'accepted') ? 'info' : 'secondary'; ?>"
                                href="<?= base_url('cms/candidate/accepted'); ?>">Accepted</a>
                            <a class="btn btn-sm btn-<?= ($active == 'database') ? 'info' : 'secondary'; ?>"
                                href="<?= base_url('cms/candidate/database'); ?>">Database</a>

                            <div class="mb-2"></div>

                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 5%;" class="serial">#</th>
                                        <th class="text-center">Nama</th>
                                        <th class="text-center">Apply</th>
                                        <th class="text-center">Submit</th>
                                        <th class="text-center">Status</th>
                                        <th style="width: 5%;" class="text-center">action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $count = 1;
                                        foreach ($candidate as $row) : 
                                    ?>
                                    <tr>
                                        <td><?= $count++; ?></td>
                                        <td><?= $row['nama_candidate']; ?></td>
                                        <td><?= $row['apply']; ?></td>
                                        <td class="text-center"><?= date('d/m/Y H:i', $row['time']); ?></td>
                                        <td class="text-center">
                                            <?php
                                                if ($row['status'] == 0) {
                                                    $text = 'Waiting';
                                                    $color = 'secondary';
                                                } elseif ($row['status'] == 1) {
                                                    $text = 'Followed';
                                                    $color = 'success';
                                                } elseif ($row['status'] == 2) {
                                                    $text = 'Assesment';
                                                    $color = 'success';
                                                } elseif ($row['status'] == 3) {
                                                    $text = 'Final Evaluation';
                                                    $color = 'success';
                                                } elseif ($row['status'] == 4) {
                                                    $text = 'Accepted';
                                                    $color = 'success';
                                                } else {
                                                    $text = 'Saved';
                                                    $color = 'info';
                                                }
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

                                                    <a class="nav-link text-primary" data-toggle="modal"
                                                        data-target="#view_<?= $row['id_candidate']; ?>" href="#">
                                                        <i class="fa fa-caret-square-o-up"></i> View details
                                                    </a>
                                                    <?php if ($active == 'waiting'): ?>
                                                    <a class="nav-link text-success" href="#" data-toggle="modal"
                                                        data-target="#followup_<?= $row['id_candidate']; ?>">
                                                        <i class="fa fa-envelope-o"></i> Follow up
                                                    </a>
                                                    <?php elseif ($active == 'follow'): ?>
                                                    <a class="nav-link text-success"
                                                        href="<?= base_url('cms/move/assessment/'.$row['id_candidate']); ?>">
                                                        <i class="fa fa-paper-plane"></i> Assessment
                                                    </a>
                                                    <?php elseif ($active == 'assessment'): ?>
                                                    <a class="nav-link text-success"
                                                        href="<?= base_url('cms/move/final-evaluation/'.$row['id_candidate']); ?>">
                                                        <i class="fa fa-paper-plane"></i> Final
                                                    </a>
                                                    <?php elseif ($active == 'final'): ?>
                                                    <a class="nav-link text-success"
                                                        href="<?= base_url('cms/move/accepted/'.$row['id_candidate']); ?>">
                                                        <i class="fa fa-paper-plane"></i> Accepted
                                                    </a>
                                                    <?php elseif ($active == 'accepted'): ?>
                                                    <a class="nav-link text-success"
                                                        href="<?= base_url('cms/move/database/'.$row['id_candidate']); ?>">
                                                        <i class="fa fa-paper-plane"></i> Database
                                                    </a>
                                                    <?php else: ?>
                                                    <a class="nav-link text-success" href="#" data-toggle="modal"
                                                        data-target="#followup_<?= $row['id_candidate']; ?>">
                                                        <i class="fa fa-envelope-o"></i> Follow up
                                                    </a>
                                                    <?php endif; ?>

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

<!-- modal follow up -->
<?php foreach ($candidate as $row) : ?>
<div class="modal fade" id="followup_<?= $row['id_candidate']; ?>" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title" id="exampleModalLabel">Send Message</h5>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?= base_url('send-mail'); ?>">
                    <div class="form-group">
                        <label for="subject">Subject</label>
                        <input type="text" class="form-control" id="subject" name="subject" placeholder="Enter Subject"
                            required>
                        <input type="hidden" name="email" value="<?= $row['email_candidate']; ?>" required>
                        <input type="hidden" name="id" value="<?= $row['id_candidate']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="message">Body Message</label>
                        <textarea name="message" id="message_<?= $row['id_candidate']; ?>" required>
                            <div>
                                <p>Kepada <?= $row['nama_candidate']; ?>,</p>
                                <p>
                                    Terima kasih telah mengirimkan lamaran untuk posisi
                                    <b><?= $row['apply']; ?></b>.
                                    Kami senang melihat CV dan surat lamaran Anda dan ingin mengundang
                                    Anda untuk menghadiri wawancara kerja di perusahaan R17 Group.
                                </p>
                                <p>Wawancara akan dilaksanakan pada:</p>
                                <ul>
                                    <li>Hari/Tanggal :</li>
                                    <li>Waktu :</li>
                                    <li>Tempat:</li>
                                </ul>
                                <p>
                                    Jangan lewatkan kesempatan ini untuk bergabung dengan tim kami yang
                                    inovatif dan terus berkembang.
                                    Kami sangat menantikan pertemuan dengan Anda!
                                </p>
                                <p>Jika ada pertanyaan, jangan ragu untuk menghubungi kami melalui email
                                    atau telepon.</p>
                                <p>Salam hormat,</p>
                                <p>Tim HRD perusahaan R17 Group</p>
                            </div>
                        </textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Send Message</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
tinymce.init({
    selector: "#message_<?= $row['id_candidate']; ?>",
    plugins: [
        "advlist autolink lists link image charmap print preview hr anchor pagebreak",
        "searchreplace wordcount visualblocks visualchars code fullscreen",
        "insertdatetime nonbreaking save table contextmenu directionality",
        "emoticons template paste textcolor colorpicker textpattern"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image responsivefilemanager",
    automatic_uploads: true,
    image_advtab: true,
    images_upload_url: "<?= base_url("upload/images/article") ?>",
    height: 500,
    file_picker_types: 'image',
    paste_data_images: true,
    relative_urls: false,
    remove_script_host: false,
    file_picker_callback: function(cb, value, meta) {
        var input = document.createElement('input');
        input.setAttribute('type', 'file');
        input.setAttribute('accept', 'image/jpg,image/jpeg,image/png,image/webp');
        input.onchange = function() {
            var file = this.files[0];
            var reader = new FileReader();
            reader.readAsDataURL(file);
            reader.onload = function() {
                var id = 'R17-' + (new Date()).getTime();
                var blobCache = tinymce.activeEditor.editorUpload.blobCache;
                var blobInfo = blobCache.create(id, file, reader.result);
                blobCache.add(blobInfo);
                cb(blobInfo.blobUri(), {
                    title: file.name
                });
            };
        };
        input.click();
    }
});
</script>
<?php endforeach; ?>

<!-- modal view detail -->
<?php foreach ($candidate as $row) : ?>
<div class="modal fade" id="view_<?= $row['id_candidate']; ?>" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title" id="exampleModalLabel">View Details Candidate</h5>
            </div>
            <div class="modal-body">
                <table>
                    <tr>
                        <td>
                            <p>Nama </p>
                        </td>
                        <td>
                            <p>: <?= $row['nama_candidate']; ?></p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>Telepon </p>
                        </td>
                        <td>
                            <p>: <?= $row['phone_candidate']; ?></p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>Email </p>
                        </td>
                        <td>
                            <p>: <?= $row['email_candidate']; ?></p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>Apply </p>
                        </td>
                        <td>
                            <p>: <?= $row['apply']; ?></p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>CV </p>
                        </td>
                        <td>
                            <p>:</p>
                        </td>
                    </tr>
                </table>
                <iframe src="<?= base_url('assets/pdf/'. $row['cv_candidate']); ?>" style="width:100%; height:600px;"
                    scrolling="yes">
                </iframe>
                <table>
                    <tr>
                        <td>
                            <p>Portofolio </p>
                        </td>
                        <td>
                            <p>:</p>
                        </td>
                    </tr>
                </table>
                <?php if($row['portofolio_candidate'] == null || $row['portofolio_candidate'] == ''){?>

                <?php }else{ ?>
                <iframe src="<?= base_url('assets/pdf/'. $row['portofolio_candidate']); ?>"
                    style="width:100%; height:600px;" scrolling="yes">
                </iframe>
                <?php }  ?>
            </div>
        </div>
    </div>
</div>
<?php endforeach; ?>