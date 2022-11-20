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
                        <h4 class="card-title">Form Photo Siswa</h4>

                        <?= $this->session->flashdata('msg') ?>

                        <?=
                        form_open('Admin/siswa_password_up');
                        foreach ($tampil_siswa as $row) {
                        ?>


                            <form class="m-t-40" novalidate>
                                <div class="form-group">
                                    <h5>NISN <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="hidden" name="id_siswa" value="<?= $row->id_siswa ?>">
                                        <input type="number" value="<?= $row->nisn ?>" name="nisn" class="form-control" required data-validation-required-message="This field is required" readonly>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <h5>Nama Siswa <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="nama_siswa" value="<?= $row->nama_siswa ?>" class="form-control" required data-validation-required-message="This field is required" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Kelas <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <?php
                                        foreach ($tampil_kelas as $row_kelas) {
                                        ?>
                                            <input type="text" value="<?= $row->tingkatan . ' ' . $row->jurusan . ' ' . $row->kode_kelas ?>" class="form-control" disabled>
                                        <?php } ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <h5>Password Baru <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="password_baru" value="" class="form-control" required data-validation-required-message="This field is required" require>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <h5>Password Konfirmasi <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="password_konfirmasi" value="" class="form-control" required data-validation-required-message="This field is required" require>
                                    </div>
                                </div>

                                <div class="text-xs-right">
                                    <button type="submit" class="btn btn-sm btn-info">Submit</button>
                                    <button type="reset" class="btn btn-sm btn-inverse">Cancel</button>
                                </div>
                            </form>

                        <?php } ?>
                        <?= form_close() ?>

                    </div>
                </div>
            </div>
        </div>

        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
    </div>