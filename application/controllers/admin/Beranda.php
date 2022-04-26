<?php 


class Beranda extends CI_Controller{

    public function index(){
        
       if($this->session->userdata('user') == null){
           redirect(base_url().'login-user');
           die();
       }

        $this->load->model('admin/Pengguna_model');
        $this->load->model('admin/Pengumuman_model');
        $this->load->model('admin/Kelas_model');
        $data['jml_siswa'] = $this->Pengguna_model->getAllData('siswa');
        $data['jml_guru'] = $this->Pengguna_model->getAllData('guru');
        $data['jml_kelas'] = $this->Kelas_model->getAllData('kelas');
        $data['jml_pengumuman'] = $this->Pengumuman_model->getAllData('pengumuman');

        if(isset($_GET['page'])){
            $page = $_GET['page'];    
        }else{
            $page = 1;
        }
        $per_page = 3;
        $data['pengumuman'] = $this->Pengumuman_model->queryLimit($per_page,$page);

        $this->load->model('admin/Pengaturan_model');
        $data['pengaturan'] = $this->Pengaturan_model->getPengaturanById();    
        $this->load->view('admin/templates/header',$data);
        $this->load->view('admin/beranda/index',$data); 
        $this->load->view('admin/templates/footer');       
    }


}