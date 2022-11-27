<?php

class M_admin extends CI_Model
{

  // awal modal siswa
  function siswa_detail_bc($ses_id)
  {
    $this->db->where('id_siswa', $ses_id);
    $hasil = $this->db->get('tb_siswa')->result();
    return $hasil;
  }

  function siswa_detail($ses_id)
  {
    $this->db->select('*');
    $this->db->from('tb_siswa');
    $this->db->join('tb_kelas', 'tb_siswa.id_kelas = tb_kelas.id_kelas');
    $this->db->where('id_siswa', $ses_id);
    $query = $this->db->get()->result();
    return $query;
  }

  function tampil_siswa()
  {
    $this->db->select('*');
    $this->db->from('tb_siswa');
    $this->db->join('tb_kelas', 'tb_siswa.id_kelas = tb_kelas.id_kelas');
    $query = $this->db->get()->result();
    return $query;
  }

  function siswa_edit_up($data_edit, $id_siswa)
  {
    $this->db->where('id_siswa', $id_siswa);
    $this->db->update('tb_siswa', $data_edit);
  }

  public function siswa_tambah_up($data_tambah)
  {
    $this->db->insert('tb_siswa', $data_tambah);
  }


  public function siswa_photo_up($data_edit, $id_siswa)
  {
    $this->db->where('id_siswa', $id_siswa);
    $this->db->update('tb_siswa', $data_edit);
  }

  function siswa_hapus_photo($data_edit, $id_siswa)
  {
    $this->db->where($id_siswa);
    $this->db->update('tb_siswa', $data_edit);
  }

  public function cari_siswa($id_siswa)
  {
    $this->db->where('id_siswa', $id_siswa);
    $hasil = $this->db->get('tb_siswa')->result();
    return $hasil;
  }

  public function siswa_hapus($id_siswa)
  {
    $this->db->where($id_siswa);
    $this->db->delete('tb_siswa');
  }

  // akhir modal siswa



  // awal modal point
  function tampil_point()
  {
    $tampil = $this->db->get('tb_point')->result();
    return $tampil;
  }

  public function point_tambah($data_tambah)
  {
    $this->db->insert('tb_point', $data_tambah);
  }

  public function point_hapus($id_point)
  {
    $this->db->where('id_point', $id_point);
    $this->db->delete('tb_point');
  }

  function point_edit($id_point)
  {
    $this->db->where('id_point', $id_point);
    $hasil = $this->db->get('tb_point')->result();
    return $hasil;
  }

  function point_edit_up($data_edit, $id_point)
  {
    $this->db->where('id_point', $id_point);
    $this->db->update('tb_point', $data_edit);
  }
  // ak

  // akhir modal point


  // awal modal kelas

  function tampil_kelas()
  {
    $tampil = $this->db->get('tb_kelas')->result();
    return $tampil;
  }

  public function kelas_tambah_up($data_tambah)
  {
    $this->db->insert('tb_kelas', $data_tambah);
  }

  public function kelas_hapus($id_kelas)
  {
    $this->db->where($id_kelas);
    $this->db->delete('tb_kelas');
  }

  function kelas_edit($id_kelas)
  {
    $this->db->where('id_kelas', $id_kelas);
    $hasil = $this->db->get('tb_kelas')->result();
    return $hasil;
  }


  function kelas_edit_up($data_edit, $id_kelas)
  {
    $this->db->where($id_kelas);
    $this->db->update('tb_kelas', $data_edit);
  }
  // akhir modal kelas


  //awal pelanggaran

  function tampil_bk()
  {
    $this->db->where('status_akun', 'guru_bk');
    $hasil = $this->db->get('tb_admin')->result();
    return $hasil;
  }

  function pelanggaran_tambah_up($data_tambah)
  {
    $this->db->insert('tb_pelanggaran', $data_tambah);
  }

  function tampil_pelanggaran()
  {
    $this->db->select('*');
    $this->db->from('tb_pelanggaran');
    $this->db->join('tb_siswa', 'tb_pelanggaran.id_siswa = tb_siswa.id_siswa');
    $this->db->join('tb_kelas', 'tb_pelanggaran.id_kelas = tb_kelas.id_kelas');
    $this->db->join('tb_admin', 'tb_pelanggaran.id_admin = tb_admin.id_admin');
    $this->db->join('tb_point', 'tb_pelanggaran.id_point = tb_point.id_point');

    $query = $this->db->get()->result();
    return $query;
  }

