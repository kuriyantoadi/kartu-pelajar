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
                        <h4 class="card-title">Form Tambah Wali Kelas</h4>

                        <?= form_open('Admin/walas_tambah_up') ?>

                        <form class="m-t-40" novalidate>

                            <div class="form-group">
                                <h5>Nama Wali Kelas <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <select class="form-control" name="id_admin" id="">
                                        <?php
                                        foreach ($tampil_walas as $row) {
                                        ?>
                                            <option value="<?= $row->id_admin ?>"> <?= $row->nama ?></option>
                                        <?php } ?>
                                    </select>
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