<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Data Prestasi</h4>
            <div class="table-responsive m-t-40">

                <?= $this->session->flashdata('msg') ?>

                <table id="myTable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Siswa</th>
                            <th>Nama Kegiatan</th>
                            <th>Juara Ke</th>
                            <th>Pilihan</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($prestasi_tampil as $row) {
                        ?>
                            <tr>

                                <td><?= $no++ ?></td>
                                <td><?= $row->nama_siswa ?></td>
                                <td><?= $row->nama_kegiatan ?></td>
                                <td><?= $row->juara_ke ?></td>
                                <td style="white-space: nowrap;">
                                    <a class="btn btn-sm btn-rounded btn-danger" href="<?= base_url() ?>Walas/prestasi_hapus/<?= $row->id_prestasi ?>" onclick="return confirm('Anda yakin menghapus data prestasi  ?')"><i class="fa fa-times"></i></a>
                                    <a class="btn btn-sm btn-rounded btn-warning" href="<?= site_url('Walas/prestasi_edit/' . $row->id_prestasi); ?>"><i class="fa fa-pencil"></i></a>
                                    <a class="btn btn-sm btn-rounded btn-info" href="<?= base_url() ?>Walas/prestasi_detail/<?= $row->id_prestasi ?>" title="Prestasi detail"><i class="fa fa-eye"></i></a>
                                </td>

                            </tr>
                        <?php } ?>
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div>