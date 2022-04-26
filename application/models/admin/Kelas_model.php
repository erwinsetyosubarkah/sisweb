<?php 



class Kelas_model extends CI_Model{


    public function getKelas(){
        $this->db->select('*');
        $this->db->from('kelas');
        
        return $this->db->get()->result_array();
    }
    

    public function queryById($data = [])
    {
        $this->db->select('*');
        $this->db->from('kelas');
        $this->db->where('id_kelas',$data['id_kelas']);
        $this->db->join('ruangan', 'kelas.id_ruangan = ruangan.id_ruangan', 'left');
        $this->db->join('tingkat', 'kelas.id_tingkat = tingkat.id_tingkat', 'left');
        $this->db->join('guru', 'kelas.id_guru = guru.id_guru', 'left');
        $this->db->join('gedung', 'ruangan.id_gedung = gedung.id_gedung', 'left');
        $query = $this->db->get();
       return $query->row_array();
    }

    public function buatQuery($tabel,$select_column = [],$order_column = [])
    {
        $tabel = strtolower($tabel);

        $this->db->select($select_column);
        $this->db->from($tabel);
        $this->db->join('ruangan', 'kelas.id_ruangan = ruangan.id_ruangan', 'left');
        $this->db->join('tingkat', 'kelas.id_tingkat = tingkat.id_tingkat', 'left');
        $this->db->join('guru', 'kelas.id_guru = guru.id_guru', 'left');
        $this->db->join('gedung', 'ruangan.id_gedung = gedung.id_gedung', 'left');
        if(isset($_POST['search']['value']))
        {
            $this->db->like('kelas.kelas',$_POST['search']['value']);
        }

        if(isset($_POST['order']))
        {
            $this->db->order_by($order_column[$_POST['order']['0']['column']],$_POST['order']['0']['dir']);
        }else{
            $this->db->order_by('kelas.kelas', 'DESC');
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
        $this->db->join('ruangan', 'kelas.id_ruangan = ruangan.id_ruangan', 'left');
        $this->db->join('tingkat', 'kelas.id_tingkat = tingkat.id_tingkat', 'left');
        $this->db->join('guru', 'kelas.id_guru = guru.id_guru', 'left');
        $this->db->join('gedung', 'ruangan.id_gedung = gedung.id_gedung', 'left');
        return $this->db->count_all_results();
    }

    public function tambah($data = []){
        $this->db->insert('kelas',$data);
        $status = $this->db->affected_rows();


        if ($status > 0) {
                return 1;
            } else {
                return 0;
            }
    }

    public function ubah($data = [])
    {
    
        $id_kelas = $data['id_kelas'];
        unset($data['id_kelas']);
        
        $this->db->where('id_kelas', $id_kelas);
        $this->db->update('kelas', $data);
        $status = $this->db->affected_rows();
           

        if ($status > 0) {
                return 1;
            } else {
                return 0;
            }      
       
    }


    public function hapus($data = []){ 

        $this->db->delete('kelas', ['id_kelas' => $data['id_kelas']]);

        $status = $this->db->affected_rows();
        if ($status > 0) {
            return 1;
         } else {
            return 0;
         }
    }

}
