<?php 



class Pengguna_model extends CI_Model{

    public function queryById($data = [])
    {
        $level = strtolower($data['level']);
      
        $kol_id = 'id_'.$level;
        $id = $data['id_'.$level];
        $tabel = $level;
        $this->db->select('*');
        $this->db->from($tabel);
        $this->db->where($kol_id,$id);
        $this->db->join('pengguna', $tabel.'.id_'.$tabel.' = pengguna.id_grup_pengguna', 'left');
        $this->db->join('jabatan_tambahan', $tabel.'.id_'.$tabel.' = jabatan_tambahan.id_grup_pengguna_jabatan', 'left');
        if($tabel == 'siswa'){
            $this->db->join('kelas', $tabel.'.id_kelas = kelas.id_kelas', 'left');
        }
        $query = $this->db->get();
       return $query->row_array();
    }

    public function jmlSiswaByKelas($id_kelas){
        $this->db->select('*');
        $this->db->from('siswa');
        $this->db->where('id_kelas',$id_kelas);
        $result = $this->db->count_all_results();
            if($result != null){
                $output = $result;
            }else{
                $output = 0;
            }
        return $output;
    }

    public function getGuru(){
        $this->db->select('*');
        $this->db->from('guru');
        
        return $this->db->get()->result_array();
    }

    public function cekUser($username=''){
        return $this->db->get_where('pengguna',['username' => $username])->row_array();
    }

    public function setWaktuLogin($data = []){
        date_default_timezone_set('Asia/Jakarta');
        $tgl=date('Y-m-d H:i:s'); 
                       
        $tgl_login = [
                        'tgl_login' => $tgl
                    ];

        $this->db->where('id_pengguna', $data['id_pengguna']);
        $this->db->update('pengguna', $tgl_login); 
        return $this->db->affected_rows();;
    }

