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
                    <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
                        <div class="login-brand">
                            <img src="<?= base_url() ?>assets/img/Mukayah.png" alt="logo" width="100" class="shadow-light rounded-circle">
                        </div>

                        <div class="card card-primary">
                            <?= $this->session->flashdata('message'); ?>
                            <?= $this->session->flashdata('success'); ?>
                            <div class="card-header">
                                <h3>REGISTER</h3>

                            </div>

                            <div class="card-body">
                                <form action="<?= site_url('auth/proses_registrasi') ?>" method="post" enctype="multipart/form-data">
                                    <div class="form-group has-dropdown ">
                                        <label for="">Nama</label>
                                        <input type="hidden" name="kode_plg" class="form-control" value="<?= Kode_plg(); ?>" id="kode_plg" required readonly>
                                        <input type="text" name="nama" class="form-control" id="nama" required>
                                    </div>
                                    <div class="form-group has-dropdown ">
                                        <label for="">No Handphone</label>
                                        <input type="text" name="no_hp" class="form-control" id="no_hp" required>
                                    </div>
                                    <div class=" form-group">
                                        <label for="">Jenis Kelamin</label>
                                        <select class="custom-select" name="gender" id="gender">
                                            <option selected hidden> ----Pilih---- </option>
                                            <option value="L">LAKI-LAKI</option>
                                            <option value="P">PEREMPUAN</option>
                                        </select>
                                    </div>
                                    <div class=" form-group">
                                        <label for="">Username</label>
                                        <input type="text" name="username" class="form-control" id="username" required>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="">Password</label>
                                            <div class="input-group">
                                                <input type="password" name="password" minlength="5" class="form-control" id="password" required>
                                                <div class="input-group-append">
                                                    <button class="btn btn-outline-secondary" type="button" id="showPassword">
                                                        <i class="fas fa-eye"></i>
                                                        <i class="fas fa-eye-slash d-none"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group  col-6">
                                            <label for="">Konfirmasi Password</label>
                                            <div class="input-group">
                                                <input type="password" name="password1" minlength="5" class="form-control" id="password1" required>
                                                <div class="input-group-append">
                                                    <button class="btn btn-outline-secondary" type="button" id="showPassword2">
                                                        <i class="fas fa-eye"></i>
                                                        <i class="fas fa-eye-slash d-none"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class=" form-group">
                                        <label for="">Alamat</label>
                                        <input type="text" name="alamat" class="form-control" id="alamat" required></input>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" name="login" id="login" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                            Register
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="mt-5 text-muted text-center">
                            have an account? <a href="<?= base_url('auth/customer') ?>">Sign In</a>
                        </div>
                        <div class="simple-footer">
                            Copyright &copy; <a href="<?= base_url('auth') ?>">Muhsin</a> 2024
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script>
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

        document.getElementById("showPassword2").addEventListener("click", function() {
            var passwordInput = document.getElementById("password1");
            var eyeIcon = document.querySelector("#showPassword2 i.fas");
            var eyeSlashIcon = document.querySelector("#showPassword2 i.fas.fa-eye-slash");

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