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
                        <h4 class="card-title">Form Edit Siswa</h4>

                        <?=
                        form_open_multipart('Admin/siswa_edit_up');
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
                                <!-- <div class="form-group">
                                    <h5>Password <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="password" name="password" value="<?= $row->nisn ?>" class="form-control" required data-validation-required-message="This field is required">
                                    </div>
                                </div> -->
                                <div class="form-group">
                                    <h5>Nama Siswa <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="nama_siswa" value="<?= $row->nama_siswa ?>" class="form-control" required data-validation-required-message="This field is required">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <h5>Kelas <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select class="form-control" name="id_kelas" id="">
                                            <option value="<?= $row->id_kelas ?>"> Pilihan Awal ( <?= $row->tingkatan . ' ' . $row->jurusan . ' ' . $row->kode_kelas ?> )</option>
                                            <?php
                                            foreach ($tampil_kelas as $row_kls) {
                                            ?>
                                                <option value="<?= $row_kls->id_kelas ?>"> <?= $row_kls->tingkatan . ' ' . $row_kls->jurusan . ' ' . $row_kls->kode_kelas ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <h5>Tempat Lahir <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" value="<?= $row->tempat_lahir ?>" name="tempat_lahir" class="form-control" required data-validation-required-message="This field is required">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Tanggal Lahir <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="date" name="tgl_lahir" value="<?= $row->tgl_lahir ?>" class="form-control" required data-validation-required-message="This field is required" placeholder="dd/mm/yyyy" data-validation-regex-regex="([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Agama <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="agama" class="form-control" id="" require>
                                            <option value="<?= $row->agama ?>">Pilihan ( <?= $row->agama ?> )</option>
                                            <option value="Islam">Islam</option>
                                            <option value="Kristen">Kristen</option>
                                            <option value="Katolik">Katolik</option>
                                            <option value="Hindu">Hindu</option>
                                            <option value="Budha">Budha</option>
                                        </select>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <h5>Alamat <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input name="alamat" id="alamat" value="<?= $row->alamat ?>" class="form-control" required placeholder="Alamat siswa"></input>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <h5>Status <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="status" class="form-control" id="" require>
                                            <option value="aktif">Aktif</option>
                                            <option value="Keluar">Keluar</option>
                                        </select>
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