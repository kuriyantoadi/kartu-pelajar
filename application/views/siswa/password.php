<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Form Reset Password</h4>

                    <?php foreach ($tampil as $row) { ?>
                        <?= $this->session->flashdata('msg') ?>
                        <?= form_open('Siswa/password_up'); ?>

                        <form class="m-t-40" novalidate>
                            <div class="form-group">
                                <h5>Nama Siswa <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="hidden" name="id_siswa" class="form-control" value="<?= $row->id_siswa ?>" required data-validation-required-message="This field is required">
                                    <input type="text" name="nama" value="<?= $row->nama_siswa ?>" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <h5>Password Baru <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="password" name="password_baru" class="form-control" required data-validation-required-message="This field is required">
                                </div>
                            </div>
                            <div class="form-group">
                                <h5>Password Konfirmasi <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="password" name="password_konfirmasi" class="form-control" required data-validation-required-message="This field is required">
                                </div>
                            </div>


                            <div class="text-xs-right">
                                <button type="submit" class="btn btn-sm btn-info">Submit</button>
                                <button type="reset" class="btn btn-sm btn-inverse">Cancel</button>
                            </div>
                        </form>
                        <?php form_close() ?>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->
</div>