

<div class="page-wrapper">
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">Halaman Admin</h3>
        </div>
    </div>
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Data Siswa</h4>
                <div class="table-responsive m-t-40">

                    <?= $this->session->flashdata('msg') ?>

                    <a href="<?= base_url() ?>Admin/siswa_tambah" class=" btn btn-rounded btn-sm btn-primary">Tambah</a>
                    
                    <table id="tableMahasiswa" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Siswa</th>
                                <th>Kelas</th>
                                <th>Pilihan</th>
                            </tr>
                        </thead>
                        
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        //setting datatables
        $('#tableMahasiswa').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.24/i18n/Indonesian.json"
            },
            "processing": true,
            "serverSide": true,
            "order": [],
            "ajax": {
                //panggil method ajax list dengan ajax
                "url": "<?= site_url('admin/get_ajax') ?>",
                "type": "POST"
            }
        });
    </script>