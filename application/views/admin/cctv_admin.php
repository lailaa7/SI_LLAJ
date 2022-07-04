<div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('flashdata'); ?>"></div>
<div class="container-fluid">
    <div class="content-body">
        <div class="col-lg-12 mt-3">
            <a href="<?php echo base_url('admin/tambah_cctv',)
                        ?>" class="btn btn-rounded btn-primary btn-icon mb-3">
                <i class="fa fa-plus fa-sm"></i>Tambah Data
            </a>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Data CCTV</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered verticle-middle zero-configuration">
                            <thead>
                                <tr>
                                    <th>Lokasi</th>
                                    <th>Nama Jalan</th>
                                    <th>Jumlah</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data_cctv as $cctv) : ?>
                                    <tr>
                                        <td><?php echo $cctv->lokasi ?> </td>
                                        <td><?php echo $cctv->nama_jalan ?></td>
                                        <td><?php echo $cctv->jumlah ?></td>
                                        <td>
                                            <a href="<?php echo base_url('admin/Cctv_admin/edit_cctv/' . $cctv->id_cctv,)
                                                        ?>" class="btn btn-circle btn-primary btn-small">
                                                <i class="fa fa-edit"></i>
                                            </a>

                                            <a href="<?php echo base_url('admin/cctv_admin/hapus/' . $cctv->id_cctv,)
                                                        ?>" class="btn btn-circle btn-danger btn-small btn-hps">
                                                <i class="fa-solid fa-trash"></i>
                                            </a>

                                            <a href="<?php echo base_url('admin/cctv_admin/detail_cctv/' . $cctv->id_cctv,)
                                                        ?>" class="btn btn-circle btn-info btn-small">
                                                <i class="fa fa-eye"></i>
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
</div>