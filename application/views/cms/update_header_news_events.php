<div class="content">
    <div class="animated fadeIn">

        <div class="clearfix"></div>
        <!-- Orders -->
        <div class="orders">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <div id="pay-invoice">
                                <div class="card-body">
                                    <div class="card-title">
                                        <h3 class="text-center">Create News / Events / CSR</h3>
                                        <?= $this->session->flashdata('message'); ?>
                                    </div>
                                    <hr>
                                    <form action="<?= base_url('cms/save-update-header-news-event'); ?>" method="POST"
                                        enctype="multipart/form-data">
                                        <input type="hidden" id="id" name="id" value="<?= $news->id; ?>">
                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="text-input"
                                                    class=" form-control-label">
                                                    <h4>Header 1 <span class="text-danger">*</span></h4>
                                                </label></div>
                                            <div class="col col-md-6">
                                                <div class="input-group">
                                                    <input accept="image/jpg, image/jpeg, image/png, image/gif"
                                                        onchange="PreviewHeader1();" type="file" id="header1"
                                                        name="header1" required class="form-control">
                                                </div>
                                            </div>
                                            <div class="col col-md-3">
                                                <div class="input-group">
                                                    <img id="priviewHeader1"
                                                        src="<?= base_url('assets/bg/kosong.jpg'); ?>" width="150"
                                                        height="80" style="object-fit: cover;">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="text-input"
                                                    class=" form-control-label">
                                                    <h4>Header 2</h4>
                                                </label></div>
                                            <div class="col col-md-6">
                                                <div class="input-group">
                                                    <input accept="image/jpg, image/jpeg, image/png, image/gif"
                                                        onchange="PreviewHeader2();" type="file" id="header2"
                                                        name="header2" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col col-md-3">
                                                <div class="input-group">
                                                    <img id="priviewHeader2"
                                                        src="<?= base_url('assets/bg/kosong.jpg'); ?>" width="150"
                                                        height="80" style="object-fit: cover;">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="text-input"
                                                    class=" form-control-label">
                                                    <h4>Header 3</h4>
                                                </label></div>
                                            <div class="col col-md-6">
                                                <div class="input-group">
                                                    <input accept="image/jpg, image/jpeg, image/png, image/gif"
                                                        onchange="PreviewHeader3();" type="file" id="header3"
                                                        name="header3" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col col-md-3">
                                                <div class="input-group">
                                                    <img id="priviewHeader3"
                                                        src="<?= base_url('assets/bg/kosong.jpg'); ?>" width="150"
                                                        height="80" style="object-fit: cover;">
                                                </div>
                                            </div>
                                        </div>

                                        <div>
                                            <button id="payment-button" type="submit"
                                                class="btn btn-lg btn-info btn-block">
                                                <span id="payment-button-amount">Upload</span>
                                            </button>
                                        </div>
                                    </form>
                                    <hr>
                                    <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th class="serial">#</th>
                                                <th>Header</th>
                                                <th>Name File</th>
                                                <th class="text-center">action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (!empty($news->header_image)) : ?>
                                            <tr>
                                                <td class="serial">1.</td>
                                                <td>Header 1</td>
                                                <td><?= $news->header_image ?></td>
                                                <td class="text-center">
                                                    <a class="btn btn-sm btn-danger"
                                                        onclick="return confirm('If you delete header 1, you must upload header 1 because header 1 cannot be empty. Do you want to proceed ?')"
                                                        href="<?= base_url('cms/delete/header/'.$news->id.'/1'); ?>">Delete</a>
                                                </td>
                                            </tr>
                                            <?php endif; ?>

                                            <?php if (!empty($news->header_image_2)) : ?>
                                            <tr>
                                                <td class="serial">2.</td>
                                                <td>Header 2</td>
                                                <td><?= $news->header_image_2; ?></td>
                                                <td class="text-center">
                                                    <a class="btn btn-sm btn-danger"
                                                        onclick="return confirm('Are you sure you want to delete this header?')"
                                                        href="<?= base_url('cms/delete/header/'.$news->id.'/2'); ?>">Delete</a>
                                                </td>
                                            </tr>
                                            <?php endif; ?>

                                            <?php if (!empty($news->header_image_3)) : ?>
                                            <tr>
                                                <td class="serial">3.</td>
                                                <td>Header 3</td>
                                                <td><?= $news->header_image_3; ?></td>
                                                <td class="text-center">
                                                    <a class="btn btn-sm btn-danger"
                                                        onclick="return confirm('Are you sure you want to delete this header?')"
                                                        href="<?= base_url('cms/delete/header/'.$news->id.'/3'); ?>">Delete</a>
                                                </td>
                                            </tr>
                                            <?php endif; ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
const title = document.querySelector('#title');
const slug = document.querySelector('#slug');

title.addEventListener("keyup", function() {
    let preslug = title.value;
    preslug = preslug.replace(/[^A-Za-z 0-9\-]/g, "");
    preslug2 = preslug.replace(/ /g, "-");
    slug.value = preslug2.toLowerCase();
});
</script>