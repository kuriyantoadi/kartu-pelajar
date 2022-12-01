<?php

class M_siswa extends CI_Model
{

  function tampil_siswa($ses_id)
  {
    $this->db->select('*');
    $this->db->from('tb_siswa');
    $this->db->join('tb_kelas', 'tb_siswa.id_kelas = tb_kelas.id_kelas');
    $this->db->where('id_siswa', $ses_id);
    $query = $this->db->get()->result();
    return $query;
  }

  function siswa_password($data_edit, $id_siswa)
  {
    $this->db->where('id_siswa', $id_siswa);
    $this->db->update('tb_siswa', $data_edit);
  }


  // awal prestasi 
  function tampil_prestasi($id_siswa)
  {
    $this->db->select('*');
    $this->db->from('tb_siswa');
    $this->db->join('tb_prestasi', 'tb_siswa.id_siswa = tb_prestasi.id_siswa');
    $query = $this->db->get()->result();
    return $query;
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

  // akhir prestasi


  // awal pelanggaran

  function tampil_pelanggaran($id_siswa)
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
  // akhir pelanggaran
}
