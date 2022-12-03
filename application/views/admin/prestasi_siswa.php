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
                        <h4 class="card-title">Daftar Prestasi Siswa</h4>

                        <?php
                        $no = 1;
                        foreach ($tampil_prestasi as $row) {
                        ?>

                            <h5 style="margin-top: 30px;">Prestasi ke- <?= $no++ ?></h5>

                            <table class="table table-bordered">

                                <tr>
                                    <td>Nama Siswa</td>
                                    <td><?= $row->nama_siswa ?></td>
                                </tr>

                                <tr>
                                    <td>Tanggal Pelaksanaan</td>
                                    <td><?= $row->tanggal_pelaksanaan ?></td>
                                </tr>
                                <tr>
                                    <td>Nama Kegiatan</td>
                                    <td><?= $row->nama_kegiatan ?></td>
                                </tr>
                                <tr>
                                    <td>Juara ke</td>
                                    <td><?= $row->juara_ke ?></td>
                                </tr>
                                <tr>
                                    <td>Tingkat</td>
                                    <td><?= $row->tingkat ?></td>
                                </tr>
                                <tr>
                                    <td>Tempat Lomba</td>
                                    <td><?= $row->tempat_lomba ?></td>
                                </tr>
                                <tr>
                                    <td>Tim/Individu</td>
                                    <td><?= $row->tim_individu ?></td>
                                </tr>

                                <tr>
                                    <td>Penyelenggara Acara </td>
                                    <td><?= $row->penyelenggara_acara  ?></td>
                                </tr>
                                <tr>
                                    <td class="col-4">Photo Prestasi</td>
                                    <td>
                                        <img width="200px" src="<?= base_url() ?>assets/photo_prestasi/<?= $row->photo_prestasi ?>" alt="Photo">
                                    </td>
                                </tr>
                            </table>
                        <?php } ?>
                        <div class="text-xs-right">
                            <!-- <a href="<?= site_url('Admin/siswa_detail/' . $row->id_siswa) ?>" class="btn btn-sm btn-inverse">Kembali</a> -->
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>