    public function buatQuery($tabel,$select_column = [],$order_column = [])
    {
        $tabel = strtolower($tabel);
        if($tabel == 'siswa'){
            $kol_induk = 'nis_'.$tabel;
        }else{
            $kol_induk = 'nik_'.$tabel;
        }
        
        $this->db->select($select_column);
        $this->db->from($tabel);
        if(isset($_POST['search']['value']))
        {
            $this->db->like($kol_induk,$_POST['search']['value']);
            $this->db->or_like('nama_'.$tabel,$_POST['search']['value']);
        }

        if(isset($_POST['order']))
        {
            $this->db->order_by($order_column[$_POST['order']['0']['column']],$_POST['order']['0']['dir']);
        }else{
            $this->db->order_by($tabel.'.'.$kol_induk, 'DESC');
        }        

        $this->db->join('pengguna', $tabel.'.id_'.$tabel.' = pengguna.id_grup_pengguna', 'left');
        $this->db->join('jabatan_tambahan', $tabel.'.id_'.$tabel.' = jabatan_tambahan.id_grup_pengguna_jabatan', 'left');
        if($tabel=='siswa'){
            $this->db->join('kelas', $tabel.'.id_kelas = kelas.id_kelas', 'left');
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
        return $this->db->count_all_results();
    }

    public function queryCountModular($tabel)
    {
       return $this->db->get($tabel)->num_rows();
       
    }

    public function cekKodeModular($tabel,$kol_id)
    {
        $this->db->select_max($kol_id);
        $query = $this->db->get($tabel); 
       return $query->row_array();
    }

    public function tambah($data = [],$level,$jabatan_tambahan)
    {

      $tabel = strtolower($level);
    
      //id otomatis
      if($level == 'Siswa'){
            $kd_id = 'SIS';
            $kol_id = 'id_siswa';
        }else if($level == 'Guru'){
            $kd_id = 'GUR';
            $kol_id = 'id_guru';
        }else if($level == 'Administrator'){
            $kd_id = 'ADM';
            $kol_id = 'id_administrator';
        }
    
        
    $jumlah_baris = $this->queryCountModular($tabel);        
    
    //jika jumlah baris = 0
    if($jumlah_baris == 0){
        $kodeIDSekarang = $kd_id.'00001';
    }else{
        //cek kode id terakhir
        $hasil = $this->cekKodeModular($tabel,$kol_id);        
        $hasilKode = $hasil[$kol_id];
        
        $urutan = (int) substr($hasilKode, 3, 5);
 
        // bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
        $urutan++;

        // membentuk kode barang baru
        // perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
        // misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
        // angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya BRG 
        
        $kodeIDSekarang = $kd_id . sprintf("%05s", $urutan);        
        
    }
    
    
    $data[$kol_id] = $kodeIDSekarang;
    

        //insert data ke tabel administrator, staf, guru atau siswa
      $this->db->insert($tabel,$data);      
      

      //insert data ke tabel pengguna
      if($level == 'Siswa'){
          $username = $data['nis_siswa'];

          $password = password_hash($data['nis_siswa'],PASSWORD_DEFAULT);
      }else{
          $str = 'nik_'.strtolower($level);
          $username = $data[$str];
          $password = htmlspecialchars(password_hash($data[$str],PASSWORD_DEFAULT));
      }

      $data_pengguna = [
            'id_grup_pengguna' => $kodeIDSekarang,
            'username' => $username,
            'password' => $password,
            'level' => $level
      ];

      //jika jabatan tambahan tidak kosong
      if(!empty($jabatan_tambahan)){
          $data_jabatan = [
            'id_grup_pengguna_jabatan' => $kodeIDSekarang,
            'jabatan_tambahan' => $jabatan_tambahan
          ];
        $this->db->insert('jabatan_tambahan',$data_pengguna);
      }

      
      //insert data ke tabel pengguna
     $this->db->insert('pengguna',$data_pengguna);
     $status = $this->db->affected_rows();


      if ($status > 0) {
            return 1;
        } else {
            return 0;
        }
       
    }

    public function ubahPassword($password,$tabel,$id_pengguna){
        $data = [
                'password'  => $password
        ];

        $this->db->where('id_pengguna', $id_pengguna);
        $this->db->update($tabel, $data);
        $status = $this->db->affected_rows();
        if ($status > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    public function ubah($data = [],$level,$jabatan_tambahan)
    {
       
      $tabel = strtolower($level); 
      $kol_id = 'id_'.$tabel;  
      
      if($level == 'Siswa'){
        $kol_induk = 'nis_'.$tabel;
    }else{
        $kol_induk = 'nik_'.$tabel;        
    }

 
    
    //jika ada perubahan nomer induk
    if($data[$kol_induk.'_lama'] != $data[$kol_induk]){        
    
          //update data ke tabel pengguna            
        $username = $data[$kol_induk];
        $password = htmlspecialchars(password_hash($data[$kol_induk],PASSWORD_DEFAULT));           

        $data_pengguna = [
            'username' => $username,
            'password' => $password
        ];

        $this->db->where('id_grup_pengguna', $data[$kol_id]);
        $this->db->update('pengguna', $data_pengguna);     
        $ubah_no_induk = 1;
    }else{
        $ubah_no_induk = 0;
    }
    

    unset($data[$kol_induk.'_lama']);
     
        //update data ke tabel administrator, staf, guru atau siswa
        $this->db->where($kol_id, $data[$kol_id]);
        $this->db->update($tabel, $data);     
        $status = $this->db->affected_rows();
      

      //jika jabatan tambahan tidak kosong
      if(!empty($jabatan_tambahan)){
          $data_jabatan = [
            'jabatan_tambahan' => $jabatan_tambahan
          ];
        $this->db->where('id_grup_pengguna_jabatan', $data[$kol_id]);
        $this->db->update($tabel, $data);
        $status = $this->db->affected_rows();
      }       

      if ($status > 0) {
            $ubah = 1;
        } else {
            $ubah = 0;
        }

        $data = [
            'ubah_no_induk' => $ubah_no_induk,
            'ubah' => $ubah
        ];

        return $data;
       
    }

    public function hapus($data = []){
        $tabel = strtolower($data['level']);
        $kol_id = 'id_'.$tabel;

        if($data['id_grup_pengguna_jabatan'] != null){
            $this->db->delete('jabatan_tambahan', ['id_grup_pengguna_jabatan' => $data['id_grup_pengguna_jabatan']]);
        }

        $this->db->delete('pengguna', ['id_grup_pengguna' => $data['id_grup_pengguna']]);

        

        $this->db->delete($tabel, [$kol_id => $data[$kol_id]]);
        $status = $this->db->affected_rows();
        if ($status > 0) {
            return 1;
         } else {
            return 0;
         }
    }

    public function resetPassword($data = []){
       
        $level = strtolower($data['level']);
        
        if($level == 'siswa'){
            $id = $data['id_'.$level];
            $no_induk = $data['nis_'.$level];
        }else{
            $id = $data['id_'.$level];
            $no_induk = $data['nik_'.$level];
        }
        
        //enkripsi password
        $password_baru = password_hash($no_induk,PASSWORD_DEFAULT);
        
            $data1 = [
                'password' => $password_baru
            ];
            
        $this->db->where('id_grup_pengguna', $id);
        $this->db->update('pengguna', $data1);
        $status = $this->db->affected_rows();

      if ($status > 0) {
         return 1;
      } else {
         return 0;
      }
        
    }

   
    
}