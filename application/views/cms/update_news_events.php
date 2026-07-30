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
                                        <h3 class="text-center">Edit Postingan</h3>
                                        <?= $this->session->flashdata('message'); ?>
                                    </div>
                                    <hr>
                                    <form action="<?= base_url('cms/update/post'); ?>" method="POST" enctype="multipart/form-data">

                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="title" class=" form-control-label">
                                                    <h4>Title Post <span class="text-danger">*</span></h4>
                                                </label>
                                            </div>
                                            <div class="col col-md-9">
                                                <input type="text" id="title" name="title" autocomplete="off" class="form-control" value="<?= $news->title_article_id; ?>" required>
                                                <input type="hidden" id="id_article" name="id_article" value="<?= $news->id_article; ?>" required>
                                                <input type="hidden" id="urls" name="urls" value="admin" required>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="title" class=" form-control-label">
                                                    <h4>Slug <span class="text-danger">*</span></h4>
                                                </label></div>
                                            <div class="col col-md-9">
                                                <input type="text" id="slug" name="slug"
                                                    value="<?= $news->slug_article_id; ?>" autocomplete="off" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="title" class="form-control-label">
                                                    <h4>Tag Post <span class="text-danger">*</span></h4>
                                                </label>
                                            </div>
                                            <div class="col col-md-9">
                                                <input type="text" id="tag" name="tag" autocomplete="off" class="form-control" value="<?= $news->tag_article_id; ?>" required>
                                            </div>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="text-input" class=" form-control-label">
                                                    <h4>Meta Description <span class="text-danger">*</span></h4>
                                                </label>
                                            </div>
                                            <div class="col col-md-9">
                                                <div class="input-group">
                                                    <input type="text" id="meta_desc" onkeyup="metades(this);" name="meta_desc" class="form-control" required value="<?= $news->meta_des_id; ?>" autocomplete="off">
                                                    <div class="input-group-addon"><span id="mdes">0</span></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">
                                                    <h4>Meta Keyword <span class="text-danger">*</span></h4>
                                                </label></div>
                                            <div class="col col-md-9">
                                                <div class="input-group">
                                                    <input type="text" id="meta_key" onkeyup="metakey(this);" name="meta_key" class="form-control" required value="<?= $news->meta_key_id; ?>" autocomplete="off">
                                                    <div class="input-group-addon"><span id="mkey">0</span></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">
                                                    <h4>Header <span class="text-danger">*</span></h4>
                                                </label></div>
                                            <div class="col col-md-6">
                                                <div class="input-group">
                                                    <input accept="image/jpg, image/jpeg, image/png, image/gif" onchange="PreviewHeader1();" type="file" id="header1"
                                                        name="header1" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col col-md-3">
                                                <div class="input-group">
                                                    <img id="priviewHeader1"
                                                        src="<?= base_url('assets/img/events/small/'.$news->small_image); ?>" width="150"
                                                        height="80" style="object-fit: cover;">
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="text-input" class=" form-control-label">
                                                    <h4>Body <span class="text-danger">*</span></h4>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-12">
                                                <textarea class="form-control" name="body" id="mytextarea_id"><?= $news->body_id; ?></textarea>
                                            </div>
                                        </div>
                                        <div>
                                            <button id="payment-button" type="submit"
                                                class="btn btn-lg btn-info btn-block">
                                                <span id="payment-button-amount">Update</span>
                                            </button>
                                        </div>
                                    </form>
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