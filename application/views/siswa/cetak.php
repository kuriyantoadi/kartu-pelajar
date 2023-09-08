<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?= base_url() ?>assets/css/style.css" rel="stylesheet">
    <title>Document</title>

    <style>
        .img-data {
            width: 100%;
            height: auto;
            display: block;
        }

        .container-data {
            width: 473px;
            position: relative;
        }

        .text-data {
            font-family: serif;
            position: absolute;
            top: 25%;
            left: 50%;
            transform: translate(-20%, -9%);
            font-size: 16px;
            line-height: 5px;
            color: black;
        }
    </style>
</head>

<body>
    <div id="capture1" class="container-data mx-auto">
        <img class="img-data" src="<?= base_url() ?>assets/images/KARTU_PELAJAR_DEPAN.svg" alt="kartu pelajar">
        <div class="text-data">
            <?php foreach ($tampil as $row) { ?>
            <p><?= $row->nama_siswa ?></p>
            <p><?= $row->jenis_kelamin ?></p>
            <p><?= $row->nisn ?></p>
            <p><?= $row->tempat_lahir ?>, <?= $row->tgl_lahir ?></p>
            <p><?= $row->agama ?></p>
            <p><?= $row->jurusan ?></p>
            <p><?= $row->alamat ?></p>
            <?php } ?>
        </div>
    </div>
    <div class="text-center m-t-20 m-b-20">
        <button class="btn btn-sm btn-primary" onclick="downloadHTML('capture1')">Download Tampak Depan</button>
    </div>

    <hr>

    <div id="capture2" class="container-data mx-auto">
        <img class="img-data" src="<?= base_url() ?>assets/images/KARTU_PELAJAR_BELAKANG.svg" alt="kartu pelajar">
    </div>
    <div class="text-center m-t-20 m-b-20">
        <button class="btn btn-sm btn-primary" onclick="downloadHTML('capture2')">Download Tampak Belakang</button>
    </div>

    <script src="<?= base_url() ?>assets/js/html2canvas.min.js"></script>
    <script>
        function downloadHTML(capture) {
            html2canvas(document.getElementById(capture), {
                allowTaint: true,
                useCORS: true,
                scale: 2
            }).then(canvas => {
                const base64image = canvas.toDataURL("image/png");
                var anchor = document.createElement('a');
                anchor.setAttribute('href', base64image);
                anchor.setAttribute('download', 'kartu-pelajar.png');
                anchor.click();
                anchor.remove();
            });
        }
    </script>
</body>

</html>