<div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('flashdata'); ?>"></div>
<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <a href="<?php echo base_url('superadmin/akun/tambah_akun',)
                            ?>" class="btn btn-rounded btn-primary btn-icon mb-3">
                    <i class="fa fa-plus fa-sm"></i>Tambah Data
                </a>
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Data Pengguna</h4>
                        <div class="table-responsive">
                            <table class="table table-bordered verticle-middle zero-configuration">
                                <thead>
                                    <tr>
                                        <th>ID User</th>
                                        <th>Nama</th>
                                        <th>Username</th>
                                        <th>Level</th>
                                        <th>Status</th>
                                        <th colspan="3">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($user as $us) : ?>
                                        <tr>
                                            <td><?php echo $us->id_user ?> </td>
                                            <td><?php echo $us->nama ?></td>
                                            <td><?php echo $us->username ?></td>
                                            <td><?php echo $us->level ?></td>
                                            <td><?php
                                                if ($us->status == 1) {
                                                    echo '<span class="label label-pill label-success">Aktif</span>';
                                                } elseif ($us->status == 2) {
                                                    echo  '<span class="label label-pill label-danger">Non-Aktif</span>';
                                                }

                                                ?></td>
                                            <td>
                                                <a href="<?php echo base_url('superadmin/akun/edit/' . $us->id_user,)
                                                            ?>" class="btn btn-circle btn-primary btn-small">
                                                    <i class="fa fa-edit"></i>
                                                </a>

                                                <!-- <a href="<?php echo base_url('superadmin/akun/hapus/' . $us->id_user,)
                                                                ?>" class="btn btn-circle btn-danger btn-small btn-hps">
                                                    <i class="fa-solid fa-trash"></i>
                                                </a> -->

                                                <a href="<?php echo base_url('superadmin/akun/reset/' . $us->id_user,)
                                                            ?>" class="btn btn-circle btn-danger btn-small btn-reset">
                                                    <i class="fa-solid fa-arrow-rotate-left"></i>
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
</div>