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
                        <h4 class="card-title ">Form Edit Kelas</h4>

                        <?php
                        echo form_open('Admin/kelas_edit_up');
                        foreach ($kelas_edit as $row) {
                        ?>

                            <form class="m-t-40" novalidate>
                                <div class="form-group m-t-40">
                                    <h5>Tingkatan <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="hidden" name="id_kelas" value="<?= $row->id_kelas ?>">
                                        <select name="tingkatan" class="form-control" id="">
                                            <?php foreach ($kelas_edit as $row) { ?>
                                                <option value="<?= $row->tingkatan ?>">Pilihan ( <?= $row->tingkatan ?> )</option>
                                            <?php } ?>

                                            <option value="X">X</option>
                                            <option value="XI">XI</option>
                                            <option value="XII">XII</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Jurusan <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="jurusan" class="form-control" id="">
                                            <?php foreach ($kelas_edit as $row) { ?>
                                                <option value="<?= $row->jurusan ?>">Pilihan ( <?= $row->jurusan ?> )</option>
                                            <?php } ?>

                                            <option value="Teknik Mesin">Teknik Mesin</option>
                                            <option value="Teknik Otomotif">Teknik Otomotif</option>
                                            <option value="Teknik Jaringan Komputer dan Telekomunikasi">Teknik Jaringan Komputer dan Telekomunikasi</option>
                                            <option value="Pengembangan Perangkat Lunak dan Gim">Pengembangan Perangkat Lunak dan Gim</option>
                                            <option value="Manajemen Perkantoran dan Layanan Bisnis">Manajemen Perkantoran dan Layanan Bisnis</option>
                                            <option value="Akuntansi dan Keuangan Lembaga">Akuntansi dan Keuangan Lembaga</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Kode Kelas <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="kode_kelas" class="form-control" id="">
                                            <?php foreach ($kelas_edit as $row) { ?>
                                                <option value="<?= $row->kode_kelas ?>">Pilihan ( <?= $row->kode_kelas ?> )</option>
                                            <?php } ?>

                                            <?php for ($i = 1; $i < 6; $i++) { ?>
                                                <option value="<?= $i ?>"><?= $i ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <h5>Angkatan <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="angkatan" class="form-control" id="">

                                            <?php foreach ($kelas_edit as $row) { ?>
                                                <option value="<?= $row->angkatan ?>">Pilihan ( <?= $row->angkatan ?> )</option>
                                            <?php } ?>

                                            <?php for ($i = 2020; $i < 2030; $i++) { ?>
                                                <option value="<?= $i ?>"><?= $i ?></option>
                                            <?php } ?>

                                        </select>
                                    </div>
                                </div>

                                <div class="text-xs-right">
                                    <button type="submit" class="btn btn-sm btn-info">Submit</button>
                                    <a href="<?= base_url() ?>Admin/kelas" class="btn btn-sm btn-inverse">Kembali</a>
                                </div>
                            </form>

                        <?php } ?>
                        <?= form_close() ?>

                    </div>
                </div>
            </div>
        </div>
    </div>