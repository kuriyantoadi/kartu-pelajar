<div class="page-wrapper">
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">Halaman Admin</h3>
        </div>
    </div>
    <div class="container-fluid">
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
                                    <h5>Status<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="status" class="form-control" value="<?= $row->status ?>" required data-validation-required-message="This field is required" disabled>
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
    </div>