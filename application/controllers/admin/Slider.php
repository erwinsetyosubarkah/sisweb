<?php 



class Slider extends CI_Controller{
    
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
        $this->load->view('admin/slider/slider',$data); 
        $this->load->view('admin/templates/footer');
    }



    public function queryAll()
    {
        $tabel = 'slider';
        $select_column = [
            'id_slider',   
            'judul_slider',
            'slider',
            'tgl_upload_slider',
            'id_author_slider',
            'level_author_slider'         
        ];

        $order_column = [
            null,
            'judul_slider',
            'slider',
            'tgl_upload_slider',
            'level_author_slider',
            null
        ];
      
        $this->load->model('admin/Slider_model');
        $fetch_data = $this->Slider_model->buatDataTables($tabel,$select_column,$order_column);
        $data = [];
        $nourut = 1;
        foreach($fetch_data as $row)
        {
            $sub_array = [];
            $sub_array[] = $nourut;
            $sub_array[] = $row->judul_slider;           
            if($row->slider == '' || $row->slider == null || !file_exists('./assets/img/gambar/images/'.$row->slider)){
                $sub_array[] = '<img src="'.base_url().'assets/img/gambar/images/noimage.png" width="50">';
            }else{
                $sub_array[] = '<img src="'.base_url().'assets/img/gambar/images/'.$row->slider.'" width="50">';
            }           
            $sub_array[] = $row->tgl_upload_slider;           
            $sub_array[] = $row->level_author_slider;           
            $sub_array[] = '
                            <button class="badge badge-warning badge-sm border-0" style="margin: 2px;" onclick="btnModalUbah(\''.$row->id_slider.'\')" title="Ubah" data-toggle="modal" data-target="#modalSlider"><i class="fa fa-fw fa-edit"></i></button> 
                            
                            <button class="badge badge-danger badge-sm border-0" style="margin: 2px;" onclick="btnModalHapus(\''.$row->id_slider.'\')" title="Hapus"><i class="fa fa-fw fa-trash"></i></button> 
                            ';
            $data[] = $sub_array;

            $nourut++;
        }

        $output = [
            'draw'              =>  intval($_POST['draw']),
            'recordsTotal'      =>  $this->Slider_model->getAllData($tabel),
            'recordsFiltered'   =>  $this->Slider_model->getFilteredData($tabel,$select_column,$order_column),
            'data'              =>  $data
        ];

        echo json_encode($output);
      
    }


    public function tambah()
    {
        $data = $_POST;

       
        //jika user upload slider
        if(!isset($data['slider'])){
            if(!empty($_FILES['slider']['name'])){
                $config = array();
                $config['upload_path']          =  './assets/img/gambar/images/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 10000;        
             
                $this->load->library('upload', $config, 'sliderupload'); // Create custom object for cover upload
                $this->sliderupload->initialize($config);
                $this->sliderupload->do_upload('slider');
                $slider = $this->sliderupload->data('file_name');
                $data['slider'] = $slider;
             }
        }

        $this->load->model('admin/Slider_model');
        $status = $this->Slider_model->tambah($data);
       
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
        
        $this->load->model('admin/Slider_model');
        $data = $this->Slider_model->queryById($data);

        //jika slider tidak ada
        if($data['slider'] == '' || $data['slider'] == null || !file_exists('./assets/img/gambar/images/'.$data['slider'])){
            $data['slider'] = 'noimage.png';
        }

        echo json_encode($data);
      
    }


    public function ubah()
    {
        $data = $_POST;

        $slider_lama = $data['slider_lama'];
   
        //jika user upload slider
        if(!isset($data['slider'])){
            if(!empty($_FILES['slider']['name'])){
                $config = array();
                $config['upload_path']          =  './assets/img/gambar/images/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 10000;        
             
                $this->load->library('upload', $config, 'sliderupload'); // Create custom object for cover upload
                $this->sliderupload->initialize($config);
                $this->sliderupload->do_upload('slider');
                $slider = $this->sliderupload->data('file_name');
                $data['slider'] = $slider;
                if($slider_lama != '' || $slider_lama != null){
                    if (file_exists('./assets/img/gambar/images'.$slider_lama)) {                
                        unlink('./assets/img/gambar/images'.$slider_lama);
                    }
                }
             }
        }else{                 
            $data['slider'] = $slider_lama;
         }

        
        unset($data['slider_lama']);

        
        $this->load->model('admin/Slider_model');       
        $status = $this->Slider_model->ubah($data);
       
       
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

        $this->load->model('admin/Slider_model');
        $data = $this->Slider_model->queryById($data);

        $status = $this->Slider_model->hapus($data);
        if($data['slider'] != '' || $data['slider'] != null){
            if (file_exists('./assets/img/gambar/images/'.$data['slider'])) {  
                unlink('./assets/img/gambar/images/'.$data['slider']);
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