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
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Data Siswa</h4>
                        <div class="table-responsive m-t-40">
                            <table class="table table-bordered mt-4">

                                <?php foreach ($tampil_siswa as $row) { ?>

                                    <tbody>
                                        <tr>
                                            <td class="col-4">Foto</td>
                                            <td>:
                                                <img width="100px" src="<?= base_url() ?>assets/photo_siswa/<?= $row->photo_siswa ?>" alt="Photo">
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
                                    </tbody>

                                <?php } ?>
                            </table>
                        </div>


                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
    </div>