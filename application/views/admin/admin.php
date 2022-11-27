<div class="page-wrapper">
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">Halaman Admin</h3>
        </div>
        <div>
            <button class="right-side-toggle waves-effect waves-light btn-inverse btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
        </div>
    </div>
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Data Admin</h4>
                <div class="table-responsive m-t-40">

                    <?= $this->session->flashdata('msg') ?>

                    <a href="<?= site_url('Admin/admin_tambah'); ?>" class="btn btn-primary btn-sm">Tambah</a>

                    <table id="myTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Admin</th>
                                <th>Username</th>
                                <th>Status Akun</th>
                                <th>Pilihan</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($tampil as $row) {
                            ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $row->nama ?></td>
                                    <td><?= $row->username ?></td>
                                    <td><?= $row->status_akun ?></td>
                                    <td>
                                        <a class="btn btn-sm btn-rounded btn-danger" href="<?= base_url() ?>Admin/admin_hapus/<?= $row->id_admin ?>" onclick="return confirm('Anda yakin menghapus data Admin <?= $row->nama ?> ?')"><i class="fa fa-times"></i></a>
                                        <!-- <a class="btn btn-sm btn-rounded btn-warning" href="<?= site_url('Admin/admin_edit/' . $row->id_admin); ?>"><i class="fa fa-pencil"></i></a> -->
                                        <a class="btn btn-sm btn-rounded btn-warning" href="<?= base_url(); ?>Admin/admin_edit/<?= $row->id_admin ?>"><i class="fa fa-pencil"></i></a>

                                        <a class="btn btn-sm btn-rounded btn-info" href="<?= base_url() ?>Admin/admin_password/<?= $row->id_admin ?>" title="Ganti Password"><i class="fa fa-key"></i></a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>