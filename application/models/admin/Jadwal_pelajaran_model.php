<?php 



class Jadwal_pelajaran_model extends CI_Model{


    public function queryById($data = [])
    {
        $this->db->select('*');
        $this->db->from('jadwal_pelajaran');
        $this->db->where('jadwal_pelajaran.id_jadwal_pelajaran',$data['id_jadwal_pelajaran']);
        $this->db->join('tahun_pelajaran', 'jadwal_pelajaran.id_tahun_pelajaran = tahun_pelajaran.id_tahun_pelajaran', 'left');
        $this->db->join('semester', 'jadwal_pelajaran.id_semester = semester.id_semester', 'left');
        $this->db->join('kelas', 'jadwal_pelajaran.id_kelas = kelas.id_kelas', 'left');
        $this->db->join('tingkat', 'kelas.id_tingkat = tingkat.id_tingkat', 'left');
        $this->db->join('mata_pelajaran', 'jadwal_pelajaran.id_mata_pelajaran = mata_pelajaran.id_mata_pelajaran', 'left');
        $this->db->join('guru', 'mata_pelajaran.id_guru = guru.id_guru', 'left');
        $this->db->join('ruangan', 'kelas.id_ruangan = ruangan.id_ruangan', 'left');
        $this->db->join('gedung', 'ruangan.id_gedung = gedung.id_gedung', 'left');
        $query = $this->db->get();
       return $query->row_array();
    }

    public function getJadwalPelajaran(){
        $this->db->select('*');
        $this->db->from('jadwal_pelajaran');
        
        return $this->db->get()->result_array();
    }

    public function buatQuery($tabel,$select_column = [],$order_column = [],$where)
    {
        $tabel = strtolower($tabel);

        $this->db->select($select_column);
        $this->db->from($tabel);
        $this->db->where('jadwal_pelajaran.id_tahun_pelajaran',$where['id_tahun_pelajaran']);
        $this->db->where('jadwal_pelajaran.id_semester',$where['id_semester']);
        $this->db->where('jadwal_pelajaran.id_kelas',$where['id_kelas']);
        if($where['hari_jadwal_pelajaran'] != ''){
            $this->db->where('jadwal_pelajaran.hari_jadwal_pelajaran',$where['hari_jadwal_pelajaran']);
        }
        if($_SESSION['user']['level'] == 'Guru'){
            $this->db->where('mata_pelajaran.id_guru',$_SESSION['user']['id_grup_pengguna']);
        }elseif($_SESSION['user']['level'] == 'Siswa'){
            $this->db->where('kelas.id_kelas',$_SESSION['user']['id_kelas']);
        }
        $this->db->join('tahun_pelajaran', 'jadwal_pelajaran.id_tahun_pelajaran = tahun_pelajaran.id_tahun_pelajaran', 'left');
        $this->db->join('semester', 'jadwal_pelajaran.id_semester = semester.id_semester', 'left');
        $this->db->join('kelas', 'jadwal_pelajaran.id_kelas = kelas.id_kelas', 'left');
        $this->db->join('tingkat', 'kelas.id_tingkat = tingkat.id_tingkat', 'left');
        $this->db->join('mata_pelajaran', 'jadwal_pelajaran.id_mata_pelajaran = mata_pelajaran.id_mata_pelajaran', 'left');
        $this->db->join('guru', 'mata_pelajaran.id_guru = guru.id_guru', 'left');
        $this->db->join('ruangan', 'kelas.id_ruangan = ruangan.id_ruangan', 'left');
        $this->db->join('gedung', 'ruangan.id_gedung = gedung.id_gedung', 'left');
        if(isset($_POST['search']['value']))
        {
            $this->db->like('jadwal_pelajaran.hari_jadwal_pelajaran',$_POST['search']['value']);
        }

        if(isset($_POST['order']))
        {
            $this->db->order_by($order_column[$_POST['order']['0']['column']],$_POST['order']['0']['dir']);
        }else{
            $this->db->order_by('jadwal_pelajaran.hari_jadwal_pelajaran', 'DESC');
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
        $this->db->where('jadwal_pelajaran.id_tahun_pelajaran',$where['id_tahun_pelajaran']);
        $this->db->where('jadwal_pelajaran.id_semester',$where['id_semester']);
        $this->db->where('jadwal_pelajaran.id_kelas',$where['id_kelas']);
        if($where['hari_jadwal_pelajaran'] != ''){
            $this->db->where('jadwal_pelajaran.hari_jadwal_pelajaran',$where['hari_jadwal_pelajaran']);
        }
        if($_SESSION['user']['level'] == 'Guru'){
            $this->db->where('mata_pelajaran.id_guru',$_SESSION['user']['id_grup_pengguna']);
        }elseif($_SESSION['user']['level'] == 'Siswa'){
            $this->db->where('kelas.id_kelas',$_SESSION['user']['id_kelas']);
        }
        $this->db->join('tahun_pelajaran', 'jadwal_pelajaran.id_tahun_pelajaran = tahun_pelajaran.id_tahun_pelajaran', 'left');
        $this->db->join('semester', 'jadwal_pelajaran.id_semester = semester.id_semester', 'left');
        $this->db->join('kelas', 'jadwal_pelajaran.id_kelas = kelas.id_kelas', 'left');
        $this->db->join('tingkat', 'kelas.id_tingkat = tingkat.id_tingkat', 'left');
        $this->db->join('mata_pelajaran', 'jadwal_pelajaran.id_mata_pelajaran = mata_pelajaran.id_mata_pelajaran', 'left');
        $this->db->join('guru', 'mata_pelajaran.id_guru = guru.id_guru', 'left');
        $this->db->join('ruangan', 'kelas.id_ruangan = ruangan.id_ruangan', 'left');
        $this->db->join('gedung', 'ruangan.id_gedung = gedung.id_gedung', 'left');
        return $this->db->count_all_results();
    }

    public function tambah($data = []){
        $this->db->insert('jadwal_pelajaran',$data);
        $status = $this->db->affected_rows();


        if ($status > 0) {
                return 1;
            } else {
                return 0;
            }
    }

    public function ubah($data = [])
    {
    
        $id_jadwal_pelajaran = $data['id_jadwal_pelajaran'];
        unset($data['id_jadwal_pelajaran']);
        
        $this->db->where('id_jadwal_pelajaran', $id_jadwal_pelajaran);
        $this->db->update('jadwal_pelajaran', $data);
        $status = $this->db->affected_rows();
           

        if ($status > 0) {
                return 1;
            } else {
                return 0;
            }      
       
    }


    public function hapus($data = []){ 

        $this->db->delete('jadwal_pelajaran', ['id_jadwal_pelajaran' => $data['id_jadwal_pelajaran']]);

        $status = $this->db->affected_rows();
        if ($status > 0) {
            return 1;
         } else {
            return 0;
         }
    }


}