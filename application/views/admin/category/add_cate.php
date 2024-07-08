<div class="main-content">
    <section class="section">

        <div class="section-header">
            <h1>Tambah Category</h1>
        </div>
        <div class="card">
            <div class=" float-right">
                <a href="<?= site_url('category') ?>" class="btn btn-primary btn-sm float-right m-3"><i class="fas fa-undo-alt"> Kembali</i></a>
            </div>
            <div class="card-body p-0">
                <form action="<?= site_url('category/proses') ?>" method="post">
                    <!-- <form action="" method=" post" enctype="multipart/form-data"> -->
                    <div class="form-group has-dropdown m-3 ">
                        <label for="">Nama</label>
                        <input type="text" name="nama" class="form-control" id="nama" required>
                    </div>
                    <button type="sumbit" class="btn btn-primary m-3">Simpan</button>
                    <button type="reset" class="btn btn-warning m-3">Reset</button>
                </form>
            </div>
        </div>
    </section>
</div>