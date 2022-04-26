<?php 



class Input_absensi_model extends CI_Model{


   

    public function buatQuery($tabel,$select_column = [],$order_column = [],$where)
    {
        $tabel = strtolower($tabel);

        $this->db->select($select_column);
        $this->db->from($tabel);
        if($where['id_kelas'] != ''){
            $this->db->where('siswa.id_kelas',$where['id_kelas']);
        }
        $this->db->where('absensi.id_agenda_mengajar',$where['id_agenda_mengajar']);
       
        $this->db->join('absensi', 'absensi.id_siswa = siswa.id_siswa', 'left');
        $this->db->join('kelas', 'siswa.id_kelas = kelas.id_kelas', 'left');
        $this->db->join('agenda_mengajar', 'agenda_mengajar.id_agenda_mengajar = absensi.id_agenda_mengajar', 'left');
        
       
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
        $this->db->where('absensi.id_agenda_mengajar',$where['id_agenda_mengajar']);
       
        $this->db->join('absensi', 'absensi.id_siswa = siswa.id_siswa', 'left');
        $this->db->join('kelas', 'siswa.id_kelas = kelas.id_kelas', 'left');
        $this->db->join('agenda_mengajar', 'agenda_mengajar.id_agenda_mengajar = absensi.id_agenda_mengajar', 'left');
        
        return $this->db->count_all_results();
    }

    public function inputAbsensiWhenLogin($id_siswa,$id_agenda_mengajar){
        foreach($id_agenda_mengajar as $iam){
            $absen = [
                "kehadiran_absensi" => 'Hadir'
        
            ];
            
            $this->db->where('id_siswa', $id_siswa);
            $this->db->where('id_agenda_mengajar', $iam['id_agenda_mengajar']);
            $this->db->update('absensi', $absen);
        }
    }

    public function inputAbsensi($data = [],$tabel)
    {
       
      
        foreach($data as $dt){
            
            $absen = [
                "kehadiran_absensi" => $dt['kehadiran_absensi']
        
            ];
            
            $this->db->where('id_siswa', $dt['id_siswa']);
            $this->db->where('id_agenda_mengajar', $dt['id_agenda_mengajar']);
            $this->db->update($tabel, $absen);
        }
        $status = 1;        

        return $status;
       
    }

  


}