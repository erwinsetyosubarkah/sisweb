<?php 



class Rekap_absensi_model extends CI_Model{


   

    public function buatQuery($tabel,$select_column = [],$order_column = [],$where)
    {
        $tabel = strtolower($tabel);

        $this->db->select($select_column);
        $this->db->from($tabel); 
        if($tabel == 'mata_pelajaran')  {           
            if($where['id_tingkat'] != ''){
                $this->db->where('mata_pelajaran.id_tingkat',$where['id_tingkat']);                
            }
            if($_SESSION['user']['level'] == 'Guru'){
                $this->db->where('mata_pelajaran.id_guru',$_SESSION['user']['id_grup_pengguna']);
            }
           
            $this->db->join('guru','guru.id_guru=mata_pelajaran.id_guru');
                                       
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
        }elseif($tabel == 'siswa'){
                $this->db->where('siswa.id_kelas',$where['id_kelas']);
                
            
                        
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
        if($tabel == 'mata_pelajaran')  {  
            if($where['id_tingkat'] != ''){
                $this->db->where('mata_pelajaran.id_tingkat',$where['id_tingkat']);                
            }
            if($_SESSION['user']['level'] == 'Guru'){
                $this->db->where('mata_pelajaran.id_guru',$_SESSION['user']['id_grup_pengguna']);
            }
           
            $this->db->join('guru','guru.id_guru=mata_pelajaran.id_guru');
            
        }elseif($tabel == 'siswa'){
            
                $this->db->where('siswa.id_kelas',$where['id_kelas']);
            
           
        }
        
        return $this->db->count_all_results();
    }



    public function totalAbsensi($id_siswa,$id_mata_pelajaran)
    { 
      

      $total_hadir = $this->countAbsensi($id_siswa,$id_mata_pelajaran,'Hadir');
      $total_sakit = $this->countAbsensi($id_siswa,$id_mata_pelajaran,'Sakit');
      $total_ijin = $this->countAbsensi($id_siswa,$id_mata_pelajaran,'Ijin');
      $total_alpa = $this->countAbsensi($id_siswa,$id_mata_pelajaran,'Alpa');
      //persentase hadir
 
      $total_pertemuan = $this->countPersentase($id_siswa,$id_mata_pelajaran);
      if($total_hadir == 0 || $total_pertemuan == 0){
          $persen_hadir = 0;
      }else{
         $persen_hadir = $total_hadir / $total_pertemuan * 100;
      }
      
     $data = [
         "hadir" => $total_hadir,
         "ijin" => $total_ijin,
         "sakit" => $total_sakit,
         "alpa" => $total_alpa,
         "persen_hadir" => $persen_hadir,
         "total_pertemuan" => $total_pertemuan
     ];

     return $data;

    }

    public function countPersentase($id_siswa,$id_mata_pelajaran){
        $this->db->select("*");
        $this->db->from('absensi'); 
        $this->db->where('absensi.id_mata_pelajaran',$id_mata_pelajaran);      
        $this->db->where('absensi.id_siswa',$id_siswa);      
        $this->db->join('siswa','siswa.id_siswa = absensi.id_siswa'); 

        return $this->db->count_all_results();
    }

    public function countAbsensi($id_siswa,$id_mata_pelajaran,$abs){
        //total hadir
      $this->db->select("*");
      $this->db->from('absensi'); 
      $this->db->where('siswa.id_siswa',$id_siswa);
      $this->db->where('absensi.id_mata_pelajaran',$id_mata_pelajaran);
      $this->db->where('absensi.kehadiran_absensi',$abs);
      $this->db->join('siswa','siswa.id_siswa = absensi.id_siswa'); 
      
      return $this->db->count_all_results();
    }

  


}