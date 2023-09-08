<div class="page-wrapper">
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">Halaman Admin</h3>
        </div>
    </div>

    <div class="container-fluid">

        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Profil Admin</h4>
                <div class="table-responsive m-t-30">


                    <table class="table table-bordered mt-4">

                        <?= $this->session->flashdata('msg') ?>

                        <?php foreach ($tampil as $row) { ?>

                            <tbody>
                                <tr>
                                    <td>Nama Admin</td>
                                    <td>: <?= $row->nama ?></td>
                                </tr>
                                <tr>
                                    <td>Username</td>
                                    <td>: <?= $row->username ?></td>
                                </tr>
                                <tr>
                                    <td>Status</td>
                                    <td>: <?= $row->status ?></td>
                                </tr>

                            </tbody>

                        <?php } ?>
                    </table>

                    <div style="text-align:center">
                        <a href="<?= site_url('Admin/profil_edit/' . $row->id_admin) ?>" class="btn btn-sm btn-warning btn-rounded">Edit Profil</a>
                    </div>

                </div>
            </div>
        </div>


        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
    </div>