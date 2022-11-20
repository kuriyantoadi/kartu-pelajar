<footer class="footer">
                © 2022 SMK Negeri 1 Kragilan
            </footer>
        </div>
    </div>
<script src="<?= base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/bootstrap/js/popper.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="<?= base_url() ?>assets/js/jquery.slimscroll.js"></script>
<script src="<?= base_url() ?>assets/js/waves.js"></script>
<script src="<?= base_url() ?>assets/js/sidebarmenu.js"></script>
<script src="<?= base_url() ?>assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/sparkline/jquery.sparkline.min.js"></script>
<script src="<?= base_url() ?>assets/js/custom.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
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
</body>

</html>