<div class="page-wrapper">
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">Halaman Pelanggaran</h3>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit Pelanggaran </h4>

                        <?=
                        form_open('Pembina_pds/pelanggaran_edit_up');
                        foreach ($pelanggaran_edit as $row) {
                        ?>
                            <form class="m-t-40" novalidate>
                                <div class="form-group">
                                    <h5>Nama Siswa <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="hidden" name="id_pelanggaran" value="<?= $row->id_pelanggaran ?>" require>
                                        <input type="text" name="nama_siswa" value="<?= $row->nama_siswa ?>" class="form-control" required data-validation-required-message="This field is required" disabled>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <h5>Kelas <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="hidden" name="id_kelas" value="<?= $row->id_kelas ?>">
                                        <?php
                                        foreach ($tampil_kelas as $row_kelas) {
                                        ?>
                                            <input type=" text" value="<?= $row->tingkatan . ' ' . $row->jurusan . ' ' . $row->kode_kelas ?>" class="form-control" disabled>
                                        <?php } ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <h5>Nama Point Pelanggaran<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="id_point" id="id_point" required class="form-control">
                                            <option value="<?= $row->id_point ?>">Pilihan Awal ( <?= $row->nama_point ?> )</option>
                                            <?php foreach ($tampil_point as $row_point) { ?>
                                                <option value="<?= $row_point->id_point ?>"> <?= $row_point->nama_point ?> ( <?= $row_point->jml_point ?> Point) </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <h5>Tanggal Melanggar <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="date" value="<?= date('Y-m-d', strtotime($row->tgl_kejadian)) ?>" name="tgl_kejadian" class="form-control" required data-validation-required-message="This field is required" placeholder="MM/DD/YYYY" data-validation-regex-regex="([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})">
                                    </div>
                                </div>

                                <div class="text-xs-right">
                                    <button type="submit" class="btn btn-sm btn-info">Submit</button>
                                    <a href="<?php site_url('Guru_bk/pelanggaraan') ?> " class="btn btn-sm btn-inverse">Cancel</a>
                                </div>
                                <?= form_close() ?>
                            <?php } ?>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>