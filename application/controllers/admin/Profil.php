<?php 



class Profil extends CI_Controller{
    
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
        $this->load->model('admin/Tentang_sekolah_model');
        $data['tentang_sekolah'] = $this->Tentang_sekolah_model->getTentangById(); 
        $this->load->view('admin/templates/header',$data);
        $this->load->view('admin/profil/profil',$data); 
        $this->load->view('admin/templates/footer');
    }

    public function query(){
        $this->load->model('admin/Tentang_sekolah_model');
        $result = $this->Tentang_sekolah_model->query();  

        echo json_encode($result);
    }

    public function ubah(){
        $data = $_POST;


        $this->load->model('admin/Tentang_sekolah_model');
        $status = $this->Tentang_sekolah_model->ubah($data);
          if($status == 1){         
              $data = [
                  'status' => 'success',
                  'title' => 'Berhasil',
                  'pesan' => 'Data berhasil Diubah'
              ];
          }else{
            $data = [
                'status' => 'error',
                'title'  => 'Gagal',
                'pesan' => 'Data gagal Diubah'
            ];
        }          

        echo json_encode($data);
    }
}