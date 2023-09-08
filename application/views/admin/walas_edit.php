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

                        <?= form_open('Admin/walas_edit_up') ?>

                        <form class="m-t-40" novalidate>

                            <?php
                            foreach ($tampil as $row) {
                            ?>
                                <div class="form-group">
                                    <h5>Nama Wali Kelas <span class="text-danger">*</span></h5>
                                    <input type="hidden" name="id_walas" value="<?= $row->id_walas ?>">

                                    <div class="controls">
                                        <select class="form-control" name="id_admin" id="">
                                            <option value="<?= $row->id_admin ?>">Pilihan Awal ( <?= $row->nama ?> )</option>
                                            <?php
                                            foreach ($tampil_walas as $row_walas) {
                                            ?>
                                                <option value="<?= $row_walas->id_admin ?>"> <?= $row_walas->nama ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <h5>Kelas <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select class="form-control" name="id_kelas" id="">

                                            <option value="<?= $row->id_kelas ?>">Pilihan Awal ( <?= $row->tingkatan . ' ' . $row->jurusan . ' ' . $row->kode_kelas ?> )</option>
                                            <?php
                                            foreach ($tampil_kelas as $row_kelas) {
                                            ?>
                                                <option value="<?= $row_kelas->id_kelas ?>"> <?= $row_kelas->tingkatan . ' ' . $row_kelas->jurusan . ' ' . $row_kelas->kode_kelas ?></option>
                                            <?php } ?>
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
    </div>