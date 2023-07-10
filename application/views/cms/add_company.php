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
                                        <h3 class="text-center">Add Company</h3>
                                        <?= $this->session->flashdata('message'); ?>
                                    </div>
                                    <hr>
                                    <form action="<?= base_url('cms/save-company'); ?>" method="POST"
                                        enctype="multipart/form-data">

                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="text-input"
                                                    class=" form-control-label">
                                                    <h4>Type Company <span class="text-danger">*</span></h4>
                                                </label>
                                            </div>
                                            <div class="col col-md-9">
                                                <select name="type" id="type" class="form-control" required>
                                                    <option disabled selected>Choose</option>
                                                    <option value="1">Information Technology</option>
                                                    <option value="2">Manufacture</option>
                                                    <option value="3">Media</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="text-input"
                                                    class=" form-control-label">
                                                    <h4>Status Company <span class="text-danger">*</span></h4>
                                                </label>
                                            </div>
                                            <div class="col col-md-9">
                                                <select name="status" id="status" class="form-control" required>
                                                    <option disabled selected>Choose</option>
                                                    <option value="1">Holding</option>
                                                    <option value="2">Sub Holding</option>
                                                    <option value="3">Operation</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="name_company"
                                                    class=" form-control-label">
                                                    <h4>Name Company<span class="text-danger">*</span></h4>
                                                </label>
                                            </div>
                                            <div class="col col-md-9">
                                                <input type="text" id="name_company" name="name_company"
                                                    autocomplete="off" class="form-control" required>
                                            </div>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="name_company"
                                                    class=" form-control-label">
                                                    <h4>Tagline Company<span class="text-danger">*</span></h4>
                                                </label>
                                            </div>
                                            <div class="col col-md-9">
                                                <input type="text" id="tagline_company" name="tagline_company"
                                                    autocomplete="off" class="form-control" required>
                                            </div>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="website" class=" form-control-label">
                                                    <h4>Website Company <span class="text-danger"><small>( optional
                                                                )</small></span></h4>
                                                </label>
                                            </div>
                                            <div class="col col-md-9">
                                                <input type="text" id="website" name="website" autocomplete="off"
                                                    class="form-control">
                                            </div>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="text-input"
                                                    class=" form-control-label">
                                                    <h4>Cover <span class="text-danger">*</span></h4>
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
                                                        src="<?= base_url('assets/bg/kosong.jpg'); ?>" width="100"
                                                        height="100" style="object-fit: cover;">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="text-input"
                                                    class=" form-control-label">
                                                    <h4>Thumbnail <span class="text-danger">*</span></h4>
                                                </label></div>
                                            <div class="col col-md-6">
                                                <div class="input-group">
                                                    <input accept="image/jpg, image/jpeg, image/png, image/gif"
                                                        onchange="PreviewHeader2();" type="file" id="header2"
                                                        name="header2" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col col-md-3">
                                                <div class="input-group">
                                                    <img id="priviewHeader2"
                                                        src="<?= base_url('assets/bg/kosong.jpg'); ?>" width="100"
                                                        height="73" style="object-fit: cover;">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="text-input" class=" form-control-label">
                                                    <h4>Description Company <span class="text-danger">*</span></h4>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-12">
                                                <textarea class="form-control" name="body"
                                                    id="mytextarea_id"></textarea>
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