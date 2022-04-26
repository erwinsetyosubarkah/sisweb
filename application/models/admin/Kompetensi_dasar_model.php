<?php 



class Kompetensi_dasar_model extends CI_Model{


    public function queryById($data = [])
    {
        $this->db->select('*');
        $this->db->from('kompetensi_dasar');
        $this->db->where('id_kompetensi_dasar',$data['id_kompetensi_dasar']);
        $this->db->join('mata_pelajaran', 'kompetensi_dasar.id_mata_pelajaran = mata_pelajaran.id_mata_pelajaran', 'left');
        $this->db->join('tingkat', 'mata_pelajaran.id_tingkat = tingkat.id_tingkat', 'left');
        $query = $this->db->get();
       return $query->row_array();
    }

    public function getKompetensiDasar(){
        $this->db->select('*');
        $this->db->from('kompetensi_dasar');
        
        return $this->db->get()->result_array();
    }

    
    public function getKompetensiDasarByMapel($id_mata_pelajaran){
        $this->db->select('*');
        $this->db->from('kompetensi_dasar');
        $this->db->where('id_mata_pelajaran',$id_mata_pelajaran);
        
        return $this->db->get()->result_array();
    }

    public function buatQuery($tabel,$select_column = [],$order_column = [],$where=[])
    {
        $tabel = strtolower($tabel);

        $this->db->select($select_column);
        $this->db->from($tabel);
        if($where['id_tingkat'] != ''){
            $this->db->where('tingkat.id_tingkat',$where['id_tingkat']);
        }
        if($_SESSION['user']['level'] == 'Guru'){
            $this->db->where('mata_pelajaran.id_guru',$_SESSION['user']['id_grup_pengguna']);
        }
        $this->db->join('mata_pelajaran', 'kompetensi_dasar.id_mata_pelajaran = mata_pelajaran.id_mata_pelajaran', 'left');
        $this->db->join('tingkat', 'mata_pelajaran.id_tingkat = tingkat.id_tingkat', 'left');
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

    public function buatDataTables($tabel,$select_column=[],$order_column=[], $where=[]){
        $this->buatQuery($tabel,$select_column,$order_column,$where);
        if($_POST['length'] != -1)
        {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }

    public function getFilteredData($tabel,$select_column=[],$order_column=[],$where=[]){
        $this->buatQuery($tabel,$select_column,$order_column,$where);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function getAllData($tabel,$where=[]){
        $this->db->select('*');
        $this->db->from($tabel);
        if($where['id_tingkat'] != ''){
            $this->db->where('tingkat.id_tingkat',$where['id_tingkat']);
        }
        if($_SESSION['user']['level'] == 'Guru'){
            $this->db->where('mata_pelajaran.id_guru',$_SESSION['user']['id_grup_pengguna']);
        }
        $this->db->join('mata_pelajaran', 'kompetensi_dasar.id_mata_pelajaran = mata_pelajaran.id_mata_pelajaran', 'left');
        $this->db->join('tingkat', 'mata_pelajaran.id_tingkat = tingkat.id_tingkat', 'left');
        return $this->db->count_all_results();
    }

    public function tambah($data = []){
        $this->db->insert('kompetensi_dasar',$data);
        $status = $this->db->affected_rows();


        if ($status > 0) {
                return 1;
            } else {
                return 0;
            }
    }

    public function ubah($data = [])
    {
    
        $id_kompetensi_dasar = $data['id_kompetensi_dasar'];
        unset($data['id_kompetensi_dasar']);
        
        $this->db->where('id_kompetensi_dasar', $id_kompetensi_dasar);
        $this->db->update('kompetensi_dasar', $data);
        $status = $this->db->affected_rows();
           

        if ($status > 0) {
                return 1;
            } else {
                return 0;
            }      
       
    }


    public function hapus($data = []){ 

        $this->db->delete('kompetensi_dasar', ['id_kompetensi_dasar' => $data['id_kompetensi_dasar']]);

        $status = $this->db->affected_rows();
        if ($status > 0) {
            return 1;
         } else {
            return 0;
         }
    }


}