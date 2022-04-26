<?php 



class Kelas extends CI_Controller{
    
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
        $this->load->view('admin/kelas/kelas',$data); 
        $this->load->view('admin/templates/footer');
    }

    public function getRuangan(){
        
        $this->load->model('admin/Ruangan_model');
        $fetch_data = $this->Ruangan_model->getRuangan();

        $output = '';

        foreach($fetch_data as $data){
            $output .= '<option value="'.$data['id_ruangan'].'">'.$data['nama_ruangan'].'</option>';
        }

        echo json_encode($output);
    }

    public function getTingkat(){
        
        $this->load->model('admin/Tingkat_model');
        $fetch_data = $this->Tingkat_model->getTingkat();

        $output = '';

        foreach($fetch_data as $data){
            $output .= '<option value="'.$data['id_tingkat'].'">'.$data['tingkat'].'</option>';
        }

        echo json_encode($output);
    }

    public function getGuru(){
        
        $this->load->model('admin/Pengguna_model');
        $fetch_data = $this->Pengguna_model->getGuru();

        $output = '<option value=""></option>';

        foreach($fetch_data as $data){
            $output .= '<option value="'.$data['id_guru'].'">'.$data['nama_guru'].'</option>';
        }

        echo json_encode($output);
    }

    public function queryAll()
    {
        $tabel = 'kelas';
        $select_column = [
            'kelas.id_kelas',   
            'tingkat.tingkat',   
            'kelas.kelas',
            'guru.nama_guru',
            'ruangan.nama_ruangan',
            'gedung.nama_gedung'       
        ];

        $order_column = [
            null,
            'kelas.id_kelas',
            'tingkat.tingkat',
            'kelas.kelas',
            'guru.nama_guru',
            'ruangan.nama_ruangan',
            'gedung.nama_gedung',
            null,
            null
        ];
      
        $this->load->model('admin/Kelas_model');
        $fetch_data = $this->Kelas_model->buatDataTables($tabel,$select_column,$order_column);
        $data = [];
        $nourut = 1;
        foreach($fetch_data as $row)
        {
            $sub_array = [];
            $sub_array[] = $nourut;
            $sub_array[] = $row->id_kelas;           
            $sub_array[] = $row->tingkat;           
            $sub_array[] = $row->kelas;           
            $sub_array[] = $row->nama_guru;           
            $sub_array[] = $row->nama_ruangan;           
            $sub_array[] = $row->nama_gedung;

            $this->load->model('admin/Pengguna_model');
            $jml_siswa_by_kelas = $this->Pengguna_model->jmlSiswaByKelas($row->id_kelas);
            $sub_array[] = $jml_siswa_by_kelas.' siswa';        
            $sub_array[] = '
                            <button class="badge badge-warning badge-sm border-0" style="margin: 2px;" onclick="btnModalUbah(\''.$row->id_kelas.'\')" title="Ubah" data-toggle="modal" data-target="#modalKelas"><i class="fa fa-fw fa-edit"></i></button> 
                            
                            <button class="badge badge-danger badge-sm border-0" style="margin: 2px;" onclick="btnModalHapus(\''.$row->id_kelas.'\')" title="Hapus"><i class="fa fa-fw fa-trash"></i></button> 
                            ';
            $data[] = $sub_array;

            $nourut++;
        }

        $output = [
            'draw'              =>  intval($_POST['draw']),
            'recordsTotal'      =>  $this->Kelas_model->getAllData($tabel),
            'recordsFiltered'   =>  $this->Kelas_model->getFilteredData($tabel,$select_column,$order_column),
            'data'              =>  $data
        ];

        echo json_encode($output);
      
    }


    public function tambah()
    {
        $data = $_POST;    

        $this->load->model('admin/Kelas_model');
        $status = $this->Kelas_model->tambah($data);
       
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
        
        $this->load->model('admin/Kelas_model');
        $data = $this->Kelas_model->queryById($data);
       

        echo json_encode($data);
      
    }


    public function ubah()
    {
        $data = $_POST;
             
        $this->load->model('admin/Kelas_model');       
        $status = $this->Kelas_model->ubah($data);
       
       
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

        $this->load->model('admin/Kelas_model');

        $status = $this->Kelas_model->hapus($data);       

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