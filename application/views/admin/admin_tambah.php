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
                        <h4 class="card-title ">Form Tambah Admin</h4>

                        <?= form_open('Admin/admin_tambah_up') ?>

                        <form class="m-t-40">
                            <div class="form-group m-t-40">
                                <h5>Nama Admin <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" class="form-control" name="nama" required>
                                </div>
                            </div>
                            <div class="form-group m-t-40">
                                <h5>Username <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" class="form-control" name="username" required>
                                </div>
                            </div>
                            <div class="form-group m-t-40">
                                <h5>Password <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="password" class="form-control" name="password" required>
                                </div>
                            </div>
                            <div class="form-group m-t-40">
                                <h5>Status Akun <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <select name="status" id="" class="form-control" required>
                                        <option value="">Pilihan</option>
                                        <option value="non-aktif">Non Aktif</option>
                                        <option value="guru_bk">Guru BK</option>
                                        <option value="guru_walas">Guru Wali Kelas</option>
                                        <option value="guru_pds">Guru Pembina PDS</option>
                                        <option value="admin">Admin</option>
                                    </select>
                                </div>
                            </div>


                            <div class="text-xs-right">
                                <button type="submit" class="btn btn-sm btn-info">Submit</button>
                                <a href="<?= base_url() ?>Admin/kelas" class="btn btn-sm btn-inverse">Kembali</a>
                            </div>
                        </form>

                        <?= form_close() ?>

                    </div>
                </div>
            </div>
        </div>
    </div>