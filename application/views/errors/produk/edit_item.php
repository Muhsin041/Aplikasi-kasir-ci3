<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Category</h1>
        </div>
        <div class="card">
            <div class=" float-right">
                <a href="<?= site_url('category') ?>" class="btn btn-primary btn-sm float-right m-3"><i class="fas fa-undo-alt"> Kembali</i></a>
            </div>
            <div class="card-body">
                <ul class="nav nav-pills" id="myTab3" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab3" data-toggle="tab" href="#home3" role="tab" aria-controls="home" aria-selected="true">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab3" data-toggle="tab" href="#profile3" role="tab" aria-controls="profile" aria-selected="false">Gambar</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent2">
                    <div class="tab-pane fade show active" id="home3" role="tabpanel" aria-labelledby="home-tab3">
                        <form action="<?= site_url('produk/edit_proses/' . $result->id_brg)  ?>" method="post">
                            <!-- <form action="" method=" post"  -->
                            <div class="form-group has-dropdown m-3 ">
                                <label for="">Nama</label>
                                <input type="text" name="nama" class="form-control" id="nama" value="<?= $result->nama ?>" required>
                            </div>
                            <div class=" form-group m-3">
                                <label for="">Kategori</label>
                                <select name="kategori" id="kategori" class="form-control">
                                    <?php foreach ($kategori as $c) { ?>
                                        <option value="<?= $c->id_category; ?>" <?= $c->id_category == $result->id_category ? 'selected' : ''; ?>><?= $c->nama_cate; ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class=" form-group m-3">
                                <label for="">Satuan</label>
                                <select name="unit" id="unit" class="form-control">
                                    <?php foreach ($unit as $c) { ?>
                                        <option value="<?= $c->id_unit; ?>"><?= $c->nama_unit; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class=" form-group m-3">
                                <label for="">Harga</label>
                                <input type="number" name="harga" class="form-control" id="harga" value="<?= $result->harga ?>" required>
                            </div>
                            <button type="sumbit" class="btn btn-primary m-3">Simpan</button>
                            <button type="reset" class="btn btn-warning m-3">Reset</button>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="profile3" role="tabpanel" aria-labelledby="profile-tab3">
                        <form action="<?= site_url('produk/edit_gambar/' . $result->id_brg) ?>" method="post" enctype="multipart/form-data">
                            <img src="<?= base_url('./upload/produk/' . $result->gambar) ?>" class="rounded-circle custom-image" alt="<?= $result->gambar ?>">
                            <br>
                            <div class="form-group has-dropdown m-3 ">
                                <label for="">Gambar</label>
                                <input type="file" name="gambar" class="form-control" id="gambar" required>
                                <input type="hidden" name="old_gambar" value="<?= $result->gambar ?>">
                            </div>

                            <button type="sumbit" class="btn btn-primary m-3">Simpan</button>
                            <button type="reset" class="btn btn-warning m-3">Reset</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>