    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Data Siswa MPLS</h1>
        <!-- <h4 class="h3 mb-4 text-gray-800">Sistem Download Sertifikat MPLS SMK Negeri 1 Kragilan 2022</h4> -->

        <table class="table table-bordered" id="tabel_js">
            <thead>
                <tr>
                    <th>
                        <center>No
                    </th>
                    <th>
                        <center>Nama
                    </th>
                    <th>
                        <center>Kelas
                    </th>
                    <th>
                        <center>Kondisi MPLS
                    </th>
                    <th>
                        <center>Pilihan
                    </th>
                </tr>
            </thead>
            <?php
            $no = 1;
            foreach ($tampil_siswa as $row) {
            ?>
                <tbody>
                    <tr>
                        <td>
                            <center><?= $no++ ?>
                        </td>
                        <td>
                            <center><?= $row->nama_siswa ?>
                        </td>
                        <td>
                            <center><?= $row->kelas ?>
                        </td>
                        <td>
                            <center>
                                <?php if ($row->kondisi_mpls == "selesai") { ?>
                                    <btn href="#" class="badge badge-success">Selesai</btn>
                                <?php } else { ?>
                                    <btn href="#" class="badge badge-danger">Tidak Selesai</btn>
                                <?php } ?>
                        </td>
                        <td align="center">
                            <a href="<?= base_url() ?>Admin/siswa_detail/<?= $row->id_siswa ?>" class="btn btn-primary btn-sm">Detail</a>
                            <a href="<?= base_url() ?>Admin/sertifikat_cetak/<?= $row->id_siswa ?>" class="btn btn-secondary btn-sm">Cetak</a>
                        </td>
                    </tr>
                </tbody>
            <?php } ?>
        </table>

    </div>
    <!-- /.container-fluid -->