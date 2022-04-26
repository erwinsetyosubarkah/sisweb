<?php 


class Struktur extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
      
        if($this->session->userdata('user') != null){
            redirect(base_url().'beranda-admin');
            die();
        }

     
        $this->load->model('admin/Pengaturan_model');
        $this->load->model('admin/Tentang_sekolah_model');
        $this->load->model('admin/Kategori_artikel_model');
        $data['kategori_artikel'] = $this->Kategori_artikel_model->getKategori();
        $data['pengaturan'] = $this->Pengaturan_model->getPengaturanById();
        $data['tentang_sekolah'] = $this->Tentang_sekolah_model->getTentangById();
        $this->load->view('templates/header',$data);
        $this->load->view('struktur/struktur',$data);
        $this->load->view('templates/footer',$data);
    }
}