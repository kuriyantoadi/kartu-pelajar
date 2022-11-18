<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // $this->load->model('M_login');
        $this->load->model('M_siswa');

        // session login
        if ($this->session->userdata('siswa') != true) {
            $url = base_url('Login');
            // redirect($url);
        }
    }

    //Login User


    public function index()
    {
        $ses_id = $this->session->userdata('ses_id');
        $data['tampil'] = $this->M_siswa->tampil_siswa($ses_id);

        $this->load->view('template/header-siswa');
        $this->load->view('siswa/dashboard', $data);
        $this->load->view('template/footer');
    }

    public function prestasi()
    {
        $id_siswa = $this->session->userdata('ses_id');
        $data['tampil_prestasi'] = $this->M_siswa->tampil_prestasi($id_siswa);

        $this->load->view('template/header-siswa');
        $this->load->view('siswa/prestasi', $data);
        $this->load->view('template/footer');
    }

    public function page()
    {
        $this->load->view('siswa/page-blank');
    }

    public function page2()
    {
        $this->load->view('siswa/page-blank2');
    }

    public function password()
    {
        $ses_id = $this->session->userdata('ses_id');
        $data['tampil'] = $this->M_siswa->tampil_siswa($ses_id);

        $this->load->view('template/header-siswa');
        $this->load->view('siswa/password', $data);
        $this->load->view('template/footer');
    }

    public function password_up()
    {
        $id_siswa = $this->input->post('id_siswa');
        $password_baru = $this->input->post('password_baru');

        $data_edit = array(
            'password' => sha1($password_baru),
        );

        $this->M_siswa->siswa_password($data_edit, $id_siswa);

        $this->session->set_flashdata('msg', '
						<div class="alert alert-primary alert-dismissible fade show" role="alert">
							<strong>Ganti Password Siswa Berhasil</strong>

							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>');
        redirect('Siswa/password');
    }


    //awal prestasi



    public function prestasi_lihat()
    {
        $id_siswa = $this->session->userdata('ses_id');
        $data['tampil'] = $this->M_siswa->tampil_prestasi($id_siswa);

        $this->load->view('template/header-siswa');
        $this->load->view('siswa/prestasi_lihat', $data);
        $this->load->view('template/footer');
    }


    // akhir prestasi 

    public function sertifikat()
    {
        $ses_id = $this->session->userdata('ses_id');
        $data['tampil'] = $this->M_siswa->data_siswa($ses_id);

        $this->load->view('siswa/sertifikat', $data);
    }
}
