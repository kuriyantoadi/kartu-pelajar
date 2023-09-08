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
                        <h4 class="card-title ">Form Tambah Point</h4>

                        <?= form_open('Guru/point_tambah_up') ?>

                        <form class="m-t-40" novalidate>
                            <div class="form-group m-t-40">
                                <h5>Nama Point <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" class="form-control" name="nama_point" required>
                                </div>
                            </div>

                            <div class="form-group m-t-20">
                                <h5>Jumlah Point Point <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="number" class="form-control" name="jml_point" required>
                                </div>
                            </div>

                            <div class="text-xs-right">
                                <button type="submit" class="btn btn-sm btn-info">Submit</button>
                                <a href="<?= base_url() ?>Guru/point" class="btn btn-sm btn-inverse">Kembali</a>
                            </div>
                        </form>

                        <?= form_close() ?>

                    </div>
                </div>
            </div>
        </div>
    </div>