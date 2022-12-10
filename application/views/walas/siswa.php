<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Data Siswa</h4>
            <div class="table-responsive m-t-40">

                <?= $this->session->flashdata('msg') ?>

                <table id="myTable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Siswa</th>
                            <th>Kelas</th>
                            <th>Pilihan</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($tampil_siswa as $row) {
                        ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $row->nama_siswa ?></td>
                                <td><?= $row->tingkatan . ' ' . $row->jurusan . ' ' . $row->kode_kelas ?></td>
                                <td style="white-space: nowrap;">
                                    <a class="btn btn-sm btn-rounded btn-danger" href="<?= base_url() ?>Walas/password/<?= $row->id_siswa ?>" title="siswa detail"><i class="fa fa-key"></i></a>
                                    <a class="btn btn-sm btn-rounded btn-info" href="<?= base_url() ?>Walas/siswa_detail/<?= $row->id_siswa ?>" title="siswa detail"><i class="fa fa-eye"></i></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>