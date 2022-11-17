<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Prestasi </h4>
            <div class="table-responsive m-t-40">
                <table id="myTable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Prestasi</th>
                            <th>Juara</th>
                            <th>Tanggal</th>
                            <th>Pilihan</th>
                        </tr>
                    </thead>

                    <?php
                    $no = 1;
                    foreach ($tampil_prestasi as $row) {
                    ?>
                        <tbody>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $row->nama_kegiatan ?></td>
                                <td><?= $row->juara_ke ?></td>
                                <td><?= $row->tanggal_pelaksanaan ?></td>
                                <td>
                                    <a href="#" data-toggle="tooltip" data-original-title="Lihat"><i class="fa fa-eye text-inverse m-r-10"></i> </a>
                                </td>
                            </tr>
                        </tbody>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
</div>