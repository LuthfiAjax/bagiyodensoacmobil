<div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
            <div class="card">
                <div class="card-body">

                    <!-- Logo -->
                    <div class="app-brand justify-content-center mb-1ß">
                        <a href="<?= base_url(''); ?>" class="app-brand-link gap-2">
                            <img src="<?= base_url('assets/'); ?>img/logo.svg" alt="logo Bagiyo Denso"
                                class="logo">
                            <style>
                            .logo {
                                width: 150px;
                            }
                            </style>
                        </a>
                    </div>
                    <!-- /Logo -->

                    <div class="text-center">
                        <h4 class="mb-2">Welcome to Bagiyo Denso</h4>
                        <p class="mb-4">Silahkan Login Menggunakan Akun anda</p>
                    </div>

                    <!-- flash data -->
                    <?= $this->session->flashdata('message'); ?>

                    <!-- login -->
                    <form id="formAuthentication" class="mb-3" action="<?= base_url('login'); ?>" method="POST">

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email"
                                value="<?= set_value('email'); ?>" autocomplete="off"
                                placeholder="Enter your email account" autofocus />
                            <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <div class="mb-3 form-password-toggle">
                            <div class="d-flex justify-content-between">
                                <label class="form-label" for="password">Password</label>
                            </div>
                            <div class="input-group input-group-merge">
                                <input type="password" id="password" class="form-control" name="password"
                                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                    aria-describedby="password" />
                                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span><br>
                            </div>
                            <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <div class="mb-3">
                            <button class="btn btn-primary d-grid w-100" type="submit">Masuk</button>
                        </div>

                    </form>
                    <!-- end login -->

                </div>
            </div>
        </div>
    </div>
</div>