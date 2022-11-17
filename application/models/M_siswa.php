<?php

class M_siswa extends CI_Model
{

  function tampil_siswa($ses_id)
  {
    $this->db->where('id_siswa', $ses_id);
    $hasil = $this->db->get('tb_siswa')->result();
    return $hasil;
  }

  function siswa_password($data_edit, $id_siswa)
  {
    $this->db->where('id_siswa', $id_siswa);
    $this->db->update('tb_siswa', $data_edit);
  }

  function tampil_prestasi($id_siswa)
  {
    $this->db->select('*');
    $this->db->from('tb_siswa');
    $this->db->join('tb_prestasi', 'tb_siswa.id_siswa = tb_prestasi.id_siswa');
    $query = $this->db->get()->result();
    return $query;
  }
}
