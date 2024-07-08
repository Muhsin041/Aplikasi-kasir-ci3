<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Satuan Barang</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="">
                            <a href="<?= site_url('unit/add') ?>" class="btn btn-primary float-right m-3"><i class="fas fa-user-plus">Tambah</i></a>
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
                                            <th class="text-center">Nama</th>
                                            <th style="text-align: center;width:20px;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($result as $row) : ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td style="text-align: center;width:500px;"><?= $row->nama_unit ?></td>
                                                <td style="display: flex; gap: 5px;">
                                                    <a href="<?= site_url('unit/edit_unit/' . $row->id_unit)  ?>" class="btn btn-primary btn-sm" style="height:30px;"><i class="fas fa-edit"> Edit</i></a>
                                                    <a href="<?= site_url('unit/delete/' . $row->id_unit)  ?>" onclick="return confirm('Apakah Anda Yakin..?')" class="btn btn-danger btn-sm" style="height:30px;"><i class="fas fa-trash-alt"> Hapus</i></a>
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