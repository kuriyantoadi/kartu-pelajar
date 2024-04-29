<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url() ?>assets/images/logosmk.png">
    <title>Login Siswa</title>
    <link href="<?= base_url() ?>assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/css/style.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/css/colors/blue.css" id="theme" rel="stylesheet">

    <style type="text/css">
        .login-register-v2 {
            display: flex; /* Menggunakan flexbox */
            justify-content: center; /* Menempatkan konten secara horizontal di tengah */
            align-items: center; /* Menempatkan konten secara vertikal di tengah */
            background-image: url(<?= base_url() ?>assets/images/background/login-register1.jpg);
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            height: 100vh;
        }

    </style>
</head>

<body>
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
        </svg>
    </div>

    <section id="wrapper">
        <div class="login-register-v2" style="background-image:url(<?= base_url() ?>assets/images/background/login-register1.jpg);">
            
            <div class="login-box card p-3" style="box-shadow: 5px 10px 50px gray;">
                <div class="card-body">

                    <?= form_open('Login/login_siswa'); ?>

                    <form class="form-horizontal form-material" id="loginform" action="index.html">
                        <h3 style="text-align:center" class="box-title m-b-5">Login Siswa</h3>
                        <h4 style="text-align:center" class="box-title m-b-20">Kartu Pelajar</h4>

                        <?= $this->session->flashdata('msg') ?>

                        <div class="form-group ">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" required="NISN" placeholder="Username" name="nisn">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <input class="form-control" type="password" required="Password" placeholder="Password" name="password">
                            </div>
                        </div>

                        <div class="form-group text-center m-t-20">
                            <div class="col-xs-12">
                                <button class="btn btn-info btn-sm btn-block text-uppercase waves-effect waves-light" type="submit">Log In</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <script src="<?= base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
    <script src="<?= base_url() ?>assets/plugins/bootstrap/js/popper.min.js"></script>
    <script src="<?= base_url() ?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>assets/js/jquery.slimscroll.js"></script>
    <script src="<?= base_url() ?>assets/js/waves.js"></script>
    <script src="<?= base_url() ?>assets/js/sidebarmenu.js"></script>
    <script src="<?= base_url() ?>assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="<?= base_url() ?>assets/plugins/sparkline/jquery.sparkline.min.js"></script>
    <script src="<?= base_url() ?>assets/js/custom.min.js"></script>
    <script src="<?= base_url() ?>assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
</body>

</html>