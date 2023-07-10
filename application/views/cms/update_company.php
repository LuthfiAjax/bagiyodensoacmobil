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
                                        <h3 class="text-center">Update Company</h3>
                                        <?= $this->session->flashdata('message'); ?>
                                    </div>
                                    <hr>
                                    <form action="<?= base_url('cms/save-update-company'); ?>" method="POST"
                                        enctype="multipart/form-data">

                                        <input type="hidden" name="id" value="<?= $company->id_company; ?>">

                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="text-input"
                                                    class=" form-control-label">
                                                    <h4>Type Company <span class="text-danger">*</span></h4>
                                                </label>
                                            </div>
                                            <div class="col col-md-9">
                                                <select name="type" id="type" class="form-control" required>
                                                    <option disabled selected>Choose</option>
                                                    <option <?= ($company->type == '1') ? 'selected' : ''; ?> value="1">
                                                        Information Technology</option>
                                                    <option <?= ($company->type == '2') ? 'selected' : ''; ?> value="2">
                                                        Manufacture</option>
                                                    <option <?= ($company->type == '3') ? 'selected' : ''; ?> value="3">
                                                        Media</option>
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
                                                    <option <?= ($company->status == '1') ? 'selected' : ''; ?>
                                                        value="1">Holding</option>
                                                    <option <?= ($company->status == '2') ? 'selected' : ''; ?>
                                                        value="2">Sub Holding</option>
                                                    <option <?= ($company->status == '3') ? 'selected' : ''; ?>
                                                        value="3">Operation</option>
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
                                                    autocomplete="off" class="form-control"
                                                    value="<?= $company->nama_company; ?>" required>
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
                                                    autocomplete="off" class="form-control"
                                                    value="<?= $company->tagline; ?>" required>
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
                                                    class="form-control" value="<?= $company->url; ?>">
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
                                                    id="mytextarea_id"><?= $company->des_company; ?></textarea>
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