<style>
    .custom-image {
        width: 200px;
        /* Atur lebar gambar */
        height: 200px;
        /* Atur tinggi gambar */
    }
</style>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Pelanggan</h1>
        </div>
        <div class="card">
            <div class=" float-right">
                <a href="<?= site_url('customer') ?>" class="btn btn-primary btn-sm float-right m-3"><i class="fas fa-undo-alt"> Kembali</i></a>
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
                        <form action="<?= site_url('pelanggan/proses_edit/' . $result['id_customer']) ?>" method="post">
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label for="">Kode Pelanggan</label>
                                        <input type="text" name="kode_plg" class="form-control" value="<?= $result['kode_plg'] ?>" id="kode_plg" required readonly>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group  col-12">
                                        <label for="">Nama</label>
                                        <input type="text" name="nama" class="form-control" value="<?= $result['nama'] ?>" id="nama" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6 col-12">
                                        <label for="">No Handphone</label>
                                        <input type="text" name="no_hp" class="form-control" value="<?= $result['no_hp'] ?>" id="no_hp" required>
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label for="">Jenis Kelamin</label>
                                        <select class="custom-select" name="gender" id="gender">
                                            <option selected hidden> <?= $result['jenis_kelamin'] == 'L' ? 'Laki-laki' : ($result['jenis_kelamin'] == 'P' ? 'Perempuan' : 'tidak diketahui') ?>
                                            </option>
                                            <option value="L">LAKI-LAKI</option>
                                            <option value="P">PEREMPUAN</option>
                                        </select>
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
                                        <label for="">Alamat</label>
                                        <textarea type="text" name="alamat" class="form-control" id="alamat" required><?= $result['alamat'] ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button type="sumbit" class="btn btn-primary m-3">Simpan</button>
                                <button type="reset" class="btn btn-warning m-3">Reset</button>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="profile3" role="tabpanel" aria-labelledby="profile-tab3">
                        <form action="<?= site_url('pelanggan/edit_pass/' . $result['id_customer']) ?>" method="post">
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
                        <form action="<?= site_url('pelanggan/edit_gambar/' . $result['id_customer']) ?>" method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                <img src="<?= base_url('./upload/plg/' . $result['gambar']) ?>" class="rounded-circle custom-image" alt="<?= $result['gambar'] ?>">
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