<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">Halaman Admin</h3>
        </div>

        <div>
            <button class="right-side-toggle waves-effect waves-light btn-inverse btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->

        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Data Siswa</h4>
                <div class="table-responsive m-t-40">

                    <?= $this->session->flashdata('msg') ?>


                    <a href="<?= base_url() ?>Admin/point_tambah" class=" btn btn-rounded btn-sm btn-primary">Tambah</a>
                    <table id="myTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Point</th>
                                <th>Jumlah Point</th>
                                <th>Pilihan</th>
                            </tr>
                        </thead>
                        <?php
                        $no = 1;
                        foreach ($tampil_point as $row) {
                        ?>
                            <tbody>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $row->nama_point ?></td>
                                    <td><?= $row->jml_point ?></td>
                                    <td>
                                        <a class="btn btn-sm btn-rounded btn-danger" href="<?= base_url() ?>Admin/point_hapus/<?= $row->id_point ?>" onclick="return confirm('Anda yakin menghapus data siswa <?= $row->nama_point ?> ?')"><i class="fa fa-times"></i></a>
                                        <a class="btn btn-sm btn-rounded btn-warning" href="<?= site_url('Admin/point_edit/' . $row->id_point); ?>"><i class="fa fa-pencil"></i></a>

                                    </td>
                                </tr>
                            </tbody>
                        <?php } ?>

                    </table>
                </div>
            </div>
        </div>


        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
    </div>