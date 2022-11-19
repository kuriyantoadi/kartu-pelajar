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
                        <h4 class="card-title ">Form Edit Point</h4>

                        <?= form_open('Admin/point_edit_up') ?>
                        <?php foreach ($tampil_point as $row) {   ?>

                            <form class="m-t-40" novalidate>
                                <div class="form-group m-t-40">
                                    <h5>Nama Point <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="hidden" name="id_point" value="<?= $row->id_point ?>">
                                        <input type="text" class="form-control" name="nama_point" value="<?= $row->nama_point ?>" require>
                                    </div>
                                </div>

                                <div class="form-group m-t-20">
                                    <h5>Jumlah Point <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="number" class="form-control" value="<?= $row->jml_point ?>" name="jml_point" require>
                                    </div>
                                </div>

                                <div class="text-xs-right">
                                    <button type="submit" class="btn btn-sm btn-info">Submit</button>
                                    <a href="<?= base_url() ?>Admin/kelas" class="btn btn-sm btn-inverse">Kembali</a>
                                </div>
                            </form>

                            <?= form_close() ?>
                        <?php } ?>

                    </div>
                </div>
            </div>
        </div>

        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
    </div>