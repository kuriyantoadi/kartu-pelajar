<div class="page-wrapper">
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">Halaman Admin</h3>
        </div>
    </div>
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Data Pelanggaran</h4>
                <div class="table-responsive m-t-40">

                    <?= $this->session->flashdata('msg') ?>

                    <!-- <a href="<?= base_url() ?>Admin/pelanggaran_tambah" class="btn btn-rounded btn-sm btn-primary">Tambah</a> -->
                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">

                    <!-- <table id="myTable" class="table table-bordered table-striped"> -->
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Siswa</th>
                                <th>Kelas</th>
                                <th>Pelanggaran</th>
                                <th>Pilihan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($tampil_pelanggaran as $row) {
                            ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $row->nama_siswa ?></td>
                                    <td><?= $row->tingkatan . ' ' . $row->kode_jurusan . ' ' . $row->kode_kelas ?></td>
                                    <td><?= $row->nama_point ?></td>
                                    <td style="white-space: nowrap;">
                                        <a class="btn btn-sm btn-rounded btn-danger" href="<?= site_url('Admin/pelanggaran_hapus/' . $row->id_pelanggaran) ?>" onclick="return confirm('Anda yakin menghapus siswa <?= $row->nama_siswa ?> dengan pelanggaran <?= $row->nama_point ?> ?')"><i class="fa fa-times"></i></a>
                                        <a class="btn btn-sm btn-rounded btn-warning" href="<?= site_url('Admin/pelanggaran_edit/' . $row->id_pelanggaran) ?>"><i class="fa fa-pencil"></i></a>
                                        <a class="btn btn-sm btn-rounded btn-info" href="<?= base_url() ?>Admin/pelanggaran_detail/<?= $row->id_pelanggaran ?>"><i class="fa fa-eye"></i></a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>