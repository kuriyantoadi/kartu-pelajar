<div class="page-wrapper">
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">Halaman Admin</h3>
        </div>
    </div>
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Data Kelas</h4>
                <div class="table-responsive m-t-40">

                    <?= $this->session->flashdata('msg') ?>


                    <!-- <a href="<?= base_url() ?>Admin/kelas_tambah" class=" btn btn-rounded btn-sm btn-primary">Tambah</a> -->
                    <table id="myTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kelas</th>
                                <th>Pilihan</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($tampil_kelas as $row) {
                            ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $row->tingkatan ?> <?= $row->kode_jurusan ?> <?= $row->kode_kelas ?></td>

                                    <td style="white-space: nowrap;">
                                        <a class="btn btn-sm btn-rounded btn-primary" href="<?= site_url('Guru/kelas_siswa/' . $row->id_kelas) ?>"> <i class=" fa fa-eye"></i></a>

                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>


                    </table>
                </div>
            </div>
        </div>
    </div>