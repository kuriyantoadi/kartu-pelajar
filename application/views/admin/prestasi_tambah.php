<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Tambah Prestasi <b>Agus Sucipto</b></h4>

                    <form class="m-t-40" novalidate>
                        <div class="form-group">
                            <h5>Nama Kegiatan <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="nama_kegiatan" class="form-control" required data-validation-required-message="This field is required">
                            </div>
                        </div>
                        <div class="form-group">
                            <h5>Tanggal Pelaksanaan <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="date" name="tanggal_pelaksanaan" class="form-control" required data-validation-required-message="This field is required" placeholder="MM/DD/YYYY" data-validation-regex-regex="([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})">
                            </div>
                        </div>
                        <div class="form-group">
                            <h5>Juara <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="juara_ke" class="form-control" required data-validation-required-message="This field is required">
                            </div>
                        </div>
                        <div class="form-group">
                            <h5>Tingkat <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <select name="tingkat" id="tingkat" required class="form-control">
                                    <option value="">Pilih Tingkat</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <h5>Tempat Lomba <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="tempat_lomba" class="form-control" required data-validation-required-message="This field is required">
                            </div>
                        </div>
                        <div class="form-group">
                            <h5>Tim Individual <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="tim_individual" class="form-control" required data-validation-required-message="This field is required">
                            </div>
                        </div>
                        <div class="form-group">
                            <h5>Penyelenggara Acara <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="penyelenggara_acara" class="form-control" required data-validation-required-message="This field is required">
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