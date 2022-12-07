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
            $url = base_url('Login/Walas');
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


    // awal siswa
    public function siswa()
    {
        $id_admin = $this->session->userdata('ses_id');
        $cek_walas = $this->M_walas->cek_walas($id_admin);

        //tampil kelas
        foreach ($cek_walas as $row) {
            $id_kelas = $row->id_kelas;
        }

        if (empty($cek_walas)) {
            //jika akun tidak tersambung dengan data kelas diwali kelas
            $this->load->view('template/header-walas');
            $this->load->view('walas/siswa_kosong');
            $this->load->view('template/footer');
        } else {
            // jika akun tersambung dengan data kelas
            $data['tampil_siswa'] = $this->M_walas->siswa_perkelas($id_kelas);

            $this->load->view('template/header-walas');
            $this->load->view('walas/siswa', $data);
            $this->load->view('template/footer');
        }
    }


    public function siswa_edit_up()
    {
        $id_siswa = $this->input->post('id_siswa');
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

        // var_dump($id_siswa);

        $this->M_admin->siswa_edit_up($data_edit, $id_siswa);

        $this->session->set_flashdata('msg', '
						<div class="alert alert-primary alert-dismissible fade show" role="alert">
							<strong>Edit Siswa Berhasil</strong>

							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>');
        redirect('Admin/siswa_detail/' . $id_siswa);
    }


    public function siswa_photo($id_siswa)
    {
        $data['tampil_siswa'] = $this->M_admin->siswa_detail($id_siswa);
        $data['tampil_kelas'] = $this->M_admin->tampil_kelas();


        $this->load->view('template/header-admin');
        $this->load->view('admin/siswa_photo', $data);
        $this->load->view('template/footer');
    }


    public function siswa_password($id_siswa)
    {
        $data['tampil_siswa'] = $this->M_admin->siswa_detail($id_siswa);

        $this->load->view('template/header-admin');
        $this->load->view('admin/siswa_password', $data);
        $this->load->view('template/footer');
    }

    public function siswa_password_up()
    {
        $id_siswa = $this->input->post('id_siswa');
        $password_baru = $this->input->post('password_baru');
        $password_konfimrasi = $this->input->post('password_konfirmasi');


        if ($password_baru != $password_konfimrasi) {
            $this->session->set_flashdata('msg', '
						<div class="alert alert-danger alert-dismissible fade show" role="alert">
							<strong>Password Tidak Sesuai</strong>

							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>');
            redirect('Admin/siswa_password/' . $id_siswa);
        }

        $data_edit = array(
            'password' => sha1($password_baru),
        );

        $this->M_admin->siswa_edit_up($data_edit, $id_siswa);

        $this->session->set_flashdata('msg', '
						<div class="alert alert-primary alert-dismissible fade show" role="alert">
							<strong>Perubahan Password Berhasil</strong>

							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>');
        redirect('Admin/siswa_detail/' . $id_siswa);
    }

    public function siswa_photo_up()
    {
        $config['upload_path']      = 'assets/photo_siswa/';
        $config['allowed_types']    = 'gif|jpg|png';
        $config['max_size']         = 2000;
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
            redirect('Admin/siswa_detail/' . $id_siswa);
        }
    }


    public function siswa_detail($id_siswa)
    {
        $data['tampil_siswa'] = $this->M_admin->siswa_detail($id_siswa);

        $this->load->view('template/header-walas');
        $this->load->view('admin/siswa_detail', $data);
        $this->load->view('template/footer');
    }

    public function siswa_hapus($id_siswa)
    {
        $id_siswa = array('id_siswa' => $id_siswa);

        $success = $this->M_admin->siswa_hapus($id_siswa);
        $this->session->set_flashdata('msg', '
						<div class="alert alert-warning alert-dismissible fade show" role="alert">
							<strong>Hapus Data Berhasil</strong>

							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>');
        redirect('Admin/siswa');
    }

    public function siswa_hapus_photo($id_siswa, $photo_siswa)
    {
        $kode_siswa = array('id_siswa' => $id_siswa);

        $hapus_photo = "assets/photo_siswa/" . $photo_siswa;
        unlink($hapus_photo);

        $data_edit = array(
            'photo_siswa' => '',
        );

        $this->M_admin->siswa_hapus_photo($data_edit, $kode_siswa);

        $this->session->set_flashdata('msg', '
						<div class="alert alert-warning alert-dismissible fade show" role="alert">
							<strong>Hapus Data Berhasil</strong>

							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>');
        redirect('Admin/siswa_photo/' . $id_siswa);
    }


    public function siswa_edit($id_siswa)
    {
        $data['tampil_siswa'] = $this->M_admin->siswa_detail($id_siswa);
        $data['tampil_kelas'] = $this->M_admin->tampil_kelas();


        $this->load->view('template/header-admin');
        $this->load->view('admin/siswa_edit', $data);
        $this->load->view('template/footer');
    }
    // akhir siswa
}
