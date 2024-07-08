<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Stock Keluar</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="">
                            <a href="<?= site_url('stock/out/add') ?>" class="btn btn-primary float-right m-3"><i class="fas fa-user-plus">Tambah</i></a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <?= $this->session->flashdata('message'); ?>
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th class="text-center" style="width: 15px;">
                                                #
                                            </th>
                                            <th class="text-center">Barcode</th>
                                            <th class="text-center">Nama</th>
                                            <th class="text-center">Detail</th>
                                            <th class="text-center">Jumlah</th>
                                            <th class="text-center">Tanggal</th>
                                            <th style="text-align: center;width:20px;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($result as $row) : ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td class="text-center"><?= $row->kode_brg ?></td>
                                                <td><?= $row->nama_brg ?></td>
                                                <td><?= $row->detail ?></td>
                                                <td class="text-right"><?= $row->qty ?></td>
                                                <td class="text-center"><?= indo_date($row->date) ?></td>
                                                <td style="display: flex; gap: 5px;">
                                                    <button id="show" class="btn btn-light btn-sm" data-toggle="modal" data-target="#exampleModal" data-barcode="<?= $row->kode_brg ?>" data-nama="<?= $row->nama_brg ?>" data-detail="<?= $row->detail ?>" data-supplier="<?= $row->nama_supplier ?>" data-qty="<?= $row->qty ?>" data-date="<?= indo_date($row->date) ?>" style="height:30px;">
                                                        <i class="fas fa-eye">Detail</i>
                                                    </button>
                                                    <form action="<?= site_url('stock/delete_out') ?>" method="post" class="d-inline">
                                                        <input type="hidden" name="id_stock" value="<?= $row->id_stock; ?>">
                                                        <input type="hidden" name="id_brg" value="<?= $row->id_brg; ?>">
                                                        <button class="btn btn-danger btn-sm tombol-hapus" type="submit" onclick="return confirm('Apakah Anda Yakin..?')">
                                                            <i class="fa fa-trash">Hapus</i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="exampleModal">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Stock Masuk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-2">
                <table class="table table-bordered table-sm no-margin mb-0">
                    <tbody>
                        <tr>
                            <th style="width:35%;">Barcode</th>
                            <td><span id="barcode"></span></td>
                        </tr>
                        <tr>
                            <th>Nama</th>
                            <td><span id="nama_brg"></span></td>
                        </tr>
                        <tr>
                            <th>Detail</th>
                            <td><span id="detail"></span></td>
                        </tr>
                        <tr>
                            <th>Supplier</th>
                            <td><span id="nama_supplier"></span></td>
                        </tr>
                        <tr>
                            <th>QTY</th>
                            <td><span id="qty"></span></td>
                        </tr>
                        <tr>
                            <th>Date</th>
                            <td><span id="date"></span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="<?= base_url() ?>assets/modules/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $(document).on('click', '#show', function() {
            var kode_brg = $(this).data('barcode');
            var nama_brg = $(this).data('nama');
            var detail = $(this).data('detail');
            var nama_supplier = $(this).data('supplier');
            var qty = $(this).data('qty');
            var date = $(this).data('date');
            $('#barcode').text(kode_brg);
            $('#nama_brg').text(nama_brg);
            $('#detail').text(detail);
            $('#nama_supplier').text(nama_supplier);
            $('#qty').text(qty);
            $('#date').text(date);
            $('#exampleModal').modal('show');
        });
    });
</script>