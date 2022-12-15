<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        .img{
            width: 100%;
            height: auto;
            display: block;
        }
        
        .container{
            width: 319px;
            position: relative;
        }

        .text{
            position: absolute;
            top: 19%;
            left: 50%;
            transform: translate(-20%, -7%);
            font-size: 11px;
            line-height: 0.09cm;
        }
    </style>
</head>
<body>
    <div id="capture1" class="container">
        <img class="img" src="<?= base_url() ?>assets/images/KARTU_PELAJAR_DEPAN.svg" alt="kartu pelajar">
        <div class="text">
            <p>Adelia Safitri</p>
            <p>Perempuan</p>
            <p>0066488322</p>
            <p>Serang, 2006-11-16</p>
            <p>Cilayang Maja RT/RW 8/3</p>
            <p>Rekayasa Perangkat Lunak</p>
            <p>Jakarta</p>
        </div>
    </div>

    <hr>
    
    <div id="capture2" class="container">
        <img class="img" src="<?= base_url() ?>assets/images/KARTU_PELAJAR_BELAKANG.svg" alt="kartu pelajar">
    </div>

    <button class="btn btn-primary" onclick="downloadHTML('capture1')">Download Tampak Depan</button>
    <button class="btn btn-primary" onclick="downloadHTML('capture2')">Download Tampak Belakang</button>

    <script src="<?= base_url() ?>assets/js/html2canvas.min.js"></script>
    <script>
        function downloadHTML(capture){
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