<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_admin');

        // session login
        //if ($this->session->userdata('admin') != true) {
            // $url = base_url('Admin/f');
            // redirect($url);
        //}
    }

    public function index()
    {
         $this->load->view('admin/login');
    }

    public function f()
    {
        // $this->load->view('Admin/login');
        echo "cetak";
    }

    public function dashboard()
    {
        $this->load->view('template/header-admin');
        $this->load->view('admin/dashboard');
        $this->load->view('template/footer');
    }

    public function siswa()
    {
        $data['tampil_siswa'] = $this->M_admin->tampil_siswa();

        $this->load->view('template/header-admin');
        $this->load->view('admin/siswa', $data);
        $this->load->view('template/footer');
    }


    // tekno awal
    public function siswa_detail($id_siswa)
    {
        $data['tampil_siswa'] = $this->M_admin->siswa_detail($id_siswa);

        $this->load->view('template/header-admin');
        $this->load->view('admin/siswa_detail', $data);
        $this->load->view('template/footer');
    }


    public function siswa_edit_up()
    {
        $id_siswa = $this->input->post('id_siswa');
        $nama_siswa = $this->input->post('nama_siswa');
        $nisn = $this->input->post('nisn');
        $kelas = $this->input->post('kelas');
        $kondisi_mpls = $this->input->post('kondisi_mpls');

        $kode_siswa = array('id_siswa' => $id_siswa);

        $data_edit = array(
            'nama_siswa' => $nama_siswa,
            'nisn' => $nisn,
            'kelas' => $kelas,
            'kondisi_mpls' => $kondisi_mpls
        );

        $this->M_admin->siswa_edit_up($data_edit, $kode_siswa);

        $this->session->set_flashdata('msg', '
						<div class="alert alert-primary alert-dismissible fade show" role="alert">
							<strong>Edit data berhasil</strong>

							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>');
        redirect('Admin/siswa_detail/' . $id_siswa);
    }

    public function sertifikat_cetak($id_siswa)
    {
        $data['tampil'] = $this->M_admin->sertifikat_cetak($id_siswa);
        $this->load->view('siswa/sertifikat', $data);
    }
    
}
