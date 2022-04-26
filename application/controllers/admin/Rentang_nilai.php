<?php 

//PhpSpreadsheet
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class Rentang_nilai extends CI_Controller{
    
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
        $this->load->view('admin/rentang_nilai/rentang_nilai',$data); 
        $this->load->view('admin/templates/footer');
    }


    public function queryAll()
    {
        $tabel = 'rentang_nilai';
        $select_column = [
            'id_rentang_nilai',   
            'dari_rentang_nilai',   
            'sampai_rentang_nilai',   
            'predikat_rentang_nilai',   
            'keterangan_rentang_nilai'      
        ];

        $order_column = [
            null,
            'dari_rentang_nilai',   
            'sampai_rentang_nilai',   
            'predikat_rentang_nilai',   
            'keterangan_rentang_nilai',
            null
        ];
      
        $this->load->model('admin/Rentang_nilai_model');
        $fetch_data = $this->Rentang_nilai_model->buatDataTables($tabel,$select_column,$order_column);
        $data = [];
        $nourut = 1;
        foreach($fetch_data as $row)
        {
            $sub_array = [];
            $sub_array[] = $nourut;
            $sub_array[] = $row->dari_rentang_nilai; 
            $sub_array[] = $row->sampai_rentang_nilai; 
            $sub_array[] = $row->predikat_rentang_nilai; 
            $sub_array[] = $row->keterangan_rentang_nilai; 
           
            $sub_array[] = '
                            <button class="badge badge-warning badge-sm border-0" style="margin: 2px;" onclick="btnModalUbah(\''.$row->id_rentang_nilai.'\')" title="Ubah" data-toggle="modal" data-target="#modalRentangNilai"><i class="fa fa-fw fa-edit"></i></button> 
                            
                            <button class="badge badge-danger badge-sm border-0" style="margin: 2px;" onclick="btnModalHapus(\''.$row->id_rentang_nilai.'\')" title="Hapus"><i class="fa fa-fw fa-trash"></i></button> 
                            ';
            $data[] = $sub_array;

            $nourut++;
        }

        $output = [
            'draw'              =>  intval($_POST['draw']),
            'recordsTotal'      =>  $this->Rentang_nilai_model->getAllData($tabel),
            'recordsFiltered'   =>  $this->Rentang_nilai_model->getFilteredData($tabel,$select_column,$order_column),
            'data'              =>  $data
        ];

        echo json_encode($output);
      
    }


    public function queryById()
    {
        $data = $_POST;
        
        $this->load->model('admin/Rentang_nilai_model');
        $data = $this->Rentang_nilai_model->queryById($data);

        echo json_encode($data);
      
    }

    public function tambah()
    {
        $data = $_POST;

        $tabel = 'rentang_nilai';

      

        $this->load->model('admin/Rentang_nilai_model');
        $status = $this->Rentang_nilai_model->tambah($data,$tabel);
       
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

        $tabel = 'rentang_nilai';
        
        $this->load->model('admin/Rentang_nilai_model');       
        $status = $this->Rentang_nilai_model->ubah($data,$tabel);
       
       
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

        $this->load->model('admin/Rentang_nilai_model');

        $status = $this->Rentang_nilai_model->hapus($data);
       

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