  function pelanggaran_detail($id_pelanggaran)
  {
    $this->db->select('*');
    $this->db->from('tb_pelanggaran');
    $this->db->join('tb_siswa', 'tb_pelanggaran.id_siswa = tb_siswa.id_siswa');
    $this->db->join('tb_kelas', 'tb_pelanggaran.id_kelas = tb_kelas.id_kelas');
    $this->db->join('tb_admin', 'tb_pelanggaran.id_admin = tb_admin.id_admin');
    $this->db->join('tb_point', 'tb_pelanggaran.id_point = tb_point.id_point');
    $this->db->where('id_pelanggaran', $id_pelanggaran);

    $query = $this->db->get()->result();
    return $query;
  }

  function pelanggaran_siswa($id_siswa)
  {
    $this->db->select('*');
    $this->db->from('tb_pelanggaran');
    $this->db->join('tb_siswa', 'tb_pelanggaran.id_siswa = tb_siswa.id_siswa');
    $this->db->join('tb_kelas', 'tb_pelanggaran.id_kelas = tb_kelas.id_kelas');
    $this->db->join('tb_admin', 'tb_pelanggaran.id_admin = tb_admin.id_admin');
    $this->db->join('tb_point', 'tb_pelanggaran.id_point = tb_point.id_point');
    $this->db->where('tb_pelanggaran.id_siswa', $id_siswa);

    $query = $this->db->get()->result();
    return $query;
  }

  function pelanggaran_edit($id_pelanggaran)
  {
    $this->db->select('*');
    $this->db->from('tb_pelanggaran');
    $this->db->join('tb_siswa', 'tb_pelanggaran.id_siswa = tb_siswa.id_siswa');
    $this->db->join('tb_kelas', 'tb_pelanggaran.id_kelas = tb_kelas.id_kelas');
    $this->db->join('tb_admin', 'tb_pelanggaran.id_admin = tb_admin.id_admin');
    $this->db->join('tb_point', 'tb_pelanggaran.id_point = tb_point.id_point');
    $this->db->where('id_pelanggaran', $id_pelanggaran);

    $query = $this->db->get()->result();
    return $query;
  }

  function pelanggaraan_edit_up($data_edit, $id_pelanggaran)
  {
    $this->db->where('id_pelanggaran', $id_pelanggaran);
    $this->db->update('tb_pelanggaran', $data_edit);
  }

  function pelanggaran_hapus($id_pelanggaran)
  {
    $this->db->where($id_pelanggaran);
    $this->db->delete('tb_pelanggaran');
  }

  // akhir pelanggaran


  // Prestasi awal 

  public function prestasi_tambah_up($data_tambah)
  {
    $this->db->insert('tb_prestasi', $data_tambah);
  }

  function prestasi_siswa($id_siswa)
  {
    $this->db->select('*');
    $this->db->from('tb_prestasi');
    $this->db->join('tb_siswa', 'tb_prestasi.id_siswa = tb_siswa.id_siswa');
    $this->db->where('tb_prestasi.id_siswa', $id_siswa);

    $query = $this->db->get()->result();
    return $query;
  }

  function prestasi_tampil()
  {
    $this->db->select('*');
    $this->db->from('tb_prestasi');
    $this->db->join('tb_siswa', 'tb_prestasi.id_siswa = tb_siswa.id_siswa');
    // $this->db->where('tb_prestasi.id_siswa', $id_siswa);

    $query = $this->db->get()->result();
    return $query;
  }

  function prestasi_hapus($id_prestasi)
  {
    $this->db->where($id_prestasi);
    $this->db->delete('tb_prestasi');
  }

  function prestasi_detail($id_prestasi)
  {
    $this->db->select('*');
    $this->db->from('tb_prestasi');
    $this->db->join('tb_siswa', 'tb_prestasi.id_siswa = tb_siswa.id_siswa');
    $this->db->where('tb_prestasi.id_prestasi', $id_prestasi);

    $query = $this->db->get()->result();
    return $query;
  }

  function prestasi_edit_up($data_edit, $id_prestasi)
  {
    $this->db->where('id_prestasi', $id_prestasi);
    $this->db->update('tb_prestasi', $data_edit);
  }

  // Prestasi akhir




  // admin awal
  function admin_tampil()
  {
    $tampil = $this->db->get('tb_admin')->result();
    return $tampil;
  }

  public function admin_tambah_up($data_tambah)
  {
    $this->db->insert('tb_admin', $data_tambah);
  }

  public function cari_admin($id_admin)
  {
    $this->db->where('id_admin', $id_admin);
    $hasil = $this->db->get('tb_admin')->result();
    return $hasil;
  }

  function admin_edit_up($data_edit, $id_admin)
  {
    $this->db->where('id_admin', $id_admin);
    $this->db->update('tb_admin', $data_edit);
  }

  function admin_hapus($id_admin)
  {
    $this->db->where($id_admin);
    $this->db->delete('tb_admin');
  }

  // admin akhir

}
