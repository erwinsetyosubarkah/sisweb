<?php 

//PhpSpreadsheet
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class Guru extends CI_Controller{
    
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
        $this->load->view('admin/guru/guru',$data); 
        $this->load->view('admin/templates/footer');
    }

    public function queryAll()
    {
        
        $level = 'guru';
        $select_column = [
            'guru.id_guru',
            'guru.nik_guru',
            'guru.nama_guru',
            'guru.jenis_kelamin_guru',
            'guru.tempat_lahir_guru',
            'guru.tanggal_lahir_guru',
            'guru.nuptk_guru',
            'guru.status_kepegawaian_guru',
            'guru.jenis_ptk_guru',
            'guru.agama_guru',
            'guru.alamat_jalan_guru',
            'guru.rt_guru',
            'guru.rw_guru',
            'guru.nama_dusun_guru',
            'guru.desa_kelurahan_guru',
            'guru.kecamatan_guru',
            'guru.kabupaten_kota_guru',
            'guru.provinsi_guru',
            'guru.kode_pos_guru',
            'guru.email_guru',
            'guru.no_telp_guru',
            'guru.status_keaktifan_guru',
            'guru.sk_cpns_guru',
            'guru.tanggal_cpns_guru',
            'guru.sk_pengangkatan_guru',
            'guru.tmt_pengangkatan_guru',
            'guru.lembaga_pengangkatan_guru',
            'guru.golongan_guru',
            'guru.sumber_gaji_guru',
            'guru.nama_ibu_kandung_guru',
            'guru.status_pernikahan_guru',
            'guru.nama_suami_istri_guru',
            'guru.nik_suami_istri_guru',
            'guru.pekerjaan_suami_istri_guru',
            'guru.tmt_pns_guru',
            'guru.npwp_guru',
            'guru.kewarganegaraan_guru',
            'guru.foto_guru',
            'pengguna.level',
            'pengguna.tgl_login'
        ];

        $order_column = [
            null,
            'guru.nik_guru',
            'guru.nama_guru',
            'guru.jenis_kelamin_guru',
            'guru.email_guru',
            'guru.no_telp_guru',
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
            $sub_array[] = $row->nik_guru;
            $sub_array[] = $row->nama_guru;
            $sub_array[] = $row->jenis_kelamin_guru;
            $sub_array[] = $row->email_guru;
            $sub_array[] = $row->no_telp_guru;
            if($row->foto_guru == '' || $row->foto_guru == null || !file_exists('./assets/img/foto/'.$row->foto_guru)){
                $sub_array[] = '<img src="'.base_url().'assets/img/foto/noimage.png" width="50">';
            }else{
                $sub_array[] = '<img src="'.base_url().'assets/img/foto/'.$row->foto_guru.'" width="50">';
            }
            $sub_array[] = $row->tgl_login;
            $sub_array[] = '
                            <button class="badge badge-primary badge-sm border-0" style="margin: 2px;" onclick="btnDetail(\''.$row->level.'\',\''.$row->id_guru.'\',\''.$row->nik_guru.'\')" title="Detail" data-toggle="modal" data-target="#modalDetailGuru"><i class="fa fa-fw fa-info"></i></button> 
                            
                            <button class="badge badge-success badge-sm border-0" style="margin: 2px;" onclick="btnResetPassword(\''.$row->level.'\',\''.$row->id_guru.'\',\''.$row->nik_guru.'\')" title="Reset Password"><i class="fa fa-fw fa-key"></i></button> 
                            
                            <button class="badge badge-warning badge-sm border-0" style="margin: 2px;" onclick="btnModalUbah(\''.$row->level.'\',\''.$row->id_guru.'\',\''.$row->nik_guru.'\')" title="Ubah" data-toggle="modal" data-target="#modalGuru"><i class="fa fa-fw fa-edit"></i></button> 
                            
                            <button class="badge badge-danger badge-sm border-0" style="margin: 2px;" onclick="btnModalHapus(\''.$row->level.'\',\''.$row->id_guru.'\',\''.$row->nik_guru.'\')" title="Hapus"><i class="fa fa-fw fa-trash"></i></button> 
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
        if($data['foto_guru'] == '' || $data['foto_guru'] == null || !file_exists('./assets/img/foto/'.$data['foto_guru'])){
            $data['foto_guru'] = 'noimage.png';
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
        if(!isset($data['foto_guru'])){
            if(!empty($_FILES['foto_guru']['name'])){
                $config = array();
                $config['upload_path']          =  './assets/img/foto/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 10000;        
             
                $this->load->library('upload', $config, 'foto_guruupload'); // Create custom object for cover upload
                $this->foto_guruupload->initialize($config);
                $this->foto_guruupload->do_upload('foto_guru');
                $foto_guru = $this->foto_guruupload->data('file_name');
                $data['foto_guru'] = $foto_guru;
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
        $foto_guru_lama = $data['foto_guru_lama'];
        
        unset($data['level']);
        unset($data['jabatan_tambahan']);
        

        //jika user upload foto
        if(!isset($data['foto_guru'])){
            if(!empty($_FILES['foto_guru']['name'])){
                $config = array();
                $config['upload_path']          =  './assets/img/foto/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 10000;        
             
                $this->load->library('upload', $config, 'foto_guruupload'); // Create custom object for cover upload
                $this->foto_guruupload->initialize($config);
                $this->foto_guruupload->do_upload('foto_guru');
                $foto_guru = $this->foto_guruupload->data('file_name');
                $data['foto_guru'] = $foto_guru;
                if($foto_guru_lama != '' || $foto_guru_lama != null){
                    if (file_exists('./assets/img/foto/'.$foto_guru_lama)) {                
                        unlink('./assets/img/foto/'.$foto_guru_lama);
                    }
                }
             }
        }else{                 
            $data['foto_guru'] = $foto_guru_lama;
         }

        
        unset($data['foto_guru_lama']);

        
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
        if($data['foto_guru'] != '' || $data['foto_guru'] != null){
            if (file_exists('./assets/img/foto/'.$data['foto_guru'])) {  
                unlink('./assets/img/foto/'.$data['foto_guru']);
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
             $createArray = array('No', 'NIK', 'Nama', 'Jenis Kelamin', 'Tempat Lahir', 'Tanggal Lahir', 'NUPTK', 'Status Kepegawaian', 'Jenis PTK', 'Agama', 'Alamat Jalan', 'RT', 'RW', 'Nama Dusun', 'Desa Kelurahan', 'Kecamatan', 'Kabupaten Kota', 'Provinsi', 'Kode Pos', 'Email', 'No Telp', 'Status Keaktifan', 'SK CPNS', 'Tanggal CPNS', 'SK Pengangkatan', 'TMT Pengangkatan', 'Lembaga Pengangkatan', 'Golongan', 'Sumber Gaji', 'Nama Ibu Kandung', 'Status Pernikahan', 'Nama Suami Istri', 'NIK Suami Istri', 'Pekerjaan Suami Istri', 'TMT PNS', 'NPWP', 'Kewarganegaraan');
             $makeArray = array(
                 'No'                           =>  'No', 
                 'NIK'                          =>  'NIK',
                 'Nama'                         =>  'Nama',
                 'JenisKelamin'                 =>  'Jenis Kelamin',
                 'TempatLahir'                  =>  'Tempat Lahir',
                 'TanggalLahir'                 =>  'Tanggal Lahir',
                 'NUPTK'                        =>  'NUPTK',
                 'StatusKepegawaian'            =>  'Status Kepegawaian',
                 'JenisPTK'                     =>  'Jenis PTK',
                 'Agama'                        =>  'Agama',
                 'AlamatJalan'                  =>  'Alamat Jalan',
                 'RT'                           =>  'RT',
                 'RW'                           =>  'RW',
                 'NamaDusun'                    =>  'Nama Dusun',
                 'DesaKelurahan'                =>  'Desa Kelurahan',
                 'Kecamatan'                    =>  'Kecamatan',
                 'KabupatenKota'                =>  'Kabupaten Kota',
                 'Provinsi'                     =>  'Provinsi',
                 'KodePos'                      =>  'Kode Pos',
                 'Email'                        =>  'Email',
                 'NoTelp'                       =>  'No Telp',
                 'StatusKeaktifan'              =>  'Status Keaktifan',
                 'SKCPNS'                       =>  'SK CPNS',
                 'TanggalCPNS'                  =>  'Tanggal CPNS',
                 'SKPengangkatan'               =>  'SK Pengangkatan',
                 'TMTPengangkatan'              =>  'TMT Pengangkatan',
                 'LembagaPengangkatan'          =>  'Lembaga Pengangkatan',
                 'Golongan'                     =>  'Golongan',
                 'SumberGaji'                   =>  'Sumber Gaji',
                 'NamaIbuKandung'               =>  'Nama Ibu Kandung',
                 'StatusPernikahan'             =>  'Status Pernikahan',
                 'NamaSuamiIstri'               =>  'Nama Suami Istri',
                 'NIKSuamiIstri'                =>  'NIK Suami Istri',
                 'PekerjaanSuamiIstri'          =>  'Pekerjaan Suami Istri',
                 'TMTPNS'                       =>  'TMT PNS',
                 'NPWP'                         =>  'NPWP',
                 'Kewarganegaraan'               =>  'Kewarganegaraan'
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
                    
                     $nik_guru = $SheetDataKey['NIK'];
                     $nama_guru = $SheetDataKey['Nama'];
                     $jenis_kelamin_guru = $SheetDataKey['JenisKelamin'];
                     $tempat_lahir_guru = $SheetDataKey['TempatLahir'];
                     $tanggal_lahir_guru = $SheetDataKey['TanggalLahir'];
                     $nuptk_guru = $SheetDataKey['NUPTK'];
                     $status_kepegawaian_guru = $SheetDataKey['StatusKepegawaian'];
                     $jenis_ptk_guru = $SheetDataKey['JenisPTK'];
                     $agama_guru = $SheetDataKey['Agama'];
                     $alamat_jalan_guru = $SheetDataKey['AlamatJalan'];
                     $rt_guru = $SheetDataKey['RT'];
                     $rw_guru = $SheetDataKey['RW'];
                     $nama_dusun_guru = $SheetDataKey['NamaDusun'];
                     $desa_kelurahan_guru = $SheetDataKey['DesaKelurahan'];
                     $kecamatan_guru = $SheetDataKey['Kecamatan'];
                     $kabupaten_kota_guru = $SheetDataKey['KabupatenKota'];
                     $provinsi_guru = $SheetDataKey['Provinsi'];
                     $kode_pos_guru = $SheetDataKey['KodePos'];
                     $email_guru = $SheetDataKey['Email'];
                     $no_telp_guru = $SheetDataKey['NoTelp'];
                     $status_keaktifan_guru = $SheetDataKey['StatusKeaktifan'];
                     $sk_cpns_guru = $SheetDataKey['SKCPNS'];
                     $tanggal_cpns_guru = $SheetDataKey['TanggalCPNS'];
                     $sk_pengangkatan_guru = $SheetDataKey['SKPengangkatan'];
                     $tmt_pengangkatan_guru = $SheetDataKey['TMTPengangkatan'];
                     $lembaga_pengangkatan_guru = $SheetDataKey['LembagaPengangkatan'];
                     $golongan_guru = $SheetDataKey['Golongan'];
                     $sumber_gaji_guru = $SheetDataKey['SumberGaji'];
                     $nama_ibu_kandung_guru = $SheetDataKey['NamaIbuKandung'];
                     $status_pernikahan_guru = $SheetDataKey['StatusPernikahan'];
                     $nama_suami_istri_guru = $SheetDataKey['NamaSuamiIstri'];
                     $nik_suami_istri_guru = $SheetDataKey['NIKSuamiIstri'];
                     $pekerjaan_suami_istri_guru = $SheetDataKey['PekerjaanSuamiIstri'];
                     $tmt_pns_guru = $SheetDataKey['TMTPNS'];
                     $npwp_guru = $SheetDataKey['NPWP'];
                     $kewarganegaraan_guru = $SheetDataKey['Kewarganegaraan'];

                     $nik_guru = filter_var(trim($allDataInSheet[$i][$nik_guru]), FILTER_SANITIZE_STRING);
                     $nama_guru = filter_var(trim($allDataInSheet[$i][$nama_guru]), FILTER_SANITIZE_STRING);
                     $jenis_kelamin_guru = filter_var(trim($allDataInSheet[$i][$jenis_kelamin_guru]), FILTER_SANITIZE_STRING);
                     $tempat_lahir_guru = filter_var(trim($allDataInSheet[$i][$tempat_lahir_guru]), FILTER_SANITIZE_STRING);
                     $tanggal_lahir_guru = filter_var(trim($allDataInSheet[$i][$tanggal_lahir_guru]), FILTER_SANITIZE_STRING);
                     $nuptk_guru = filter_var(trim($allDataInSheet[$i][$nuptk_guru]), FILTER_SANITIZE_STRING);
                     $status_kepegawaian_guru = filter_var(trim($allDataInSheet[$i][$status_kepegawaian_guru]), FILTER_SANITIZE_STRING);
                     $jenis_ptk_guru = filter_var(trim($allDataInSheet[$i][$jenis_ptk_guru]), FILTER_SANITIZE_STRING);
                     $agama_guru = filter_var(trim($allDataInSheet[$i][$agama_guru]), FILTER_SANITIZE_STRING);
                     $alamat_jalan_guru = filter_var(trim($allDataInSheet[$i][$alamat_jalan_guru]), FILTER_SANITIZE_STRING);
                     $rt_guru = filter_var(trim($allDataInSheet[$i][$rt_guru]), FILTER_SANITIZE_STRING);
                     $rw_guru = filter_var(trim($allDataInSheet[$i][$rw_guru]), FILTER_SANITIZE_STRING);
                     $nama_dusun_guru = filter_var(trim($allDataInSheet[$i][$nama_dusun_guru]), FILTER_SANITIZE_STRING);
                     $desa_kelurahan_guru = filter_var(trim($allDataInSheet[$i][$desa_kelurahan_guru]), FILTER_SANITIZE_STRING);
                     $kecamatan_guru = filter_var(trim($allDataInSheet[$i][$kecamatan_guru]), FILTER_SANITIZE_STRING);
                     $kabupaten_kota_guru = filter_var(trim($allDataInSheet[$i][$kabupaten_kota_guru]), FILTER_SANITIZE_STRING);
                     $provinsi_guru = filter_var(trim($allDataInSheet[$i][$provinsi_guru]), FILTER_SANITIZE_STRING);
                     $kode_pos_guru = filter_var(trim($allDataInSheet[$i][$kode_pos_guru]), FILTER_SANITIZE_STRING);
                     $email_guru = filter_var(trim($allDataInSheet[$i][$email_guru]), FILTER_SANITIZE_STRING);
                     $no_telp_guru = filter_var(trim($allDataInSheet[$i][$no_telp_guru]), FILTER_SANITIZE_STRING);
                     $status_keaktifan_guru = filter_var(trim($allDataInSheet[$i][$status_keaktifan_guru]), FILTER_SANITIZE_STRING);
                     $sk_cpns_guru = filter_var(trim($allDataInSheet[$i][$sk_cpns_guru]), FILTER_SANITIZE_STRING);
                     $tanggal_cpns_guru = filter_var(trim($allDataInSheet[$i][$tanggal_cpns_guru]), FILTER_SANITIZE_STRING);
                     $sk_pengangkatan_guru = filter_var(trim($allDataInSheet[$i][$sk_pengangkatan_guru]), FILTER_SANITIZE_STRING);
                     $tmt_pengangkatan_guru = filter_var(trim($allDataInSheet[$i][$tmt_pengangkatan_guru]), FILTER_SANITIZE_STRING);
                     $lembaga_pengangkatan_guru = filter_var(trim($allDataInSheet[$i][$lembaga_pengangkatan_guru]), FILTER_SANITIZE_STRING);
                     $golongan_guru = filter_var(trim($allDataInSheet[$i][$golongan_guru]), FILTER_SANITIZE_STRING);
                     $sumber_gaji_guru = filter_var(trim($allDataInSheet[$i][$sumber_gaji_guru]), FILTER_SANITIZE_STRING);
                     $nama_ibu_kandung_guru = filter_var(trim($allDataInSheet[$i][$nama_ibu_kandung_guru]), FILTER_SANITIZE_STRING);
                     $status_pernikahan_guru = filter_var(trim($allDataInSheet[$i][$status_pernikahan_guru]), FILTER_SANITIZE_STRING);
                     $nama_suami_istri_guru = filter_var(trim($allDataInSheet[$i][$nama_suami_istri_guru]), FILTER_SANITIZE_STRING);
                     $nik_suami_istri_guru = filter_var(trim($allDataInSheet[$i][$nik_suami_istri_guru]), FILTER_SANITIZE_STRING);
                     $pekerjaan_suami_istri_guru = filter_var(trim($allDataInSheet[$i][$pekerjaan_suami_istri_guru]), FILTER_SANITIZE_STRING);
                     $tmt_pns_guru = filter_var(trim($allDataInSheet[$i][$tmt_pns_guru]), FILTER_SANITIZE_STRING);
                     $npwp_guru = filter_var(trim($allDataInSheet[$i][$npwp_guru]), FILTER_SANITIZE_STRING);
                     $kewarganegaraan_guru = filter_var(trim($allDataInSheet[$i][$kewarganegaraan_guru]), FILTER_SANITIZE_STRING);                     
                  
                     $fetchData = array(
                         'nik_guru' => $nik_guru, 
                         'nama_guru' => $nama_guru, 
                         'jenis_kelamin_guru' => $jenis_kelamin_guru, 
                         'tempat_lahir_guru' => $tempat_lahir_guru, 
                         'tanggal_lahir_guru' => $tanggal_lahir_guru, 
                         'nuptk_guru' => $nuptk_guru, 
                         'status_kepegawaian_guru' => $status_kepegawaian_guru, 
                         'jenis_ptk_guru' => $jenis_ptk_guru, 
                         'agama_guru' => $agama_guru, 
                         'alamat_jalan_guru' => $alamat_jalan_guru, 
                         'rt_guru' => $rt_guru, 
                         'rw_guru' => $rw_guru, 
                         'nama_dusun_guru' => $nama_dusun_guru, 
                         'desa_kelurahan_guru' => $desa_kelurahan_guru, 
                         'kecamatan_guru' => $kecamatan_guru, 
                         'kabupaten_kota_guru' => $kabupaten_kota_guru, 
                         'provinsi_guru' => $provinsi_guru, 
                         'kode_pos_guru' => $kode_pos_guru, 
                         'email_guru' => $email_guru, 
                         'no_telp_guru' => $no_telp_guru,
                         'status_keaktifan_guru' => $status_keaktifan_guru,
                         'sk_cpns_guru' => $sk_cpns_guru,
                         'tanggal_cpns_guru' => $tanggal_cpns_guru,
                         'sk_pengangkatan_guru' => $sk_pengangkatan_guru,
                         'tmt_pengangkatan_guru' => $tmt_pengangkatan_guru,
                         'lembaga_pengangkatan_guru' => $lembaga_pengangkatan_guru,
                         'golongan_guru' => $golongan_guru,
                         'sumber_gaji_guru' => $sumber_gaji_guru,
                         'nama_ibu_kandung_guru' => $nama_ibu_kandung_guru,
                         'status_pernikahan_guru' => $status_pernikahan_guru,
                         'nama_suami_istri_guru' => $nama_suami_istri_guru,
                         'nik_suami_istri_guru' => $nik_suami_istri_guru,
                         'pekerjaan_suami_istri_guru' => $pekerjaan_suami_istri_guru,
                         'tmt_pns_guru' => $tmt_pns_guru,
                         'npwp_guru' => $npwp_guru,
                         'kewarganegaraan_guru' => $kewarganegaraan_guru
                    );

                   

                    $level = 'Guru';
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
		force_download('./assets/download/formatImportDataGuru.xlsx',NULL);
	}


}