<?php

class M_walas extends CI_Model
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


    function cek_walas($id_admin)
    {
        $this->db->select('*');
        $this->db->from('tb_walas');
        $this->db->where('id_admin', $id_admin);
        $query = $this->db->get()->result();
        return $query;
    }


    function siswa_perkelas($id_kelas)
    {
        $this->db->select('*');
        $this->db->from('tb_siswa');
        $this->db->join('tb_kelas', 'tb_siswa.id_kelas = tb_kelas.id_kelas');
        $this->db->where('tb_siswa.id_kelas', $id_kelas);
        $query = $this->db->get()->result();
        return $query;
    }

    // akhir siswa

    // awal prestasi


    function prestasi_perkelas($id_kelas)
    {
        $this->db->select('*');
        $this->db->from('tb_siswa');
        $this->db->join('tb_kelas', 'tb_siswa.id_kelas = tb_kelas.id_kelas');
        $this->db->join('tb_prestasi', 'tb_siswa.id_siswa = tb_prestasi.id_siswa');
        $this->db->where('tb_siswa.id_kelas', $id_kelas);
        $query = $this->db->get()->result();
        return $query;
    }
    // akhir prestasi

    // awal pelanggaran

    function pelanggaran_perkelas($id_kelas)
    {
        $this->db->select('*');
        $this->db->from('tb_siswa');
        $this->db->join('tb_kelas', 'tb_siswa.id_kelas = tb_kelas.id_kelas');
        $this->db->join('tb_pelanggaran', 'tb_siswa.id_siswa = tb_pelanggaran.id_siswa');
        $this->db->join('tb_point', 'tb_pelanggaran.id_point = tb_point.id_point');
        $this->db->where('tb_siswa.id_kelas', $id_kelas);
        $query = $this->db->get()->result();
        return $query;
    }

    // akhir pelanggaran
}
