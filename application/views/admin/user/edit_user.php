<style>
    .custom-image {
        width: 200px;
        /* Atur lebar gambar */
        height: 200px;
        /* Atur tinggi gambar */
    }
</style>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Pengguna</h1>
        </div>

        <div class="section-body">
            <h2 class="section-title">Hi, <?= $result['name'] ?></h2>
            <p class="section-lead">
                Ubah informasi tentang diri Anda di halaman ini.
            </p>
            <?= $this->session->flashdata('message'); ?>
        </div>
        <div class="card">
            <div class=" float-right">
                <a href="<?= site_url('users') ?>" class="btn btn-primary btn-sm float-right m-3"><i class="fas fa-undo-alt"> Kembali</i></a>
            </div>
            <div class="card-body">
                <ul class="nav nav-pills" id="myTab3" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab3" data-toggle="tab" href="#home3" role="tab" aria-controls="home" aria-selected="true">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab3" data-toggle="tab" href="#profile3" role="tab" aria-controls="profile" aria-selected="false">Password</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="contact-tab3" data-toggle="tab" href="#contact3" role="tab" aria-controls="contact" aria-selected="false">Gambar</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent2">
                    <div class="tab-pane fade show active" id="home3" role="tabpanel" aria-labelledby="home-tab3">
                        <form action="<?= site_url('users/update/' . $result['id_user']) ?>" method="post">
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group  col-12">
                                        <label for="">Nama</label>
                                        <input type="text" name="nama" class="form-control" value="<?= $result['name'] ?>" id="nama" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group  col-12">
                                        <label for="">Username</label>
                                        <input type="text" name="username" class="form-control" value=" <?= $result['username'] ?>" id="username" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label for="">Akses</label>
                                        <select class="custom-select" name="akses" id="akses">
                                            <option hidden><?= $result['akses'] == 1 ? 'admin' : ($result['akses'] == 2 ? 'kasir' : 'tidak diketahui') ?></option>
                                            <option value="1">Admin</option>
                                            <option value="2">Kasir</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="card-footer text-right">
                                    <button type="sumbit" class="btn btn-primary m-3">Simpan</button>
                                    <button type="reset" class="btn btn-warning m-3">Reset</button>
                                </div>
                        </form>
                    </div>
                </div>
                <div class="tab-pane fade" id="profile3" role="tabpanel" aria-labelledby="profile-tab3">
                    <form action="<?= site_url('users/edit_pass/' . $result['id_user']) ?>" method="post">
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-6 col-12">
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
                                <div class="form-group col-md-6 col-12">
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
                        </div>
                        <div class="card-footer text-right">
                            <button type="sumbit" class="btn btn-primary m-3">Simpan</button>
                            <button type="reset" class="btn btn-warning m-3">Reset</button>
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade" id="contact3" role="tabpanel" aria-labelledby="contact-tab3">
                    <form action="<?= site_url('users/edit_gambar/' . $result['id_user']) ?>" method="post" enctype="multipart/form-data">
                        <div class="card-body">
                            <img src="<?= base_url('./upload/user/' . $result['gambar']) ?>" class="rounded-circle custom-image" alt="<?= $result['gambar'] ?>">
                            <br>
                            <label for="">Gambar</label>
                            <input type="file" name="gambar" class="form-control " id="gambar" value="">
                            <input type="hidden" name="old_gambar" value="<?= $result['gambar'] ?>">
                            <?= $result['gambar'] ?>

                        </div>
                        <div class=" card-footer text-right">
                            <button type="sumbit" class="btn btn-primary m-3">Simpan</button>
                            <button type="reset" class="btn btn-warning m-3">Reset</button>
                        </div>
                    </form>
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