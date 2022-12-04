<div class="page-wrapper">
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">Halaman Admin</h3>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title ">Form Edit Admin</h4>

                        <?=
                        form_open('Admin/admin_edit_up');
                        foreach ($tampil as $row) {
                        ?>

                            <form class="m-t-40" novalidate>
                                <div class="form-group m-t-40">
                                    <h5>Nama Admin <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="hidden" name="id_admin" value="<?= $row->id_admin ?>">
                                        <input type="text" class="form-control" name="nama" value="<?= $row->nama ?>" required>
                                    </div>
                                </div>
                                <div class="form-group m-t-40">
                                    <h5>Username <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" class="form-control" name="username" value="<?= $row->username ?>" required>
                                    </div>
                                </div>

                                <div class="form-group m-t-40">
                                    <h5>Status Akun <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="status" id="" class="form-control" required>
                                            <option value="<?= $row->status ?>">Pilihan ( <?= $row->status ?> )</option>
                                            <option value="admin">Non Aktif</option>
                                            <option value="guru_bk">Guru BK</option>
                                            <option value="guru_walas">Guru Wali Kelas</option>
                                            <option value="guru_pds">Guru Pembina PDS</option>
                                            <option value="admin">Guru Super Admin</option>

                                        </select>
                                    </div>
                                </div>


                                <div class="text-xs-right">
                                    <button type="submit" class="btn btn-sm btn-info">Submit</button>
                                    <a href="<?= base_url() ?>Admin/kelas" class="btn btn-sm btn-inverse">Kembali</a>
                                </div>
                            </form>

                        <?php } ?>
                        <?= form_close() ?>

                    </div>
                </div>
            </div>
        </div>
    </div>