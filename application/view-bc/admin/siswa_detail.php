<div class="container-fluid">

    <?php
    $no = 1;
    foreach ($tampil_siswa as $row) {
    ?>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Detail Data Siswa</h6>
            </div>
            <div class="card-body">
                <?= $this->session->flashdata('msg') ?>

                <a href="<?= base_url() ?>Admin/siswa/" class="btn btn-danger btn-sm">Kembali</a>
                <a href="<?= base_url() ?>Admin/sertifikat_cetak/<?= $row->id_siswa ?>" class="btn btn-secondary btn-sm">Cetak</a>
                <table style="margin-top: 20px;" class="table table-bordered">
                    <tr>
                        <td width="250px">Nama Siswa :</td>
                        <td> <?= $row->nama_siswa ?></td>
                    </tr>
                    <tr>
                        <td>Kelas :</td>
                        <td><?= $row->kelas ?></td>
                    </tr>
                    <tr>
                        <td>NISN :</td>
                        <td><?= $row->nisn ?></td>
                    </tr>

                    <tr>
                        <td>Kondisi MPLS :</td>
                        <td><?= $row->kondisi_mpls ?></td>
                    </tr>

                </table>
            </div>
        </div>


        <div class="card shadow mb-4">
            <!-- Card Header - Accordion -->
            <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                <h6 class="m-0 font-weight-bold text-primary">Edit Data Siswa</h6>
            </a>
            <!-- Card Content - Collapse -->
            <div class="collapse show" id="collapseCardExample">
                <div class="card-body">
                    <?= form_open('Admin/siswa_edit_up') ?>
                    <table class="table table-bordered">
                        <tr>
                            <td>Nama Siswa :</td>
                            <td>
                                <input type="hidden" name="id_siswa" value="<?= $row->id_siswa ?>">
                                <input type="text" class="form-control" name="nama_siswa" value="<?= $row->nama_siswa ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>Kelas</td>
                            <td>
                                <select name="kelas" id="" class="form-control">
                                    <option value="<?= $row->kelas ?>">Kondisi awal | <?= $row->kelas ?></option>
                                    <option value="X AKL 1">X AKL 1</option>
                                    <option value="X AKL 2">X AKL 2</option>
                                    <option value="X OTKP 1">X OTKP 1</option>
                                    <option value="X OTKP 2">X OTKP 2</option>
                                    <option value="X TKJ 1">X TKJ 1</option>
                                    <option value="X TKJ 2">X TKJ 2</option>
                                    <option value="X RPL 1">X RPL 1</option>
                                    <option value="X RPL 2">X RPL 2</option>
                                    <option value="X TKR 1">X TKR 1</option>
                                    <option value="X TKR 2">X TKR 2</option>
                                    <option value="X TPM 1">X TPM 1</option>
                                    <option value="X TPM 2">X TPM 2</option>
                                    <option value="X TPM 3">X TPM 3</option>
                                    <option value="X TPM 4">X TPM 4</option>


                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>NISN</td>
                            <td><input type="text" class="form-control" name="nisn" value="<?= $row->nisn ?>"></td>
                        </tr>

                        <tr>
                            <td>Kondisi MPLS</td>
                            <td>
                                <select name="kondisi_mpls" id="" class="form-control">
                                    <option value="<?= $row->kondisi_mpls ?>">Kondisi awal | <?= $row->kondisi_mpls ?></option>
                                    <option value="selesai">Selesai</option>
                                    <option value="belum selesai">Belum Selesai</option>
                                </select>
                            </td>
                        </tr>
                    </table>
                    <input style="display: block; margin-left: auto; margin-right: auto;" type="submit" value="simpan" class="btn btn-primary">
                    <?= form_close() ?>
                </div>
            </div>
        </div>


    <?php } ?>
</div>