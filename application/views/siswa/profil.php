<div class="container-fluid">

    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Profil Siswa</h4>
                         <?= $this->session->flashdata('msg') ?>

            <div class="table-responsive m-t-10">


                <table class="table table-bordered mt-4">

                    <?php foreach ($tampil as $row) { ?>

                        <tbody>
                            <a style="margin-top: 40px; margin-right: 5px;" href="<?= site_url('Siswa/profil_edit') ?>" class="btn btn-primary btn-sm btn-rounded">Edit Profil</a>
                            <a style="margin-top: 40px;" href="<?= site_url('Siswa/photo_edit') ?>" class="btn btn-success btn-sm btn-rounded">Edit Photo</a>

                            <tr>
                                <td class="col-4">Foto</td>
                                <td>:
                                    <img width="100px" src="<?= base_url() ?>assets/photo_siswa/<?= $row->photo_siswa ?>" alt="Photo">
                                </td>
                            </tr>
                            <tr>
                                <td>Nama Siswa</td>
                                <td>: <?= $row->nama_siswa ?></td>
                            </tr>
                            <tr>
                                <td>NISN</td>
                                <td>: <?= $row->nisn ?></td>
                            </tr>
                            <tr>
                                <td>Kelas</td>
                                <td>: <?= $row->tingkatan . ' ' . $row->jurusan . ' ' . $row->kode_kelas ?></td>
                            </tr>
                            <tr>
                                <td>Tempat Lahir <b>(Bln/Tgl/Thn)</b></td>
                                <td>: <?= $row->tempat_lahir ?></td>
                            </tr>
                            <tr>
                                <td>Tanggal Lahir</td>
                                <td>: <?= $row->tgl_lahir ?></td>
                            </tr>
                            <tr>
                                <td>Agama</td>
                                <td>: <?= $row->agama ?></td>
                            </tr>

                            <tr>
                                <td>Alamat</td>
                                <td>: <?= $row->alamat ?></td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td>: <?= $row->status ?></td>
                            </tr>

                        </tbody>

                    <?php } ?>
                </table>
            </div>
        </div>
    </div>


    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->
</div>