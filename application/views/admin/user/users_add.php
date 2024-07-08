<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Tambah Pengguna</h1>
        </div>
        <div class="card">
            <div class=" float-right">
                <a href="<?= site_url('users') ?>" class="btn btn-primary btn-sm float-right m-3"><i class="fas fa-undo-alt"> Kembali</i></a>
            </div>
            <div class="card-body p-0">
                <form action="<?= site_url('users/add') ?>" method="post" enctype="multipart/form-data">
                    <!-- <form action="" method="post" enctype="multipart/form-data"> -->

                    <div class="form-group has-dropdown m-3 ">
                        <label for="">Nama</label>
                        <input type="text" name="name" class="form-control" id="name" required>

                    </div>
                    <div class=" form-group m-3">
                        <label for="">Username</label>
                        <input type="name" name="username" class="form-control" id="username" required>

                    </div>
                    <div class="form-group m-3">
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
                    <div class="form-group m-3">
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
                    <div class=" form-group m-3">
                        <label for="">Gambar</label>
                        <input type="file" name="gambar" class="form-control " id="gambar">
                    </div>
                    <div class=" form-group m-3">
                        <label for="">Akses</label>
                        <select class="custom-select" name="akses" id="akses">
                            <option selected hidden>Pilih...</option>
                            <option value="1">Admin</option>
                            <option value="2">Kasir</option>
                        </select>
                    </div>
                    <button type="sumbit" class="btn btn-primary m-3">Simpan</button>
                    <button type="reset" class="btn btn-warning m-3">Reset</button>
            </div>
            </form>

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