<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        .img {
            width: 100%;
            height: auto;
            display: block;
        }

        .container {
            width: 319px;
            position: relative;
        }

        .nama {
            position: absolute;
            top: 10.68%;
            left: 47%;
            transform: translate(-20%, -7%);
            font-size: 9px;
            color: black;
            /* line-height: 0.001px; */
            line-height: 10%;
            margin: 0;
        }

        .jk {
            position: absolute;
            top: 14.20%;
            left: 47%;
            transform: translate(-20%, -7%);
            font-size: 9px;
            color: black;
            /* line-height: 0.001px; */
            line-height: 10%;
            margin: 0;
        }

        /* .nisn {
            position: absolute;
            top: 18.20%;
            left: 47%;
            transform: translate(-20%, -7%);
            font-size: 9x;
            color: black;
            line-height: 10%;
            margin: 0;
        } */

        .nisn {
            position: absolute;
            top: 18.20%;
            left: 47%;
            transform: translate(-20%, -7%);
            font-size: 9px;
            color: black;
            /* line-height: 0.001px; */
            line-height: 10%;
            margin: 0;

        }

        .tgl_lahir {
            position: absolute;
            top: 21.20%;
            left: 48.6%;
            transform: translate(-20%, -7%);
            font-size: 9px;
            color: black;
            /* line-height: 0.001px; */
            line-height: 10%;
            margin: 0;

        }
    </style>
</head>

<body>
    <div id="capture1" class="container">
        <img class="img" src="<?= base_url() ?>assets/images/KARTU_PELAJAR_DEPAN.svg" alt="kartu pelajar">
        <div class="nama">
            Adelia Safitri
        </div>
        <div class="jk">
            Perempuan
        </div>
        <div class="nisn">
            0066488322
        </div>

        <div class="tgl_lahir">
            Serang, 2006-11-16
        </div>

        <div class="tgl_lahir">
            Cilayang Maja RT/RW 8/3
        </div>

        <div class="tgl_lahir">
            Rekayasa Perangkat Lunak
        </div>

        <div class="tgl_lahir">
            Jakarta
        </div>

    </div>
    <button class="btn btn-primary" onclick="downloadHTML('capture1')">Download Tampak Depan</button>

    <hr>

    <div id="capture2" class="container">
        <img class="img" src="<?= base_url() ?>assets/images/KARTU_PELAJAR_BELAKANG.svg" alt="kartu pelajar">
    </div>
    <button class="btn btn-primary" onclick="downloadHTML('capture2')">Download Tampak Belakang</button>

    <script src="<?= base_url() ?>assets/js/html2canvas.min.js"></script>
    <script>
        function downloadHTML(capture) {
            html2canvas(document.getElementById(capture), {
                allowTaint: true,
                useCORS: true,
                scale: 3
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