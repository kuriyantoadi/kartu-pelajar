<div class="page-wrapper">
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">Halaman Pelanggaran</h3>
        </div>

        <div>
            <button class="right-side-toggle waves-effect waves-light btn-inverse btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Tambah Pelanggaran <b>Agus Sucipto</b></h4>
                        <form class="m-t-40" novalidate>
                            <div class="form-group">
                                <h5>Pelanggaran<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <select name="nama_pelanggaran" id="nama_pelanggaran" required class="form-control">
                                        <option value="">Pilih Pelanggaran</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <h5>Tanggal Melanggar <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="date" name="tgl_lahir" class="form-control" required data-validation-required-message="This field is required" placeholder="MM/DD/YYYY" data-validation-regex-regex="([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})">
                                </div>
                            </div>

                            <div class="text-xs-right">
                                <button type="submit" class="btn btn-sm btn-info">Submit</button>
                                <button type="reset" class="btn btn-sm btn-inverse">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>