<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Data Siswa</h4>
                    <div class="table-responsive m-t-40">

                        <?= $this->session->flashdata('msg') ?>

                        <?php foreach ($tampil_siswa as $row) { ?>

                            <div class="btn-group">
                                <button type="button" class="btn btn-rounded btn-sm btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Prestasi
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="<?= site_url('Walas/prestasi_siswa/' . $row->id_siswa) ?>">Lihat Prestasi</a>
                                    <a class="dropdown-item" href="<?= site_url('Walas/prestasi_tambah/' . $row->id_siswa) ?>">Tambah Prestasi</a>
                                </div>
                            </div>
                            <div class="btn-group">
                                <button type="button" class="btn btn-rounded btn-sm btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Pelanggaran
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="<?= site_url('Walas/pelanggaran_siswa/' . $row->id_siswa) ?>">Siswa Pelanggaran</a>
                                    <!-- <a class="dropdown-item" href="<?= site_url('Walas/pelanggaran_tambah/' . $row->id_siswa) ?>">Tambah Pelanggaran</a> -->
                                </div>
                            </div>
                            <div class="btn-group">
                                <button type="button" class="btn btn-rounded btn-sm btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Edit Siswa
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="<?= site_url('Walas/siswa_edit/' . $row->id_siswa) ?>">Profil Siswa</a>
                                    <a class="dropdown-item" href="<?= site_url('Walas/siswa_photo/' . $row->id_siswa) ?>">Photo Siswa</a>
                                    <a class="dropdown-item" href="<?= site_url('Walas/siswa_password/' . $row->id_siswa) ?>">Password Siswa</a>

                                </div>
                            </div>

                            <!-- <a href="<?= site_url('Walas/siswa_hapus/' . $row->id_siswa) ?>" class="btn btn-rounded btn-sm btn-danger" onclick="return confirm('Apakah yakin ingin menghapus?')">Hapus Siswa</a> -->

                        <?php } ?>

                        <table class="table table-bordered mt-4">

                            <?php foreach ($tampil_siswa as $row) { ?>

                                <tbody>

                                    <tr>
                                        <td>Nama Siswa</td>
                                        <td>: <?= $row->nama_siswa ?></td>
                                    </tr>
                                    <tr>
                                        <td>Jenis Kelamin</td>
                                        <td>: <?= $row->jenis_kelamin ?></td>
                                    </tr>
                                    <tr>
                                        <td>NISN</td>
                                        <td>: <?= $row->nisn ?></td>
                                    </tr>
                                    <tr>
                                        <td>Kelas</td>
                                        <td>: <?= $row->tingkatan . ' ' . $row->jurusan . ' ' . $row->kode_kelas ?></td>
                                    </tr>
                                    <tr>
                                        <td>Tempat Lahir</td>
                                        <td>: <?= $row->tempat_lahir ?></td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal Lahir</td>
                                        <td>: <?= $row->tgl_lahir ?></td>
                                    </tr>
                                    <tr>
                                        <td>Agama</td>
                                        <td>: <?= $row->agama ?></td>
                                    </tr>

                                    <tr>
                                        <td>Alamat</td>
                                        <td>: <?= $row->alamat ?></td>
                                    </tr>
                                    <tr>
                                        <td>Status</td>
                                        <td>: <?= $row->status ?></td>
                                    </tr>
                                    <tr>
                                        <td class="col-4">Foto</td>
                                        <td>:
                                            <img width="100px" src="<?= base_url() ?>assets/photo_siswa/<?= $row->photo_siswa ?>" alt="Photo Siswa Belum Input">
                                        </td>
                                    </tr>
                                </tbody>

                            <?php } ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>