<div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
            <div class="card">
                <div class="card-body">

                    <!-- Logo -->
                    <div class="app-brand justify-content-center">
                        <a href="index.html" class="app-brand-link gap-2">
                            <img src="<?= base_url('assets/images/company/logo-r17-group.png'); ?>" alt="logo R17"
                                class="logo">
                            <style>
                            .logo {
                                width: 200px;
                            }
                            </style>
                        </a>
                    </div>
                    <!-- /Logo -->

                    <div class="text-center">
                        <h4 class="mb-2">Create account R17 Group </h4>
                        <p class="mb-4">Please sign-up to your account</p>
                    </div>

                    <!-- flash data -->
                    <?= $this->session->flashdata('message'); ?>

                    <!-- registrasi -->
                    <form id="formAuthentication" class="mb-3" action="<?= base_url('cms-group/registration'); ?>"
                        method="POST">

                        <div class="mb-3">
                            <label for="nama" class="form-label">Name</label>
                            <input type="text" class="form-control" value="<?= set_value('nama'); ?>" id="nama"
                                name="nama" autocomplete="off" placeholder="Enter your name account" />
                            <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" value="<?= set_value('username'); ?>"
                                name="username" autocomplete="off" placeholder="Enter your username account" />
                            <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <div class="mb-3 form-password-toggle">
                            <div class="d-flex justify-content-between">
                                <label class="form-label" for="password">Password</label>
                            </div>
                            <div class="input-group input-group-merge">
                                <input type="password" id="password" class="form-control" name="password"
                                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                    aria-describedby="password" />
                                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                            </div>
                            <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <div class="mb-3">
                            <button class="btn btn-primary d-grid w-100" type="submit">Sign up</button>
                        </div>

                    </form>
                    <!-- end register -->

                </div>
            </div>
        </div>
    </div>
</div>