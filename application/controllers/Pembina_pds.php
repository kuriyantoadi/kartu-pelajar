<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembina_pds extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_guru_bk');
        $this->load->model('M_admin');
        $this->load->model('M_pds');


        // session login
        if ($this->session->userdata('guru_pds') != true) {
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
        $this->load->view('template/header-pds');
        $this->load->view('pembina_pds/dashboard');
        $this->load->view('template/footer');
    }

    // Password
    public function password()
    {
        $this->load->view('template/header-pds');
        $this->load->view('pembina_pds/password');
        $this->load->view('template/footer');
    }

    public function password_up()
    {
        $id_admin = $this->input->post('id_admin');
        $password_baru = $this->input->post('password_baru');
        $password_konfirmasi = $this->input->post('password_konfirmasi');

        if ($password_baru == $password_konfirmasi) {

            $data_edit = array(
                'password' => $password_baru
            );

            $this->M_admin->admin_edit_up($data_edit, $id_admin);

            $this->session->set_flashdata('msg', '
						<div class="alert alert-primary alert-dismissible fade show" role="alert">
							<strong>Ganti Password Admin Berhasil</strong>

							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>');
            redirect('Pembina_pds/profil/');
        }

        $this->session->set_flashdata('msg', '
						<div class="alert alert-danger alert-dismissible fade show" role="alert">
							<strong>Password Konfirmasi Tidak Sesuai</strong>

							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>');
        redirect('Pembina_pds/profil/' . $id_admin);
    }

    public function profil()
    {
        $ses_id = $this->session->userdata('ses_id');
        $data['tampil'] = $this->M_admin->admin_profil($ses_id);

        $this->load->view('template/header-pds');
        $this->load->view('pembina_pds/profil', $data);
        $this->load->view('template/footer');
    }

    public function profil_edit()
    {
        $ses_id = $this->session->userdata('ses_id');
        $data['tampil'] = $this->M_admin->admin_profil($ses_id);

        $this->load->view('template/header-pds');
        $this->load->view('pembina_pds/profil_edit', $data);
        $this->load->view('template/footer');
    }

    public function profil_edit_up()
    {
        $id_admin = $this->input->post('id_admin');
        $nama = $this->input->post('nama');
        $username = $this->input->post('username');

        $data_edit = array(
            'nama' => $nama,
            'username' => $username
        );

        $this->M_admin->admin_edit_up($data_edit, $id_admin);

        $this->session->set_flashdata('msg', '
						<div class="alert alert-primary alert-dismissible fade show" role="alert">
							<strong>Edit Profil Berhasil</strong>

							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>');
        redirect('pembina_pds/profil/');
    }



    // awal siswa

    public function siswa()
    {
        $data['tampil_siswa'] = $this->M_admin->tampil_siswa();

        $this->load->view('template/header-pds');
        $this->load->view('pembina_pds/siswa', $data);
        $this->load->view('template/footer');
    }

    public function siswa_detail($id_siswa)
    {
        $data['tampil_siswa'] = $this->M_admin->siswa_detail($id_siswa);

        $this->load->view('template/header-pds');
        $this->load->view('pembina_pds/siswa_detail', $data);
        $this->load->view('template/footer');
    }

    // akhir siswa


    // awal pelanggaran

    public function pelanggaran_tambah($id_siswa)
    {
        $data['tampil_siswa'] = $this->M_admin->siswa_detail($id_siswa);
        $data['tampil_point'] = $this->M_admin->tampil_point();
        $data['tampil_kelas'] = $this->M_admin->tampil_kelas();
        $data['tampil_bk'] = $this->M_admin->tampil_bk();

        $this->load->view('template/header-pds');
        $this->load->view('pembina_pds/pelanggaran_tambah', $data);
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

            $id_admin = $this->session->userdata('ses_id');


            $tgl_kejadian = $this->input->post('tgl_kejadian');
            $timestamp = strtotime($tgl_kejadian);
            $tgl_kejadian = date("d-m-Y", $timestamp);

            $id_kelas = $this->input->post('id_kelas');
            $id_siswa = $this->input->post('id_siswa');
            $id_point = $this->input->post('id_point');
            $tgl_input = date('d-m-Y');
            // $tgl_input = $this->input->post('tgl_input');
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
            redirect('pembina_pds/siswa_detail/' . $id_siswa);
        }
    }


    public function pelanggaran_siswa($id_siswa)
    {
        $data['pelanggaran_siswa'] = $this->M_admin->pelanggaran_siswa($id_siswa);

        $this->load->view('template/header-pds');
        $this->load->view('pembina_pds/pelanggaran_siswa', $data);
        $this->load->view('template/footer');
    }


    public function pelanggaran()
    {
        $data['tampil_pelanggaran'] = $this->M_admin->tampil_pelanggaran();

        $this->load->view('template/header-pds');
        $this->load->view('pembina_pds/pelanggaran', $data);
        $this->load->view('template/footer');
    }

    public function pelanggaran_detail($id_pelanggaran)
    {
        $data['pelanggaran_detail'] = $this->M_admin->pelanggaran_detail($id_pelanggaran);

        $this->load->view('template/header-pds');
        $this->load->view('pembina_pds/pelanggaran_detail', $data);
        $this->load->view('template/footer');
    }


    public function pelanggaran_edit($id_pelanggaran)
    {
        $data['tampil_siswa'] = $this->M_admin->tampil_siswa();
        $data['tampil_point'] = $this->M_admin->tampil_point();
        $data['tampil_kelas'] = $this->M_admin->tampil_kelas();
        $data['tampil_bk'] = $this->M_admin->tampil_bk();

        $data['pelanggaran_edit'] = $this->M_admin->pelanggaran_edit($id_pelanggaran);

        $this->load->view('template/header-pds');
        $this->load->view('pembina_pds/pelanggaran_edit', $data);
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

        $id_admin = $this->session->userdata('ses_id');
        // $id_admin = $this->input->post('id_admin');


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
        redirect('Pembina_pds/pelanggaran');
    }
    //akhir pelanggaran 



}
