<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Pengguna</h1>
        </div>
        <div class="section-body">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="<?= site_url('users/tambah') ?>" class="btn btn-primary btn-sm float-right m-3"><i class="fas fa-user-plus">Tambah</i></a>
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
                                            <th>Name</th>
                                            <th>Username</th>
                                            <th>Gambar</th>
                                            <th>Akses</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($result as $row) : ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $row->name ?></td>
                                                <th><?= $row->username ?></th>
                                                <th>
                                                    <figure class="avatar mr-2 ">
                                                        <img src="<?= base_url('./upload/user/' . $row->gambar) ?>" alt="">
                                                    </figure>
                                                </th>
                                                <th><?= $row->akses == '1' ? 'admin' : 'kasir' ?></th>
                                                <td style="display: flex; gap: 5px;">
                                                    <a href="<?= site_url('users/edit_users/' . $row->id_user)  ?>" class="btn btn-primary btn-sm" style="height:30px;"><i class="fas fa-edit"> Edit</i></a>
                                                    <a href="<?= site_url('users/delete/' . $row->id_user)  ?>" onclick="return confirm('Apakah Anda Yakin..?')" style="height:30px;" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"> Hapus</i></a>
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