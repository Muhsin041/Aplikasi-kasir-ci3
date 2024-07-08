<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Pelanggan</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="pull-right">
                            <a href="<?= site_url('customer/add/') ?>" class="btn btn-primary btn-lg float-right m-3 "><i class="fas fa-user-plus"> Tambah </i></a>
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
                                            <th>Kode</th>
                                            <th>Nama</th>
                                            <th>No Telepon</th>
                                            <th>Gender</th>
                                            <th>Username</th>
                                            <th>Alamat</th>
                                            <th>Gambar</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($result as $row) : ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $row->kode_plg ?></td>
                                                <td><?= $row->nama ?></td>
                                                <td><?= $row->no_hp ?></td>
                                                <td>
                                                    <?= $row->jenis_kelamin == 'L' ? 'Laki-laki' : ($row->jenis_kelamin == 'P' ? 'Perempuan' : 'tidak diketahui') ?>
                                                </td>
                                                <td><?= $row->username ?></td>
                                                <td><?= $row->alamat ?></td>
                                                <td>
                                                    <figure class="avatar mr-2 avatar-lg ">
                                                        <img src="<?= base_url('./upload/plg/' . $row->gambar) ?>" alt="">
                                                    </figure>
                                                </td>
                                                <td style="display: flex; gap: 5px;">
                                                    <a href="<?= site_url('customer/edit/' . $row->id_customer)  ?>" class="btn btn-primary btn-sm" style="height:30px;"><i class="fas fa-edit"> Edit</i></a>
                                                    <a href="<?= site_url('pelanggan/delete/' . $row->id_customer)  ?>" onclick="return confirm('Apakah Anda Yakin..?')" class="btn btn-danger btn-sm" style="height:30px;"><i class="fas fa-user-times"> Hapus</i></a>
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