<div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('flashdata'); ?>"></div>
<div class="content-body">
    <div class="col-lg-12 mt-3">
        <h4 class="card-title">Edit Data </h4>
        <div class="card">
            <div class="card-body">
                <div class="basic-form">
                    <form action="<?php echo base_url() . 'admin/Terminal_admin/Update/' . $this->uri->segment(4) ?>" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <?php foreach ($terminal as $term) ?>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="control-label">ID Data</label>
                                    <input type="text" name="id_terminal" class="form-control" value="<?= $term->id_terminal ?>" readonly>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="control-label">Nama Terminal</label>
                                    <input type="text" name="nama_terminal" class="form-control" value="<?= $term->nama_terminal  ?>">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="control-label">Nama Jalan</label>
                                    <input type="text" name="lokasi" class="form-control" value="<?= $term->lokasi ?>">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="control-label">Latitude</label>
                                    <input type="number" id="latitude" name="latitude" class="form-control" value="<?= $term->latitude ?>">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="control-label">Longitude</label>
                                    <input type="number" name="longitude" class="form-control" value="<?= $term->longitude ?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-12 text-right">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12 mr-3">
        <div class="card">
            <div class="card-header">
                <!-- <h4 class="card-title">Leaflet Quick Start Guide</h4>
                    <p class="text-muted mb-0">Example of Leaflet map.</p> -->
                <!--end card-header-->
                <div class="card-body">
                    <div id="Leaf_default" class="" style="height: 400px"></div>
                </div>
                <!--end card-body-->
            </div>
            <!--end card-->
        </div> <!-- end col -->
    </div> <!-- end row -->
</div>