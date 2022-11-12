<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Kartu Pelajar</title>
    <link href="<?= base_url() ?>assets/css/styles.css" rel="stylesheet" />
    <link rel="icon" type="image/x-icon" href="<?= base_url() ?>assets/img/favicon.png" />
    <script data-search-pseudo-elements defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.min.js" crossorigin="anonymous"></script>
</head>

<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container-xl px-4">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <!-- Basic login form-->
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header justify-content-center">
                                    <h3 align="center" class="fw-light my-2">Login Kartu Pelajar</h3>
                                    <h3 align="center" class="fw-light my-2">Akun Admin</h3>
                                </div>
                                <div class="card-body">

                                    <?= $this->session->flashdata('msg') ?>
                                    <?= form_open('Login/login_admin'); ?>

                                    <!-- Login form-->
                                    <form>
                                        <!-- Form Group (email address)-->
                                        <div class="mb-3">
                                            <label class="small mb-1" for="inputEmailAddress">Username</label>
                                            <input class="form-control" name="username" type="text" placeholder="username" />
                                        </div>
                                        <!-- Form Group (password)-->
                                        <div class="mb-3">
                                            <label class="small mb-1" for="inputPassword">Password</label>
                                            <input class="form-control" name="password" type="password" placeholder="password" />
                                        </div>


                                        <div class="d-flex align-items-center justify-content-center">
                                            <input type="submit" class="btn btn-primary" value="Login">
                                        </div>
                                    </form>

                                    <?= form_close() ?>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div id="layoutAuthentication_footer">
            <footer class="footer-admin mt-auto footer-dark">
                <div class="container-xl px-4">
                    <div class="row">
                        <!-- <div class="col-md-6 small">Copyright &copy; SMK Negeri 1 Kragilan</div> -->
                        <div class="col-md-6 text-md-end small">
                            <a href="#!">Privacy Policy</a>
                            &middot;
                            <a href="#!">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="<?= base_url() ?>assets/js/scripts.js"></script>
</body>

</html>