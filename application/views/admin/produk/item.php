<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Produk Item</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="pull-right">
                            <a href="<?= site_url('produk/add_item/') ?>" class="btn btn-primary float-right m-3"><i class="fas fa-user-plus"> Tambah</i></a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <?= $this->session->flashdata('message'); ?>
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                                #
                                            </th>
                                            <th>Barcde</th>
                                            <th>Nama</th>
                                            <th>Kategori</th>
                                            <th>Unit</th>
                                            <th>Harga</th>
                                            <th>Stok</th>
                                            <th>Foto</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($result as $row) : ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= $row->kode_brg; ?><br>
                                                    <a href="<?= site_url('produk/barcode/' . $row->id_brg)  ?>" class="btn btn-primary btn-sm" style="height:30px;">
                                                        <i class="fas fa-barcode">
                                                            Generate
                                                        </i>
                                                    </a>
                                                </td>
                                                <td><?= $row->nama; ?></td>
                                                <td><?= $row->nama_cate; ?></td>
                                                <td><?= $row->nama_unit; ?></td>
                                                <td> <?= indo_currency($row->harga); ?></td>
                                                <td><?= $row->stok; ?></td>
                                                <td>
                                                    <figure class="avatar mr-2 ">
                                                        <img src="<?= base_url('./upload/produk/' . $row->gambar) ?>" alt="">
                                                    </figure>
                                                </td>
                                                <td style="display: flex; gap: 5px;">
                                                    <a href="<?= site_url('produk/edit_item/' . $row->id_brg)  ?>" class="btn btn-primary btn-sm" style="height:30px;">
                                                        <i class="fas fa-edit"> Edit</i>
                                                    </a>
                                                    <a href="<?= site_url('produk/delete/' . $row->id_brg)  ?>" onclick="return confirm('Apakah Anda Yakin..?')" class="btn btn-danger btn-sm" style="height:30px;">
                                                        <i class="fas fa-trash"> Hapus</i>
                                                    </a>
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
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function() {
        $('#table-1').DataTable()
    })
</script>