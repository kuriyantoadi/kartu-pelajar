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
                <div class="table-responsive m-t-10">
                    <table class="table table-bordered mt-4">

                        <?= form_open('Admin/profil_edit_up') ?>
                        <?php foreach ($tampil as $row) { ?>

                            <tbody>
                                <tr>
                                    <td>Nama Admin</td>
                                    <td>
                                        <input type="hidden" name="id_admin" value="<?= $row->id_admin ?>">
                                        <input class="form-control" type="text" name="nama" value="<?= $row->nama ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Username</td>
                                    <td><input class="form-control" type="text" name="username" value="<?= $row->username ?>"></td>
                                </tr>


                            </tbody>

                        <?php } ?>


                    </table>

                    <div style="text-align:center">
                        <input type="submit" class="btn btn-sm btn-info btn-rounded"></input>
                    </div>
                    <?= form_close() ?>

                </div>
            </div>
        </div>


        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
    </div>