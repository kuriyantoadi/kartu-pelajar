    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Cetak Sertifikat</h1>
        <!-- <h4 class="h3 mb-4 text-gray-800">Sistem Download Sertifikat MPLS SMK Negeri 1 Kragilan 2022</h4> -->
        <p>Siswa dapat mendownload sertifikat MPLS ketika sudah menyelesaikan MPLS SMK Negeri 1 Kragilan. Jika sertifikat sudah dicetak wajib sertifikat distampel oleh ketua pelaksana MPLS 2022, yang bisa dilakukan ke Bapak Kurniadi. M.Pd</p>


        <p><b> Petunjuk Mencetak Sertifikat MPLS SMK Negeri 1 Kragilan Tahun 2022 :</b></p>
        <ul>
            <li>Disarankan membuka web cetak sertifikat MPLS dengan komputer atau laptop yang sudah terhubung dengan Printer.</li>
            <li>Hilangkan opsi header dan footer saat melakukan print, ini akan membuat tulisan link cetak akan hilang secara otomatis</li>
            <li>Jika tidak muncul kontak print dihalaman print, silahkan tekan <b>Ctrl + P</b>.</li>
            <li>Gunakan kertas ukuran A4 dengan jenis kelas concorde berat 210 gram</li>
            <li>Jika nama disertifikat terlalu panjang bisa hubungi kontak bantuan untuk menyesuaikan nama disertifikat yang akan dicetak.</li>

        </ul>

        <?php
        foreach ($tampil as $row) {
        ?>

            <table class="table table-bordered">
                <tr>
                    <td>Nama : </td>
                    <td><?= $row->nama_siswa ?></td>
                </tr>
                <tr>
                    <td>Status MPLS :</td>
                    <td><?= $row->kondisi_mpls ?></td>
                </tr>

            </table>

            <?php if ($row->kondisi_mpls == 'selesai') { ?>

                <a href="<?= base_url() ?>Siswa/sertifikat" class="btn btn-primary">Cetak Sertifikat</a>
                <a href="http://wa.link/ca4dcl" class="btn btn-info">Bantuan</a>

            <?php } else { ?>

                Mohon maaf anda tidak mengikuti MPLS 3 hari, sertifikat tidak dapat ditampilkan
        <?php
            }
        }
        ?>


    </div>
    <!-- /.container-fluid -->