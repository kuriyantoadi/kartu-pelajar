<!doctype html>
<html lang="en">

<head>
    <title>MPLS 2022</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="<?= base_url() ?>assets/login/css/style.css">

</head>

<body class="img js-fullheight" style="background-image: url(<?= base_url() ?>assets/login/images/bg.jpg);">
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <h2 class="heading-section">Admin Sertifikat MPLS 2022</h2>
                    <p style="color: white;">SMK Negeri 1 Kragilan</p>

                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <div class="login-wrap p-0">
                        <!-- <h3 class="mb-4 text-center">Have an account?</h3> -->
                        <?= $this->session->flashdata('msg') ?>

                        <?= form_open('Login/login_admin'); ?>
                        <form class="signin-form">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Username" name='username' required>
                            </div>
                            <div class="form-group">
                                <input id="password-field" type="password" class="form-control" placeholder="Password" name="password" required>
                                <!-- <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span> -->
                            </div>
                            <div class="form-group">
                                <input type="submit" class="form-control btn btn-primary submit px-3" value="Login">
                            </div>
                            <!-- <div style="margin-top: 100px;"></div> -->
                            <?= form_close() ?>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="<?= base_url() ?>assets/login/js/jquery.min.js"></script>
    <script src="<?= base_url() ?>assets/login/js/popper.js"></script>
    <script src="<?= base_url() ?>assets/login/js/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>assets/login/js/main.js"></script>

</body>

</html>