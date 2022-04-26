<?php 


class Beranda extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
    }

    public function index($kategori = "")
    {
        if($this->session->userdata('user') != null){
            redirect(base_url().'beranda-admin');
            die();
        }

        $this->load->model('admin/Pengaturan_model');
        $this->load->model('admin/Kategori_artikel_model');
        $this->load->model('admin/Artikel_model');
        $this->load->model('admin/Vidio_model');
        $this->load->model('admin/Foto_model');
        $this->load->model('admin/Slider_model');
        $data['pengaturan'] = $this->Pengaturan_model->getPengaturanById();
        $data['kategori_artikel'] = $this->Kategori_artikel_model->getKategori();
        $data['artikel'] = $this->Artikel_model->queryByKategori($kategori);
        $data['vidio'] = $this->Vidio_model->queryAll();
        $data['foto'] = $this->Foto_model->queryAll();
        $data['slider'] = $this->Slider_model->queryAll();
        $this->load->view('templates/header',$data);
        $this->load->view('beranda/index',$data);
        $this->load->view('templates/footer',$data);
    }
}