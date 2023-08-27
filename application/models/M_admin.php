<?php

class M_admin extends CI_Model
{


   function __construct()
    {
        parent::__construct();
    }

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

  // awal side server

  function get_tables_query($query,$cari,$where,$iswhere)
  {
      // Ambil data yang di ketik user pada textbox pencarian
      $search = htmlspecialchars($_POST['search']['value']);
      // Ambil data limit per page
      $limit = preg_replace("/[^a-zA-Z0-9.]/", '', "{$_POST['length']}");
      // Ambil data start
      $start =preg_replace("/[^a-zA-Z0-9.]/", '', "{$_POST['start']}"); 

      if($where != null)
      {
          $setWhere = array();
          foreach ($where as $key => $value)
          {
              $setWhere[] = $key."='".$value."'";
          }
          $fwhere = implode(' AND ', $setWhere);

          if(!empty($iswhere))
          {
              $sql = $this->db->query($query." WHERE  $iswhere AND ".$fwhere);
              
          }else{
              $sql = $this->db->query($query." WHERE ".$fwhere);
          }
          $sql_count = $sql->num_rows();

          $cari = implode(" LIKE '%".$search."%' OR ", $cari)." LIKE '%".$search."%'";
          
          // Untuk mengambil nama field yg menjadi acuan untuk sorting
          $order_field = $_POST['order'][0]['column']; 

          // Untuk menentukan order by "ASC" atau "DESC"
          $order_ascdesc = $_POST['order'][0]['dir']; 
          $order = " ORDER BY ".$_POST['columns'][$order_field]['data']." ".$order_ascdesc;

          if(!empty($iswhere))
          {
              $sql_data = $this->db->query($query." WHERE $iswhere AND ".$fwhere." AND (".$cari.")".$order." LIMIT ".$limit." OFFSET ".$start);
          }else{
              $sql_data = $this->db->query($query." WHERE ".$fwhere." AND (".$cari.")".$order." LIMIT ".$limit." OFFSET ".$start);
          }
          
          if(isset($search))
          {
              if(!empty($iswhere))
              {
                  $sql_cari =  $this->db->query($query." WHERE $iswhere AND ".$fwhere." AND (".$cari.")");
              }else{
                  $sql_cari =  $this->db->query($query." WHERE ".$fwhere." AND (".$cari.")");
              }
              $sql_filter_count = $sql_cari->num_rows();
          }else{
              if(!empty($iswhere))
              {
                  $sql_filter = $this->db->query($query." WHERE $iswhere AND ".$fwhere);
              }else{
                  $sql_filter = $this->db->query($query." WHERE ".$fwhere);
              }
              $sql_filter_count = $sql_filter->num_rows();
          }
          $data = $sql_data->result_array();

      }else{
          if(!empty($iswhere))
          {
              $sql = $this->db->query($query." WHERE  $iswhere ");
          }else{
              $sql = $this->db->query($query);
          }
          $sql_count = $sql->num_rows();

          $cari = implode(" LIKE '%".$search."%' OR ", $cari)." LIKE '%".$search."%'";
          
          // Untuk mengambil nama field yg menjadi acuan untuk sorting
          $order_field = $_POST['order'][0]['column']; 

          // Untuk menentukan order by "ASC" atau "DESC"
          $order_ascdesc = $_POST['order'][0]['dir']; 
          $order = " ORDER BY ".$_POST['columns'][$order_field]['data']." ".$order_ascdesc;

          if(!empty($iswhere))
          {                
              $sql_data = $this->db->query($query." WHERE $iswhere AND (".$cari.")".$order." LIMIT ".$limit." OFFSET ".$start);
          }else{
              $sql_data = $this->db->query($query." WHERE (".$cari.")".$order." LIMIT ".$limit." OFFSET ".$start);
          }

          if(isset($search))
          {
              if(!empty($iswhere))
              {     
                  $sql_cari =  $this->db->query($query." WHERE $iswhere AND (".$cari.")");
              }else{
                  $sql_cari =  $this->db->query($query." WHERE (".$cari.")");
              }
              $sql_filter_count = $sql_cari->num_rows();
          }else{
              if(!empty($iswhere))
              {
                  $sql_filter = $this->db->query($query." WHERE $iswhere");
              }else{
                  $sql_filter = $this->db->query($query);
              }
              $sql_filter_count = $sql_filter->num_rows();
          }
          $data = $sql_data->result_array();
      }
      
      $callback = array(    
          'draw' => $_POST['draw'], // Ini dari datatablenya    
          'recordsTotal' => $sql_count,    
          'recordsFiltered'=>$sql_filter_count,    
          'data'=>$data
      );
      return json_encode($callback); // Convert array $callback ke json
  }

  // akhir side server


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
    $this->db->where('status', 'guru_bk');
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

  function admin_profil($ses_id)
  {
    $this->db->where('id_admin', $ses_id);
    $hasil = $this->db->get('tb_admin')->result();
    return $hasil;
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


  // walas awal


  function walas()
  {
    $this->db->select('*');
    $this->db->from('tb_walas');
    $this->db->join('tb_kelas', 'tb_walas.id_kelas = tb_kelas.id_kelas');
    $this->db->join('tb_admin', 'tb_walas.id_admin = tb_admin.id_admin');
    $query = $this->db->get()->result();
    return $query;
  }

  public function admin_walas()
  {
    $this->db->where('status', 'guru_walas');
    $hasil = $this->db->get('tb_admin')->result();
    return $hasil;
  }

  public function walas_tambah_up($data_tambah)
  {
    $this->db->insert('tb_walas', $data_tambah);
  }



  public function cek_walas($id_admin)
  {
    $this->db->where('id_admin', $id_admin);
    $hasil = $this->db->get('tb_walas')->result();
    return $hasil;
  }

  public function cari_walas($id_walas)
  {
    $this->db->select('*');
    $this->db->from('tb_walas');
    $this->db->join('tb_kelas', 'tb_walas.id_kelas = tb_kelas.id_kelas');
    $this->db->join('tb_admin', 'tb_walas.id_admin = tb_admin.id_admin');
    $this->db->where('id_walas', $id_walas);
    $query = $this->db->get()->result();
    return $query;
  }

  function walas_edit_up($data_edit, $id_walas)
  {
    $this->db->where('id_walas', $id_walas);
    $this->db->update('tb_walas', $data_edit);
  }

  public function walas_hapus($id_walas)
  {
    $this->db->where($id_walas);
    $this->db->delete('tb_walas');
  }

  // walas akhir

}
