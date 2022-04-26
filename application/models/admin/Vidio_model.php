<?php 



class Vidio_model extends CI_Model{

    public function queryById($data = [])
    {
        $this->db->select('*');
        $this->db->from('vidio');
        $this->db->where('id_vidio',$data['id_vidio']);
        $query = $this->db->get();
       return $query->row_array();
    }

    public function queryAll(){
        $this->db->select('*');
        $this->db->from('vidio');
        $query = $this->db->get();
       return $query->result_array();
    }

    public function buatQuery($tabel,$select_column = [],$order_column = [])
    {
        $tabel = strtolower($tabel);

        $this->db->select($select_column);
        $this->db->from($tabel);
        if(isset($_POST['search']['value']))
        {
            $this->db->like('judul_vidio',$_POST['search']['value']);
        }

        if(isset($_POST['order']))
        {
            $this->db->order_by($order_column[$_POST['order']['0']['column']],$_POST['order']['0']['dir']);
        }else{
            $this->db->order_by('judul_vidio', 'DESC');
        }        
        
    }

    public function buatDataTables($tabel,$select_column=[],$order_column=[]){
        $this->buatQuery($tabel,$select_column,$order_column);
        if($_POST['length'] != -1)
        {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }

    public function getFilteredData($tabel,$select_column=[],$order_column=[]){
        $this->buatQuery($tabel,$select_column,$order_column);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function getAllData($tabel){
        $this->db->select('*');
        $this->db->from($tabel);
        return $this->db->count_all_results();
    }


    public function tambah($data = [],$tabel)
    {

      $tabel = strtolower($tabel);
    
      //insert data ke tabel pengguna
     $this->db->insert($tabel,$data);
     $status = $this->db->affected_rows();


      if ($status > 0) {
            return 1;
        } else {
            return 0;
        }
       
    }


    public function ubah($data = [],$tabel)
    {
       
      $tabel = strtolower($tabel); 
     
        $this->db->where('id_vidio', $data['id_vidio']);
        $this->db->update($tabel, $data);
        $status = $this->db->affected_rows();        

        return $status;
       
    }

    public function hapus($data = []){
        $this->db->delete('vidio', $data);
        $status = $this->db->affected_rows();
        if ($status > 0) {
            return 1;
         } else {
            return 0;
         }
    }

}