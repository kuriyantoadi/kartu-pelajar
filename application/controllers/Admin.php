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




    // awal function siswa

    public function siswa()
    {
        $data['tampil_siswa'] = $this->M_admin->tampil_siswa();

        $this->load->view('template/header-admin');
        $this->load->view('admin/siswa', $data);
        $this->load->view('template/footer');
    }

    public function siswa_tambah()
    {
        $data['tampil_kelas'] = $this->M_admin->tampil_kelas();

        $this->load->view('template/header-admin');
        $this->load->view('admin/siswa_tambah', $data);
        $this->load->view('template/footer');
    }


    public function siswa_tambah_up()
    {
        $config['upload_path']      = 'assets/photo_siswa/';
        $config['allowed_types']    = 'gif|jpg|png';
        $config['max_size']         = 2000;
        $config['encrypt_name']     = TRUE;
        // $id_lapangan = $this->input->post('id_lapangan');


        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('photo_siswa')) {
            $error = array('error' => $this->upload->display_errors());
            echo var_dump($error);
            // $this->load->view('upload', $error);
        } else {
            $_data = array('upload_data' => $this->upload->data());

            $nisn = $this->input->post('nisn');
            $nama_siswa = $this->input->post('nama_siswa');
            $id_kelas = $this->input->post('id_kelas');
            $password = $this->input->post('password');
            $tgl_lahir = $this->input->post('tgl_lahir');
            $tempat_lahir = $this->input->post('tempat_lahir');
            $agama = $this->input->post('agama');
            $alamat = $this->input->post('alamat');

            $data_tambah = array(
                'photo_siswa' => $_data['upload_data']['file_name'],
                'nisn' => $nisn,
                'nama_siswa' => $nama_siswa,
                'id_kelas' => $id_kelas,
                'password' => sha1($password),
                'tgl_lahir' => $tgl_lahir,
                'tempat_lahir' => $tempat_lahir,
                'agama' => $agama,
                'alamat' => $alamat
            );

            $this->M_admin->siswa_tambah_up($data_tambah);

            $this->session->set_flashdata('msg', '
						<div class="alert alert-primary alert-dismissible fade show" role="alert">
							<strong>Tambah Siswa Berhasil</strong>

							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>');
            redirect('Admin/siswa');
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
							<strong>Tambah Siswa Berhasil</strong>

							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>');
        redirect('Admin/siswa');
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
        $data['tampil_kelas'] = $this->M_admin->tampil_kelas();


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
							<strong>Tambah Siswa Berhasil</strong>

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

        $this->load->view('template/header-admin');
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
    // akhir function siswa




    // awal point

    public function point()
    {
        $data['tampil_point'] = $this->M_admin->tampil_point();

        $this->load->view('template/header-admin');
        $this->load->view('admin/point', $data);
        $this->load->view('template/footer');
    }

    public function point_tambah()
    {
        $this->load->view('template/header-admin');
        $this->load->view('admin/point_tambah');
        $this->load->view('template/footer');
    }


    public function point_tambah_up()
    {
        $nama_point = $this->input->post('nama_point');
        $jml_point = $this->input->post('jml_point');

        $data_tambah = array(
            'nama_point' => $nama_point,
            'jml_point' => $jml_point

        );

        $this->M_admin->point_tambah($data_tambah);

        $this->session->set_flashdata('msg', '
						<div class="alert alert-primary alert-dismissible fade show" role="alert">
							<strong>Tambah Point Berhasil</strong>

							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>');
        redirect('Admin/point');
    }


    public function point_hapus($id_point)
    {
        $success = $this->M_admin->point_hapus($id_point);

        $this->session->set_flashdata('msg', '
						<div class="alert alert-warning alert-dismissible fade show" role="alert">
							<strong>Hapus Data Berhasil</strong>

							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>');
        redirect('Admin/point');
    }

    public function point_edit($id_point)
    {
        $data['tampil_point'] = $this->M_admin->point_edit($id_point);

        $this->load->view('template/header-admin');
        $this->load->view('admin/point_edit', $data);
        $this->load->view('template/footer');
    }

    public function point_edit_up()
    {
        $id_point = $this->input->post('id_point');
        $nama_point = $this->input->post('nama_point');
        $jml_point = $this->input->post('jml_point');

        $data_edit = array(
            'nama_point' => $nama_point,
            'jml_point' => $jml_point,

        );

        $this->M_admin->point_edit_up($data_edit, $id_point);

        $this->session->set_flashdata('msg', '
              <div class="alert alert-primary alert-dismissible fade show" role="alert">
                <strong>Edit Point Berhasil</strong>

                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>');
        redirect('Admin/point');
    }

    // akhir point



    // awal function kelas

    public function kelas()
    {
        $data['tampil_kelas'] = $this->M_admin->tampil_kelas();

        $this->load->view('template/header-admin');
        $this->load->view('admin/kelas', $data);
        $this->load->view('template/footer');
    }

    public function kelas_tambah()
    {
        $this->load->view('template/header-admin');
        $this->load->view('admin/kelas_tambah');
        $this->load->view('template/footer');
    }

    public function kelas_tambah_up()
    {
        $tingkatan = $this->input->post('tingkatan');
        $jurusan = $this->input->post('jurusan');
        $kode_kelas = $this->input->post('kode_kelas');
        $angkatan = $this->input->post('angkatan');

        $data_tambah = array(
            'tingkatan' => $tingkatan,
            'jurusan' => $jurusan,
            'kode_kelas' => $kode_kelas,
            'angkatan' => $angkatan
        );

        $this->M_admin->kelas_tambah_up($data_tambah);

        $this->session->set_flashdata('msg', '
						<div class="alert alert-primary alert-dismissible fade show" role="alert">
							<strong>Tambah Kelas Berhasil</strong>

							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>');
        redirect('Admin/kelas');
    }


    public function kelas_hapus($id_kelas)
    {
        $id_kelas = array('id_kelas' => $id_kelas);

        $success = $this->M_admin->kelas_hapus($id_kelas);
        $this->session->set_flashdata('msg', '
						<div class="alert alert-warning alert-dismissible fade show" role="alert">
							<strong>Hapus Data Berhasil</strong>

							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>');
        redirect('Admin/kelas');
    }

    public function kelas_edit($id_kelas)
    {
        $data['kelas_edit'] = $this->M_admin->kelas_edit($id_kelas);

        $this->load->view('template/header-admin');
        $this->load->view('admin/kelas_edit', $data);
        $this->load->view('template/footer');
    }

    public function kelas_edit_up()
    {
        $id_kelas = $this->input->post('id_kelas');
        $tingkatan = $this->input->post('tingkatan');
        $jurusan = $this->input->post('jurusan');
        $kode_kelas = $this->input->post('kode_kelas');
        $angkatan = $this->input->post('angkatan');

        // echo $id_kelas . $tingkatan . $jurusan . $kode_kelas . $angkatan;

        $data_edit = array(
            'tingkatan' => $tingkatan,
            'jurusan' => $jurusan,
            'kode_kelas' => $kode_kelas,
            'angkatan' => $angkatan
        );

        $id_kelas = array('id_kelas' => $id_kelas);
        $this->M_admin->kelas_edit_up($data_edit, $id_kelas);

        $this->session->set_flashdata('msg', '
              <div class="alert alert-primary alert-dismissible fade show" role="alert">
                <strong>Edit Kelas Berhasil</strong>

                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>');
        redirect('Admin/kelas');
    }


    // akhir function kelas


    public function pelanggaran()
    {
        $data['tampil_siswa'] = $this->M_admin->tampil_siswa();

        $this->load->view('template/header-admin');
        $this->load->view('admin/pelanggaran', $data);
        $this->load->view('template/footer');
    }

    public function pelanggaran_tambah()
    {
        $data['tampil_siswa'] = $this->M_admin->tampil_siswa();
        $data['tampil_point'] = $this->M_admin->tampil_point();
        $data['tampil_kelas'] = $this->M_admin->tampil_kelas();
        $data['tampil_bk'] = $this->M_admin->tampil_bk();

        $this->load->view('template/header-admin');
        $this->load->view('admin/pelanggaran_tambah', $data);
        $this->load->view('template/footer');
    }


    // awal prestasi
    public function prestasi()
    {
        $data['tampil_siswa'] = $this->M_admin->tampil_siswa();

        $this->load->view('template/header-admin');
        $this->load->view('admin/prestasi', $data);
        $this->load->view('template/footer');
    }

    public function prestasi_tambah($id_siswa)
    {
        $data['tampil_siswa'] = $this->M_admin->cari_siswa($id_siswa);

        $this->load->view('template/header-admin');
        $this->load->view('admin/prestasi', $data);
        $this->load->view('template/footer');
    }

    // akhir prestasi


    // Password
    public function password()
    {
        $this->load->view('template/header-admin');
        $this->load->view('admin/password');
        $this->load->view('template/footer');
    }


    public function sertifikat_cetak($id_siswa)
    {
        $data['tampil'] = $this->M_admin->sertifikat_cetak($id_siswa);
        $this->load->view('siswa/sertifikat', $data);
    }
}
