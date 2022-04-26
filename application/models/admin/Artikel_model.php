<?php 



class Artikel_model extends CI_Model{


    public function queryById($data = [])
    {
        $this->db->select('*');
        $this->db->from('artikel');
        $this->db->where('id_artikel',$data['id_artikel']);
        $this->db->join('kategori_artikel', 'artikel.id_kategori_artikel = kategori_artikel.id_kategori_artikel', 'left');
        $query = $this->db->get();
       return $query->row_array();
    }

    public function queryAll(){
        $this->db->select('*');
        $this->db->from('artikel');
        $query = $this->db->get();
       return $query->result_array();
    }

    public function queryByKategori($kategori=""){
        $this->db->select('*');
        $this->db->from('artikel');
        if($kategori !=""){
            $this->db->where('id_kategori_artikel',$kategori);
        }
        $query = $this->db->get();
       return $query->result_array();
    }

    public function buatQuery($tabel,$select_column = [],$order_column = [])
    {
        $tabel = strtolower($tabel);

        $this->db->select($select_column);
        $this->db->from($tabel);
        if($_SESSION['user']['level'] == 'Guru'){
            $this->db->where('artikel.id_author',$_SESSION['user']['id_grup_pengguna']);
        }
        $this->db->join('kategori_artikel', 'artikel.id_kategori_artikel = kategori_artikel.id_kategori_artikel', 'left');
        if(isset($_POST['search']['value']))
        {
            $this->db->like('artikel.judul_artikel',$_POST['search']['value']);
        }

        if(isset($_POST['order']))
        {
            $this->db->order_by($order_column[$_POST['order']['0']['column']],$_POST['order']['0']['dir']);
        }else{
            $this->db->order_by('artikel.judul_artikel', 'DESC');
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
        if($_SESSION['user']['level'] == 'Guru'){
            $this->db->where('artikel.id_author',$_SESSION['user']['id_grup_pengguna']);
        }
        $this->db->join('kategori_artikel', 'artikel.id_kategori_artikel = kategori_artikel.id_kategori_artikel', 'left');
        return $this->db->count_all_results();
    }

    public function tambah($data = []){
        $this->db->insert('artikel',$data);
        $status = $this->db->affected_rows();


        if ($status > 0) {
                return 1;
            } else {
                return 0;
            }
    }

    public function ubah($data = [])
    {
    
        $id_artikel = $data['id_artikel'];
        unset($data['id_artikel']);
        
        $this->db->where('id_artikel', $id_artikel);
        $this->db->update('artikel', $data);
        $status = $this->db->affected_rows();
           

        if ($status > 0) {
                return 1;
            } else {
                return 0;
            }      
       
    }


    public function hapus($data = []){ 

        $this->db->delete('artikel', ['id_artikel' => $data['id_artikel']]);

        $status = $this->db->affected_rows();
        if ($status > 0) {
            return 1;
         } else {
            return 0;
         }
    }


}