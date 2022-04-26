<?php 



class Pengumuman extends CI_Controller{
    
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

        $this->load->model('admin/Pengaturan_model');
        $data['pengaturan'] = $this->Pengaturan_model->getPengaturanById(); 

        $this->load->view('admin/templates/header',$data);
        $this->load->view('admin/pengumuman/pengumuman',$data); 
        $this->load->view('admin/templates/footer');
    }

   

    public function queryAll()
    {
        $tabel = 'pengumuman';
        $select_column = [
            'pengumuman.id_pengumuman',   
            'pengumuman.judul_pengumuman',
            'pengumuman.isi_pengumuman',
            'pengumuman.tgl_upload',
            'pengumuman.id_author',
            'pengumuman.level_author'         
        ];

        $order_column = [
            null,
            'pengumuman.judul_pengumuman',
            'pengumuman.isi_pengumuman',
            'pengumuman.tgl_upload',
            null
        ];
      
        $this->load->model('admin/Pengumuman_model');
        $fetch_data = $this->Pengumuman_model->buatDataTables($tabel,$select_column,$order_column);
        $data = [];
        $nourut = 1;
        foreach($fetch_data as $row)
        {
            $sub_array = [];
            $sub_array[] = $nourut;
            $sub_array[] = $row->judul_pengumuman;           
            $sub_array[] = $row->isi_pengumuman;           
            $sub_array[] = $row->tgl_upload;           
                    
            $sub_array[] = '
                            <button class="badge badge-warning badge-sm border-0" style="margin: 2px;" onclick="btnModalUbah(\''.$row->id_pengumuman.'\')" title="Ubah" data-toggle="modal" data-target="#modalPengumuman"><i class="fa fa-fw fa-edit"></i></button> 
                            
                            <button class="badge badge-danger badge-sm border-0" style="margin: 2px;" onclick="btnModalHapus(\''.$row->id_pengumuman.'\')" title="Hapus"><i class="fa fa-fw fa-trash"></i></button> 
                            ';
            $data[] = $sub_array;

            $nourut++;
        }

        $output = [
            'draw'              =>  intval($_POST['draw']),
            'recordsTotal'      =>  $this->Pengumuman_model->getAllData($tabel),
            'recordsFiltered'   =>  $this->Pengumuman_model->getFilteredData($tabel,$select_column,$order_column),
            'data'              =>  $data
        ];

        echo json_encode($output);
      
    }


    public function tambah()
    {
        $data = $_POST;

       
        $this->load->model('admin/Pengumuman_model');
        $status = $this->Pengumuman_model->tambah($data);
       
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
        
        $this->load->model('admin/Pengumuman_model');
        $data = $this->Pengumuman_model->queryById($data);

       
        echo json_encode($data);
      
    }


    public function ubah()
    {
        $data = $_POST;

              
        $this->load->model('admin/Pengumuman_model');       
        $status = $this->Pengumuman_model->ubah($data);
       
       
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

        $this->load->model('admin/Pengumuman_model');
        $data = $this->Pengumuman_model->queryById($data);

        $status = $this->Pengumuman_model->hapus($data);

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