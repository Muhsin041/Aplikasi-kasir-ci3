<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Supplier Data</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="">
                            <a href="<?= site_url('supplier/add') ?>" class="btn btn-primary btn-lg float-right m-3"><i class="fas fa-user-plus">Tambah</i></a>
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
                                            <th>Nama</th>
                                            <th>No Handphone</th>
                                            <th>Alamat</th>
                                            <th>Keterangan</th>

                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($result as $row) : ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $row->nama_supplier ?></td>
                                                <td><?= $row->no_hp ?></td>
                                                <td><?= $row->alamat ?></td>
                                                <td><?= $row->keterangan ?></td>

                                                <td style="display: flex; gap: 5px;">
                                                    <a href="<?= site_url('supplier/edit_supp/' . $row->id_supplier)  ?>" class="btn btn-primary btn-sm" style="height:30px;"><i class="fas fa-edit"> Edit</i></a>
                                                    <a href="<?= site_url('supplier/delete/' . $row->id_supplier)  ?>" onclick="return confirm('Apakah Anda Yakin..?')" class=" btn btn-danger btn-sm" style="height:30px;"><i class="fas fa-trash"> Hapus</i></a>
                                                </td>
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