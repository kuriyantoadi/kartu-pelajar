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

    public function Admin()
    {
        $this->load->view('admin/login');
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
                $this->session->set_userdata('ses_user', $data['nisn']);
                $this->session->set_userdata('ses_nama', $data['nama_siswa']);

                redirect('Siswa/index');
            } elseif ($data['status'] == 'guru_bk') {
                $this->session->set_userdata('guru_bk', true);
                $this->session->set_userdata('ses_id', $data['id_admin']);
                $this->session->set_userdata('ses_user', $data['username']);
                redirect('Admin/dashboard');
            } else {
                echo $this->session->set_flashdata(
                    'msg',
                    '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Username atau Password Salah<br> Silahkan Login Kembali
                </div>'
                );
                // echo "test";
                redirect('Login/index');
            }
            redirect('Login/index');
        }

        $this->session->set_flashdata('msg', '
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      Username atau Password Salah<br> Silahkan Login Kembali
    </div>
    ');

        redirect('Login/index');
    }


    // Login Admin
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
                redirect('Guru_bk/dashboard');
            } elseif ($data['status'] == 'guru_pds') {
                $this->session->set_userdata('guru_pds', true);
                $this->session->set_userdata('ses_id', $data['id_admin']);
                $this->session->set_userdata('ses_user', $data['username']);
                redirect('Pembina_pds/dashboard');
            } elseif ($data['status'] == 'guru_walas') {
                $this->session->set_userdata('guru_walas', true);
                $this->session->set_userdata('ses_id', $data['id_admin']);
                $this->session->set_userdata('ses_user', $data['username']);
                redirect('Walas/dashboard');
            } else {
                $url = base_url('Admin/index');
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
        $url = base_url('Admin/index');
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
        redirect('Login/admin');
    }
}
