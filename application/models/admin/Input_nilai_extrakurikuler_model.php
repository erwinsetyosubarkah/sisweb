<?php 



class Input_nilai_extrakurikuler_model extends CI_Model{


   

    public function buatQuery($tabel,$select_column = [],$order_column = [],$where)
    {
        $tabel = strtolower($tabel);

        $this->db->select($select_column);
        $this->db->from($tabel);
        if($where['id_kelas'] != ''){
            $this->db->where('siswa.id_kelas',$where['id_kelas']);
        }
       
        $this->db->join('kelas', 'siswa.id_kelas = kelas.id_kelas', 'left');
        $this->db->join('nilai_extrakurikuler', 'nilai_extrakurikuler.id_siswa = siswa.id_siswa', 'left');
        $this->db->join('tahun_pelajaran', 'tahun_pelajaran.id_tahun_pelajaran = nilai_extrakurikuler.id_tahun_pelajaran', 'left');
        $this->db->join('semester', 'semester.id_semester = nilai_extrakurikuler.id_semester', 'left');
        
       
        if(isset($_POST['search']['value']))
        {
            $this->db->like('siswa.nama_siswa',$_POST['search']['value']);
        }

        if(isset($_POST['order']))
        {
            $this->db->order_by($order_column[$_POST['order']['0']['column']],$_POST['order']['0']['dir']);
        }else{
            $this->db->order_by('siswa.nama_siswa', 'DESC');
        }        
        
    }

    public function buatDataTables($tabel,$select_column=[],$order_column=[],$where){
        $this->buatQuery($tabel,$select_column,$order_column,$where);
        if($_POST['length'] != -1)
        {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }

    public function getFilteredData($tabel,$select_column=[],$order_column=[],$where){
        $this->buatQuery($tabel,$select_column,$order_column,$where);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function getAllData($tabel,$where){
        $this->db->select('*');
        $this->db->from($tabel);
        if($where['id_kelas'] != ''){
            $this->db->where('siswa.id_kelas',$where['id_kelas']);
        }
       
        $this->db->join('kelas', 'siswa.id_kelas = kelas.id_kelas', 'left');
        $this->db->join('nilai_extrakurikuler', 'nilai_extrakurikuler.id_siswa = siswa.id_siswa', 'left');
        $this->db->join('tahun_pelajaran', 'tahun_pelajaran.id_tahun_pelajaran = nilai_extrakurikuler.id_tahun_pelajaran', 'left');
        $this->db->join('semester', 'semester.id_semester = nilai_extrakurikuler.id_semester', 'left');
        
        return $this->db->count_all_results();
    }



    public function inputNilaiExtrakurikuler($data = [],$tabel)
    {
       
      
        foreach($data as $dt){
            
            $extra = [
                "nama_extrakurikuler" => $dt['nama_extrakurikuler'],
                "nilai_extrakurikuler" => $dt['nilai_extrakurikuler']
        
            ];
            $this->db->select('*');
            $this->db->from($tabel);            
            $this->db->where('id_siswa',$dt['id_siswa']);
            $this->db->where('id_tahun_pelajaran',$dt['id_tahun_pelajaran']);
            $this->db->where('id_semester',$dt['id_semester']);
            $query = $this->db->get();

            if($query->num_rows() > 0){
       
                $this->db->where('id_siswa', $dt['id_siswa']);
                $this->db->where('id_tahun_pelajaran', $dt['id_tahun_pelajaran']);
                $this->db->where('id_semester', $dt['id_semester']);
                $this->db->update($tabel, $extra);
            }else{
                //insert data ke tabel pengguna
                $data_insert = [
                    "id_siswa" => $dt['id_siswa'],
                    "id_tahun_pelajaran" => $dt['id_tahun_pelajaran'],
                    "id_semester" => $dt['id_semester'],
                    "nama_extrakurikuler" => $dt['nama_extrakurikuler'],
                    "nilai_extrakurikuler" => $dt['nilai_extrakurikuler']
                ];
                $this->db->insert($tabel,$data_insert);
            }      
        }
        $status = 1;     
        return $status;
       
    }

  


}