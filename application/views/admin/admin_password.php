<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">Halaman Admin</h3>
        </div>

        <div>
            <button class="right-side-toggle waves-effect waves-light btn-inverse btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Form Reset Password</h4>

                        <?= $this->session->flashdata('msg') ?>

                        <?=
                        form_open('Admin/admin_password_up');
                        foreach ($tampil as $row) {
                        ?>
                            <form class="m-t-40" novalidate>
                                <div class="form-group">
                                    <h5>Nama Admin<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="hidden" name="id_admin" value="<?= $row->id_admin ?>">
                                        <input type="text" name="nama" class="form-control" value="<?= $row->nama ?>" required data-validation-required-message="This field is required" disabled>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Status Akun <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="status_akun" class="form-control" value="<?= $row->status_akun ?>" required data-validation-required-message="This field is required" disabled>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Password Baru <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="password_baru" class="form-control" required data-validation-required-message="This field is required">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Password Konfirmasi Password <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="password" name="password_konfirmasi" class="form-control" required data-validation-required-message="This field is required">
                                    </div>
                                </div>

                                <div class="text-xs-right">
                                    <button type="submit" class="btn btn-sm btn-info">Submit</button>
                                    <button type="reset" class="btn btn-sm btn-inverse">Cancel</button>
                                </div>
                                <?= form_close() ?>
                            <?php } ?>
                            </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
    </div>