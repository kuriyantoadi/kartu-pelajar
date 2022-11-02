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
                    <h2 class="heading-section">Cetak Sertifikat MPLS 2022</h2>
                    <p style="color: white;">SMK Negeri 1 Kragilan</p>

                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <div class="login-wrap p-0">
                        <!-- <h3 class="mb-4 text-center">Have an account?</h3> -->
                        <?= $this->session->flashdata('msg') ?>

                        <?= form_open('Login/login_siswa'); ?>
                        <form class="signin-form">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="NISN" name='nisn' required>
                            </div>
                            <div class="form-group">
                                <input id="password-field" type="text" class="form-control" placeholder="Password" name="password" required>
                                <!-- <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span> -->
                            </div>
                            <div class="form-group">
                                <input type="submit" class="form-control btn btn-primary submit px-3" value="Login">
                                <!-- Button trigger modal -->
                                <button type="button" class="form-control btn btn-success px-3" data-toggle="modal" data-target="#exampleModal">
                                    Informasi Login
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Informasi Login</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p style="color: black;">
                                                    Silahkan login dengan ketentuan berikut :
                                                <ul style="color: black;">
                                                    <li>Login menggunakan NISN masing-masing siswa.</li>
                                                    <li>Password menggunakan 4 digit angka NISN dari belakang, contoh NISN 12345678 maka password 5678</li>
                                                    <li>Jika masih gagal bisa hubungi <a href="https://wa.link/edpv3y" class="btn btn-sm btn-primary">Bantuan</a></li>
                                                </ul>
                                                </p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div id="block1" style="display:none;">
                                <div class="card">

                                    <div class="card-body">
                                        <p style="color: black;">Login menggunakan NISN dan Passowrd 4 angka digit NISN dari belakang.
                                            <br>Contoh NISN 12345678 maka password 5678.
                                            <br>Jika masih gagal bisa hubungi <a href="https://wa.link/edpv3y" class="btn btn-primary">Bantuan</a>
                                        </p>
                                    </div>
                                </div>
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

    <script>
        function js_block1() {
            var x = document.getElementById("block1");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }
    </script>

</body>

</html>