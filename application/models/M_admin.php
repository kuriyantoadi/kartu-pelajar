<?php

class M_admin extends CI_Model
{

  // awal modal siswa
  function siswa_detail($ses_id)
  {
    $this->db->where('id_siswa', $ses_id);
    $hasil = $this->db->get('tb_siswa')->result();
    return $hasil;
  }

  function tampil_siswa()
  {
    $this->db->select('*');
    $this->db->from('tb_siswa');
    $this->db->join('tb_kelas', 'tb_siswa.id_kelas = tb_kelas.id_kelas');
    $query = $this->db->get()->result();
    return $query;
  }

  public function siswa_tambah_up($data_tambah)
  {
    $this->db->insert('tb_siswa', $data_tambah);
  }

  function siswa_edit_up($data_edit, $kode_siswa)
  {
    $this->db->where($kode_siswa);
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


  function sertifikat_cetak($id_siswa)
  {
    $this->db->where('id_siswa', $id_siswa);
    $hasil = $this->db->get('tb_siswa')->result();
    return $hasil;
  }


  public function siswa_hapus_tekno($id_siswa)
  {
    $this->db->where($id_siswa);
    $this->db->delete('tb_siswa_tekno');
  }

  function siswa_detail_tekno($id_siswa)
  {
    $this->db->where('id_siswa', $id_siswa);
    $hasil = $this->db->get('tb_siswa_tekno')->result();
    return $hasil;
  }

  public function siswa_edit_tekno($id_siswa)
  {
    $this->db->where('id_siswa', $id_siswa);
    $hasil = $this->db->get('tb_siswa_tekno')->result();
    return $hasil;
  }



  public function siswa_print_tekno($id_siswa)
  {
    $this->db->where('id_siswa', $id_siswa);
    $hasil = $this->db->get('tb_siswa_tekno')->result();
    return $hasil;
  }

  public function siswa_pass_tekno($id_siswa)
  {
    $this->db->where('id_siswa', $id_siswa);
    $hasil = $this->db->get('tb_siswa_tekno')->result();
    return $hasil;
  }

  function siswa_pass_up_tekno($data_edit, $kode_siswa)
  {
    $this->db->where($kode_siswa);
    $this->db->update('tb_siswa_tekno', $data_edit);
  }
  // tekno


  //bismen awal
  function siswa_bismen()
  {
    $tampil = $this->db->get('tb_siswa_bismen')->result();
    return $tampil;
  }


  public function siswa_hapus_bismen($id_siswa)
  {
    $this->db->where($id_siswa);
    $this->db->delete('tb_siswa_bismen');
  }

  function siswa_detail_bismen($id_siswa)
  {
    $this->db->where('id_siswa', $id_siswa);
    $hasil = $this->db->get('tb_siswa_bismen')->result();
    return $hasil;
  }

  public function siswa_edit_bismen($id_siswa)
  {
    $this->db->where('id_siswa', $id_siswa);
    $hasil = $this->db->get('tb_siswa_bismen')->result();
    return $hasil;
  }

  function siswa_edit_up_bismen($data_edit, $kode_siswa)
  {
    $this->db->where($kode_siswa);
    $this->db->update('tb_siswa_bismen', $data_edit);
  }

  public function print_bismen($id_siswa)
  {
    $this->db->where('id_siswa', $id_siswa);
    $hasil = $this->db->get('tb_siswa_bismen')->result();
    return $hasil;
  }

  public function siswa_pass_bismen($id_siswa)
  {
    $this->db->where('id_siswa', $id_siswa);
    $hasil = $this->db->get('tb_siswa_bismen')->result();
    return $hasil;
  }

  function siswa_pass_up_bismen($data_edit, $kode_siswa)
  {
    $this->db->where($kode_siswa);
    $this->db->update('tb_siswa_bismen', $data_edit);
  }
  // bismen akhir

}
