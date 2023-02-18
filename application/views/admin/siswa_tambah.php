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
                        <h4 class="card-title">Form Tambah Siswa</h4>

                        <?= form_open_multipart('Admin/siswa_tambah_up') ?>

                        <form class="m-t-40" novalidate>
                            <div class="form-group">
                                <h5>NISN <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="number" name="nisn" class="form-control" required data-validation-required-message="This field is required">
                                </div>
                            </div>
                            <div class="form-group">
                                <h5>Password <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="password" name="password" class="form-control" required data-validation-required-message="This field is required">
                                </div>
                            </div>
                            <div class="form-group">
                                <h5>Nama Siswa <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="nama_siswa" class="form-control" required data-validation-required-message="This field is required">
                                </div>
                            </div>
                            <div class="form-group">
                                <h5>Kelas <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <select class="form-control" name="id_kelas" id="">
                                        <?php
                                        foreach ($tampil_kelas as $row) {
                                        ?>
                                            <option value="<?= $row->id_kelas ?>"> <?= $row->tingkatan . ' ' . $row->jurusan . ' ' . $row->kode_kelas ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <h5>Jenis Kelamin <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <select class="form-control" name="jenis_kelamin" id="">
                                        <option value="">Pilihan</option>

                                        <option value="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>

                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <h5>Tempat Lahir <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="tempat_lahir" class="form-control" required data-validation-required-message="This field is required">
                                </div>
                            </div>
                            <div class="form-group">
                                <h5>Tanggal Lahir <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="date" name="tgl_lahir" class="form-control" required data-validation-required-message="This field is required" placeholder="dd/mm/yyyy" data-validation-regex-regex="([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})">
                                </div>
                            </div>
                            <div class="form-group">
                                <h5>Agama <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <select name="agama" class="form-control" id="" require>
                                        <option value="">Pilihan</option>
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
                                    <textarea name="alamat" id="alamat" class="form-control" required placeholder="Alamat siswa"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <h5>Foto <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="file" name="photo_siswa" class="form-control" value="">
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

                        <?= form_close() ?>

                    </div>
                </div>
            </div>
        </div>
    </div>