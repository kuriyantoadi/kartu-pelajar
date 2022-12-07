<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // $this->load->model('M_login');
        $this->load->model('M_siswa');
        $this->load->model('M_guru_bk');


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
        $ses_id = $this->session->userdata('ses_id');
        $data['tampil'] = $this->M_siswa->tampil_siswa($ses_id);

        $this->load->view('template/header-siswa');
        $this->load->view('siswa/profil', $data);
        $this->load->view('template/footer');
    }


    // awal prestasi
    public function prestasi()
    {
        $id_siswa = $this->session->userdata('ses_id');
        $data['tampil_prestasi'] = $this->M_siswa->tampil_prestasi($id_siswa);

        $this->load->view('template/header-siswa');
        $this->load->view('siswa/prestasi', $data);
        $this->load->view('template/footer');
    }

    public function prestasi_detail($id_prestasi)
    {
        $data['tampil_prestasi_detail'] = $this->M_siswa->prestasi_detail($id_prestasi);

        $this->load->view('template/header-siswa');
        $this->load->view('siswa/prestasi_detail', $data);
        $this->load->view('template/footer');
    }

    // akhir prestasi



    // awal pelanggaran

    public function pelanggaran()
    {
        $id_siswa = $this->session->userdata('ses_id');
        $data['tampil_pelanggaran'] = $this->M_siswa->tampil_pelanggaran($id_siswa);

        $this->load->view('template/header-siswa');
        $this->load->view('siswa/pelanggaran', $data);
        $this->load->view('template/footer');
    }

    public function pelanggaran_detail($id_pelanggaran)
    {
        $data['pelanggaran_detail'] = $this->M_siswa->pelanggaran_detail($id_pelanggaran);

        $this->load->view('template/header-siswa');
        $this->load->view('siswa/pelanggaran_detail', $data);
        $this->load->view('template/footer');
    }


    // akhir pelanggaran


    // awal point
    public function point_siswa()
    {
        $ses_id = $this->session->userdata('ses_id');
        $data['tampil'] = $this->M_siswa->tampil_siswa($ses_id);

        $data['total_point'] = $this->M_guru_bk->total_point($ses_id);


        $this->load->view('template/header-siswa');
        $this->load->view('siswa/point_siswa', $data);
        $this->load->view('template/footer');
    }


    // akhir point



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
        $password_konfirmasi = $this->input->post('password_konfirmasi');

        if ($password_baru != $password_konfirmasi) {
            $this->session->set_flashdata('msg', '
						<div class="alert alert-danger alert-dismissible fade show" role="alert">
							<strong>Password Konfirmasi Tidak Sesuai</strong>

							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>');
            redirect('Siswa/password');
        }

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
