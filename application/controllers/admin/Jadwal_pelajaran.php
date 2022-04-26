<?php 



class Jadwal_pelajaran extends CI_Controller{
    
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

        $this->load->model('admin/Kelas_model');
        $data['kelas'] = $this->Kelas_model->getKelas(); 
        $this->load->model('admin/Semester_model');
        $data['semester'] = $this->Semester_model->getSemester(); 
        $this->load->model('admin/Tahun_pelajaran_model');
        $data['tahun_pelajaran'] = $this->Tahun_pelajaran_model->getTahunPelajaran(); 
        $this->load->model('admin/Pengaturan_model');
        $data['pengaturan'] = $this->Pengaturan_model->getPengaturanById(); 

        $this->load->view('admin/templates/header',$data);
        $this->load->view('admin/jadwal_pelajaran/jadwal_pelajaran',$data); 
        $this->load->view('admin/templates/footer');
    }


    public function getMataPelajaran(){
        
        $this->load->model('admin/Mata_pelajaran_model');
        $fetch_data = $this->Mata_pelajaran_model->getMataPelajaran();

        $output = '';

        foreach($fetch_data as $data){
            $output .= '<option value="'.$data['id_mata_pelajaran'].'">'.$data['tingkat'].' - '.$data['mata_pelajaran'].'</option>';
        }

        echo json_encode($output);
    }

    public function queryAll()
    {
        $where = [
                    "id_tahun_pelajaran" => $_POST['id_tahun_pelajaran'],
                    "id_semester" => $_POST['id_semester'],
                    "id_kelas" => $_POST['id_kelas'],
                    "hari_jadwal_pelajaran" => $_POST['hari_jadwal_pelajaran']
    
                ];

        $tabel = 'jadwal_pelajaran';
        $select_column = [
            'jadwal_pelajaran.id_jadwal_pelajaran',   
            'tahun_pelajaran.id_tahun_pelajaran',   
            'tahun_pelajaran.tahun_pelajaran',   
            'semester.id_semester',   
            'semester.semester',   
            'gedung.id_gedung',   
            'gedung.nama_gedung',   
            'ruangan.id_ruangan',   
            'ruangan.nama_ruangan',   
            'kelas.id_kelas',   
            'kelas.kelas', 
            'jadwal_pelajaran.hari_jadwal_pelajaran',  
            'jadwal_pelajaran.jam_ke_jadwal_pelajaran',  
            'mata_pelajaran.id_mata_pelajaran',  
            'mata_pelajaran.mata_pelajaran', 
            'guru.id_guru', 
            'guru.nama_guru', 
            'tingkat.id_tingkat', 
            'tingkat.tingkat', 
            'jadwal_pelajaran.mulai_jadwal_pelajaran', 
            'jadwal_pelajaran.selesai_jadwal_pelajaran'               
                   
        ];
        if($_SESSION['user']['level'] == 'Administrator'){
            $order_column = [
                null,
                'tahun_pelajaran.tahun_pelajaran',
                'semester.semester',
                'gedung.nama_gedung',
                'ruangan.nama_ruangan',
                'kelas.kelas',
                'jadwal_pelajaran.hari_jadwal_pelajaran',
                'jadwal_pelajaran.jam_ke_jadwal_pelajaran',
                'mata_pelajaran.mata_pelajaran',
                'guru.nama_guru',
                'jadwal_pelajaran.mulai_jadwal_pelajaran',
                'jadwal_pelajaran.selesai_jadwal_pelajaran',            
                null
            ];
        }else{
            $order_column = [
                null,
                'tahun_pelajaran.tahun_pelajaran',
                'semester.semester',
                'gedung.nama_gedung',
                'ruangan.nama_ruangan',
                'kelas.kelas',
                'jadwal_pelajaran.hari_jadwal_pelajaran',
                'jadwal_pelajaran.jam_ke_jadwal_pelajaran',
                'mata_pelajaran.mata_pelajaran',
                'guru.nama_guru',
                'jadwal_pelajaran.mulai_jadwal_pelajaran',
                'jadwal_pelajaran.selesai_jadwal_pelajaran'
            ];
        }
      
        $this->load->model('admin/Jadwal_pelajaran_model');
        $fetch_data = $this->Jadwal_pelajaran_model->buatDataTables($tabel,$select_column,$order_column,$where);
        $data = [];
        $nourut = 1;
        foreach($fetch_data as $row)
        {
            $sub_array = [];
            $sub_array[] = $nourut;           
            $sub_array[] = $row->tahun_pelajaran;       
            $sub_array[] = $row->semester;       
            $sub_array[] = $row->nama_gedung;       
            $sub_array[] = $row->nama_ruangan;       
            $sub_array[] = $row->kelas;       
            $sub_array[] = $row->hari_jadwal_pelajaran;       
            $sub_array[] = $row->jam_ke_jadwal_pelajaran;       
            $sub_array[] = $row->tingkat.' - '.$row->mata_pelajaran;       
            $sub_array[] = $row->nama_guru;       
            $sub_array[] = $row->mulai_jadwal_pelajaran;       
            $sub_array[] = $row->selesai_jadwal_pelajaran;       
                     
            if($_SESSION['user']['level'] == 'Administrator'){
            $sub_array[] = '
                            <button class="badge badge-warning badge-sm border-0" style="margin: 2px;" onclick="btnModalUbah(\''.$row->id_jadwal_pelajaran.'\')" title="Ubah" data-toggle="modal" data-target="#modalJadwalPelajaran"><i class="fa fa-fw fa-edit"></i></button> 
                            
                            <button class="badge badge-danger badge-sm border-0" style="margin: 2px;" onclick="btnModalHapus(\''.$row->id_jadwal_pelajaran.'\')" title="Hapus"><i class="fa fa-fw fa-trash"></i></button> 
                            ';
            }
            $data[] = $sub_array;
            

            $nourut++;
        }

        $output = [
            'draw'              =>  intval($_POST['draw']),
            'recordsTotal'      =>  $this->Jadwal_pelajaran_model->getAllData($tabel,$where),
            'recordsFiltered'   =>  $this->Jadwal_pelajaran_model->getFilteredData($tabel,$select_column,$order_column,$where),
            'data'              =>  $data
        ];

        echo json_encode($output);
      
    }


    public function tambah()
    {
        $data = $_POST;    

        $this->load->model('admin/Jadwal_pelajaran_model');
        $status = $this->Jadwal_pelajaran_model->tambah($data);
       
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
        
        $this->load->model('admin/Jadwal_pelajaran_model');
        $data = $this->Jadwal_pelajaran_model->queryById($data);
       

        echo json_encode($data);
      
    }


    public function ubah()
    {
        $data = $_POST;
             
        $this->load->model('admin/Jadwal_pelajaran_model');       
        $status = $this->Jadwal_pelajaran_model->ubah($data);
       
       
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

        $this->load->model('admin/Jadwal_pelajaran_model');

        $status = $this->Jadwal_pelajaran_model->hapus($data);       

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