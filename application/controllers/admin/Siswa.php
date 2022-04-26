<?php 

//PhpSpreadsheet
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class Siswa extends CI_Controller{
    
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        if($this->session->userdata('user') == null){
            redirect(base_url().'login-user');
            die();
        }

        if($_SESSION['user']['level'] != 'Administrator'){
            redirect(base_url().'beranda-admin');
            die();
        }

        $this->load->model('admin/Pengaturan_model');
        $data['pengaturan'] = $this->Pengaturan_model->getPengaturanById(); 

        $this->load->view('admin/templates/header',$data);
        $this->load->view('admin/siswa/siswa',$data); 
        $this->load->view('admin/templates/footer');
    }

    public function getKelas(){
        
        $this->load->model('admin/Kelas_model');
        $fetch_data = $this->Kelas_model->getKelas();

        $output = '';

        foreach($fetch_data as $data){
            $output .= '<option value="'.$data['id_kelas'].'">'.$data['kelas'].'</option>';
        }

        echo json_encode($output);
    }

    public function queryAll()
    {
        
        $level = 'siswa';
        $select_column = [
            'siswa.id_siswa',
            'siswa.nis_siswa',
            'siswa.nisn_siswa',
            'siswa.nama_siswa',
            'siswa.jenis_kelamin_siswa',
            'siswa.tempat_lahir_siswa',
            'siswa.tanggal_lahir_siswa',
            'siswa.agama_siswa',
            'siswa.kewarganegaraan_siswa',
            'siswa.kebutuhan_khusus_siswa',
            'siswa.alamat_jalan_siswa',
            'siswa.rt_siswa',
            'siswa.rw_siswa',
            'siswa.nama_dusun_siswa',
            'siswa.desa_kelurahan_siswa',
            'siswa.kecamatan_siswa',
            'siswa.kabupaten_kota_siswa',
            'siswa.provinsi_siswa',
            'siswa.kode_pos_siswa',
            'siswa.jenis_tinggal_siswa',
            'siswa.alat_transportasi_siswa',
            'siswa.email_siswa',
            'siswa.no_telp_siswa',
            'siswa.foto_siswa',
            'siswa.skhun_siswa',
            'siswa.nama_ayah_siswa',           
            'siswa.tahun_lahir_ayah_siswa',           
            'siswa.pendidikan_ayah_siswa',           
            'siswa.pekerjaan_ayah_siswa',           
            'siswa.penghasilan_ayah_siswa',           
            'siswa.kebutuhan_khusus_ayah_siswa',           
            'siswa.no_telp_ayah_siswa',           
            'siswa.nama_ibu_siswa',           
            'siswa.tahun_lahir_ibu_siswa',           
            'siswa.pendidikan_ibu_siswa',           
            'siswa.pekerjaan_ibu_siswa',           
            'siswa.penghasilan_ibu_siswa',           
            'siswa.kebutuhan_khusus_ibu_siswa',           
            'siswa.no_telp_ibu_siswa',           
            'siswa.nama_wali_siswa',           
            'siswa.tahun_lahir_wali_siswa',           
            'siswa.pendidikan_wali_siswa',           
            'siswa.pekerjaan_wali_siswa',           
            'siswa.penghasilan_wali_siswa',              
            'siswa.no_telp_wali_siswa',
            'kelas.id_kelas',
            'kelas.kelas',
            'pengguna.level',
            'pengguna.tgl_login'
        ];

        $order_column = [
            null,
            'siswa.nis_siswa',
            'siswa.nisn_siswa',
            'siswa.nama_siswa',
            'siswa.jenis_kelamin_siswa',
            'siswa.email_siswa',
            'siswa.no_telp_siswa',
            'kelas.kelas',
            null,
            'pengguna.tgl_login',
            null
        ];
      
        $this->load->model('admin/Pengguna_model');
        $fetch_data = $this->Pengguna_model->buatDataTables($level,$select_column,$order_column);
        $data = [];
        $nourut = 1;
        foreach($fetch_data as $row)
        {
            $sub_array = [];
            $sub_array[] = $nourut;
            $sub_array[] = $row->nis_siswa;
            $sub_array[] = $row->nisn_siswa;
            $sub_array[] = $row->nama_siswa;
            $sub_array[] = $row->jenis_kelamin_siswa;
            $sub_array[] = $row->email_siswa;
            $sub_array[] = $row->no_telp_siswa;
            if($row->foto_siswa == '' || $row->foto_siswa == null || !file_exists('./assets/img/foto/'.$row->foto_siswa)){
                $sub_array[] = '<img src="'.base_url().'assets/img/foto/noimage.png" width="50">';
            }else{
                $sub_array[] = '<img src="'.base_url().'assets/img/foto/'.$row->foto_siswa.'" width="50">';
            }
            $sub_array[] = $row->kelas;
            $sub_array[] = $row->tgl_login;
            $sub_array[] = '
                            <button class="badge badge-primary badge-sm border-0" style="margin: 2px;" onclick="btnDetail(\''.$row->level.'\',\''.$row->id_siswa.'\',\''.$row->nis_siswa.'\')" title="Detail" data-toggle="modal" data-target="#modalDetailSiswa"><i class="fa fa-fw fa-info"></i></button> 
                            
                            <button class="badge badge-success badge-sm border-0" style="margin: 2px;" onclick="btnResetPassword(\''.$row->level.'\',\''.$row->id_siswa.'\',\''.$row->nis_siswa.'\')" title="Reset Password"><i class="fa fa-fw fa-key"></i></button> 
                            
                            <button class="badge badge-warning badge-sm border-0" style="margin: 2px;" onclick="btnModalUbah(\''.$row->level.'\',\''.$row->id_siswa.'\',\''.$row->nis_siswa.'\')" title="Ubah" data-toggle="modal" data-target="#modalSiswa"><i class="fa fa-fw fa-edit"></i></button> 
                            
                            <button class="badge badge-danger badge-sm border-0" style="margin: 2px;" onclick="btnModalHapus(\''.$row->level.'\',\''.$row->id_siswa.'\',\''.$row->nis_siswa.'\')" title="Hapus"><i class="fa fa-fw fa-trash"></i></button> 
                            ';
            $data[] = $sub_array;

            $nourut++;
        }

        $output = [
            'draw'              =>  intval($_POST['draw']),
            'recordsTotal'      =>  $this->Pengguna_model->getAllData($level,$select_column,$order_column),
            'recordsFiltered'   =>  $this->Pengguna_model->getFilteredData($level,$select_column,$order_column),
            'data'              =>  $data
        ];

        echo json_encode($output);
      
    }



    public function queryById()
    {
        $data = $_POST;
        
        $this->load->model('admin/Pengguna_model');
        $data = $this->Pengguna_model->queryById($data);

        //jika foto tidak ada
        if($data['foto_siswa'] == '' || $data['foto_siswa'] == null || !file_exists('./assets/img/foto/'.$data['foto_siswa'])){
            $data['foto_siswa'] = 'noimage.png';
        }

        echo json_encode($data);
      
    }

    public function tambah()
    {
        $data = $_POST;

        $level = $data['level'];
        $jabatan_tambahan = $data['jabatan_tambahan'];

        unset($data['level']);
        unset($data['jabatan_tambahan']);

        //jika user upload foto
        if(!isset($data['foto_siswa'])){
            if(!empty($_FILES['foto_siswa']['name'])){
                $config = array();
                $config['upload_path']          =  './assets/img/foto/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 10000;        
             
                $this->load->library('upload', $config, 'foto_siswaupload'); // Create custom object for cover upload
                $this->foto_siswaupload->initialize($config);
                $this->foto_siswaupload->do_upload('foto_siswa');
                $foto_siswa = $this->foto_siswaupload->data('file_name');
                $data['foto_siswa'] = $foto_siswa;
             }
        }

        $this->load->model('admin/Pengguna_model');
        $status = $this->Pengguna_model->tambah($data,$level,$jabatan_tambahan);
       
        if($status == 1){         
            $data = [
                  'status' => 'success',
                  'title' => 'Berhasil',
                  'pesan' => 'Data berhasil Ditambah....! Username dan Password sama dengan nomor NIK / NIS'
              ];
        }else{
            $data = [
                'status' => 'error',
                'title'  => 'Gagal',
                'pesan' => 'Data gagal Ditambah...!'
            ];
        }     

        echo json_encode($data);
        
    }


    public function ubah()
    {
        $data = $_POST;

        $level = $data['level'];
        $jabatan_tambahan = $data['jabatan_tambahan'];
        $foto_siswa_lama = $data['foto_siswa_lama'];
        
        unset($data['level']);
        unset($data['jabatan_tambahan']);
        

        //jika user upload foto
        if(!isset($data['foto_siswa'])){
            if(!empty($_FILES['foto_siswa']['name'])){
                $config = array();
                $config['upload_path']          =  './assets/img/foto/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 10000;        
             
                $this->load->library('upload', $config, 'foto_siswaupload'); // Create custom object for cover upload
                $this->foto_siswaupload->initialize($config);
                $this->foto_siswaupload->do_upload('foto_siswa');
                $foto_siswa = $this->foto_siswaupload->data('file_name');
                $data['foto_siswa'] = $foto_siswa;
                if($foto_siswa_lama != '' || $foto_siswa_lama != null){
                    if (file_exists('./assets/img/foto/'.$foto_siswa_lama)) {                
                        unlink('./assets/img/foto/'.$foto_siswa_lama);
                    }
                }
             }
        }else{                 
            $data['foto_siswa'] = $foto_siswa_lama;
         }

        
        unset($data['foto_siswa_lama']);

        
        $this->load->model('admin/Pengguna_model');       
        $status = $this->Pengguna_model->ubah($data,$level,$jabatan_tambahan);
       
       
          if($status['ubah'] == 1 && $status['ubah_no_induk'] == 1 ){         
              $data = [
                  'status' => 'success',
                  'title' => 'Berhasil',
                  'pesan' => 'Data dan Nomor Induk berhasil Diubah....! Username dan Password sama dengan Nomor Induk baru'
              ];
          }elseif($status['ubah'] == 1 && $status['ubah_no_induk'] == 0){
            $data = [
                'status' => 'success',
                'title' => 'Berhasil',
                'pesan' => 'Data berhasil Diubah....!'
            ];
          }else{
            $data = [
                'status' => 'error',
                'title'  => 'Gagal',
                'pesan' => 'Data gagal Diubah...!'
            ];
        }     

        echo json_encode($data);
        
    }

    public function hapus(){
        $data = $_POST;

        $this->load->model('admin/Pengguna_model');
        $data = $this->Pengguna_model->queryById($data);

        $status = $this->Pengguna_model->hapus($data);
        if($data['foto_siswa'] != '' || $data['foto_siswa'] != null){
            if (file_exists('./assets/img/foto/'.$data['foto_siswa'])) {  
                unlink('./assets/img/foto/'.$data['foto_siswa']);
            }
        }

          if($status == 1){         
              $data = [
                  'status' => 'success',
                  'title' => 'Berhasil',
                  'pesan' => 'Data Berhasil di Hapus....!'
              ];
          }else{
            $data = [
                'status' => 'error',
                'title'  => 'Gagal',
                'pesan' => 'Data Gagal di Hapus....!'
            ];
        }     

        echo json_encode($data);


    }

    public function resetPassword(){  
        $data = $_POST;      

        $this->load->model('admin/Pengguna_model');
        $status = $this->Pengguna_model->resetPassword($data);
       
          if($status == 1){         
              $data = [
                  'status' => 'success',
                  'title' => 'Berhasil',
                  'pesan' => 'Password Berhasil di Reset....! Password sama dengan nomor NIK / NIS'
              ];
          }else{
            $data = [
                'status' => 'error',
                'title'  => 'Gagal',
                'pesan' => 'Password Gagal di Reset....!'
            ];
        }     

        echo json_encode($data);
    }

    public function importData(){
        $this->load->model('admin/Pengguna_model');
        if(isset($_FILES['import_data']['name'])){            
             // get file extension
             $extension = pathinfo($_FILES['import_data']['name'], PATHINFO_EXTENSION);
 
             if($extension == 'csv'){
                 $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
             } elseif($extension == 'xlsx') {
                 $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
             } elseif($extension == 'xls') {
                 $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
             }else{
                $data = [
                    'status' => 'error',
                    'title'  => 'Gagal',
                    'pesan' => 'Pilih File Terlebih dahulu...!'
                ];

                echo json_encode($data);
                exit;
             }

             
           

             // file path
             $spreadsheet = $reader->load($_FILES['import_data']['tmp_name']);
             $allDataInSheet = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
             
             // array Count
             $arrayCount = count($allDataInSheet);
            
             $flag = 0;
             $createArray = array('No', 'NIS', 'NISN', 'Nama', 'Jenis Kelamin', 'Tempat Lahir', 'Tanggal Lahir', 'Agama', 'Kebutuhan Khusus Siswa', 'Alamat Jalan', 'RT', 'RW', 'Nama Dusun', 'Desa Kelurahan', 'Kecamatan', 'Kabupaten Kota', 'Provinsi', 'Kode Pos', 'Jenis Tinggal', 'Alat Transportasi', 'Email', 'No Telp', 'SKHUN', 'Nama Ayah', 'Tahun Lahir Ayah', 'Pendidikan Ayah', 'Pekerjaan Ayah', 'Penghasilan Ayah', 'Kebutuhan Khusus Ayah', 'No Telp Ayah', 'Nama Ibu', 'Tahun Lahir Ibu', 'Pendidikan Ibu', 'Pekerjaan Ibu', 'Penghasilan Ibu', 'Kebutuhan Khusus Ibu', 'No Telp Ibu', 'Nama Wali', 'Tahun Lahir Wali', 'Pendidikan Wali', 'Pekerjaan Wali', 'Penghasilan Wali', 'No Telp Wali','ID Kelas', 'Kewarganegaraan');
             $makeArray = array(
                            'No'                        =>  'No',
                            'NIS'                       =>  'NIS',
                            'NISN'                      =>  'NISN',
                            'Nama'                      =>  'Nama',
                            'JenisKelamin'              =>  'Jenis Kelamin',
                            'TempatLahir'               =>  'Tempat Lahir',
                            'TanggalLahir'              =>  'Tanggal Lahir',
                            'Agama'                     =>  'Agama',
                            'KebutuhanKhususSiswa'      =>  'Kebutuhan Khusus Siswa',
                            'AlamatJalan'               =>  'Alamat Jalan',
                            'RT'                        =>  'RT',
                            'RW'                        =>  'RW',
                            'NamaDusun'                 =>  'Nama Dusun',
                            'DesaKelurahan'             =>  'Desa Kelurahan',
                            'Kecamatan'                 =>  'Kecamatan',
                            'KabupatenKota'             =>  'Kabupaten Kota',
                            'Provinsi'                  =>  'Provinsi',
                            'KodePos'                   =>  'Kode Pos',
                            'JenisTinggal'              =>  'Jenis Tinggal',
                            'AlatTransportasi'          =>  'Alat Transportasi',
                            'Email'                     =>  'Email',
                            'NoTelp'                    =>  'No Telp',
                            'SKHUN'                     =>  'SKHUN',
                            'NamaAyah'                  =>  'Nama Ayah',
                            'TahunLahirAyah'            =>  'Tahun Lahir Ayah',
                            'PendidikanAyah'            =>  'Pendidikan Ayah',
                            'PekerjaanAyah'             =>  'Pekerjaan Ayah',
                            'PenghasilanAyah'           =>  'Penghasilan Ayah',
                            'KebutuhanKhususAyah'       =>  'Kebutuhan Khusus Ayah',
                            'NoTelpAyah'                =>  'No Telp Ayah', 
                            'NamaIbu'                   =>  'Nama Ibu',
                            'TahunLahirIbu'             =>  'Tahun Lahir Ibu',
                            'PendidikanIbu'             =>  'Pendidikan Ibu',
                            'PekerjaanIbu'              =>  'Pekerjaan Ibu',
                            'PenghasilanIbu'            =>  'Penghasilan Ibu',
                            'KebutuhanKhususIbu'        =>  'Kebutuhan Khusus Ibu',
                            'NoTelpIbu'                 =>  'No Telp Ibu', 
                            'NamaWali'                  =>  'Nama Wali',
                            'TahunLahirWali'            =>  'Tahun Lahir Wali',
                            'PendidikanWali'            =>  'Pendidikan Wali',
                            'PekerjaanWali'             =>  'Pekerjaan Wali',
                            'PenghasilanWali'           =>  'Penghasilan Wali',
                            'NoTelpWali'                =>  'No Telp Wali',
                            'IDKelas'                   =>  'ID Kelas',
                            'Kewarganegaraan'           =>  'Kewarganegaraan'
                );            
               
             $SheetDataKey = array();
             foreach ($allDataInSheet as $dataInSheet) {
                 foreach ($dataInSheet as $key => $value) {
                     if (in_array(trim($value), $createArray)) {
                         $value = preg_replace('/\s+/', '', $value);
                         $SheetDataKey[trim($value)] = $key;
                     } 
                 }
             }
             $dataDiff = array_diff_key($makeArray, $SheetDataKey);
           
             if (empty($dataDiff)) {
                 $flag = 1;
             }
            

             // match excel sheet column
            if ($flag == 1) {
               
                 for ($i = 2; $i <= $arrayCount; $i++) {
                    
                     $nis_siswa = $SheetDataKey['NIS'];
                     $nisn_siswa = $SheetDataKey['NISN'];
                     $nama_siswa = $SheetDataKey['Nama'];
                     $jenis_kelamin_siswa = $SheetDataKey['JenisKelamin'];
                     $tempat_lahir_siswa = $SheetDataKey['TempatLahir'];
                     $tanggal_lahir_siswa = $SheetDataKey['TanggalLahir'];
                     $agama_siswa = $SheetDataKey['Agama'];
                     $kebutuhan_khusus_siswa = $SheetDataKey['KebutuhanKhususSiswa'];
                     $alamat_jalan_siswa = $SheetDataKey['AlamatJalan'];
                     $rt_siswa = $SheetDataKey['RT'];
                     $rw_siswa = $SheetDataKey['RW'];
                     $nama_dusun_siswa = $SheetDataKey['NamaDusun'];
                     $desa_kelurahan_siswa = $SheetDataKey['DesaKelurahan'];
                     $kecamatan_siswa = $SheetDataKey['Kecamatan'];
                     $kabupaten_kota_siswa = $SheetDataKey['KabupatenKota'];
                     $provinsi_siswa = $SheetDataKey['Provinsi'];
                     $kode_pos_siswa = $SheetDataKey['KodePos'];
                     $jenis_tinggal_siswa = $SheetDataKey['JenisTinggal'];
                     $alat_transportasi_siswa = $SheetDataKey['AlatTransportasi'];
                     $email_siswa = $SheetDataKey['Email'];
                     $no_telp_siswa = $SheetDataKey['NoTelp'];
                     $skhun_siswa = $SheetDataKey['SKHUN'];
                     $nama_ayah_siswa = $SheetDataKey['NamaAyah'];
                     $tahun_lahir_ayah_siswa = $SheetDataKey['TahunLahirAyah'];
                     $pendidikan_ayah_siswa = $SheetDataKey['PendidikanAyah'];
                     $pekerjaan_ayah_siswa = $SheetDataKey['PekerjaanAyah'];
                     $penghasilan_ayah_siswa = $SheetDataKey['PenghasilanAyah'];
                     $kebutuhan_khusus_ayah_siswa = $SheetDataKey['KebutuhanKhususAyah'];
                     $no_telp_ayah_siswa = $SheetDataKey['NoTelpAyah'];
                     $nama_ibu_siswa = $SheetDataKey['NamaIbu'];
                     $tahun_lahir_ibu_siswa = $SheetDataKey['TahunLahirIbu'];
                     $pendidikan_ibu_siswa = $SheetDataKey['PendidikanIbu'];
                     $pekerjaan_ibu_siswa = $SheetDataKey['PekerjaanIbu'];
                     $penghasilan_ibu_siswa = $SheetDataKey['PenghasilanIbu'];
                     $kebutuhan_khusus_ibu_siswa = $SheetDataKey['KebutuhanKhususIbu'];
                     $no_telp_ibu_siswa = $SheetDataKey['NoTelpIbu'];
                     $nama_wali_siswa = $SheetDataKey['NamaWali'];
                     $tahun_lahir_wali_siswa = $SheetDataKey['TahunLahirWali'];
                     $pendidikan_wali_siswa = $SheetDataKey['PendidikanWali'];
                     $pekerjaan_wali_siswa = $SheetDataKey['PekerjaanWali'];
                     $penghasilan_wali_siswa = $SheetDataKey['PenghasilanWali'];
                     $no_telp_wali_siswa = $SheetDataKey['NoTelpWali'];
                     $id_kelas = $SheetDataKey['IDKelas'];
                     $kewarganegaraan_siswa = $SheetDataKey['Kewarganegaraan'];
                     

                     $nis_siswa = filter_var(trim($allDataInSheet[$i][$nis_siswa]), FILTER_SANITIZE_STRING);
                     $nisn_siswa = filter_var(trim($allDataInSheet[$i][$nisn_siswa]), FILTER_SANITIZE_STRING);
                     $nama_siswa = filter_var(trim($allDataInSheet[$i][$nama_siswa]), FILTER_SANITIZE_STRING);
                     $jenis_kelamin_siswa = filter_var(trim($allDataInSheet[$i][$jenis_kelamin_siswa]), FILTER_SANITIZE_STRING);
                     $tempat_lahir_siswa = filter_var(trim($allDataInSheet[$i][$tempat_lahir_siswa]), FILTER_SANITIZE_STRING);
                     $tanggal_lahir_siswa = filter_var(trim($allDataInSheet[$i][$tanggal_lahir_siswa]), FILTER_SANITIZE_STRING);
                     $agama_siswa = filter_var(trim($allDataInSheet[$i][$agama_siswa]), FILTER_SANITIZE_STRING);
                     $kebutuhan_khusus_siswa = filter_var(trim($allDataInSheet[$i][$kebutuhan_khusus_siswa]), FILTER_SANITIZE_STRING);
                     $alamat_jalan_siswa = filter_var(trim($allDataInSheet[$i][$alamat_jalan_siswa]), FILTER_SANITIZE_STRING);
                     $rt_siswa = filter_var(trim($allDataInSheet[$i][$rt_siswa]), FILTER_SANITIZE_STRING);
                     $rw_siswa = filter_var(trim($allDataInSheet[$i][$rw_siswa]), FILTER_SANITIZE_STRING);
                     $nama_dusun_siswa = filter_var(trim($allDataInSheet[$i][$nama_dusun_siswa]), FILTER_SANITIZE_STRING);
                     $desa_kelurahan_siswa = filter_var(trim($allDataInSheet[$i][$desa_kelurahan_siswa]), FILTER_SANITIZE_STRING);
                     $kecamatan_siswa = filter_var(trim($allDataInSheet[$i][$kecamatan_siswa]), FILTER_SANITIZE_STRING);
                     $kabupaten_kota_siswa = filter_var(trim($allDataInSheet[$i][$kabupaten_kota_siswa]), FILTER_SANITIZE_STRING);
                     $provinsi_siswa = filter_var(trim($allDataInSheet[$i][$provinsi_siswa]), FILTER_SANITIZE_STRING);
                     $kode_pos_siswa = filter_var(trim($allDataInSheet[$i][$kode_pos_siswa]), FILTER_SANITIZE_STRING);
                     $jenis_tinggal_siswa = filter_var(trim($allDataInSheet[$i][$jenis_tinggal_siswa]), FILTER_SANITIZE_STRING);
                     $alat_transportasi_siswa = filter_var(trim($allDataInSheet[$i][$alat_transportasi_siswa]), FILTER_SANITIZE_STRING);
                     $email_siswa = filter_var(trim($allDataInSheet[$i][$email_siswa]), FILTER_SANITIZE_STRING);
                     $no_telp_siswa = filter_var(trim($allDataInSheet[$i][$no_telp_siswa]), FILTER_SANITIZE_STRING);
                     $skhun_siswa = filter_var(trim($allDataInSheet[$i][$skhun_siswa]), FILTER_SANITIZE_STRING);
                     $nama_ayah_siswa = filter_var(trim($allDataInSheet[$i][$nama_ayah_siswa]), FILTER_SANITIZE_STRING);
                     $tahun_lahir_ayah_siswa = filter_var(trim($allDataInSheet[$i][$tahun_lahir_ayah_siswa]), FILTER_SANITIZE_STRING);
                     $pendidikan_ayah_siswa = filter_var(trim($allDataInSheet[$i][$pendidikan_ayah_siswa]), FILTER_SANITIZE_STRING);
                     $pekerjaan_ayah_siswa = filter_var(trim($allDataInSheet[$i][$pekerjaan_ayah_siswa]), FILTER_SANITIZE_STRING);
                     $penghasilan_ayah_siswa = filter_var(trim($allDataInSheet[$i][$penghasilan_ayah_siswa]), FILTER_SANITIZE_STRING);
                     $kebutuhan_khusus_ayah_siswa = filter_var(trim($allDataInSheet[$i][$kebutuhan_khusus_ayah_siswa]), FILTER_SANITIZE_STRING);
                     $no_telp_ayah_siswa = filter_var(trim($allDataInSheet[$i][$no_telp_ayah_siswa]), FILTER_SANITIZE_STRING);
                     $nama_ibu_siswa = filter_var(trim($allDataInSheet[$i][$nama_ibu_siswa]), FILTER_SANITIZE_STRING);
                     $tahun_lahir_ibu_siswa = filter_var(trim($allDataInSheet[$i][$tahun_lahir_ibu_siswa]), FILTER_SANITIZE_STRING);
                     $pendidikan_ibu_siswa = filter_var(trim($allDataInSheet[$i][$pendidikan_ibu_siswa]), FILTER_SANITIZE_STRING);
                     $pekerjaan_ibu_siswa = filter_var(trim($allDataInSheet[$i][$pekerjaan_ibu_siswa]), FILTER_SANITIZE_STRING);
                     $penghasilan_ibu_siswa = filter_var(trim($allDataInSheet[$i][$penghasilan_ibu_siswa]), FILTER_SANITIZE_STRING);
                     $kebutuhan_khusus_ibu_siswa = filter_var(trim($allDataInSheet[$i][$kebutuhan_khusus_ibu_siswa]), FILTER_SANITIZE_STRING);
                     $no_telp_ibu_siswa = filter_var(trim($allDataInSheet[$i][$no_telp_ibu_siswa]), FILTER_SANITIZE_STRING);
                     $nama_wali_siswa = filter_var(trim($allDataInSheet[$i][$nama_wali_siswa]), FILTER_SANITIZE_STRING);
                     $tahun_lahir_wali_siswa = filter_var(trim($allDataInSheet[$i][$tahun_lahir_wali_siswa]), FILTER_SANITIZE_STRING);
                     $pendidikan_wali_siswa = filter_var(trim($allDataInSheet[$i][$pendidikan_wali_siswa]), FILTER_SANITIZE_STRING);
                     $pekerjaan_wali_siswa = filter_var(trim($allDataInSheet[$i][$pekerjaan_wali_siswa]), FILTER_SANITIZE_STRING);
                     $penghasilan_wali_siswa = filter_var(trim($allDataInSheet[$i][$penghasilan_wali_siswa]), FILTER_SANITIZE_STRING);
                     $no_telp_wali_siswa = filter_var(trim($allDataInSheet[$i][$no_telp_wali_siswa]), FILTER_SANITIZE_STRING);
                     $id_kelas = filter_var(trim($allDataInSheet[$i][$id_kelas]), FILTER_SANITIZE_STRING);                    
                     $kewarganegaraan_siswa = filter_var(trim($allDataInSheet[$i][$kewarganegaraan_siswa]), FILTER_SANITIZE_STRING);                     
                  
                     $fetchData = array(
                         'nis_siswa' => $nis_siswa,                          
                         'nisn_siswa' => $nisn_siswa,
                         'nama_siswa' => $nama_siswa,
                         'jenis_kelamin_siswa' => $jenis_kelamin_siswa,
                         'tempat_lahir_siswa' => $tempat_lahir_siswa,
                         'tanggal_lahir_siswa' => $tanggal_lahir_siswa,
                         'agama_siswa' => $agama_siswa,
                         'kebutuhan_khusus_siswa' => $kebutuhan_khusus_siswa,
                         'alamat_jalan_siswa' => $alamat_jalan_siswa,
                         'rt_siswa' => $rt_siswa,
                         'rw_siswa' => $rw_siswa,
                         'nama_dusun_siswa' => $nama_dusun_siswa,
                         'desa_kelurahan_siswa' => $desa_kelurahan_siswa,
                         'kecamatan_siswa' => $kecamatan_siswa,
                         'kabupaten_kota_siswa' => $kabupaten_kota_siswa,
                         'provinsi_siswa' => $provinsi_siswa,
                         'kode_pos_siswa' => $kode_pos_siswa,
                         'jenis_tinggal_siswa' => $jenis_tinggal_siswa,
                         'alat_transportasi_siswa' => $alat_transportasi_siswa,
                         'email_siswa' => $email_siswa,
                         'no_telp_siswa' => $no_telp_siswa,
                         'skhun_siswa' => $skhun_siswa,
                         'nama_ayah_siswa' => $nama_ayah_siswa,
                         'tahun_lahir_ayah_siswa' => $tahun_lahir_ayah_siswa,
                         'pendidikan_ayah_siswa' => $pendidikan_ayah_siswa,
                         'pekerjaan_ayah_siswa' => $pekerjaan_ayah_siswa,
                         'penghasilan_ayah_siswa' => $penghasilan_ayah_siswa,
                         'kebutuhan_khusus_ayah_siswa' => $kebutuhan_khusus_ayah_siswa,
                         'no_telp_ayah_siswa' => $no_telp_ayah_siswa,
                         'nama_ibu_siswa' => $nama_ibu_siswa,
                         'tahun_lahir_ibu_siswa' => $tahun_lahir_ibu_siswa,
                         'pendidikan_ibu_siswa' => $pendidikan_ibu_siswa,
                         'pekerjaan_ibu_siswa' => $pekerjaan_ibu_siswa,
                         'penghasilan_ibu_siswa' => $penghasilan_ibu_siswa,
                         'kebutuhan_khusus_ibu_siswa' => $kebutuhan_khusus_ibu_siswa,
                         'no_telp_ibu_siswa' => $no_telp_ibu_siswa,
                         'nama_wali_siswa' => $nama_wali_siswa,
                         'tahun_lahir_wali_siswa' => $tahun_lahir_wali_siswa,
                         'pendidikan_wali_siswa' => $pendidikan_wali_siswa,
                         'pekerjaan_wali_siswa' => $pekerjaan_wali_siswa,
                         'penghasilan_wali_siswa' => $penghasilan_wali_siswa,
                         'no_telp_wali_siswa' => $no_telp_wali_siswa,
                         'id_kelas' => $id_kelas,                    
                         'kewarganegaraan_siswa' => $kewarganegaraan_siswa
                    );

                   

                    $level = 'Siswa';
                    $jabatan_tambahan = '';
                   
                    $status = $this->Pengguna_model->tambah($fetchData,$level,$jabatan_tambahan);
                 }   
                 
            }

            if($status == 1){         
                $data = [
                      'status' => 'success',
                      'title' => 'Berhasil',
                      'pesan' => 'Data berhasil Ditambah....! Username dan Password sama dengan nomor NIK / NIS'
                  ];
            }else{
                $data = [
                    'status' => 'error',
                    'title'  => 'Gagal',
                    'pesan' => 'Data gagal Ditambah...!'
                ];
            } 
        }else{
            $data = [
                'status' => 'error',
                'title'  => 'Gagal',
                'pesan' => 'Pilih File Terlebih dahulu...!'
            ];
        }

        echo json_encode($data);
    }

    public function downloadFormat(){	
        $this->load->helper('download');				
		force_download('./assets/download/formatImportDataSiswa.xlsx',NULL);
	}


}