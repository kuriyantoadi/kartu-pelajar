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
        $this->load->view('template/header-siswa');
        $this->load->view('siswa/dashboard');
        $this->load->view('template/footer');
    }


    public function profil()
    {
        $this->load->view('template/header-siswa');
        $this->load->view('siswa/profil');
        $this->load->view('template/footer');
    }

    public function download()
    {
        $ses_id = $this->session->userdata('ses_id');
        $data['tampil'] = $this->M_siswa->data_siswa($ses_id);

        $this->load->view('template/header-siswa');
        $this->load->view('siswa/download', $data);
        $this->load->view('template/footer');
    }

    public function bantuan()
    {
        $this->load->view('template/header-siswa');
        $this->load->view('siswa/bantuan');
        $this->load->view('template/footer');
    }

    public function sertifikat()
    {
        $ses_id = $this->session->userdata('ses_id');
        $data['tampil'] = $this->M_siswa->data_siswa($ses_id);

        $this->load->view('siswa/sertifikat', $data);
    }
}
