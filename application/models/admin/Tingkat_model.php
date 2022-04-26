<?php 



class Tingkat_model extends CI_Model{

    public function queryById($data = [])
    {
        $this->db->select('*');
        $this->db->from('tingkat');
        $this->db->where('id_tingkat',$data['id_tingkat']);
        $query = $this->db->get();
       return $query->row_array();
    }

    public function getTingkat(){
        $this->db->select('*');
        $this->db->from('tingkat');
        
        return $this->db->get()->result_array();
    }

    public function buatQuery($tabel,$select_column = [],$order_column = [])
    {
        $tabel = strtolower($tabel);

        $this->db->select($select_column);
        $this->db->from($tabel);
        if(isset($_POST['search']['value']))
        {
            $this->db->like('tingkat',$_POST['search']['value']);
        }

        if(isset($_POST['order']))
        {
            $this->db->order_by($order_column[$_POST['order']['0']['column']],$_POST['order']['0']['dir']);
        }else{
            $this->db->order_by('tingkat', 'DESC');
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
     
        $this->db->where('id_tingkat', $data['id_tingkat']);
        $this->db->update($tabel, $data);
        $status = $this->db->affected_rows();        

        return $status;
       
    }

    public function hapus($data = []){
        $this->db->delete('tingkat', $data);
        $status = $this->db->affected_rows();
        if ($status > 0) {
            return 1;
         } else {
            return 0;
         }
    }

}