<div class="page-wrapper">
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">Halaman PDS</h3>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Data Siswa</h4>
                        <div class="table-responsive m-t-40">

                            <?= $this->session->flashdata('msg') ?>

                            <?php foreach ($tampil_siswa as $row) { ?>

                                <a href="<?= site_url('Pembina_pds/pelanggaran_siswa/' . $row->id_siswa) ?>" class="btn btn-warning btn-sm rounded">Riwayat Pelanggaran</a>
                                <a href="<?= site_url('Pembina_pds/pelanggaran_tambah/' . $row->id_siswa) ?>" class="btn btn-danger btn-sm rounded">Tambah Pelanggaran</a>
                                    

                            <?php } ?>

                            <table class="table table-bordered mt-4">

                                <?php foreach ($tampil_siswa as $row) { ?>

                                    <tbody>

                                        <tr>
                                            <td>Nama Siswa</td>
                                            <td>: <?= $row->nama_siswa ?></td>
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
                                                <img width="100px" src="<?= base_url() ?>assets/photo_siswa/<?= $row->photo_siswa ?>" alt="Photo">
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