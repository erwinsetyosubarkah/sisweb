<?php 



class Agenda_mengajar extends CI_Controller{
    
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

        if($_SESSION['user']['level'] != 'Administrator' && $_SESSION['user']['level'] != 'Guru' ){
            redirect(base_url().'beranda-admin');
            die();
        }

        $this->load->model('admin/Kelas_model');
        $data['kelas'] = $this->Kelas_model->getKelas(); 
        $this->load->model('admin/Semester_model');
        $data['semester'] = $this->Semester_model->getSemester(); 
        $this->load->model('admin/Tahun_pelajaran_model');
        $data['tahun_pelajaran'] = $this->Tahun_pelajaran_model->getTahunPelajaran(); 
        $this->load->model('admin/Mata_pelajaran_model');
        $data['mata_pelajaran'] = $this->Mata_pelajaran_model->getMataPelajaran(); 
        $this->load->model('admin/Pengaturan_model');
        $data['pengaturan'] = $this->Pengaturan_model->getPengaturanById(); 

        $this->load->view('admin/templates/header',$data);
        $this->load->view('admin/agenda_mengajar/agenda_mengajar',$data); 
        $this->load->view('admin/templates/footer');
    }


    public function getKompetensiDasarByMapel(){
        $id_mata_pelajaran = $_POST['id_mata_pelajaran'];
        $this->load->model('admin/Kompetensi_dasar_model');
        $fetch_data = $this->Kompetensi_dasar_model->getKompetensiDasarByMapel($id_mata_pelajaran);

        $output = '';

        foreach($fetch_data as $data){
            $output .= '<option value="'.$data['id_kompetensi_dasar'].'">'.$data['kode_kompetensi_dasar'].'</option>';
        }

        echo json_encode($output);
    }

    public function queryAll()
    {
        $where = [
                    "id_tahun_pelajaran" => $_POST['id_tahun_pelajaran'],
                    "id_semester" => $_POST['id_semester'],
                    "id_kelas" => $_POST['id_kelas'],
                    "hari_agenda_mengajar" => $_POST['hari_agenda_mengajar']
    
                ];
        $tabel = 'agenda_mengajar';
        $select_column = [
            'agenda_mengajar.id_agenda_mengajar',   
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
            'agenda_mengajar.hari_agenda_mengajar',  
            'agenda_mengajar.tanggal_agenda_mengajar',  
            'agenda_mengajar.pertemuan_ke_agenda_mengajar',  
            'agenda_mengajar.materi_agenda_mengajar',  
            'agenda_mengajar.keterangan_agenda_mengajar',  
            'mata_pelajaran.id_mata_pelajaran',  
            'mata_pelajaran.mata_pelajaran', 
            'kompetensi_dasar.id_kompetensi_dasar',  
            'kompetensi_dasar.kode_kompetensi_dasar', 
            'kompetensi_dasar.kompetensi_dasar', 
            'guru.id_guru', 
            'guru.nama_guru', 
            'tingkat.id_tingkat', 
            'tingkat.tingkat'               
                   
        ];

        $order_column = [
            null,
            'tahun_pelajaran.tahun_pelajaran',
            'semester.semester',
            'kelas.kelas',
            'agenda_mengajar.hari_agenda_mengajar',
            'agenda_mengajar.tanggal_agenda_mengajar',
            'agenda_mengajar.pertemuan_ke_agenda_mengajar',
            'mata_pelajaran.mata_pelajaran',
            'guru.nama_guru',
            'agenda_mengajar.keterangan_agenda_mengajar',           
            null
        ];
      
        $this->load->model('admin/Agenda_mengajar_model');
        $fetch_data = $this->Agenda_mengajar_model->buatDataTables($tabel,$select_column,$order_column,$where);
        $data = [];
        $nourut = 1;
        foreach($fetch_data as $row)
        {
            $sub_array = [];
            $sub_array[] = $nourut;           
            $sub_array[] = $row->tahun_pelajaran;       
            $sub_array[] = $row->semester;       
            $sub_array[] = $row->kelas;       
            $sub_array[] = $row->hari_agenda_mengajar;       
            $sub_array[] = $row->tanggal_agenda_mengajar;       
            $sub_array[] = $row->pertemuan_ke_agenda_mengajar;       
            $sub_array[] = $row->tingkat.' - '.$row->mata_pelajaran;       
            $sub_array[] = $row->nama_guru;       
            $sub_array[] = $row->keterangan_agenda_mengajar;      
                     
            $sub_array[] = '
                            <button class="badge badge-warning badge-sm border-0" style="margin: 2px;" onclick="btnModalUbah(\''.$row->id_agenda_mengajar.'\')" title="Ubah" data-toggle="modal" data-target="#modalAgendaMengajar"><i class="fa fa-fw fa-edit"></i></button> 
                            
                            <button class="badge badge-danger badge-sm border-0" style="margin: 2px;" onclick="btnModalHapus(\''.$row->id_agenda_mengajar.'\')" title="Hapus"><i class="fa fa-fw fa-trash"></i></button> 
                            ';
            $data[] = $sub_array;

            $nourut++;
        }

        $output = [
            'draw'              =>  intval($_POST['draw']),
            'recordsTotal'      =>  $this->Agenda_mengajar_model->getAllData($tabel,$where),
            'recordsFiltered'   =>  $this->Agenda_mengajar_model->getFilteredData($tabel,$select_column,$order_column,$where),
            'data'              =>  $data
        ];

        echo json_encode($output);
      
    }


    public function tambah()
    {
        $data = $_POST;    

        $this->load->model('admin/Agenda_mengajar_model');
        $status = $this->Agenda_mengajar_model->tambah($data);
       
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
        
        $this->load->model('admin/Agenda_mengajar_model');
        $data = $this->Agenda_mengajar_model->queryById($data);
       

        echo json_encode($data);
      
    }


    public function ubah()
    {
        $data = $_POST;
             
        $this->load->model('admin/Agenda_mengajar_model');       
        $status = $this->Agenda_mengajar_model->ubah($data);
       
       
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

        $this->load->model('admin/Agenda_mengajar_model');

        $status = $this->Agenda_mengajar_model->hapus($data);       

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