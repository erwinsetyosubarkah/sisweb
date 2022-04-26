<?php 



class Cetak_rapor_uts_model extends CI_Model{


   

    public function buatQuery($tabel,$select_column = [],$order_column = [],$where)
    {
        $tabel = strtolower($tabel);

        $this->db->select($select_column);
        $this->db->from($tabel);
        if($where['id_kelas'] != ''){
            $this->db->where('siswa.id_kelas',$where['id_kelas']);
        }
       
        $this->db->join('kelas', 'siswa.id_kelas = kelas.id_kelas', 'left');
       
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
        
        return $this->db->count_all_results();
    }



   public function queryNilai($id_kelas,$id_siswa){
       //ambil data mapel
        $this->db->select('*');
        $this->db->from('mata_pelajaran');        
        $this->db->where('kelas.id_kelas',$id_kelas);        
        $this->db->join('tingkat', 'mata_pelajaran.id_tingkat = tingkat.id_tingkat', 'left');
        $this->db->join('kelas', 'tingkat.id_tingkat = kelas.id_tingkat', 'left');
        $mata_pelajaran = $this->db->get()->result_array();
        $no = 0;
        foreach($mata_pelajaran as $mapel){
            // hitung nilai pengetahuan
            $nilai_keterampilan = $this->hitungKeterampilan($id_siswa,$mapel['id_mata_pelajaran']);
            $nilai_pengetahuan = $this->hitungPengetahuan($id_siswa,$mapel['id_mata_pelajaran']);
            $mata_pelajaran[$no]['keterampilan_nilai'] = $nilai_keterampilan;
            $mata_pelajaran[$no]['pengetahuan_nilai'] = $nilai_pengetahuan;
            $predikat_keterampilan = $this->predikatKeterampilan($nilai_keterampilan);
            $predikat_pengetahuan = $this->predikatPengetahuan($nilai_pengetahuan);
            $mata_pelajaran[$no]['predikat_keterampilan'] = $predikat_keterampilan;
            $mata_pelajaran[$no]['predikat_pengetahuan'] = $predikat_pengetahuan;

            $no++;
        }

        return $mata_pelajaran;
   }

   public function hitungPengetahuan($id_siswa,$id_mata_pelajaran){
        $query = "select avg(nilai.pengetahuan_nilai) as total from nilai join agenda_mengajar on agenda_mengajar.id_agenda_mengajar=nilai.id_agenda_mengajar where nilai.id_siswa='$id_siswa' and nilai.id_mata_pelajaran='$id_mata_pelajaran' and agenda_mengajar.keterangan_agenda_mengajar='Harian UTS' or agenda_mengajar.keterangan_agenda_mengajar='UTS'";
        $result = $this->db->query($query);     
    
        $total_nilai =(int) $result->row()->total;
        return $total_nilai;
   }

   public function hitungKeterampilan($id_siswa,$id_mata_pelajaran){
       $query = "select avg(nilai.keterampilan_nilai) as total from nilai join agenda_mengajar on agenda_mengajar.id_agenda_mengajar=nilai.id_agenda_mengajar where nilai.id_siswa='$id_siswa' and nilai.id_mata_pelajaran='$id_mata_pelajaran' and agenda_mengajar.keterangan_agenda_mengajar='Harian UTS' or agenda_mengajar.keterangan_agenda_mengajar='UTS'";
        $result = $this->db->query($query);     
       
        $total_nilai =(int) $result->row()->total;
        return $total_nilai;
   }

   public function predikatPengetahuan($nilai_pengetahuan){
       
        $predikat = $this->queryPredikat();

        foreach($predikat as $pr){
            $dari = (int) $pr['dari_rentang_nilai'];
            $sampai = (int) $pr['sampai_rentang_nilai'];
            $nilai = (int) $nilai_pengetahuan;
            if($nilai >= $dari && $nilai <= $sampai ){
                $hasil = $pr['predikat_rentang_nilai'];
            }            
        }
        return $hasil;       
   }

   public function predikatKeterampilan($nilai_keterampilan){
       
        $predikat = $this->queryPredikat();

        foreach($predikat as $pr){
            $dari = (int) $pr['dari_rentang_nilai'];
            $sampai = (int) $pr['sampai_rentang_nilai'];
            $nilai = (int) $nilai_keterampilan;
            if($nilai >= $dari && $nilai <= $sampai ){
                $hasil = $pr['predikat_rentang_nilai'];
            }            
        }
        return $hasil;  
   }

   public function queryPredikat(){
        $this->db->select('*');
        $this->db->from('rentang_nilai');
        $query = $this->db->get();
        return $predikat = $query->result_array();
   }

   public function queryExtrakurikuler($id_siswa){
        $this->db->select('*');
        $this->db->from('nilai_extrakurikuler');
        $this->db->where('id_siswa',$id_siswa);
        $query = $this->db->get();
        return $predikat = $query->row_array();
   }

   public function queryGuru($id_guru){
        $this->db->select('*');
        $this->db->from('guru');
        $this->db->where('id_guru',$id_guru);
        $query = $this->db->get();
        return $predikat = $query->row_array();
   }

   function tanggalIndonesia($tanggal){
    //explode / pecah tanggal berdasarkan tanda "-"
    $exp = explode("-", $tanggal);
    
    //siapkan nama bulan dalam array
    $bulan = array(1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');

    return $exp[2].' '.$bulan[(int)$exp[1]].' '.$exp[0];
}
  


}