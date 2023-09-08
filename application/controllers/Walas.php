<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Walas extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_walas');
        $this->load->model('M_admin');

        // session login
        if ($this->session->userdata('guru_walas') != true) {
            $url = base_url('Login/admin');
            redirect($url);
        }
    }

    public function index()
    {
        $this->load->view('admin/login');
    }

    public function dashboard()
    {
        $this->load->view('template/header-walas');
        $this->load->view('walas/dashboard');
        $this->load->view('template/footer');
    }


    // awal siswa
    public function siswa()
    {
        $id_admin = $this->session->userdata('ses_id');
        $cek_walas = $this->M_walas->cek_walas($id_admin);

        //tampil kelas
        foreach ($cek_walas as $row) {
            $id_kelas = $row->id_kelas;
        }

        if (empty($cek_walas)) {
            //jika akun tidak tersambung dengan data kelas diwali kelas
            $this->load->view('template/header-walas');
            $this->load->view('walas/siswa_kosong');
            $this->load->view('template/footer');
        } else {
            // jika akun tersambung dengan data kelas
            $data['tampil_siswa'] = $this->M_walas->siswa_perkelas($id_kelas);

            $this->load->view('template/header-walas');
            $this->load->view('walas/siswa', $data);
            $this->load->view('template/footer');
        }
    }



    public function siswa_edit_up()
    {
        $id_siswa = $this->input->post('id_siswa');
        $nisn = $this->input->post('nisn');
        $nama_siswa = $this->input->post('nama_siswa');
        $jenis_kelamin = $this->input->post('jenis_kelamin');
        $id_kelas = $this->input->post('id_kelas');
        $tgl_lahir = $this->input->post('tgl_lahir');
        $tempat_lahir = $this->input->post('tempat_lahir');
        $agama = $this->input->post('agama');
        $alamat = $this->input->post('alamat');

        $data_edit = array(
            // 'photo_siswa' => $_data['upload_data']['file_name'],
            'nisn' => $nisn,
            'nama_siswa' => $nama_siswa,
            'jenis_kelamin' => $jenis_kelamin,
            'id_kelas' => $id_kelas,
            'tgl_lahir' => $tgl_lahir,
            'tempat_lahir' => $tempat_lahir,
            'agama' => $agama,
            'alamat' => $alamat
        );

        // var_dump($id_siswa);

        $this->M_admin->siswa_edit_up($data_edit, $id_siswa);

        $this->session->set_flashdata('msg', '
						<div class="alert alert-primary alert-dismissible fade show" role="alert">
							<strong>Edit Siswa Berhasil</strong>

							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>');
        redirect('Walas/siswa_detail/' . $id_siswa);
    }


    public function siswa_photo($id_siswa)
    {
        $data['tampil_siswa'] = $this->M_admin->siswa_detail($id_siswa);
        $data['tampil_kelas'] = $this->M_admin->tampil_kelas();


        $this->load->view('template/header-walas');
        $this->load->view('walas/siswa_photo', $data);
        $this->load->view('template/footer');
    }


    public function siswa_password($id_siswa)
    {
        $data['tampil_siswa'] = $this->M_admin->siswa_detail($id_siswa);

        $this->load->view('template/header-walas');
        $this->load->view('walas/siswa_password', $data);
        $this->load->view('template/footer');
    }

    public function siswa_password_up()
    {
        $id_siswa = $this->input->post('id_siswa');
        $password_baru = $this->input->post('password_baru');
        $password_konfimrasi = $this->input->post('password_konfirmasi');


        if ($password_baru != $password_konfimrasi) {
            $this->session->set_flashdata('msg', '
						<div class="alert alert-danger alert-dismissible fade show" role="alert">
							<strong>Password Tidak Sesuai</strong>

							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>');
            redirect('Walas/siswa_password/' . $id_siswa);
        }

        $data_edit = array(
            'password' => sha1($password_baru),
        );

        $this->M_admin->siswa_edit_up($data_edit, $id_siswa);

        $this->session->set_flashdata('msg', '
						<div class="alert alert-primary alert-dismissible fade show" role="alert">
							<strong>Perubahan Password Berhasil</strong>

							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>');
        redirect('Walas/siswa_detail/' . $id_siswa);
    }

    public function siswa_photo_up()
    {
        $config['upload_path']      = 'assets/photo_siswa/';
        $config['allowed_types']    = 'gif|jpg|png';
        $config['max_size']         = 2000;
        $config['encrypt_name']     = TRUE;

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('photo_siswa')) {
            $error = array('error' => $this->upload->display_errors());
            echo var_dump($error);
            // $this->load->view('upload', $error);
        } else {
            $_data = array('upload_data' => $this->upload->data());

            $id_siswa = $this->input->post('id_siswa');

            $data_edit = array(
                'photo_siswa' => $_data['upload_data']['file_name'],
            );

            $this->M_admin->siswa_photo_up($data_edit, $id_siswa);

            $this->session->set_flashdata('msg', '
						<div class="alert alert-primary alert-dismissible fade show" role="alert">
							<strong>Edit Photo Siswa Berhasil</strong>

							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>');
            redirect('Walas/siswa_detail/' . $id_siswa);
        }
    }


    public function siswa_detail($id_siswa)
    {
        $data['tampil_siswa'] = $this->M_admin->siswa_detail($id_siswa);

        $this->load->view('template/header-walas');
        $this->load->view('walas/siswa_detail', $data);
        $this->load->view('template/footer');
    }

    public function siswa_hapus($id_siswa)
    {
        $id_siswa = array('id_siswa' => $id_siswa);

        $success = $this->M_admin->siswa_hapus($id_siswa);
        $this->session->set_flashdata('msg', '
						<div class="alert alert-warning alert-dismissible fade show" role="alert">
							<strong>Hapus Data Berhasil</strong>

							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>');
        redirect('Walas/siswa');
    }

    public function siswa_hapus_photo($id_siswa, $photo_siswa)
    {
        $kode_siswa = array('id_siswa' => $id_siswa);

        $hapus_photo = "assets/photo_siswa/" . $photo_siswa;
        unlink($hapus_photo);

        $data_edit = array(
            'photo_siswa' => '',
        );

        $this->M_admin->siswa_hapus_photo($data_edit, $kode_siswa);

        $this->session->set_flashdata('msg', '
						<div class="alert alert-warning alert-dismissible fade show" role="alert">
							<strong>Hapus Data Berhasil</strong>

							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>');
        redirect('Walas/siswa_photo/' . $id_siswa);
    }


    public function siswa_edit($id_siswa)
    {
        $data['tampil_siswa'] = $this->M_admin->siswa_detail($id_siswa);
        $data['tampil_kelas'] = $this->M_admin->tampil_kelas();


        $this->load->view('template/header-walas');
        $this->load->view('walas/siswa_edit', $data);
        $this->load->view('template/footer');
    }
    // akhir siswa

    // awal prestasi
    public function prestasi()
    {
        $id_admin = $this->session->userdata('ses_id');
        $cek_walas = $this->M_walas->cek_walas($id_admin);

        //tampil kelas
        foreach ($cek_walas as $row) {
            $id_kelas = $row->id_kelas;
        }

        if (empty($cek_walas)) {
            //jika akun tidak tersambung dengan data kelas diwali kelas
            $this->load->view('template/header-walas');
            $this->load->view('walas/siswa_kosong');
            $this->load->view('template/footer');
        } else {
            // jika akun tersambung dengan data kelas
            $data['prestasi_tampil'] = $this->M_walas->prestasi_perkelas($id_kelas);

            $this->load->view('template/header-walas');
            $this->load->view('walas/prestasi', $data);
            $this->load->view('template/footer');
        }
    }

    public function prestasi_tambah($id_siswa)
    {
        $data['tampil_siswa'] = $this->M_admin->siswa_detail($id_siswa);

        $this->load->view('template/header-walas');
        $this->load->view('walas/prestasi_tambah', $data);
        $this->load->view('template/footer');
    }


    public function prestasi_tambah_up()
    {
        $config['upload_path']      = 'assets/photo_prestasi/';
        $config['allowed_types']    = 'gif|jpg|png';
        $config['max_size']         = 4000;
        $config['encrypt_name']     = TRUE;
        // $id_lapangan = $this->input->post('id_lapangan');


        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('photo_prestasi')) {
            $error = array('error' => $this->upload->display_errors());
            echo var_dump($error);
            // $this->load->view('upload', $error);
        } else {
            $_data = array('upload_data' => $this->upload->data());

            $id_siswa = $this->input->post('id_siswa');
            $tanggal_pelaksanaan = $this->input->post('tanggal_pelaksanaan');
            $nama_kegiatan = $this->input->post('nama_kegiatan');
            $juara_ke = $this->input->post('juara_ke');
            $tingkat = $this->input->post('tingkat');
            $tempat_lomba = $this->input->post('tempat_lomba');
            $tim_individu = $this->input->post('tim_individu');
            $penyelenggara_acara = $this->input->post('penyelenggara_acara');

            $data_tambah = array(
                'photo_prestasi' => $_data['upload_data']['file_name'],
                'id_siswa' => $id_siswa,
                'tanggal_pelaksanaan' => $tanggal_pelaksanaan,
                'nama_kegiatan' => $nama_kegiatan,
                'juara_ke' => $juara_ke,
                'tingkat' => $tingkat,
                'tempat_lomba' => $tempat_lomba,
                'tim_individu' => $tim_individu,
                'penyelenggara_acara' => $penyelenggara_acara
            );

            $this->M_admin->prestasi_tambah_up($data_tambah);

            $this->session->set_flashdata('msg', '
						<div class="alert alert-primary alert-dismissible fade show" role="alert">
							<strong>Tambah Prestasi Berhasil</strong>

							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>');
            redirect('Walas/siswa_detail/' . $id_siswa);
        }
    }

    public function prestasi_siswa($id_siswa)
    {
        $data['tampil_prestasi'] = $this->M_admin->prestasi_siswa($id_siswa);

        $this->load->view('template/header-walas');
        $this->load->view('walas/prestasi_siswa', $data);
        $this->load->view('template/footer');
    }

    public function prestasi_hapus($id_prestasi)
    {
        $id_prestasi = array('id_prestasi' => $id_prestasi);

        $success = $this->M_admin->prestasi_hapus($id_prestasi);
        $this->session->set_flashdata('msg', '
						<div class="alert alert-warning alert-dismissible fade show" role="alert">
							<strong>Hapus Data Prestasi Berhasil</strong>

							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>');
        redirect('Walas/prestasi');
    }


    public function prestasi_detail($id_prestasi)
    {
        $data['tampil_prestasi_detail'] = $this->M_admin->prestasi_detail($id_prestasi);

        $this->load->view('template/header-walas');
        $this->load->view('walas/prestasi_detail', $data);
        $this->load->view('template/footer');
    }

    public function prestasi_edit($id_prestasi)
    {
        $data['tampil_prestasi_detail'] = $this->M_admin->prestasi_detail($id_prestasi);

        $this->load->view('template/header-walas');
        $this->load->view('walas/prestasi_edit', $data);
        $this->load->view('template/footer');
    }

    public function prestasi_edit_up()
    {
        $id_prestasi = $this->input->post('id_prestasi');
        $tanggal_pelaksanaan = $this->input->post('tanggal_pelaksanaan');
        $nama_kegiatan = $this->input->post('nama_kegiatan');
        $juara_ke = $this->input->post('juara_ke');
        $tingkat = $this->input->post('tingkat');
        $tempat_lomba = $this->input->post('tempat_lomba');
        $tim_individu = $this->input->post('tim_individu');
        $penyelenggara_acara = $this->input->post('penyelenggara_acara');

        $data_edit = array(
            'tanggal_pelaksanaan' => $tanggal_pelaksanaan,
            'nama_kegiatan' => $nama_kegiatan,
            'juara_ke' => $juara_ke,
            'tingkat' => $tingkat,
            'tempat_lomba' => $tempat_lomba,
            'tim_individu' => $tim_individu,
            'penyelenggara_acara' => $penyelenggara_acara
        );

        $this->M_admin->prestasi_edit_up($data_edit, $id_prestasi);

        $this->session->set_flashdata('msg', '
						<div class="alert alert-primary alert-dismissible fade show" role="alert">
							<strong>Tambah Prestasi Berhasil</strong>

							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>');
        redirect('Walas/prestasi_detail/' . $id_prestasi);
    }
    // akhir prestasi


    // pelanggaran awal



    public function pelanggaran()
    {
        $id_admin = $this->session->userdata('ses_id');
        $cek_walas = $this->M_walas->cek_walas($id_admin);

        //tampil kelas
        foreach ($cek_walas as $row) {
            $id_kelas = $row->id_kelas;
        }

        if (empty($cek_walas)) {
            //jika akun tidak tersambung dengan data kelas diwali kelas
            $this->load->view('template/header-walas');
            $this->load->view('walas/siswa_kosong');
            $this->load->view('template/footer');
        } else {
            // jika akun tersambung dengan data kelas
            $data['tampil_pelanggaran'] = $this->M_walas->pelanggaran_perkelas($id_kelas);

            $this->load->view('template/header-walas');
            $this->load->view('walas/pelanggaran', $data);
            $this->load->view('template/footer');
        }
    }


    public function pelanggaran_detail($id_pelanggaran)
    {
        $data['pelanggaran_detail'] = $this->M_admin->pelanggaran_detail($id_pelanggaran);

        $this->load->view('template/header-walas');
        $this->load->view('walas/pelanggaran_detail', $data);
        $this->load->view('template/footer');
    }

    public function pelanggaran_siswa($id_siswa)
    {
        $data['pelanggaran_siswa'] = $this->M_admin->pelanggaran_siswa($id_siswa);

        $this->load->view('template/header-walas');
        $this->load->view('walas/pelanggaran_siswa', $data);
        $this->load->view('template/footer');
    }

    public function pelanggaran_edit($id_pelanggaran)
    {
        $data['tampil_siswa'] = $this->M_admin->tampil_siswa();
        $data['tampil_point'] = $this->M_admin->tampil_point();
        $data['tampil_kelas'] = $this->M_admin->tampil_kelas();
        $data['tampil_bk'] = $this->M_admin->tampil_bk();

        $data['pelanggaran_edit'] = $this->M_admin->pelanggaran_edit($id_pelanggaran);

        $this->load->view('template/header-walas');
        $this->load->view('walas/pelanggaran_edit', $data);
        $this->load->view('template/footer');
    }

    public function pelanggaran_edit_up()
    {
        $tgl_kejadian = $this->input->post('tgl_kejadian');
        // $timestamp = strtotime($tgl_kejadian);
        // $tgl_kejadian = date("d-m-Y", $timestamp);

        $id_pelanggaran = $this->input->post('id_pelanggaran');
        $id_point = $this->input->post('id_point');
        $tgl_input = date('d-m-Y');
        $id_admin = $this->input->post('id_admin');


        $data_edit = array(
            'id_point' => $id_point,
            'tgl_kejadian' => $tgl_kejadian,
            'tgl_input' => $tgl_input,
            'id_admin' => $id_admin
        );

        $this->M_admin->pelanggaraan_edit_up($data_edit, $id_pelanggaran);

        $this->session->set_flashdata('msg', '
						<div class="alert alert-primary alert-dismissible fade show" role="alert">
							<strong>Edit Pelanggaran Siswa Berhasil</strong>

							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>');
        redirect('Walas/pelanggaran');
    }

    public function pelanggaran_tambah($id_siswa)
    {
        $data['tampil_siswa'] = $this->M_admin->siswa_detail($id_siswa);
        $data['tampil_point'] = $this->M_admin->tampil_point();
        $data['tampil_kelas'] = $this->M_admin->tampil_kelas();
        $data['tampil_bk'] = $this->M_admin->tampil_bk();

        $this->load->view('template/header-walas');
        $this->load->view('walas/pelanggaran_tambah', $data);
        $this->load->view('template/footer');
    }


    public function pelanggaran_tambah_up()
    {
        $config['upload_path']      = 'assets/photo_pelanggaran/';
        $config['allowed_types']    = 'gif|jpg|png';
        $config['max_size']         = 5000;
        $config['encrypt_name']     = TRUE;
        // $id_lapangan = $this->input->post('id_lapangan');


        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('photo_pelanggaran')) {
            $error = array('error' => $this->upload->display_errors());
            echo var_dump($error);
            // $this->load->view('upload', $error);
        } else {
            $_data = array('upload_data' => $this->upload->data());


            $tgl_kejadian = $this->input->post('tgl_kejadian');
            $timestamp = strtotime($tgl_kejadian);
            $tgl_kejadian = date("d-m-Y", $timestamp);

            $id_kelas = $this->input->post('id_kelas');
            $id_siswa = $this->input->post('id_siswa');
            $id_point = $this->input->post('id_point');
            $tgl_input = date('d-m-Y');
            // $tgl_input = $this->input->post('tgl_input');
            $id_admin = $this->input->post('id_admin');


            $data_tambah = array(
                'photo_pelanggaran' => $_data['upload_data']['file_name'],
                'id_siswa' => $id_siswa,
                'id_point' => $id_point,
                'id_kelas' => $id_kelas,
                'tgl_kejadian' => $tgl_kejadian,
                'tgl_input' => $tgl_input,
                'id_admin' => $id_admin
            );

            $this->M_admin->pelanggaran_tambah_up($data_tambah);

            $this->session->set_flashdata('msg', '
						<div class="alert alert-primary alert-dismissible fade show" role="alert">
							<strong>Tambah Pelanggaran Berhasil</strong>

							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>');
            redirect('Walas/siswa_detail/' . $id_siswa);
        }
    }
    // pelanggaran akhir

    // password 
    public function password()
    {
        $id_admin = $this->session->userdata('ses_id');
        $data['tampil'] = $this->M_admin->cari_admin($id_admin);

        $this->load->view('template/header-walas');
        $this->load->view('walas/password', $data);
        $this->load->view('template/footer');
    }


    public function password_up()
    {
        $id_admin = $this->session->userdata('ses_id');

        $password_baru = $this->input->post('password_baru');
        $password_konfirmasi = $this->input->post('password_konfirmasi');

        if ($password_baru == $password_konfirmasi) {

            $data_edit = array(
                'password' => sha1($password_baru)
            );

            $this->M_admin->admin_edit_up($data_edit, $id_admin);

            $this->session->set_flashdata('msg', '
						<div class="alert alert-primary alert-dismissible fade show" role="alert">
							<strong>Ganti Password Admin Berhasil</strong>

							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>');
            redirect('Walas/password/');
        }

        $this->session->set_flashdata('msg', '
						<div class="alert alert-danger alert-dismissible fade show" role="alert">
							<strong>Password Konfirmasi Tidak Sesuai</strong>

							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>');
        redirect('Walas/password/' . $id_admin);
    }
    // password akhir
}
