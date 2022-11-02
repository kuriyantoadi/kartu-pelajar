<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sertifikat MPLS</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">

    <style>
        .img {
            width: 100%;
            height: auto;
        }

        .container {
            position: relative;
            width: 95%;
        }

        .text {
            position: absolute;
            top: 23%;
            left: 50%;
            transform: translate(-50%, -81%);
            font-family: Tangerine, sans-serif;
            font-size: 5vw;
            font-weight: bold;
            color: #1A5076;
            text-transform: capitalize !important;
            white-space: nowrap;
        }

        .text-enk {
            position: absolute;
            bottom: 3%;
            right: 40%;
            transform: translate(-50%, -81%);
            font-family: 'Roboto', sans-serif;
            font-size: 1vw;
            font-weight: bold;
            /* color: #1A5076; */
            text-transform: capitalize;
        }
    </style>
</head>

<body>
    <?php foreach ($tampil as $row) { ?>

        <div class="container">
            <img src="<?= base_url() ?>assets/sertifikat.jpeg" alt="Sertifikat MPLS" class="img">
            <p class="text"><?= $row->nama_siswa ?></p>

            <p class="text-enk">kode enkripsi : <?= md5($row->nama_siswa) ?></p>
        </div>

    <?php } ?>

</body>

</html>