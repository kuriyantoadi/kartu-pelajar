<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Data Pelanggaran Siswa </h4>
            <div class="table-responsive m-t-30">
                <table id="myTable" class="table table-bordered table-striped">

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
                                <td><?= $row->tingkatan . ' ' . $row->jurusan . ' ' . $row->kode_kelas ?></td>
                                <td><?= $row->nama_point ?></td>
                                <td style="white-space: nowrap;">
                                    <a class="btn btn-sm btn-rounded btn-info" href="<?= base_url() ?>Siswa/pelanggaran_detail/<?= $row->id_pelanggaran ?>"><i class="fa fa-eye"></i></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div>