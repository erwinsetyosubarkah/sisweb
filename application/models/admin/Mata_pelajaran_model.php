<?php 



class Mata_pelajaran_model extends CI_Model{


    public function queryById($data = [])
    {
        $this->db->select('*');
        $this->db->from('mata_pelajaran');
        $this->db->where('id_mata_pelajaran',$data['id_mata_pelajaran']);
        $this->db->join('tingkat', 'mata_pelajaran.id_tingkat = tingkat.id_tingkat', 'left');
        $this->db->join('guru', 'mata_pelajaran.id_guru = guru.id_guru', 'left');
        $query = $this->db->get();
       return $query->row_array();
    }

    public function getMataPelajaran(){
        $this->db->select('*');
        $this->db->from('mata_pelajaran');        
        $this->db->join('tingkat', 'mata_pelajaran.id_tingkat = tingkat.id_tingkat', 'left');
        return $this->db->get()->result_array();
    }

    public function buatQuery($tabel,$select_column = [],$order_column = [])
    {
        $tabel = strtolower($tabel);

        $this->db->select($select_column);
        $this->db->from($tabel);
        $this->db->join('tingkat', 'mata_pelajaran.id_tingkat = tingkat.id_tingkat', 'left');
        $this->db->join('guru', 'mata_pelajaran.id_guru = guru.id_guru', 'left');
        if(isset($_POST['search']['value']))
        {
            $this->db->like('mata_pelajaran.mata_pelajaran',$_POST['search']['value']);
        }

        if(isset($_POST['order']))
        {
            $this->db->order_by($order_column[$_POST['order']['0']['column']],$_POST['order']['0']['dir']);
        }else{
            $this->db->order_by('mata_pelajaran.mata_pelajaran', 'DESC');
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
        $this->db->join('tingkat', 'mata_pelajaran.id_tingkat = tingkat.id_tingkat', 'left');
        $this->db->join('guru', 'mata_pelajaran.id_guru = guru.id_guru', 'left');
        return $this->db->count_all_results();
    }

    public function tambah($data = []){
        $this->db->insert('mata_pelajaran',$data);
        $status = $this->db->affected_rows();


        if ($status > 0) {
                return 1;
            } else {
                return 0;
            }
    }

    public function ubah($data = [])
    {
    
        $id_mata_pelajaran = $data['id_mata_pelajaran'];
        unset($data['id_mata_pelajaran']);
        
        $this->db->where('id_mata_pelajaran', $id_mata_pelajaran);
        $this->db->update('mata_pelajaran', $data);
        $status = $this->db->affected_rows();
           

        if ($status > 0) {
                return 1;
            } else {
                return 0;
            }      
       
    }


    public function hapus($data = []){ 

        $this->db->delete('mata_pelajaran', ['id_mata_pelajaran' => $data['id_mata_pelajaran']]);

        $status = $this->db->affected_rows();
        if ($status > 0) {
            return 1;
         } else {
            return 0;
         }
    }


}