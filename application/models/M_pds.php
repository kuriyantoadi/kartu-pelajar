<?php

class M_pds extends CI_Model
{

    // awal siswa

    function tampil_siswa()
    {
        $this->db->select('*');
        $this->db->from('tb_siswa');
        $this->db->join('tb_kelas', 'tb_siswa.id_kelas = tb_kelas.id_kelas');
        $query = $this->db->get()->result();
        return $query;
    }

    function siswa_detail($id_siswa)
    {
        $this->db->select('*');
        $this->db->from('tb_siswa');
        $this->db->join('tb_kelas', 'tb_siswa.id_kelas = tb_kelas.id_kelas');
        $this->db->where('id_siswa', $id_siswa);
        $query = $this->db->get()->result();
        return $query;
    }

    function tampil_kelas()
    {
        $this->db->where('kondisi', 'aktif');
        $hasil = $this->db->get('tb_kelas')->result();
        return $hasil;
    }

    // akhir siswa
}
