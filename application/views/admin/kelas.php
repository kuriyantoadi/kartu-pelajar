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


                    <a href="<?= base_url() ?>Admin/kelas_tambah" class=" btn btn-rounded btn-sm btn-primary">Tambah</a>
                    <table id="myTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tingkatan</th>
                                <th>Jurusan</th>
                                <th>Kode Kelas</th>
                                <th>Angkatan</th>
                                <th>Pilihan</th>
                            </tr>
                        </thead>
                        <?php
                        $no = 1;
                        foreach ($tampil_kelas as $row) {
                        ?>
                            <tbody>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $row->tingkatan ?></td>
                                    <td><?= $row->jurusan ?></td>
                                    <td><?= $row->kode_kelas ?></td>
                                    <td><?= $row->angkatan ?></td>

                                    <td style="white-space: nowrap;">
                                        <a class="btn btn-sm btn-rounded btn-danger" href="<?= site_url('Admin/kelas_hapus/' . $row->id_kelas) ?>" title="hapus kelas" onclick="return confirm('Anda yakin menghapus data kelas <?= $row->tingkatan . ' ' . $row->jurusan . ' ' . $row->kode_kelas  ?> ?')"><i class="fa fa-times"></i></a>
                                        <a class="btn btn-sm btn-rounded btn-warning" href="<?= site_url('Admin/kelas_edit/' . $row->id_kelas) ?>"> <i class=" fa fa-pencil"></i></a>

                                    </td>
                                </tr>
                            </tbody>
                        <?php } ?>

                    </table>
                </div>
            </div>
        </div>
    </div>