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
                                    <form action="<?= base_url('cms/save-career'); ?>" method="POST"
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
                                                    <option value="1">WFO</option>
                                                    <option value="2">WFH</option>
                                                    <option value="3">Freelance</option>
                                                    <option value="4">Internship</option>
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
                                                    class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="title" class=" form-control-label">
                                                    <h4>Slug <span class="text-danger">*</span></h4>
                                                </label></div>
                                            <div class="col col-md-9">
                                                <input type="text" id="slug" name="slug"
                                                    value="<?= set_value('slug') ?>" autocomplete="off"
                                                    class="form-control" required>
                                            </div>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="cover" class=" form-control-label">
                                                    <h4>Cover Career<span class="text-danger">*</span></h4>
                                                </label>
                                            </div>
                                            <div class="col col-md-9">
                                                <input type="file" id="cover" name="cover" autocomplete="off"
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
                                                    <h4>JOB DESCRIPTIONS :</h4>
                                                    <ul>
                                                        <li></li>
                                                    </ul>
                                                    <h4>REQUIREMENTS :</h4>
                                                    <ul>
                                                        <li></li>
                                                    </ul>
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