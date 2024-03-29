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

                        <h4 class="card-title">Edit Prestasi </h4>

                        <?php foreach ($tampil_prestasi_detail as $row) { ?>
                            <?= form_open_multipart('Guru/prestasi_edit_up') ?>

                            <form class="m-t-40" novalidate>
                                <div class="form-group">
                                    <h5>Nama Siswa <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="hidden" name="id_prestasi" value="<?= $row->id_prestasi ?>">
                                        <input type="text" name="nama_siswa" class="form-control" value="<?= $row->nama_siswa ?>" required data-validation-required-message="This field is required" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Nama Kegiatan <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="nama_kegiatan" value="<?= $row->nama_kegiatan ?>" class=" form-control" required data-validation-required-message="This field is required">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Tanggal Pelaksanaan <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="date" name="tanggal_pelaksanaan" value="<?= date('Y-m-d', strtotime($row->tanggal_pelaksanaan)) ?>" class="form-control" required data-validation-required-message="This field is required" placeholder="MM/DD/YYYY" data-validation-regex-regex="([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Juara ke<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select class="form-control" name="juara_ke" id="" require>
                                            <option value="<?= $row->juara_ke ?>">Pilihan ( <?= $row->juara_ke ?> )</option>
                                            <option value="Juara 1">Juara 1</option>
                                            <option value="Juara 2">Juara 2</option>
                                            <option value="Juara 3">Juara 3</option>
                                            <option value="Juara Harapan 1">Juara Harapan 1</option>
                                            <option value="Juara Harapan 2">Juara Harapan 2</option>
                                            <option value="Juara Harapan 3">Juara Harapan 3</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Tingkat <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="tingkat" id="tingkat" required class="form-control">
                                            <option value="<?= $row->tingkat ?>">Pilihan ( <?= $row->tingkat ?> )</option>
                                            <option value="Kabupaten">kabupaten/Kota</option>
                                            <option value="Provinsi">Provinsi</option>
                                            <option value="Nasional">Nasional</option>
                                            <option value="Internasional">Internasional</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Tempat Lomba <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="tempat_lomba" value="<?= $row->tempat_lomba ?>" class="form-control" required data-validation-required-message="This field is required">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <h5>Tim/Individu <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="tim_individu" class="form-control" id="" require>
                                            <option value="<?= $row->tim_individu ?>">Pilihan ( <?= $row->tim_individu ?> )</option>
                                            <option value="">Pilihan</option>
                                            <option value="Tim">Tim</option>
                                            <option value="Individu">Individu</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Penyelenggara Acara <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="penyelenggara_acara" value="<?= $row->penyelenggara_acara ?>" class="form-control" required data-validation-required-message="This field is required">
                                    </div>
                                </div>

                                <!-- <div class="form-group">
                                    <h5>Foto <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="file" name="photo_prestasi" class="form-control" value="" required>
                                    </div>
                                </div> -->

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