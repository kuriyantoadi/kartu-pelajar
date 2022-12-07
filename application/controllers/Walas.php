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

    // Password


}
