<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Guru_bk extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_guru_bk');
        $this->load->model('M_admin');


        // session login
        if ($this->session->userdata('guru_bk') != true) {
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
        $this->load->view('template/header-bk');
        $this->load->view('guru_bk/dashboard');
        $this->load->view('template/footer');
    }


    // awal siswa

    public function siswa()
    {
        $data['tampil_siswa'] = $this->M_guru_bk->tampil_siswa();

        $this->load->view('template/header-bk');
        $this->load->view('guru_bk/siswa', $data);
        $this->load->view('template/footer');
    }

    public function siswa_detail($id_siswa)
    {
        $data['siswa_detail'] = $this->M_guru_bk->siswa_detail($id_siswa);
        $data['total_point'] = $this->M_guru_bk->total_point($id_siswa);

        // var_dump($data['total_point']);


        $this->load->view('template/header-bk');
        $this->load->view('guru_bk/siswa_detail', $data);
        $this->load->view('template/footer');
    }

    // akhir siswa



    // awal prestasi
    public function prestasi()
    {
        $data['prestasi_tampil'] = $this->M_admin->prestasi_tampil();

        $this->load->view('template/header-bk');
        $this->load->view('guru_bk/prestasi', $data);
        $this->load->view('template/footer');
    }

    public function prestasi_siswa($id_siswa)
    {
        $data['id_siswa'] = $id_siswa;
        $data['tampil_prestasi'] = $this->M_admin->prestasi_siswa($id_siswa);

        $this->load->view('template/header-bk');
        $this->load->view('guru_bk/prestasi_siswa', $data);
        $this->load->view('template/footer');
    }

    public function prestasi_detail($id_prestasi)
    {
        $data['tampil_prestasi_detail'] = $this->M_admin->prestasi_detail($id_prestasi);

        $this->load->view('template/header-bk');
        $this->load->view('guru_bk/prestasi_detail', $data);
        $this->load->view('template/footer');
    }

    public function prestasi_tambah($id_siswa)
    {

        $data['tampil_siswa'] = $this->M_admin->siswa_detail($id_siswa);

        $this->load->view('template/header-bk');
        $this->load->view('guru_bk/prestasi_tambah', $data);
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
            redirect('Guru_bk/siswa_detail/' . $id_siswa);
        }
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
        redirect('Guru_bk/prestasi');
    }


    public function prestasi_edit($id_prestasi)
    {
        $data['tampil_prestasi_detail'] = $this->M_admin->prestasi_detail($id_prestasi);

        $this->load->view('template/header-bk');
        $this->load->view('guru_bk/prestasi_edit', $data);
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
        redirect('Guru_bk/prestasi_detail/' . $id_prestasi);
    }

    // akhir prestasi


    // awal point

    public function point()
    {
        $data['tampil_point'] = $this->M_admin->tampil_point();

        $this->load->view('template/header-bk');
        $this->load->view('guru_bk/point', $data);
        $this->load->view('template/footer');
    }

    public function point_tambah()
    {
        $this->load->view('template/header-bk');
        $this->load->view('guru_bk/point_tambah');
        $this->load->view('template/footer');
    }


    public function point_tambah_up()
    {
        $nama_point = $this->input->post('nama_point');
        $jml_point = $this->input->post('jml_point');

        $data_tambah = array(
            'nama_point' => $nama_point,
            'jml_point' => $jml_point

        );

        $this->M_admin->point_tambah($data_tambah);

        $this->session->set_flashdata('msg', '
						<div class="alert alert-primary alert-dismissible fade show" role="alert">
							<strong>Tambah Point Berhasil</strong>

							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>');
        redirect('Guru_bk/point');
    }


    public function point_hapus($id_point)
    {
        $success = $this->M_admin->point_hapus($id_point);

        $this->session->set_flashdata('msg', '
						<div class="alert alert-warning alert-dismissible fade show" role="alert">
							<strong>Hapus Data Berhasil</strong>

							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>');
        redirect('Guru_bk/point');
    }

    public function point_edit($id_point)
    {
        $data['tampil_point'] = $this->M_admin->point_edit($id_point);

        $this->load->view('template/header-admin');
        $this->load->view('guru_bk/point_edit', $data);
        $this->load->view('template/footer');
    }

    public function point_edit_up()
    {
        $id_point = $this->input->post('id_point');
        $nama_point = $this->input->post('nama_point');
        $jml_point = $this->input->post('jml_point');

        $data_edit = array(
            'nama_point' => $nama_point,
            'jml_point' => $jml_point,
        );

        $this->M_admin->point_edit_up($data_edit, $id_point);

        $this->session->set_flashdata('msg', '
              <div class="alert alert-primary alert-dismissible fade show" role="alert">
                <strong>Edit Point Berhasil</strong>

                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>');
        redirect('Guru_bk/point');
    }

    // akhir point



    // awal pelanggaran
    public function pelanggaran()
    {
        $data['tampil_pelanggaran'] = $this->M_admin->tampil_pelanggaran();

        $this->load->view('template/header-bk');
        $this->load->view('guru_bk/pelanggaran', $data);
        $this->load->view('template/footer');
    }

    public function pelanggaran_hapus($id_pelanggaran)
    {
        $id_pelanggaran = array('id_pelanggaran' => $id_pelanggaran);

        $success = $this->M_admin->pelanggaran_hapus($id_pelanggaran);
        $this->session->set_flashdata('msg', '
						<div class="alert alert-warning alert-dismissible fade show" role="alert">
							<strong>Hapus Data Berhasil</strong>

							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>');
        redirect('Guru_bk/pelanggaran');
    }

    public function pelanggaran_detail($id_pelanggaran)
    {
        $data['pelanggaran_detail'] = $this->M_admin->pelanggaran_detail($id_pelanggaran);

        $this->load->view('template/header-bk');
        $this->load->view('guru_bk/pelanggaran_detail', $data);
        $this->load->view('template/footer');
    }

    public function pelanggaran_siswa($id_siswa)
    {
        $data['pelanggaran_siswa'] = $this->M_admin->pelanggaran_siswa($id_siswa);

        $this->load->view('template/header-bk');
        $this->load->view('guru_bk/pelanggaran_siswa', $data);
        $this->load->view('template/footer');
    }

    public function pelanggaran_edit($id_pelanggaran)
    {
        $data['tampil_siswa'] = $this->M_admin->tampil_siswa();
        $data['tampil_point'] = $this->M_admin->tampil_point();
        $data['tampil_kelas'] = $this->M_admin->tampil_kelas();
        $data['tampil_bk'] = $this->M_admin->tampil_bk();

        $data['pelanggaran_edit'] = $this->M_admin->pelanggaran_edit($id_pelanggaran);

        $this->load->view('template/header-bk');
        $this->load->view('guru_bk/pelanggaran_edit', $data);
        $this->load->view('template/footer');
    }

    public function pelanggaran_edit_up()
    {
        $tgl_kejadian = $this->input->post('tgl_kejadian');
        $id_pelanggaran = $this->input->post('id_pelanggaran');
        $id_point = $this->input->post('id_point');
        $tgl_input = date('d-m-Y');
        $id_admin = $this->session->userdata('ses_id');

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
        redirect('Guru_bk/pelanggaran');
    }

    public function pelanggaran_tambah($id_siswa)
    {
        $data['tampil_siswa'] = $this->M_admin->siswa_detail($id_siswa);
        $data['tampil_point'] = $this->M_admin->tampil_point();
        $data['tampil_kelas'] = $this->M_admin->tampil_kelas();
        $data['tampil_bk'] = $this->M_admin->tampil_bk();

        $this->load->view('template/header-bk');
        $this->load->view('guru_bk/pelanggaran_tambah', $data);
        $this->load->view('template/footer');
    }


    public function pelanggaran_tambah_up()
    {
        $config['upload_path']      = 'assets/photo_pelanggaran/';
        $config['allowed_types']    = 'gif|jpg|png';
        $config['max_size']         = 5000;
        $config['encrypt_name']     = TRUE;
        $config['maintain_ratio']= FALSE;
        $config['quality']     = '30%';

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

            $id_admin = $this->session->userdata('ses_id');
            // $id_admin = $this->input->post('id_admin');


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
            redirect('Guru_bk/siswa_detail/' . $id_siswa);
        }
    }

    //akhir pelanggaran


    // password 
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
            redirect('Guru_bk/password/');
        }

        $this->session->set_flashdata('msg', '
						<div class="alert alert-danger alert-dismissible fade show" role="alert">
							<strong>Password Konfirmasi Tidak Sesuai</strong>

							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>');
        redirect('Guru_bk/password/' . $id_admin);
    }

    public function password()
    {
        $id_admin = $this->session->userdata('ses_id');
        $data['tampil'] = $this->M_admin->tampil_bk($id_admin);


        $this->load->view('template/header-bk');
        $this->load->view('guru_bk/password', $data);
        $this->load->view('template/footer');
    }

    // password akhir
}
