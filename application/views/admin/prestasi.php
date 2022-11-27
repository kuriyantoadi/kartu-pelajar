<div class="page-wrapper">
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">Halaman Prestasi</h3>
        </div>
        <div>
            <button class="right-side-toggle waves-effect waves-light btn-inverse btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
        </div>
    </div>
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
                        <?php
                        $no = 1;
                        foreach ($prestasi_tampil as $row) {
                        ?>
                            <tbody>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $row->nama_siswa ?></td>
                                    <td><?= $row->nama_kegiatan ?></td>
                                    <td><?= $row->juara_ke ?></td>
                                    <td>
                                        <a href="<?= site_url('Admin/prestasi_detail/' . $row->id_prestasi); ?>" data-toggle="tooltip" data-original-title="Lihat"><i class="fa fa-eye text-inverse m-r-10"></i> </a>
                                        <a href="<?= site_url('Admin/prestasi_edit/' . $row->id_prestasi); ?>" data-toggle="tooltip" data-original-title="Edit"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>
                                        <a href="<?= site_url('Admin/prestasi_hapus/' . $row->id_prestasi); ?>" data-toggle="tooltip" data-original-title="Hapus" onclick="return confirm('Apakah yakin ingin menghapus data prestasi ini?')"> <i class="fa fa-close text-danger"></i> </a>
                                    </td>
                                </tr>
                            </tbody>
                        <?php } ?>
                    </table>
                </div>
            </div>
        </div>
    </div>