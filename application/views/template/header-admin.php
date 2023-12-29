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

    <!-- select search -->
    <!-- <link href="<?= base_url() ?>assets/library_box/bootstrap-5/bootstrap.min.css" rel="stylesheet" /> -->
    <script src="<?= base_url() ?>assets/library_box/bootstrap-5/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>assets/library_box/dselect.js"></script>


    <!-- Datatables -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>

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