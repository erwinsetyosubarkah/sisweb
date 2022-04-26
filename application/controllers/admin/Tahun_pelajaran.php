<?php 

//PhpSpreadsheet
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class Tahun_pelajaran extends CI_Controller{
    
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
        $this->load->view('admin/tahun_pelajaran/tahun_pelajaran',$data); 
        $this->load->view('admin/templates/footer');
    }


    public function queryAll()
    {
        $tabel = 'tahun_pelajaran';
        $select_column = [
            'id_tahun_pelajaran',   
            'tahun_pelajaran',
            'status_tahun_pelajaran'         
        ];

        $order_column = [
            null,
            'tahun_pelajaran',
            'status_tahun_pelajaran',
            null
        ];
      
        $this->load->model('admin/Tahun_pelajaran_model');
        $fetch_data = $this->Tahun_pelajaran_model->buatDataTables($tabel,$select_column,$order_column);
        $data = [];
        $nourut = 1;
        foreach($fetch_data as $row)
        {
            $sub_array = [];
            $sub_array[] = $nourut;
            $sub_array[] = $row->tahun_pelajaran; 
            if($row->status_tahun_pelajaran == 1){
                $sub_array[] = 'Aktif';
            }else{
                $sub_array[] = 'Tidak Aktif';
            }
            $sub_array[] = '
                            <button class="badge badge-warning badge-sm border-0" style="margin: 2px;" onclick="btnModalUbah(\''.$row->id_tahun_pelajaran.'\')" title="Ubah" data-toggle="modal" data-target="#modalTahunPelajaran"><i class="fa fa-fw fa-edit"></i></button> 
                            
                            <button class="badge badge-danger badge-sm border-0" style="margin: 2px;" onclick="btnModalHapus(\''.$row->id_tahun_pelajaran.'\')" title="Hapus"><i class="fa fa-fw fa-trash"></i></button> 
                            ';
            $data[] = $sub_array;

            $nourut++;
        }

        $output = [
            'draw'              =>  intval($_POST['draw']),
            'recordsTotal'      =>  $this->Tahun_pelajaran_model->getAllData($tabel),
            'recordsFiltered'   =>  $this->Tahun_pelajaran_model->getFilteredData($tabel,$select_column,$order_column),
            'data'              =>  $data
        ];

        echo json_encode($output);
      
    }


    public function queryById()
    {
        $data = $_POST;
        
        $this->load->model('admin/Tahun_pelajaran_model');
        $data = $this->Tahun_pelajaran_model->queryById($data);

        echo json_encode($data);
      
    }

    public function tambah()
    {
        $data = $_POST;

        $tabel = 'tahun_pelajaran';

      

        $this->load->model('admin/Tahun_pelajaran_model');
        $status = $this->Tahun_pelajaran_model->tambah($data,$tabel);
       
        if($status == 1){         
            $data = [
                  'status' => 'success',
                  'title' => 'Berhasil',
                  'pesan' => 'Data berhasil Ditambah....!'
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

        $tabel = 'tahun_pelajaran';
        
        $this->load->model('admin/Tahun_pelajaran_model');       
        $status = $this->Tahun_pelajaran_model->ubah($data,$tabel);
       
       
          if($status == 1 ){       
              
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

        $this->load->model('admin/Tahun_pelajaran_model');

        $status = $this->Tahun_pelajaran_model->hapus($data);
       

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


}