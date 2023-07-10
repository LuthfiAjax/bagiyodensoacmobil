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
                                        <h3 class="text-center">Create Career</h3>
                                        <?= $this->session->flashdata('message'); ?>
                                    </div>
                                    <hr>
                                    <form action="<?= base_url('cms/save-update-career'); ?>" method="POST"
                                        enctype="multipart/form-data">

                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="text-input"
                                                    class=" form-control-label">
                                                    <h4>Type career <span class="text-danger">*</span></h4>
                                                </label>
                                            </div>
                                            <div class="col col-md-9">
                                                <select name="type" id="type" class="form-control">
                                                    <option disabled selected>Choose</option>
                                                    <option <?= ($career->type_jobs == 1) ? 'selected' : ''; ?>
                                                        value="1">WFO</option>
                                                    <option <?= ($career->type_jobs == 2) ? 'selected' : ''; ?>
                                                        value="2">WFH</option>
                                                    <option <?= ($career->type_jobs == 3) ? 'selected' : ''; ?>
                                                        value="3">Freelance</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="title" class=" form-control-label">
                                                    <h4>Title career <span class="text-danger">*</span></h4>
                                                </label>
                                            </div>
                                            <div class="col col-md-9">
                                                <input type="text" id="title" name="title" autocomplete="off"
                                                    class="form-control" value="<?= $career->title_jobs; ?>" required>
                                                <input type="hidden" id="id" name="id"
                                                    value="<?= $career->id_career; ?>">
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="title" class=" form-control-label">
                                                    <h4>Slug <span class="text-danger">*</span></h4>
                                                </label></div>
                                            <div class="col col-md-9">
                                                <input type="text" id="slug" name="slug"
                                                    value="<?= $career->slug_jobs; ?>" autocomplete="off"
                                                    class="form-control" required>
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
                                                <textarea class="form-control" name="body" id="mytextarea_id">
                                                    <?= $career->body_jobs; ?>
                                                </textarea>
                                            </div>
                                        </div>
                                        <div>
                                            <button id="payment-button" type="submit"
                                                class="btn btn-lg btn-info btn-block">
                                                <span id="payment-button-amount">Upload</span>
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