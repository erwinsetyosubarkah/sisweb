<?php 



class Foto extends CI_Controller{
    
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
        $this->load->view('admin/foto/foto',$data); 
        $this->load->view('admin/templates/footer');
    }



    public function queryAll()
    {
        $tabel = 'foto';
        $select_column = [
            'id_foto',   
            'judul_foto',
            'foto',
            'tgl_upload_foto',
            'id_author_foto',
            'level_author_foto'         
        ];

        $order_column = [
            null,
            'judul_foto',
            'foto',
            'tgl_upload_foto',
            'level_author_foto',
            null
        ];
      
        $this->load->model('admin/Foto_model');
        $fetch_data = $this->Foto_model->buatDataTables($tabel,$select_column,$order_column);
        $data = [];
        $nourut = 1;
        foreach($fetch_data as $row)
        {
            $sub_array = [];
            $sub_array[] = $nourut;
            $sub_array[] = $row->judul_foto;           
            if($row->foto == '' || $row->foto == null || !file_exists('./assets/img/gambar/images/'.$row->foto)){
                $sub_array[] = '<img src="'.base_url().'assets/img/gambar/images/noimage.png" width="50">';
            }else{
                $sub_array[] = '<img src="'.base_url().'assets/img/gambar/images/'.$row->foto.'" width="50">';
            }           
            $sub_array[] = $row->tgl_upload_foto;           
            $sub_array[] = $row->level_author_foto;           
            $sub_array[] = '
                            <button class="badge badge-warning badge-sm border-0" style="margin: 2px;" onclick="btnModalUbah(\''.$row->id_foto.'\')" title="Ubah" data-toggle="modal" data-target="#modalFoto"><i class="fa fa-fw fa-edit"></i></button> 
                            
                            <button class="badge badge-danger badge-sm border-0" style="margin: 2px;" onclick="btnModalHapus(\''.$row->id_foto.'\')" title="Hapus"><i class="fa fa-fw fa-trash"></i></button> 
                            ';
            $data[] = $sub_array;

            $nourut++;
        }

        $output = [
            'draw'              =>  intval($_POST['draw']),
            'recordsTotal'      =>  $this->Foto_model->getAllData($tabel),
            'recordsFiltered'   =>  $this->Foto_model->getFilteredData($tabel,$select_column,$order_column),
            'data'              =>  $data
        ];

        echo json_encode($output);
      
    }


    public function tambah()
    {
        $data = $_POST;

       
        //jika user upload foto
        if(!isset($data['foto'])){
            if(!empty($_FILES['foto']['name'])){
                $config = array();
                $config['upload_path']          =  './assets/img/gambar/images/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 10000;        
             
                $this->load->library('upload', $config, 'fotoupload'); // Create custom object for cover upload
                $this->fotoupload->initialize($config);
                $this->fotoupload->do_upload('foto');
                $foto = $this->fotoupload->data('file_name');
                $data['foto'] = $foto;
             }
        }

        $this->load->model('admin/Foto_model');
        $status = $this->Foto_model->tambah($data);
       
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
        
        $this->load->model('admin/Foto_model');
        $data = $this->Foto_model->queryById($data);

        //jika foto tidak ada
        if($data['foto'] == '' || $data['foto'] == null || !file_exists('./assets/img/gambar/images/'.$data['foto'])){
            $data['foto'] = 'noimage.png';
        }

        echo json_encode($data);
      
    }


    public function ubah()
    {
        $data = $_POST;

        $foto_lama = $data['foto_lama'];
   
        //jika user upload foto
        if(!isset($data['foto'])){
            if(!empty($_FILES['foto']['name'])){
                $config = array();
                $config['upload_path']          =  './assets/img/gambar/images/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 10000;        
             
                $this->load->library('upload', $config, 'fotoupload'); // Create custom object for cover upload
                $this->fotoupload->initialize($config);
                $this->fotoupload->do_upload('foto');
                $foto = $this->fotoupload->data('file_name');
                $data['foto'] = $foto;
                if($foto_lama != '' || $foto_lama != null){
                    if (file_exists('./assets/img/gambar/images'.$foto_lama)) {                
                        unlink('./assets/img/gambar/images'.$foto_lama);
                    }
                }
             }
        }else{                 
            $data['foto'] = $foto_lama;
         }

        
        unset($data['foto_lama']);

        
        $this->load->model('admin/Foto_model');       
        $status = $this->Foto_model->ubah($data);
       
       
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

        $this->load->model('admin/Foto_model');
        $data = $this->Foto_model->queryById($data);

        $status = $this->Foto_model->hapus($data);
        if($data['foto'] != '' || $data['foto'] != null){
            if (file_exists('./assets/img/gambar/images/'.$data['foto'])) {  
                unlink('./assets/img/gambar/images/'.$data['foto']);
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