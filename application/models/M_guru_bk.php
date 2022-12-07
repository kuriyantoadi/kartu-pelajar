<?php

class M_guru_bk extends CI_Model
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

    function total_point($id_siswa)
    {
        $total_point = $this->db->query("SELECT SUM(jml_point) AS total_point FROM tb_pelanggaran, tb_point, tb_siswa WHERE tb_pelanggaran.id_point=tb_point.id_point AND tb_pelanggaran.id_siswa=tb_siswa.id_siswa AND tb_siswa.id_siswa=$id_siswa")
            ->row();
        return $total_point;
    }

    // function total_point()
    // {
    //     $total_point = $this->db->query("SELECT SUM(jml_point) AS total_point FROM tb_pelanggaran, tb_point, tb_siswa WHERE tb_pelanggaran.id_point=tb_point.id_point AND tb_pelanggaran.id_siswa=tb_siswa.id_siswa")
    //         ->row_array();
    //     // $total_point = $this->db->get()->result();
    //     return $total_point;
    // }



    // akhir siswa
}
