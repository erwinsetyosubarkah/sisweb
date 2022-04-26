<?php 



class Artikel extends CI_Controller{
    
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
        $this->load->view('admin/artikel/artikel',$data); 
        $this->load->view('admin/templates/footer');
    }

    public function getKategori(){
        
        $this->load->model('admin/Kategori_artikel_model');
        $fetch_data = $this->Kategori_artikel_model->getKategori();

        $output = '';

        foreach($fetch_data as $data){
            $output .= '<option value="'.$data['id_kategori_artikel'].'">'.$data['kategori'].'</option>';
        }

        echo json_encode($output);
    }

    public function queryAll()
    {
        $tabel = 'artikel';
        $select_column = [
            'artikel.id_artikel',   
            'artikel.judul_artikel',
            'artikel.isi_artikel',
            'artikel.tgl_upload',
            'artikel.gambar_sampul',
            'kategori_artikel.id_kategori_artikel',
            'kategori_artikel.kategori',
            'artikel.status_artikel',
            'artikel.id_author',
            'artikel.level_author'         
        ];

        $order_column = [
            null,
            'judul_artikel',
            'kategori',
            'status_artikel',
            'tgl_upload',
            'gambar_sampul',
            null
        ];
      
        $this->load->model('admin/Artikel_model');
        $fetch_data = $this->Artikel_model->buatDataTables($tabel,$select_column,$order_column);
        $data = [];
        $nourut = 1;
        foreach($fetch_data as $row)
        {
            $sub_array = [];
            $sub_array[] = $nourut;
            $sub_array[] = $row->judul_artikel;           
            $sub_array[] = $row->kategori;           
            $sub_array[] = $row->status_artikel;           
            $sub_array[] = $row->tgl_upload;           
            if($row->gambar_sampul == '' || $row->gambar_sampul == null || !file_exists('./assets/img/gambar/images/'.$row->gambar_sampul)){
                $sub_array[] = '<img src="'.base_url().'assets/img/gambar/images/noimage.png" width="50">';
            }else{
                $sub_array[] = '<img src="'.base_url().'assets/img/gambar/images/'.$row->gambar_sampul.'" width="50">';
            }           
            $sub_array[] = '
                            <button class="badge badge-warning badge-sm border-0" style="margin: 2px;" onclick="btnModalUbah(\''.$row->id_artikel.'\')" title="Ubah" data-toggle="modal" data-target="#modalArtikel"><i class="fa fa-fw fa-edit"></i></button> 
                            
                            <button class="badge badge-danger badge-sm border-0" style="margin: 2px;" onclick="btnModalHapus(\''.$row->id_artikel.'\')" title="Hapus"><i class="fa fa-fw fa-trash"></i></button> 
                            ';
            $data[] = $sub_array;

            $nourut++;
        }

        $output = [
            'draw'              =>  intval($_POST['draw']),
            'recordsTotal'      =>  $this->Artikel_model->getAllData($tabel),
            'recordsFiltered'   =>  $this->Artikel_model->getFilteredData($tabel,$select_column,$order_column),
            'data'              =>  $data
        ];

        echo json_encode($output);
      
    }


    public function tambah()
    {
        $data = $_POST;

       
        //jika user upload foto
        if(!isset($data['gambar_sampul'])){
            if(!empty($_FILES['gambar_sampul']['name'])){
                $config = array();
                $config['upload_path']          =  './assets/img/gambar/images/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 10000;        
             
                $this->load->library('upload', $config, 'gambar_sampulupload'); // Create custom object for cover upload
                $this->gambar_sampulupload->initialize($config);
                $this->gambar_sampulupload->do_upload('gambar_sampul');
                $gambar_sampul = $this->gambar_sampulupload->data('file_name');
                $data['gambar_sampul'] = $gambar_sampul;
             }
        }

        $this->load->model('admin/Artikel_model');
        $status = $this->Artikel_model->tambah($data);
       
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
        
        $this->load->model('admin/Artikel_model');
        $data = $this->Artikel_model->queryById($data);

        //jika foto tidak ada
        if($data['gambar_sampul'] == '' || $data['gambar_sampul'] == null || !file_exists('./assets/img/gambar/images/'.$data['gambar_sampul'])){
            $data['gambar_sampul'] = 'noimage.png';
        }

        echo json_encode($data);
      
    }


    public function ubah()
    {
        $data = $_POST;

        $gambar_sampul_lama = $data['gambar_sampul_lama'];
   
        //jika user upload foto
        if(!isset($data['gambar_sampul'])){
            if(!empty($_FILES['gambar_sampul']['name'])){
                $config = array();
                $config['upload_path']          =  './assets/img/gambar/images/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 10000;        
             
                $this->load->library('upload', $config, 'gambar_sampulupload'); // Create custom object for cover upload
                $this->gambar_sampulupload->initialize($config);
                $this->gambar_sampulupload->do_upload('gambar_sampul');
                $gambar_sampul = $this->gambar_sampulupload->data('file_name');
                $data['gambar_sampul'] = $gambar_sampul;
                if($gambar_sampul_lama != '' || $gambar_sampul_lama != null){
                    if (file_exists('./assets/img/gambar/images'.$gambar_sampul_lama)) {                
                        unlink('./assets/img/gambar/images'.$gambar_sampul_lama);
                    }
                }
             }
        }else{                 
            $data['gambar_sampul'] = $gambar_sampul_lama;
         }

        
        unset($data['gambar_sampul_lama']);

        
        $this->load->model('admin/Artikel_model');       
        $status = $this->Artikel_model->ubah($data);
       
       
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

        $this->load->model('admin/Artikel_model');
        $data = $this->Artikel_model->queryById($data);

        $status = $this->Artikel_model->hapus($data);
        if($data['gambar_sampul'] != '' || $data['gambar_sampul'] != null){
            if (file_exists('./assets/img/gambar/images/'.$data['gambar_sampul'])) {  
                unlink('./assets/img/gambar/images/'.$data['gambar_sampul']);
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

}