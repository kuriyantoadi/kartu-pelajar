<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->

    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Data Siswa</h4>
            <div class="table-responsive m-t-40">
                <div class="btn-group">
                    <button type="button" class="btn btn-rounded btn-sm btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Prestasi
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="lihat_prestasi.html">Lihat Prestasi</a>
                        <a class="dropdown-item" href="tambah_prestasi.html">Tambah Prestasi</a>
                    </div>
                </div>
                <div class="btn-group">
                    <button type="button" class="btn btn-rounded btn-sm btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Pelanggaran
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="lihat_pelanggaran.html">Lihat Pelanggaran</a>
                        <a class="dropdown-item" href="tambah_pelanggaran.html">Tambah Pelanggaran</a>
                    </div>
                </div>
                <!-- <a href="../Admin/siswa_edit" class=" btn btn-rounded btn-sm btn-success">Tambah Prestasi</a>
                                <a href="../Admin/siswa_edit" class=" btn btn-rounded btn-sm btn-warning">Tambah Pelanggaran</a> -->
                <a href="../Admin/siswa_edit" class="btn btn-rounded btn-sm btn-primary">Edit Siswa</a>
                <a href="../Admin/siswa_edit" class="btn btn-rounded btn-sm btn-danger" onclick="return confirm('Apakah yakin ingin menghapus?')">Hapus Siswa</a>
                <table class="table table-bordered mt-4">
                    <tbody>
                        <tr>
                            <td class="col-4">Foto</td>
                            <td>:
                                <img src="#" alt="Photo">
                            </td>
                        </tr>
                        <tr>
                            <td>Nama Siswa</td>
                            <td>: Agus Sucipto</td>
                        </tr>
                        <tr>
                            <td>Nisn</td>
                            <td>: 1234567890</td>
                        </tr>
                        <tr>
                            <td>Password</td>
                            <td>: password123</td>
                        </tr>
                        <tr>
                            <td>Tempat Lahir</td>
                            <td>: Serang</td>
                        </tr>
                        <tr>
                            <td>Tanggal Lahir</td>
                            <td>: 06 Oktober 2022</td>
                        </tr>
                        <tr>
                            <td>Agama</td>
                            <td>: Islam</td>
                        </tr>
                        <tr>
                            <td>kompetensi keahlian</td>
                            <td>: Islam</td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>: Alamat</td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td>: ...</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->
</div>
<footer class="footer">
    © 2022 SMK Negeri 1 Kragilan
</footer>
<!-- ============================================================== -->
<!-- End footer -->
<!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Page wrapper  -->
<!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<script src="<?= base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="<?= base_url() ?>assets/plugins/bootstrap/js/popper.min.js"></script>

<script src="<?= base_url() ?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<!-- slimscrollbar scrollbar JavaScript -->
<script src="<?= base_url() ?>jquery.slimscroll.js"></script>
<!--Wave Effects -->
<script src="js/waves.js"></script>
<!--Menu sidebar -->
<script src="js/sidebarmenu.js"></script>
<!--stickey kit -->
<script src="../assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
<script src="../assets/plugins/sparkline/jquery.sparkline.min.js"></script>
<!--Custom JavaScript -->
<script src="js/custom.min.js"></script>
<!-- This is data table -->
<script src="../assets/plugins/datatables/jquery.dataTables.min.js"></script>
<!-- start - This is for export functionality only -->
<!-- <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
            <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
            <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
            <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
            <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
            <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script> -->
<!-- end - This is for export functionality only -->
<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
        $(document).ready(function() {
            var table = $('#example').DataTable({
                "columnDefs": [{
                    "visible": false,
                    "targets": 2
                }],
                "order": [
                    [2, 'asc']
                ],
                "displayLength": 25,
                "drawCallback": function(settings) {
                    var api = this.api();
                    var rows = api.rows({
                        page: 'current'
                    }).nodes();
                    var last = null;
                    api.column(2, {
                        page: 'current'
                    }).data().each(function(group, i) {
                        if (last !== group) {
                            $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                            last = group;
                        }
                    });
                }
            });
            // Order by the grouping
            $('#example tbody').on('click', 'tr.group', function() {
                var currentOrder = table.order()[0];
                if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                    table.order([2, 'desc']).draw();
                } else {
                    table.order([2, 'asc']).draw();
                }
            });
        });
    });
    $('#example23').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
</script>
<!-- ============================================================== -->
<!-- Style switcher -->
<!-- ============================================================== -->
<script src="<?= base_url() ?>assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
</body>

</html>