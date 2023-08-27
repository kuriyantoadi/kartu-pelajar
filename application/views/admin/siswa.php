<?php
$ses_nama = $this->session->userdata('ses_user');
$ses_id = $this->session->userdata('ses_id');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url() ?>assets/images/logosmk.png">
    <title>Kartu Siswa SMKN 1 Kragilan</title>

    <link href="<?= base_url() ?>assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/css/style.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/css/colors/blue.css" id="theme" rel="stylesheet">

    <!-- DATATABLES BS 4-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap4.min.css" />
    <!-- jQuery -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</head>

<body class="fix-header card-no-border">
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
        </svg>
    </div>
    <div id="main-wrapper">
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <div class="navbar-header">
                    <a class="navbar-brand" href="<?= base_url() ?>Admin/dashboard">
                        <b>
                            <img src="<?= base_url() ?>assets/images/logosmk.png" width="50" alt="homepage" class="dark-logo" />
                            <img src="<?= base_url() ?>assets/images/logosmk.png" width="50" alt="homepage" class="light-logo" />
                        </b>
                        <span>
                            <h3 class="d-inline">Kartu Siswa</h3>
                            <!-- <img src="assets/images/logo-text.png" alt="homepage" class="dark-logo" />
                            <img src="assets/images/logo-light-text.png" class="light-logo" alt="homepage" /> -->
                        </span>
                    </a>
                </div>
                <div class="navbar-collapse">
                    <ul class="navbar-nav mr-auto mt-md-0">
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                        <li class="nav-item m-l-10"> <a class="nav-link sidebartoggler hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                    </ul>
                    <ul class="navbar-nav my-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="<?= base_url() ?>/assets/images/users/teacher.png" alt="user" class="profile-pic" /></a>
                            <div class="dropdown-menu dropdown-menu-right scale-up">
                                <ul class="dropdown-user">
                                    <li>
                                        <div class="dw-user-box">
                                            <div class="u-text">
                                                <h4><?= $ses_nama ?></h4>
                                            </div>
                                        </div>
                                    </li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="<?= base_url() ?>Admin/profil"><i class="ti-user"></i> Profil Saya</a></li>
                                    <li><a href="<?= base_url() ?>Admin/password"><i class="ti-settings"></i> Password</a></li>
                                    <li><a href="<?= base_url() ?>Login/admin_logout"><i class="fa fa-power-off"></i> Logout</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <aside class="left-sidebar">
            <div class="scroll-sidebar">
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-devider"></li>
                        <li class="nav-small-cap">ADMIN</li>
                        <li>
                            <a class="waves-effect waves-dark" href="<?= base_url() ?>Admin/dashboard" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard </span></a>
                        </li>
                        <li>
                            <a class="waves-effect waves-dark" href="<?= base_url() ?>Admin/siswa" aria-expanded="false"><i class="mdi mdi-account-multiple"></i><span class="hide-menu">Siswa </span></a>
                        </li>
                        <li>
                            <a class="waves-effect waves-dark" href="<?= base_url() ?>Admin/kelas" aria-expanded="false"><i class="mdi mdi-school"></i><span class="hide-menu">Kelas </span></a>
                        </li>
                        <li>
                            <a class="waves-effect waves-dark" href="<?= base_url() ?>Admin/prestasi" aria-expanded="false"><i class="mdi mdi-trophy"></i><span class="hide-menu">Prestasi </span></a>
                        </li>
                        <li>
                            <a class="waves-effect waves-dark" href="<?= base_url() ?>Admin/point" aria-expanded="false"><i class="mdi mdi-stop-circle"></i><span class="hide-menu">Point </span></a>
                        </li>
                        <li>
                            <a class="waves-effect waves-dark" href="<?= base_url() ?>Admin/pelanggaran" aria-expanded="false"><i class="mdi mdi-alert"></i><span class="hide-menu">Pelanggaran </span></a>
                        </li>
                        <li>
                            <a class="waves-effect waves-dark" href="<?= base_url() ?>Admin/walas" aria-expanded="false"><i class="mdi mdi-rhombus-outline"></i><span class="hide-menu">Wali Kelas </span></a>
                        </li>
                        <li>
                            <a class="waves-effect waves-dark" href="<?= base_url() ?>Admin/admin" aria-expanded="false"><i class="mdi mdi-account"></i><span class="hide-menu">Admin </span></a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>


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
                    <table id="tableSiswa" class="table table-bordered table-striped">

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


    <footer class="footer">
                    © 2022 SMK Negeri 1 Kragilan
                </footer>
            </div>
        </div>


        <!-- DATATABLES BS 4-->
        <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.2.7/js/responsive.bootstrap4.min.js"></script>

     <script>
       var tabel = null;
        $(document).ready(function() {
            tabel = $('#tableSiswa').DataTable({
            "processing": true,
            "responsive":true,
            "serverSide": true,
            "ordering": true, // Set true agar bisa di sorting
            "order": [[ 0, 'asc' ]], // Default sortingnya berdasarkan kolom / field ke 0 (paling pertama)
            "ajax":
            {
                "url": "<?= base_url('Admin/view_data_query');?>", // URL file untuk proses select datanya
                "type": "POST"
            },
            "deferRender": true,
            "aLengthMenu": [[5, 10, 50],[ 5, 10, 50]], // Combobox Limit
            "columns": [
                {"data": 'id_siswa',"sortable": false, 
                    render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }  
                },
                { "data": "nama_siswa" },  // Tampilkan kategori
                { "data": "tingkatan" },  // Tampilkan nama sub kategori
                { "data": "jurusan",
                "render": 
                    function( data, type, row, meta ) {
                        return '<a href="show/'+data+'">Show</a>';
                    }
                },
            ],
        });
    });
    </script>

</body>

</html>