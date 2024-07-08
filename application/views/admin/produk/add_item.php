<div class="main-content">
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="<?= site_url('produk') ?>" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Tambah Produk</h1>
        </div>
        <?= $this->session->flashdata('message'); ?>
        <div class="card">
            <div class="card-body p-0">
                <form action="<?= site_url('produk/proses') ?>" method="post" enctype="multipart/form-data">
                    <!-- <form action="" method=" post"  -->
                    <div class="form-group has-dropdown m-3 ">
                        <label for="">Kode Barang</label>
                        <input type="text" name="kode_brg" class="form-control" id="kode_brg" value="<?= Kode_brg(); ?>" required readonly>
                    </div>
                    <div class="form-group has-dropdown m-3 ">
                        <label for="">Nama</label>
                        <input type="text" name="nama" class="form-control" id="nama" required>
                    </div>
                    <div class=" form-group m-3">
                        <label for="">Kategori</label>
                        <select name="kategori" id="kategori" class="form-control">
                            <option value="" hidden> --Pilih-- </option>
                            <?php foreach ($kategori as $c) { ?>
                                <option value="<?= $c->id_category; ?>"><?= $c->nama_cate; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class=" form-group m-3">
                        <label for="">Satuan</label>
                        <select name="unit" id="unit" class="form-control">
                            <option value="" hidden> --Pilih-- </option>
                            <?php foreach ($unit as $c) { ?>
                                <option value="<?= $c->id_unit; ?>"><?= $c->nama_unit; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class=" form-group m-3">
                        <label for="">Harga</label>
                        <input type="number" name="harga" class="form-control" id="harga" required>
                    </div>
                    <div class="form-group has-dropdown m-3 ">
                        <label for="">Gambar</label>
                        <input type="file" name="gambar" class="form-control" id="gambar" required>
                    </div>
                    <!-- <div class="form-group has-dropdown m-3 ">
                <label for="">Stok</label>
                <input type="text" name="stok" class="form-control" id="stok">
            </div> -->

                    <button type="sumbit" class="btn btn-primary m-3">Simpan</button>
                    <button type="reset" class="btn btn-warning m-3">Reset</button>
                </form>
            </div>

        </div>
    </section>
</div>