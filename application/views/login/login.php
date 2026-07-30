<?php
$min_number = 1;
$max_number = 15;
$random_number1 = mt_rand($min_number, $max_number);
$random_number2 = mt_rand($min_number, $max_number);
?>

<div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
            <div class="card">
                <div class="card-body">

                    <div class="app-brand justify-content-center mb-1">
                        <a href="<?= base_url(''); ?>" class="app-brand-link gap-2">
                            <img src="<?= base_url('assets/'); ?>img/logo.png" alt="logo Bagiyo Denso" class="logo">
                            <style>
                                .logo {
                                    width: 150px;
                                }
                            </style>
                        </a>
                    </div>

                    <div class="text-center">
                        <h4 class="mb-2">Welcome to Bagiyo Denso</h4>
                        <p class="mb-4">Silahkan Login Menggunakan Akun Anda</p>
                    </div>

                    <?= $this->session->flashdata('message'); ?>

                    <form class="mb-3" action="<?= base_url('bagiyo-admin'); ?>" method="POST" id="login-form">

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
                                <input type="password" id="password" class="form-control" name="password" required
                                    placeholder="************" aria-describedby="password" />
                                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                            </div>
                            <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <div class="mb-3">
                            <label for="number" class="form-label">
                                Berapa <b><?= $random_number1; ?> + <?= $random_number2; ?> </b> ?
                            </label>
                            <input type="number" class="form-control" id="answer" name="answer" required autocomplete="off" />
                            <input name="firstNumber" type="hidden" value="<?= $random_number1; ?>" />
                            <input name="secondNumber" type="hidden" value="<?= $random_number2; ?>" />
                        </div>

                        <!-- reCAPTCHA hidden input -->
                        <input type="hidden" name="g-recaptcha-response" id="g-recaptcha-response">

                        <div class="mb-3">
                            <button class="btn btn-primary d-grid w-100" type="submit">Masuk</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Google reCAPTCHA v3 -->
<script src="https://www.google.com/recaptcha/api.js?render=6LcMggEqAAAAAN4sJf63vFN87bz-f4wf-kDS4RpM"></script>
<script>
    grecaptcha.ready(function() {
        grecaptcha.execute('6LcMggEqAAAAAN4sJf63vFN87bz-f4wf-kDS4RpM', {
                action: 'login'
            })
            .then(function(token) {
                document.getElementById('g-recaptcha-response').value = token;
            });
    });
</script>