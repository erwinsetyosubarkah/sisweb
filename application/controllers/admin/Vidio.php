<?php 



class Vidio extends CI_Controller{
    
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
        $this->load->view('admin/vidio/vidio',$data); 
        $this->load->view('admin/templates/footer');
    }



    public function queryAll()
    {
        $tabel = 'vidio';
        $select_column = [
            'id_vidio',   
            'judul_vidio',   
            'url_vidio',   
            'tgl_upload_vidio',   
            'id_author_vidio',   
            'level_author_vidio'         
        ];

        $order_column = [
            null,
            'judul_vidio',
            null,            
            'url_vidio',
            'level_author_vidio',
            'tgl_upload_vidio',
            null
        ];
      
        $this->load->model('admin/Vidio_model');
        $fetch_data = $this->Vidio_model->buatDataTables($tabel,$select_column,$order_column);
        $data = [];
        $nourut = 1;
        foreach($fetch_data as $row)
        {
            if(substr_count($row->url_vidio,'=') > 0){
                $id_vidio_youtube_arr = explode('=',$row->url_vidio);
                $id_vidio_youtube_arr1 = $id_vidio_youtube_arr[1];
                $id_vidio_youtube_arr2 = explode('&',$id_vidio_youtube_arr1);
                $id_vidio_youtube = $id_vidio_youtube_arr2[0];
            }else{
                $id_vidio_youtube='';
            }
            $sub_array = [];
            $sub_array[] = $nourut;
            $sub_array[] = $row->judul_vidio;           
            $sub_array[] = '
                                <iframe width="120" height="50" src="https://www.youtube.com/embed/'.$id_vidio_youtube.'" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            ';          
            $sub_array[] = $row->url_vidio;           
            $sub_array[] = $row->level_author_vidio;           
            $sub_array[] = $row->tgl_upload_vidio;           
            $sub_array[] = '
                            <button class="badge badge-warning badge-sm border-0" style="margin: 2px;" onclick="btnModalUbah(\''.$row->id_vidio.'\')" title="Ubah" data-toggle="modal" data-target="#modalVidio"><i class="fa fa-fw fa-edit"></i></button> 
                            
                            <button class="badge badge-danger badge-sm border-0" style="margin: 2px;" onclick="btnModalHapus(\''.$row->id_vidio.'\')" title="Hapus"><i class="fa fa-fw fa-trash"></i></button> 
                            ';
            $data[] = $sub_array;

            $nourut++;
        }

        $output = [
            'draw'              =>  intval($_POST['draw']),
            'recordsTotal'      =>  $this->Vidio_model->getAllData($tabel),
            'recordsFiltered'   =>  $this->Vidio_model->getFilteredData($tabel,$select_column,$order_column),
            'data'              =>  $data
        ];

        echo json_encode($output);
      
    }


    public function tambah()
    {
        $data = $_POST;

        $tabel = 'vidio';

      

        $this->load->model('admin/Vidio_model');
        $status = $this->Vidio_model->tambah($data,$tabel);
       
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
        
        $this->load->model('admin/Vidio_model');
        $data = $this->Vidio_model->queryById($data);

        echo json_encode($data);
      
    }


    public function ubah()
    {
        $data = $_POST;

        $tabel = 'vidio';
        
        $this->load->model('admin/Vidio_model');       
        $status = $this->Vidio_model->ubah($data,$tabel);
       
       
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

        $this->load->model('admin/Vidio_model');

        $status = $this->Vidio_model->hapus($data);
       

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
