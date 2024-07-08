<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Login &mdash;Toko Mukayah</title>
    <link rel="icon" type="image/x-icon" href="<?= base_url() ?>assets/img/icon.png">

    <!-- General CSS Files -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/modules/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/modules/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/modules/izitoast/css/iziToast.min.css">
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/modules/bootstrap-social/bootstrap-social.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/style.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/components.css">
    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-94034622-3');
    </script>
    <!-- /END GA -->
</head>

<body>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                        <div class="login-brand">
                            <img src="<?= base_url() ?>assets/img/Mukayah.png" alt="logo" width="100" class="shadow-light rounded-circle">
                        </div>

                        <div class="card card-primary">
                            <?= $this->session->flashdata('message'); ?>
                            <?= $this->session->flashdata('success'); ?>
                            <div class="card-header">
                                <h3>LOGIN CUSTOMER</h3>

                            </div>

                            <div class="card-body">

                                <form method="post" action="<?= site_url('auth/process_cs') ?>">
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input id="username" type="text" class="form-control" name="username" tabindex="1" required autofocus>
                                        <div class="invalid-feedback">
                                            Masukkan Username .....!!
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="d-block">
                                            <label for="password" class="control-">Password</label>
                                        </div>
                                        <div class="input-group">
                                            <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary" type="button" id="showPassword">
                                                    <i class="fas fa-eye"></i>
                                                    <i class="fas fa-eye-slash d-none"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="invalid-feedback">
                                            Enter password....!!!
                                        </div>
                                    </div>

                                    <!-- <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me" onclick="myFunction()">
                                            <label class="custom-control-label" for="remember-me">Lihat Password</label>
                                        </div>
                                    </div> -->
                                    <br>
                                    <hr>
                                    <div class="form-group">
                                        <button type="submit" name="login" id="login" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                            Login
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="mt-5 text-muted text-center">
                            Don't have an account? <a href="auth-register.html">Create One</a>
                        </div>
                        <div class="simple-footer">
                            Copyright &copy; Muhsin 2024
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script>
        // function myFunction() {
        //     var x = document.getElementById("password");
        //     if (x.type === "password") {
        //         x.type = "text";
        //     } else {
        //         x.type = "password";
        //     }
        // }
        document.getElementById("showPassword").addEventListener("click", function() {
            var passwordInput = document.getElementById("password");
            var eyeIcon = document.querySelector("#showPassword i.fas");
            var eyeSlashIcon = document.querySelector("#showPassword i.fas.fa-eye-slash");

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                eyeIcon.classList.add("d-none");
                eyeSlashIcon.classList.remove("d-none");
            } else {
                passwordInput.type = "password";
                eyeIcon.classList.remove("d-none");
                eyeSlashIcon.classList.add("d-none");
            }
        });
    </script>

    <!-- General JS Scripts -->
    <script src="<?= base_url() ?>assets/modules/jquery.min.js"></script>
    <script src="<?= base_url() ?>assets/modules/popper.js"></script>
    <script src="<?= base_url() ?>assets/modules/tooltip.js"></script>
    <script src="<?= base_url() ?>assets/modules/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
    <script src="<?= base_url() ?>assets/modules/moment.min.js"></script>
    <script src="<?= base_url() ?>assets/js/stisla.js"></script>

    <!-- JS Libraies -->
    <script src="<?= base_url() ?>assets/modules/izitoast/js/iziToast.min.js"></script>
    <script src="<?= base_url() ?>assets/js/page/modules-toastr.js"></script>
    <script src="assets/modules/sweetalert/sweetalert.min.js"></script>

    <!-- Page Specific JS File -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

    <!-- Template JS File -->
    <script src="<?= base_url() ?>assets/js/scripts.js"></script>
    <script src="<?= base_url() ?>assets/js/custom.js"></script>
</body>

</html>