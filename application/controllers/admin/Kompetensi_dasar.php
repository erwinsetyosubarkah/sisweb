<?php 



class Kompetensi_dasar extends CI_Controller{
    
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

        if($_SESSION['user']['level'] != 'Administrator' && $_SESSION['user']['level'] != 'Guru' ){
            redirect(base_url().'beranda-admin');
            die();
        }

        $this->load->model('admin/Pengaturan_model');
        $data['pengaturan'] = $this->Pengaturan_model->getPengaturanById(); 

        $this->load->view('admin/templates/header',$data);
        $this->load->view('admin/kompetensi_dasar/kompetensi_dasar',$data); 
        $this->load->view('admin/templates/footer');
    }

    public function getMataPelajaran(){
        
        $this->load->model('admin/Mata_pelajaran_model');
        $fetch_data = $this->Mata_pelajaran_model->getMataPelajaran();

        $output = '';

        foreach($fetch_data as $data){
            $output .= '<option value="'.$data['id_mata_pelajaran'].'">'.$data['tingkat'].' - '.$data['mata_pelajaran'].'</option>';
        }

        echo json_encode($output);
    }

    public function getTingkat(){
        
        $this->load->model('admin/Tingkat_model');
        $fetch_data = $this->Tingkat_model->getTingkat();

        $output = '';        
        $output .= '<option value="">- Semua Tingkat -</option>';
        foreach($fetch_data as $data){
            $output .= '<option value="'.$data['id_tingkat'].'">'.$data['tingkat'].'</option>';
        }

        echo json_encode($output);
    }

    public function queryAll()
    {
        $tabel = 'kompetensi_dasar';

        $where = [
            "id_tingkat" => $_POST['id_tingkat']
        ];

        $select_column = [
            'kompetensi_dasar.id_kompetensi_dasar',   
            'tingkat.id_tingkat',   
            'tingkat.tingkat',   
            'mata_pelajaran.id_mata_pelajaran',   
            'mata_pelajaran.mata_pelajaran',   
            'kompetensi_dasar.kode_kompetensi_dasar',   
            'kompetensi_dasar.jenis_kompetensi_dasar',   
            'kompetensi_dasar.kompetensi_dasar',   
               
        ];

        $order_column = [
            null,
            'mata_pelajaran.mata_pelajaran',
            'kompetensi_dasar.kode_kompetensi_dasar',
            'kompetensi_dasar.jenis_kompetensi_dasar',
            'kompetensi_dasar.kompetensi_dasar',
            null
        ];
      
        $this->load->model('admin/Kompetensi_dasar_model');
        $fetch_data = $this->Kompetensi_dasar_model->buatDataTables($tabel,$select_column,$order_column,$where);
        $data = [];
        $nourut = 1;
        foreach($fetch_data as $row)
        {
            $sub_array = [];
            $sub_array[] = $nourut;
            $sub_array[] = $row->tingkat.' - '.$row->mata_pelajaran;           
            $sub_array[] = $row->kode_kompetensi_dasar;           
            $sub_array[] = $row->jenis_kompetensi_dasar;           
            $sub_array[] = $row->kompetensi_dasar;        
                     
            $sub_array[] = '
                            <button class="badge badge-warning badge-sm border-0" style="margin: 2px;" onclick="btnModalUbah(\''.$row->id_kompetensi_dasar.'\')" title="Ubah" data-toggle="modal" data-target="#modalKompetensiDasar"><i class="fa fa-fw fa-edit"></i></button> 
                            
                            <button class="badge badge-danger badge-sm border-0" style="margin: 2px;" onclick="btnModalHapus(\''.$row->id_kompetensi_dasar.'\')" title="Hapus"><i class="fa fa-fw fa-trash"></i></button> 
                            ';
            $data[] = $sub_array;

            $nourut++;
        }

        $output = [
            'draw'              =>  intval($_POST['draw']),
            'recordsTotal'      =>  $this->Kompetensi_dasar_model->getAllData($tabel,$where),
            'recordsFiltered'   =>  $this->Kompetensi_dasar_model->getFilteredData($tabel,$select_column,$order_column,$where),
            'data'              =>  $data
        ];

        echo json_encode($output);
      
    }


    public function tambah()
    {
        $data = $_POST;    

        $this->load->model('admin/Kompetensi_dasar_model');
        $status = $this->Kompetensi_dasar_model->tambah($data);
       
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
        
        $this->load->model('admin/Kompetensi_dasar_model');
        $data = $this->Kompetensi_dasar_model->queryById($data);
       

        echo json_encode($data);
      
    }


    public function ubah()
    {
        $data = $_POST;
             
        $this->load->model('admin/Kompetensi_dasar_model');       
        $status = $this->Kompetensi_dasar_model->ubah($data);
       
       
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

        $this->load->model('admin/Kompetensi_dasar_model');

        $status = $this->Kompetensi_dasar_model->hapus($data);       

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