<?php 



class Ruangan extends CI_Controller{
    
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
        $this->load->view('admin/ruangan/ruangan',$data); 
        $this->load->view('admin/templates/footer');
    }

    public function getGedung(){
        
        $this->load->model('admin/Gedung_model');
        $fetch_data = $this->Gedung_model->getGedung();

        $output = '';

        foreach($fetch_data as $data){
            $output .= '<option value="'.$data['id_gedung'].'">'.$data['nama_gedung'].'</option>';
        }

        echo json_encode($output);
    }

    public function queryAll()
    {
        $tabel = 'ruangan';
        $select_column = [
            'ruangan.id_ruangan',   
            'ruangan.nama_ruangan',
            'gedung.nama_gedung',
            'ruangan.kapasitas_belajar_ruangan',
            'ruangan.kapasitas_ujian_ruangan',
            'ruangan.keterangan_ruangan'       
        ];

        $order_column = [
            null,
            'ruangan.nama_ruangan',
            'gedung.nama_gedung',
            'ruangan.kapasitas_belajar_ruangan',
            'ruangan.kapasitas_ujian_ruangan',
            'ruangan.keterangan_ruangan',
            null
        ];
      
        $this->load->model('admin/Ruangan_model');
        $fetch_data = $this->Ruangan_model->buatDataTables($tabel,$select_column,$order_column);
        $data = [];
        $nourut = 1;
        foreach($fetch_data as $row)
        {
            $sub_array = [];
            $sub_array[] = $nourut;
            $sub_array[] = $row->nama_ruangan;           
            $sub_array[] = $row->nama_gedung;           
            $sub_array[] = $row->kapasitas_belajar_ruangan.' siswa';           
            $sub_array[] = $row->kapasitas_ujian_ruangan.' siswa';           
            $sub_array[] = $row->keterangan_ruangan;        
                     
            $sub_array[] = '
                            <button class="badge badge-warning badge-sm border-0" style="margin: 2px;" onclick="btnModalUbah(\''.$row->id_ruangan.'\')" title="Ubah" data-toggle="modal" data-target="#modalRuangan"><i class="fa fa-fw fa-edit"></i></button> 
                            
                            <button class="badge badge-danger badge-sm border-0" style="margin: 2px;" onclick="btnModalHapus(\''.$row->id_ruangan.'\')" title="Hapus"><i class="fa fa-fw fa-trash"></i></button> 
                            ';
            $data[] = $sub_array;

            $nourut++;
        }

        $output = [
            'draw'              =>  intval($_POST['draw']),
            'recordsTotal'      =>  $this->Ruangan_model->getAllData($tabel),
            'recordsFiltered'   =>  $this->Ruangan_model->getFilteredData($tabel,$select_column,$order_column),
            'data'              =>  $data
        ];

        echo json_encode($output);
      
    }


    public function tambah()
    {
        $data = $_POST;    

        $this->load->model('admin/Ruangan_model');
        $status = $this->Ruangan_model->tambah($data);
       
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



    public function queryById()
    {
        $data = $_POST;
        
        $this->load->model('admin/Ruangan_model');
        $data = $this->Ruangan_model->queryById($data);
       

        echo json_encode($data);
      
    }


    public function ubah()
    {
        $data = $_POST;
             
        $this->load->model('admin/Ruangan_model');       
        $status = $this->Ruangan_model->ubah($data);
       
       
          if($status == 1){         
              
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

        $this->load->model('admin/Ruangan_model');

        $status = $this->Ruangan_model->hapus($data);       

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