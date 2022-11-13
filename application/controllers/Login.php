<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_login');
        // $this->load->model('M_siswa');
    }

    public function index()
    {
        $this->load->view('siswa/login');
    }

    public function login_siswa()
    {
        $nisn = htmlspecialchars($this->input->post('nisn', true), ENT_QUOTES);
        $password = htmlspecialchars($this->input->post('password', true), ENT_QUOTES);

        $cek_login = $this->M_login->login_siswa($nisn, $password);

        if ($cek_login->num_rows() > 0) {
            $data = $cek_login->row_array();

            if ($data['status'] == 'siswa') {
                $this->session->set_userdata('siswa', true);
                $this->session->set_userdata('ses_id', $data['id_siswa']);
                $this->session->set_userdata('ses_nisn', $data['nisn']);

                redirect('Siswa');
                // echo "test'";


            } else {
                $url = base_url('Login1');
                echo $this->session->set_flashdata('msg', '

        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          NISN atau Password Salah<br> Silahkan Login Kembali
        </div>
        ');
                // redirect($url);
            }
        }

        $this->session->set_flashdata('msg', '
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      NISN atau Password Salah<br> Silahkan Login Kembali
    </div>
    ');
        // $url = base_url('C_login/siswa_tekno');
        // redirect($url);
    }
    //Login Siswa Tekno Akhir


    // Login Admin

    public function fa()
    {
        $this->load->view('admin/login');
    }

    public function login_admin()
    {
        $username = htmlspecialchars($this->input->post('username', true), ENT_QUOTES);
        $password = htmlspecialchars($this->input->post('password', true), ENT_QUOTES);

        $cek_login = $this->M_login->admin_login($username, $password);

        if ($cek_login->num_rows() > 0) {
            $data = $cek_login->row_array();

            if ($data['status'] == 'admin') {
                $this->session->set_userdata('admin', true);
                $this->session->set_userdata('ses_id', $data['id_admin']);
                $this->session->set_userdata('ses_user', $data['username']);
                redirect('Admin/dashboard');
            } elseif ($data['status'] == 'guru_bk') {
                $this->session->set_userdata('guru_bk', true);
                $this->session->set_userdata('ses_id', $data['id_admin']);
                $this->session->set_userdata('ses_user', $data['username']);
                redirect('Admin/dashboard');
            } else {
                $url = base_url('Login/fa');
                echo $this->session->set_flashdata('msg', '

        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          Username atau Password Salah<br> Silahkan Login Kembali
        </div>
        ');
                redirect($url);
            }
        }

        $this->session->set_flashdata('msg', '
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      Username atau Password Salah<br> Silahkan Login Kembali
    </div>
    ');
        $url = base_url('Login/fa');
        redirect($url);
    }

    public function siswa_logout()
    {
        $this->session->sess_destroy();
        $url = base_url();
        redirect('Login/index');
    }

    public function admin_logout()
    {
        $this->session->sess_destroy();
        redirect('Login/fa');
    }
}
