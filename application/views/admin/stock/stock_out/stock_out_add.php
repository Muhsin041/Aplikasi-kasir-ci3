<style>
    table#table-1 {
        width: 100%;
    }

    table#table-1 th,
    table#table-1 td {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    table#table-1 th {
        text-align: center;
    }

    table#table-1 tbody td {
        text-align: center;
    }
</style>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Stock Keluar</h1>
        </div>
        <div class="section-body">

            <div class="card">
                <div class="">
                    <a href="<?= site_url('stock/out') ?>" class="btn btn-primary float-right m-3"><i class="fas fa-backward">Kembali</i></a>
                </div>
                <div class="card-body ">
                    <div class="row">
                        <div class="col-md-5 offset-md-4">
                            <form action="<?= site_url('stock/proses_out') ?>" method="post">
                                <div class="form-group  ">
                                    <label for="">Tanggal</label>
                                    <input type="date" name="date" class="form-control" value="<?= date('Y-m-d') ?>" id="date" required>
                                </div>
                                <div class="form-group input-group ">
                                    <label for="">Barcode</label>
                                    <div class="input-group">
                                        <input type="hidden" name="id_brg" id="id_brg" required>
                                        <input type="text" name="kode_brg" minlength="5" class="form-control" id="kode_brg" required>
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="button" data-toggle="modal" data-target="#exampleModal">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group  ">
                                    <label for="">Item Name</label>
                                    <input type="text" name="nama" class="form-control" id="nama" readonly>
                                </div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-md-7">
                                            <label for="unit_name">Unit Nama</label>
                                            <input type="text" name="nama_unit" id="nama_unit" class="form-control" readonly>
                                        </div>
                                        <div class="col-md-5">
                                            <label for="stock">Initial Stock</label>
                                            <input type="text" name="stock" id="stock" class="form-control" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="">Detail</label>
                                    <input type="text" name="detail" class="form-control" id="detail" required>
                                </div>
                                <div class="form-group has-dropdown ">
                                    <label for="">Supplier</label>
                                    <select class="form-control" id="supplier" name="supplier">
                                        <option value="" hidden> --- Pilih--- </option>
                                        <?php foreach ($supplier as $s) { ?>
                                            <option value="<?= $s->id_supplier; ?>"><?= $s->nama_supplier; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group ">
                                    <label for="">Qty</label>
                                    <input type="text" name="qty" class="form-control" id="qty" required>
                                </div>

                                <button type="sumbit" class="btn btn-primary m-3">Simpan</button>
                                <button type="reset" class="btn btn-warning m-3">Reset</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Select Produk Item</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-striped table-sm mb-0 p-2" id="table-1">
                        <thead>
                            <tr>
                                <th class="text-center">Barcode</th>
                                <th class="text-center">Nama</th>
                                <th class="text-center">Unit</th>
                                <th class="text-center">Harga</th>
                                <th class="text-center">Stock</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($produk as $row) : ?>
                                <tr>
                                    <td class="text-center"><?= $row->kode_brg ?></td>
                                    <td class="text-left"><?= $row->nama ?></td>
                                    <td><?= $row->nama_unit ?></td>
                                    <td><?= indo_currency($row->harga) ?></td>
                                    <td> <?= $row->stok ?></td>
                                    <td>
                                        <button class="btn btn-primary btn-sm select-btn" id="select" data-id="<?= $row->id_brg ?>" data-barcode="<?= $row->kode_brg ?>" data-nama="<?= $row->nama ?>" data-unit="<?= $row->nama_unit ?>" data-stock="<?= $row->stok ?>">
                                            <i class="fas fa-check"> Select</i>
                                        </button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
<script src="<?= base_url() ?>assets/modules/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $(document).on('click', '#select', function() {
            var id_brg = $(this).data('id');
            var kode_brg = $(this).data('barcode');
            var nama = $(this).data('nama');
            var nama_unit = $(this).data('unit');
            var stok = $(this).data('stock');
            $('#id_brg').val(id_brg);
            $('#kode_brg').val(kode_brg);
            $('#nama').val(nama);
            $('#nama_unit').val(nama_unit);
            $('#stock').val(stok);
            $('#exampleModal').modal('hide');
        });
    });
</script>