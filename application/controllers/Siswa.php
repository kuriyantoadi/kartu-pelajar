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
        $this->load->model('M_admin');

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

    public function cetak()
    {
        $ses_id = $this->session->userdata('ses_id');
        $data['tampil'] = $this->M_siswa->tampil_siswa($ses_id);

        $this->load->view('template/header-siswa');
        $this->load->view('siswa/cetak', $data);
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


    public function profil_edit()
    {
        $id_siswa = $this->session->userdata('ses_id');

        $data['tampil_siswa'] = $this->M_admin->siswa_detail($id_siswa);
        $data['tampil_kelas'] = $this->M_admin->tampil_kelas();


        $this->load->view('template/header-siswa');
        $this->load->view('siswa/profil_edit', $data);
        $this->load->view('template/footer');
    }

    public function profil_edit_up()
    {
        $id_siswa = $this->session->userdata('ses_id');

        $nisn = $this->input->post('nisn');
        $nama_siswa = $this->input->post('nama_siswa');
        $id_kelas = $this->input->post('id_kelas');
        $tgl_lahir = $this->input->post('tgl_lahir');
        $tempat_lahir = $this->input->post('tempat_lahir');
        $agama = $this->input->post('agama');
        $alamat = $this->input->post('alamat');

        $data_edit = array(
            // 'photo_siswa' => $_data['upload_data']['file_name'],
            'nisn' => $nisn,
            'nama_siswa' => $nama_siswa,
            'id_kelas' => $id_kelas,
            'tgl_lahir' => $tgl_lahir,
            'tempat_lahir' => $tempat_lahir,
            'agama' => $agama,
            'alamat' => $alamat
        );

        $this->M_admin->siswa_edit_up($data_edit, $id_siswa);

        $this->session->set_flashdata('msg', '
						<div class="alert alert-primary alert-dismissible fade show" role="alert">
							<strong>Edit Siswa Berhasil</strong>

							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>');
        redirect('Siswa/profil/');
    }


    public function photo_edit()
    {
        $ses_id = $this->session->userdata('ses_id');
        $data['tampil'] = $this->M_siswa->tampil_siswa($ses_id);

        $this->load->view('template/header-siswa');
        $this->load->view('siswa/photo_edit', $data);
        $this->load->view('template/footer');
    }


    public function siswa_photo_up()
    {
        $config['upload_path']      = 'assets/photo_siswa/';
        $config['allowed_types']    = 'gif|jpg|png';
        $config['max_size']         = 4000;
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
            redirect('Siswa/profil/');
        }
    }


    public function siswa_hapus_photo($id_siswa, $photo_siswa)
    {
        $kode_siswa = array('id_siswa' => $id_siswa);

        $hapus_photo = "assets/photo_siswa/" . $photo_siswa;
        unlink($hapus_photo);

        $data_edit = array(
            'photo_siswa' => '',
        );

        $this->M_siswa->siswa_hapus_photo($data_edit, $kode_siswa);

        $this->session->set_flashdata('msg', '
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Hapus Data Berhasil</strong>

                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>');
        redirect('Siswa/profil');
    }
    // akhir prestasi 

    public function sertifikat()
    {
        $ses_id = $this->session->userdata('ses_id');
        $data['tampil'] = $this->M_siswa->data_siswa($ses_id);

        $this->load->view('siswa/sertifikat', $data);
    }
}
