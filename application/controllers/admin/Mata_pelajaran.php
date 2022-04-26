<?php 



class Mata_pelajaran extends CI_Controller{
    
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
        $this->load->view('admin/mata_pelajaran/mata_pelajaran',$data); 
        $this->load->view('admin/templates/footer');
    }

    public function getGuru(){
        
        $this->load->model('admin/Pengguna_model');
        $fetch_data = $this->Pengguna_model->getGuru();

        $output = '';

        foreach($fetch_data as $data){
            $output .= '<option value="'.$data['id_guru'].'">'.$data['nama_guru'].'</option>';
        }

        echo json_encode($output);
    }

    public function getTingkat(){
        
        $this->load->model('admin/Tingkat_model');
        $fetch_data = $this->Tingkat_model->getTingkat();

        $output = '';

        foreach($fetch_data as $data){
            $output .= '<option value="'.$data['id_tingkat'].'">'.$data['tingkat'].'</option>';
        }

        echo json_encode($output);
    }

    public function queryAll()
    {
        $tabel = 'mata_pelajaran';
        $select_column = [
            'mata_pelajaran.id_mata_pelajaran',   
            'mata_pelajaran.mata_pelajaran',   
            'tingkat.id_tingkat',   
            'tingkat.tingkat',   
            'guru.id_guru',   
            'guru.nama_guru',   
            'mata_pelajaran.kkm_mata_pelajaran'  
               
                   
        ];

        $order_column = [
            null,
            'mata_pelajaran.mata_pelajaran',
            'tingkat.tingkat',
            'guru.nama_guru',
            'mata_pelajaran.kkm_mata_pelajaran',
            null
        ];
      
        $this->load->model('admin/Mata_pelajaran_model');
        $fetch_data = $this->Mata_pelajaran_model->buatDataTables($tabel,$select_column,$order_column);
        $data = [];
        $nourut = 1;
        foreach($fetch_data as $row)
        {
            $sub_array = [];
            $sub_array[] = $nourut;
            $sub_array[] = $row->tingkat.' - '.$row->mata_pelajaran;           
            $sub_array[] = $row->tingkat;           
            $sub_array[] = $row->nama_guru;           
            $sub_array[] = $row->kkm_mata_pelajaran;       
                     
            $sub_array[] = '
                            <button class="badge badge-warning badge-sm border-0" style="margin: 2px;" onclick="btnModalUbah(\''.$row->id_mata_pelajaran.'\')" title="Ubah" data-toggle="modal" data-target="#modalMataPelajaran"><i class="fa fa-fw fa-edit"></i></button> 
                            
                            <button class="badge badge-danger badge-sm border-0" style="margin: 2px;" onclick="btnModalHapus(\''.$row->id_mata_pelajaran.'\')" title="Hapus"><i class="fa fa-fw fa-trash"></i></button> 
                            ';
            $data[] = $sub_array;

            $nourut++;
        }

        $output = [
            'draw'              =>  intval($_POST['draw']),
            'recordsTotal'      =>  $this->Mata_pelajaran_model->getAllData($tabel),
            'recordsFiltered'   =>  $this->Mata_pelajaran_model->getFilteredData($tabel,$select_column,$order_column),
            'data'              =>  $data
        ];

        echo json_encode($output);
      
    }


    public function tambah()
    {
        $data = $_POST;    

        $this->load->model('admin/Mata_pelajaran_model');
        $status = $this->Mata_pelajaran_model->tambah($data);
       
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
        
        $this->load->model('admin/Mata_pelajaran_model');
        $data = $this->Mata_pelajaran_model->queryById($data);
       

        echo json_encode($data);
      
    }


    public function ubah()
    {
        $data = $_POST;
             
        $this->load->model('admin/Mata_pelajaran_model');       
        $status = $this->Mata_pelajaran_model->ubah($data);
       
       
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

        $this->load->model('admin/Mata_pelajaran_model');

        $status = $this->Mata_pelajaran_model->hapus($data);       

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