<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Data Point Siswa</h4>
                    <div class="table-responsive m-t-30">

                        <?= $this->session->flashdata('msg') ?>

                        <table class="table table-bordered mt-3">

                            <?php foreach ($tampil as $row) { ?>

                                <tbody>
                                    <tr>
                                        <td>Total Point</td>
                                        <td>
                                            <?php if ($total_point->total_point == NULL) {  ?>

                                                <button class="btn btn-sm btn-success btn-rounded">Tidak memiliki point</button>
                                            <?php } else { ?>
                                                <a href="<?= site_url('Siswa/pelanggaran/') ?>" class="btn btn-sm btn-danger btn-rounded"><?= $total_point->total_point ?> Point</a>

                                            <?php } ?>
                                        </td>
                                    </tr>
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