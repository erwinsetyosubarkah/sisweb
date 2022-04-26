<?php 



class Tentang_sekolah_model extends CI_Model{
    public function getTentangById()
    {
       return $this->db->get_where('tentang_sekolah',['id' => 1])->row_array();
    }

    public function query()
    {
       return $this->db->get_where('tentang_sekolah',['id' => 1])->row_array();
    }

    public function ubah($data = [])
    {
      $this->db->where('id', 1);
      $this->db->update('tentang_sekolah', $data);
      $status = $this->db->affected_rows();

      if ($status > 0) {
         return 1;
      } else {
         return 0;
      }
    }

    
}