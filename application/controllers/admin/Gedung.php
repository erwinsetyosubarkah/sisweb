<?php 

//PhpSpreadsheet
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class Gedung extends CI_Controller{
    
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
        $this->load->view('admin/gedung/gedung',$data); 
        $this->load->view('admin/templates/footer');
    }


    public function queryAll()
    {
        $tabel = 'gedung';
        $select_column = [
            'id_gedung',   
            'nama_gedung',  
            'jumlah_lantai_gedung',  
            'panjang_gedung',  
            'tinggi_gedung',  
            'lebar_gedung',  
            'keterangan_gedung',  
        ];

        $order_column = [
            null,
            'nama_gedung',  
            'jumlah_lantai_gedung',  
            'panjang_gedung',  
            'tinggi_gedung',  
            'lebar_gedung',  
            'keterangan_gedung',
            null
        ];
      
        $this->load->model('admin/Gedung_model');
        $fetch_data = $this->Gedung_model->buatDataTables($tabel,$select_column,$order_column);
        $data = [];
        $nourut = 1;
        foreach($fetch_data as $row)
        {
            $sub_array = [];
            $sub_array[] = $nourut;
            $sub_array[] = $row->nama_gedung; 
            $sub_array[] = $row->jumlah_lantai_gedung.' Lantai'; 
            $sub_array[] = $row->panjang_gedung.' Meter'; 
            $sub_array[] = $row->tinggi_gedung.' Meter'; 
            $sub_array[] = $row->lebar_gedung.' Meter'; 
            $sub_array[] = $row->keterangan_gedung; 
           
            $sub_array[] = '
                            <button class="badge badge-warning badge-sm border-0" style="margin: 2px;" onclick="btnModalUbah(\''.$row->id_gedung.'\')" title="Ubah" data-toggle="modal" data-target="#modalGedung"><i class="fa fa-fw fa-edit"></i></button> 
                            
                            <button class="badge badge-danger badge-sm border-0" style="margin: 2px;" onclick="btnModalHapus(\''.$row->id_gedung.'\')" title="Hapus"><i class="fa fa-fw fa-trash"></i></button> 
                            ';
            $data[] = $sub_array;

            $nourut++;
        }

        $output = [
            'draw'              =>  intval($_POST['draw']),
            'recordsTotal'      =>  $this->Gedung_model->getAllData($tabel),
            'recordsFiltered'   =>  $this->Gedung_model->getFilteredData($tabel,$select_column,$order_column),
            'data'              =>  $data
        ];

        echo json_encode($output);
      
    }


    public function queryById()
    {
        $data = $_POST;
        
        $this->load->model('admin/Gedung_model');
        $data = $this->Gedung_model->queryById($data);

        echo json_encode($data);
      
    }

    public function tambah()
    {
        $data = $_POST;

        $tabel = 'gedung';

      

        $this->load->model('admin/Gedung_model');
        $status = $this->Gedung_model->tambah($data,$tabel);
       
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

        $tabel = 'gedung';
        
        $this->load->model('admin/Gedung_model');       
        $status = $this->Gedung_model->ubah($data,$tabel);
       
       
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

        $this->load->model('admin/Gedung_model');

        $status = $this->Gedung_model->hapus($data);
       

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