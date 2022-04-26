<?php 

//PhpSpreadsheet
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class Administrator extends CI_Controller{
    
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
        $this->load->view('admin/administrator/administrator',$data); 
        $this->load->view('admin/templates/footer');
    }

    public function queryAll()
    {
        $level = 'administrator';
        $select_column = [
            'administrator.id_administrator',
            'administrator.nik_administrator',
            'administrator.nama_administrator',
            'administrator.jenis_kelamin_administrator',
            'administrator.email_administrator',
            'administrator.no_telp_administrator',
            'administrator.foto_administrator',
            'pengguna.level',
            'pengguna.tgl_login'
        ];

        $order_column = [
            null,
            'administrator.nik_administrator',
            'administrator.nama_administrator',
            'administrator.jenis_kelamin_administrator',
            'administrator.email_administrator',
            'administrator.no_telp_administrator',
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
            $sub_array[] = $row->nik_administrator;
            $sub_array[] = $row->nama_administrator;
            $sub_array[] = $row->jenis_kelamin_administrator;
            $sub_array[] = $row->email_administrator;
            $sub_array[] = $row->no_telp_administrator;
            if($row->foto_administrator == '' || $row->foto_administrator == null || !file_exists('./assets/img/foto/'.$row->foto_administrator)){
                $sub_array[] = '<img src="'.base_url().'assets/img/foto/noimage.png" width="50">';
            }else{
                $sub_array[] = '<img src="'.base_url().'assets/img/foto/'.$row->foto_administrator.'" width="50">';
            }
            $sub_array[] = $row->tgl_login;
            $sub_array[] = '
                            <button class="badge badge-primary badge-sm border-0" style="margin: 2px;" onclick="btnDetail(\''.$row->level.'\',\''.$row->id_administrator.'\',\''.$row->nik_administrator.'\')" title="Detail" data-toggle="modal" data-target="#modalDetailAdministrator"><i class="fa fa-fw fa-info"></i></button> 
                            
                            <button class="badge badge-success badge-sm border-0" style="margin: 2px;" onclick="btnResetPassword(\''.$row->level.'\',\''.$row->id_administrator.'\',\''.$row->nik_administrator.'\')" title="Reset Password"><i class="fa fa-fw fa-key"></i></button> 
                            
                            <button class="badge badge-warning badge-sm border-0" style="margin: 2px;" onclick="btnModalUbah(\''.$row->level.'\',\''.$row->id_administrator.'\',\''.$row->nik_administrator.'\')" title="Ubah" data-toggle="modal" data-target="#modalAdministrator"><i class="fa fa-fw fa-edit"></i></button> 
                            
                            <button class="badge badge-danger badge-sm border-0" style="margin: 2px;" onclick="btnModalHapus(\''.$row->level.'\',\''.$row->id_administrator.'\',\''.$row->nik_administrator.'\')" title="Hapus"><i class="fa fa-fw fa-trash"></i></button> 
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
        if($data['foto_administrator'] == '' || $data['foto_administrator'] == null || !file_exists('./assets/img/foto/'.$data['foto_administrator'])){
            $data['foto_administrator'] = 'noimage.png';
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
        if(!isset($data['foto_administrator'])){
            if(!empty($_FILES['foto_administrator']['name'])){
                $config = array();
                $config['upload_path']          =  './assets/img/foto/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 10000;        
             
                $this->load->library('upload', $config, 'foto_administratorupload'); // Create custom object for cover upload
                $this->foto_administratorupload->initialize($config);
                $this->foto_administratorupload->do_upload('foto_administrator');
                $foto_administrator = $this->foto_administratorupload->data('file_name');
                $data['foto_administrator'] = $foto_administrator;
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
        $foto_administrator_lama = $data['foto_administrator_lama'];
        
        unset($data['level']);
        unset($data['jabatan_tambahan']);
        

        //jika user upload foto
        if(!isset($data['foto_administrator'])){
            if(!empty($_FILES['foto_administrator']['name'])){
                $config = array();
                $config['upload_path']          =  './assets/img/foto/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 10000;        
             
                $this->load->library('upload', $config, 'foto_administratorupload'); // Create custom object for cover upload
                $this->foto_administratorupload->initialize($config);
                $this->foto_administratorupload->do_upload('foto_administrator');
                $foto_administrator = $this->foto_administratorupload->data('file_name');
                $data['foto_administrator'] = $foto_administrator;
                if($foto_administrator_lama != '' || $foto_administrator_lama != null){
                    if (file_exists('./assets/img/foto/'.$foto_administrator_lama)) {                
                        unlink('./assets/img/foto/'.$foto_administrator_lama);
                    }
                }
             }
        }else{                 
            $data['foto_administrator'] = $foto_administrator_lama;
         }

        
        unset($data['foto_administrator_lama']);

        
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
        if($data['foto_administrator'] != '' || $data['foto_administrator'] != null){
            if (file_exists('./assets/img/foto/'.$data['foto_administrator'])) {  
                unlink('./assets/img/foto/'.$data['foto_administrator']);
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
             $createArray = array('No', 'NIK', 'Nama', 'Jenis Kelamin', 'Email', 'No Telp', 'Alamat');
             $makeArray = array(
                 'No'                           => 'No', 
                 'NIK'                          => 'NIK', 
                 'Nama'                         => 'Nama', 
                 'JenisKelamin'                 => 'Jenis Kelamin', 
                 'Email'                        => 'Email',
                 'NoTelp'                       => 'No Telp',
                 'Alamat'                       => 'Alamat'
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
                    
                     $nik_administrator = $SheetDataKey['NIK'];
                     $nama_administrator = $SheetDataKey['Nama'];
                     $jenis_kelamin_administrator = $SheetDataKey['JenisKelamin'];
                     $email_administrator = $SheetDataKey['Email'];
                     $no_telp_administrator = $SheetDataKey['NoTelp'];
                     $alamat_administrator = $SheetDataKey['Alamat'];

                     $nik_administrator = filter_var(trim($allDataInSheet[$i][$nik_administrator]), FILTER_SANITIZE_STRING);
                     $nama_administrator = filter_var(trim($allDataInSheet[$i][$nama_administrator]), FILTER_SANITIZE_STRING);
                     $jenis_kelamin_administrator = filter_var(trim($allDataInSheet[$i][$jenis_kelamin_administrator]), FILTER_SANITIZE_STRING);
                     $email_administrator = filter_var(trim($allDataInSheet[$i][$email_administrator]), FILTER_SANITIZE_STRING);
                     $no_telp_administrator = filter_var(trim($allDataInSheet[$i][$no_telp_administrator]), FILTER_SANITIZE_STRING);
                     $alamat_administrator = filter_var(trim($allDataInSheet[$i][$alamat_administrator]), FILTER_SANITIZE_STRING);
                   
                     $fetchData = array(
                         'nik_administrator' => $nik_administrator, 
                         'nama_administrator' => $nama_administrator, 
                         'jenis_kelamin_administrator' => $jenis_kelamin_administrator, 
                         'email_administrator' => $email_administrator, 
                         'no_telp_administrator' => $no_telp_administrator, 
                         'alamat_administrator' => $alamat_administrator
                    );

                    $level = 'Administrator';
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
		force_download('./assets/download/formatImportDataAdministrator.xlsx',NULL);
	}


}