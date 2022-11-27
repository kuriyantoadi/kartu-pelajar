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
                        <h4 class="card-title">Detail Pelanggaran </h4>

                        <?php
                        foreach ($pelanggaran_detail as $row) {
                        ?>

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
                                    <td class="col-4">Photo Pelanggaran</td>
                                    <td>:
                                        <img width="200px" src="<?= base_url() ?>assets/photo_pelanggaran/<?= $row->photo_pelanggaran ?>" alt="Photo">
                                    </td>
                                </tr>
                            </table>

                            <div class="text-xs-right">
                                <a href="<?= site_url('Admin/pelanggaran_edit/' . $row->id_pelanggaran) ?>" class="btn btn-sm btn-info">Edit</a>
                                <a href="<?= base_url() ?>Admin/pelanggaran" class="btn btn-sm btn-inverse">Kembali</a>
                            </div>
                        <?php } ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>