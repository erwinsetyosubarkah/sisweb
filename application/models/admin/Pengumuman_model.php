<?php 



class Pengumuman_model extends CI_Model{


    public function queryById($data = [])
    {
        $this->db->select('*');
        $this->db->from('pengumuman');
        $this->db->where('id_pengumuman',$data['id_pengumuman']);
        $query = $this->db->get();
       return $query->row_array();
    }

    public function queryAll(){
        $this->db->select('*');
        $this->db->from('pengumuman');
        $query = $this->db->get();
       return $query->result_array();
    }

    public function queryLimit($per_page,$page){
        $this->db->select('*');
        $this->db->from('pengumuman');
        $jml_data = $this->db->get()->num_rows();
        
        $jml_page = ceil($jml_data / $per_page);
        $awal_data = $page * $per_page - $per_page;

        $this->db->select('*');
        $this->db->from('pengumuman');
        $this->db->limit($per_page,$awal_data);
        $query = $this->db->get()->result_array();
        $data['dt_pengumuman'] = $query;
        $data['jml_page'] = $jml_page;
        $data['page'] = $page;

        return $data;
        
    }

    public function buatQuery($tabel,$select_column = [],$order_column = [])
    {
        $tabel = strtolower($tabel);

        $this->db->select($select_column);
        $this->db->from($tabel);
        if(isset($_POST['search']['value']))
        {
            $this->db->like('pengumuman.judul_pengumuman',$_POST['search']['value']);
        }

        if(isset($_POST['order']))
        {
            $this->db->order_by($order_column[$_POST['order']['0']['column']],$_POST['order']['0']['dir']);
        }else{
            $this->db->order_by('pengumuman.judul_pengumuman', 'DESC');
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

    public function tambah($data = []){
        $this->db->insert('pengumuman',$data);
        $status = $this->db->affected_rows();


        if ($status > 0) {
                return 1;
            } else {
                return 0;
            }
    }

    public function ubah($data = [])
    {
    
        $id_pengumuman = $data['id_pengumuman'];
        unset($data['id_pengumuman']);
        
        $this->db->where('id_pengumuman', $id_pengumuman);
        $this->db->update('pengumuman', $data);
        $status = $this->db->affected_rows();
           

        if ($status > 0) {
                return 1;
            } else {
                return 0;
            }      
       
    }


    public function hapus($data = []){ 

        $this->db->delete('pengumuman', ['id_pengumuman' => $data['id_pengumuman']]);

        $status = $this->db->affected_rows();
        if ($status > 0) {
            return 1;
         } else {
            return 0;
         }
    }


}