<div class="page-wrapper">
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">Halaman Pelanggaran</h3>
        </div>

        <div>
            <button class="right-side-toggle waves-effect waves-light btn-inverse btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Daftar Pelanggaran Siswa</h4>

                        <?php
                        $no = 1;
                        foreach ($pelanggaran_siswa as $row) {
                        ?>

                            <h5 style="margin-top: 30px;">Pelanggaran ke- <?= $no++ ?></h5>

                            <table class="table table-bordered">

                                <tr>
                                    <td>Nama Siswa</td>
                                    <td><?= $row->nama_siswa ?></td>
                                </tr>
                                <tr>
                                    <td>Kelas</td>
                                    <td><?= $row->tingkatan . ' ' . $row->jurusan . ' ' . $row->kode_kelas ?></td>
                                </tr>
                                <tr>
                                    <td>Nama Point</td>
                                    <td><?= $row->nama_point ?></td>
                                </tr>
                                <tr>
                                    <td>Guru BK</td>
                                    <td><?= $row->nama ?></td>
                                </tr>
                                <tr>
                                    <td>Tanggal Melanggar</td>
                                    <td><?= $row->tgl_kejadian ?></td>
                                </tr>
                                <tr>
                                    <td>Tanggal Input</td>
                                    <td><?= $row->tgl_input ?></td>
                                </tr>
                                <tr>
                                    <td>Tanggal Input</td>
                                    <td><?= $row->tgl_input ?></td>
                                </tr>
                                <tr>
                                    <td class="col-4">Photo Pelanggaran</td>
                                    <td>
                                        <img width="200px" src="<?= base_url() ?>assets/photo_pelanggaran/<?= $row->photo_pelanggaran ?>" alt="Photo">
                                    </td>
                                </tr>
                            </table>
                        <?php } ?>
                        <div class="text-xs-right">
                            <a href="<?= site_url('Admin/siswa_detail/' . $row->id_siswa) ?>" class="btn btn-sm btn-inverse">Kembali</a>
                        </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>