<?php 



class Agenda_mengajar_model extends CI_Model{


    public function queryById($data = [])
    {
        $this->db->select('*');
        $this->db->from('agenda_mengajar');
        $this->db->where('agenda_mengajar.id_agenda_mengajar',$data['id_agenda_mengajar']);
        $this->db->join('tahun_pelajaran', 'agenda_mengajar.id_tahun_pelajaran = tahun_pelajaran.id_tahun_pelajaran', 'left');
        $this->db->join('semester', 'agenda_mengajar.id_semester = semester.id_semester', 'left');
        $this->db->join('kelas', 'agenda_mengajar.id_kelas = kelas.id_kelas', 'left');
        $this->db->join('tingkat', 'kelas.id_tingkat = tingkat.id_tingkat', 'left');
        $this->db->join('kompetensi_dasar', 'agenda_mengajar.id_kompetensi_dasar = kompetensi_dasar.id_kompetensi_dasar', 'left');
        $this->db->join('mata_pelajaran', 'kompetensi_dasar.id_mata_pelajaran = mata_pelajaran.id_mata_pelajaran', 'left');
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

    public function buatQuery($tabel,$select_column = [],$order_column = [],$where,$from='')
    {
        $tabel = strtolower($tabel);

        $this->db->select($select_column);
        $this->db->from($tabel);
        $this->db->where('agenda_mengajar.id_tahun_pelajaran',$where['id_tahun_pelajaran']);
        $this->db->where('agenda_mengajar.id_semester',$where['id_semester']);
        $this->db->where('agenda_mengajar.id_kelas',$where['id_kelas']);
        if($where['hari_agenda_mengajar'] != ''){
            $this->db->where('agenda_mengajar.hari_agenda_mengajar',$where['hari_agenda_mengajar']);
        }
        
        if($_SESSION['user']['level'] == 'Guru'){
            $this->db->where('mata_pelajaran.id_guru',$_SESSION['user']['id_grup_pengguna']);
        }

        if($from == 'nilai_uts'){
            $this->db->where('agenda_mengajar.keterangan_agenda_mengajar','Harian UTS');
            $this->db->or_where('agenda_mengajar.keterangan_agenda_mengajar','UTS');
            
        }
       
        $this->db->join('tahun_pelajaran', 'agenda_mengajar.id_tahun_pelajaran = tahun_pelajaran.id_tahun_pelajaran', 'left');
        $this->db->join('semester', 'agenda_mengajar.id_semester = semester.id_semester', 'left');
        $this->db->join('kelas', 'agenda_mengajar.id_kelas = kelas.id_kelas', 'left');
        $this->db->join('tingkat', 'kelas.id_tingkat = tingkat.id_tingkat', 'left');
        $this->db->join('kompetensi_dasar', 'agenda_mengajar.id_kompetensi_dasar = kompetensi_dasar.id_kompetensi_dasar', 'left');
        $this->db->join('mata_pelajaran', 'kompetensi_dasar.id_mata_pelajaran = mata_pelajaran.id_mata_pelajaran', 'left');
        $this->db->join('guru', 'mata_pelajaran.id_guru = guru.id_guru', 'left');
        $this->db->join('ruangan', 'kelas.id_ruangan = ruangan.id_ruangan', 'left');
        $this->db->join('gedung', 'ruangan.id_gedung = gedung.id_gedung', 'left');
        if(isset($_POST['search']['value']))
        {
            $this->db->like('agenda_mengajar.hari_agenda_mengajar',$_POST['search']['value']);
        }

        if(isset($_POST['order']))
        {
            $this->db->order_by($order_column[$_POST['order']['0']['column']],$_POST['order']['0']['dir']);
        }else{
            $this->db->order_by('agenda_mengajar.hari_agenda_mengajar', 'DESC');
        }        
        
    }

    public function buatDataTables($tabel,$select_column=[],$order_column=[],$where,$from=''){
        $this->buatQuery($tabel,$select_column,$order_column,$where,$from);
        if($_POST['length'] != -1)
        {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }

    public function getFilteredData($tabel,$select_column=[],$order_column=[],$where,$from=''){
        $this->buatQuery($tabel,$select_column,$order_column,$where,$from);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function getAllData($tabel,$where,$from=''){
        $this->db->select('*');
        $this->db->from($tabel);
        $this->db->where('agenda_mengajar.id_tahun_pelajaran',$where['id_tahun_pelajaran']);
        $this->db->where('agenda_mengajar.id_semester',$where['id_semester']);
        $this->db->where('agenda_mengajar.id_kelas',$where['id_kelas']);
        if($where['hari_agenda_mengajar'] != ''){
            $this->db->where('agenda_mengajar.hari_agenda_mengajar',$where['hari_agenda_mengajar']);
        }
        if($_SESSION['user']['level'] == 'Guru'){
            $this->db->where('mata_pelajaran.id_guru',$_SESSION['user']['id_grup_pengguna']);
        }

        if($from == 'nilai_uts'){
            $this->db->where('agenda_mengajar.keterangan_agenda_mengajar','Harian UTS');
            $this->db->or_where('agenda_mengajar.keterangan_agenda_mengajar','UTS');
            
        }
            
        
        $this->db->join('tahun_pelajaran', 'agenda_mengajar.id_tahun_pelajaran = tahun_pelajaran.id_tahun_pelajaran', 'left');
        $this->db->join('semester', 'agenda_mengajar.id_semester = semester.id_semester', 'left');
        $this->db->join('kelas', 'agenda_mengajar.id_kelas = kelas.id_kelas', 'left');
        $this->db->join('tingkat', 'kelas.id_tingkat = tingkat.id_tingkat', 'left');
        $this->db->join('kompetensi_dasar', 'agenda_mengajar.id_kompetensi_dasar = kompetensi_dasar.id_kompetensi_dasar', 'left');
        $this->db->join('mata_pelajaran', 'kompetensi_dasar.id_mata_pelajaran = mata_pelajaran.id_mata_pelajaran', 'left');
        $this->db->join('guru', 'mata_pelajaran.id_guru = guru.id_guru', 'left');
        $this->db->join('ruangan', 'kelas.id_ruangan = ruangan.id_ruangan', 'left');
        $this->db->join('gedung', 'ruangan.id_gedung = gedung.id_gedung', 'left');
        return $this->db->count_all_results();
    }

    public function tambah($data = []){
        $id_kelas = $data['id_kelas'];
        $id_mata_pelajaran = $data['id_mata_pelajaran'];
        unset($data['id_mata_pelajaran']);
        $this->db->insert('agenda_mengajar',$data);
        $last_id = $this->db->insert_id();

        $this->db->select('*');
        $this->db->from('siswa');
        $this->db->where('id_kelas',$id_kelas);        
        $data_siswa = $this->db->get()->result_array();
        

        foreach($data_siswa as $siswa){
            $data_agenda = [
                'id_agenda_mengajar' => $last_id,
                'id_siswa'  => $siswa['id_siswa'],
                'id_mata_pelajaran' => $id_mata_pelajaran
            ];

            $this->db->insert('absensi',$data_agenda);
            $this->db->insert('nilai',$data_agenda);
        }

        $status = $this->db->affected_rows();




        if ($status > 0) {
                return 1;
            } else {
                return 0;
            }
    }

    public function ubah($data = [])
    {
    
        $id_agenda_mengajar = $data['id_agenda_mengajar'];
        unset($data['id_agenda_mengajar']);
        
        $this->db->where('id_agenda_mengajar', $id_agenda_mengajar);
        $this->db->update('agenda_mengajar', $data);
        $status = $this->db->affected_rows();
           

        if ($status > 0) {
                return 1;
            } else {
                return 0;
            }      
       
    }


    public function hapus($data = []){ 

        $this->db->delete('agenda_mengajar', ['id_agenda_mengajar' => $data['id_agenda_mengajar']]);
        $this->db->delete('absensi', ['id_agenda_mengajar' => $data['id_agenda_mengajar']]);

        $status = $this->db->affected_rows();
        if ($status > 0) {
            return 1;
         } else {
            return 0;
         }
    }


    public function getAgendaByTglAndKelas($tgl,$kelas){
        $this->db->select('*');
        $this->db->from('agenda_mengajar');
        $this->db->where('kelas.kelas',$kelas);
        $this->db->where('agenda_mengajar.tanggal_agenda_mengajar',$tgl);
        $this->db->join('kelas', 'agenda_mengajar.id_kelas = kelas.id_kelas', 'left');
     
        $query = $this->db->get();
       return $query->result_array();
    }

}