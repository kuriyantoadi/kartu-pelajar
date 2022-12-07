<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Form Photo Siswa</h4>

                    <?=
                    form_open_multipart('Walas/siswa_photo_up');
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
                                    <input type="text" value="<?= $row->tingkatan . ' ' . $row->jurusan . ' ' . $row->kode_kelas ?>" class="form-control" disabled>
                                </div>
                            </div>

                            <div class=" form-group">
                                <h5>Foto <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <!-- <input type="hidden" name="photo_siswa" value="<?= $row->photo_siswa ?>"> -->
                                    <?php
                                    $photo_siswa = $row->photo_siswa;
                                    if ($row->photo_siswa == "") {
                                    ?>
                                        <input type="file" name="photo_siswa" class="form-control" value="" required>
                                    <?php } else { ?>
                                        <a href="<?= base_url() ?>Walas/siswa_hapus_photo/<?= $row->id_siswa ?>/<?= $row->photo_siswa ?>" class="btn btn-danger btn-sm" style="margin-bottom: 15px;" onclick="return confirm('Apakah yakin ingin menghapus photo ini?')">Hapus Photo</a><br>
                                        <img width="200px" src="<?= base_url() ?>assets/photo_siswa/<?= $row->photo_siswa ?>" alt="Photo">
                                    <?php } ?>
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