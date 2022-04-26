<?php 


class Artikel extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
    }

    public function index($id = "")
    {
        if($id == ""){
            redirect(base_url().'beranda-admin');
            die();
        }
        if($this->session->userdata('user') != null){
            redirect(base_url().'beranda-admin');
            die();
        }

        $id_artikel = [
            "id_artikel" => $id
        ];

        $this->load->model('admin/Pengaturan_model');
        $this->load->model('admin/Kategori_artikel_model');
        $this->load->model('admin/Artikel_model');
        $data['pengaturan'] = $this->Pengaturan_model->getPengaturanById();
        $data['kategori_artikel'] = $this->Kategori_artikel_model->getKategori();
        $data['artikel'] = $this->Artikel_model->queryById($id_artikel);
        $this->load->view('templates/header',$data);
        $this->load->view('artikel/artikel',$data);
        $this->load->view('templates/footer',$data);
    }
}