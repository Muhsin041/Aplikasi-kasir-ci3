<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Supplier</h1>
        </div>
        <div class="card">
            <div class=" float-right">
                <a href="<?= site_url('supplier') ?>" class="btn btn-primary btn-sm float-right m-3"><i class="fas fa-undo-alt"> Kembali</i></a>
            </div>
            <div class="card-body p-0">
                <form action="<?= site_url('supplier/edit/' . $result['id_supplier']) ?>" method="post">
                    <!-- <form action="" method=" post" enctype="multipart/form-data"> -->
                    <div class="form-group has-dropdown m-3 ">
                        <label for="">Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control" value="<?= $result['nama_supplier'] ?>" id="nama" required>
                    </div>
                    <div class=" form-group m-3">
                        <label for="">No Handphone</label>
                        <input type="number" name="no_hp" value="<?= $result['no_hp'] ?>" class="form-control" id="no_hp" required>
                    </div>
                    <div class="form-group has-dropdown m-3 ">
                        <label for="">Alamat</label>
                        <textarea type="text" name="alamat" class="form-control" id="alamat" required><?= $result['alamat'] ?></textarea>
                    </div>
                    <div class="form-group has-dropdown m-3 ">
                        <label for="">Keterangan</label>
                        <textarea type="text" name="keterangan" class="form-control" id="keterangan"> <?= $result['keterangan'] ?></textarea>
                    </div>

                    <button type="sumbit" class="btn btn-primary m-3">Simpan</button>
                    <button type="reset" class="btn btn-warning m-3">Reset</button>
            </div>
            </form>

        </div>
    </section>
</div>