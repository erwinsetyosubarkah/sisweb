<?php 



class Rekap_absensi extends CI_Controller{
    
    
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

        if(isset($_GET['id_mata_pelajaran'] ) && isset($_GET['id_kelas'])){        
            $kelas=['id_kelas' => $_GET['id_kelas']];
            $data['kelas1'] = $this->Kelas_model->queryById($kelas); 
            $mapel = ['id_mata_pelajaran' => $_GET['id_mata_pelajaran'] ];       
            $data['mata_pelajaran1'] = $this->Mata_pelajaran_model->queryById($mapel);    
           
            $this->load->view('admin/templates/header',$data);
            $this->load->view('admin/rekap_absensi/rekap_absensi',$data); 
            $this->load->view('admin/templates/footer');
        }else{       

            $this->load->view('admin/templates/header',$data);
            $this->load->view('admin/rekap_absensi/mapel_absensi',$data); 
            $this->load->view('admin/templates/footer');
        }
    }

 
   


    public function queryAll()
    {
        $id_kelas = [
                    "id_kelas" => $this->input->post('id_kelas')
    
                ];

        $this->load->model('admin/Kelas_model');
        $tingkat = $this->Kelas_model->queryById($id_kelas);
        $where = [
            'id_tingkat' => $tingkat['id_tingkat']
        ];
        
        $tabel = 'mata_pelajaran';
        $select_column = [   
            'mata_pelajaran.id_mata_pelajaran',
            'mata_pelajaran.mata_pelajaran',  
            'mata_pelajaran.kkm_mata_pelajaran',
            'guru.id_guru', 
            'guru.nama_guru', 
                         
                   
        ];

        $order_column = [
            null,            
            'mata_pelajaran.mata_pelajaran',
            'guru.nama_guru',        
            null
        ];
      
        $this->load->model('admin/Rekap_absensi_model');
        $fetch_data = $this->Rekap_absensi_model->buatDataTables($tabel,$select_column,$order_column,$where);
        $data = [];
        $nourut = 1;
        foreach($fetch_data as $row)
        {
            $sub_array = [];
            $sub_array[] = $nourut;
            $sub_array[] = $tingkat['tingkat'].' - '.$row->mata_pelajaran; 
            $sub_array[] = $row->nama_guru;            
                     
            $sub_array[] = '
                            <form action="akademik-rekap-absensi" method="get">
                            <input type="hidden" name="id_mata_pelajaran" value="'.$row->id_mata_pelajaran.'">
                            <input type="hidden" name="id_kelas" value="'.$id_kelas['id_kelas'].'">
                            <button type="submit" class="badge badge-primary badge-sm border-0" style="margin: 2px;"title="Rekap Absensi"><i class="fa fa-fw fa-list"></i></button>
                            </form>
                            ';
            $data[] = $sub_array;

            $nourut++;
        }

        $output = [
            'draw'              =>  intval($_POST['draw']),
            'recordsTotal'      =>  $this->Rekap_absensi_model->getAllData($tabel,$where),
            'recordsFiltered'   =>  $this->Rekap_absensi_model->getFilteredData($tabel,$select_column,$order_column,$where),
            'data'              =>  $data
        ];

        echo json_encode($output);
      
    }

    public function totalAbsensi($id_siswa,$id_mata_pelajaran){
        $this->load->model('admin/Rekap_absensi_model');

        return $total_absensi = $this->Rekap_absensi_model->totalAbsensi($id_siswa,$id_mata_pelajaran);
    }

    public function queryAllSiswaKelas()
    {
        $where = [
                    "id_kelas" => $_POST['id_kelas'],
                    "id_mata_pelajaran" => $_POST['id_mata_pelajaran']
                ];
          

        $tabel = 'siswa';
        $select_column = [  
            'siswa.id_siswa',  
            'siswa.nis_siswa',  
            'siswa.nisn_siswa',  
            'siswa.nama_siswa',  
            'siswa.jenis_kelamin_siswa'
                                     
                   
        ];

        $order_column = [
            null,
            'siswa.nis_siswa',  
            'siswa.nisn_siswa',  
            'siswa.nama_siswa',  
            'siswa.jenis_kelamin_siswa',
            null,
            null,
            null,
            null,
            null,
            null
        ];
        
        $this->load->model('admin/Rekap_absensi_model');
        $fetch_data = $this->Rekap_absensi_model->buatDataTables($tabel,$select_column,$order_column,$where);
        $data = [];
        $nourut = 1;
        foreach($fetch_data as $row)
        {
            
            $data_absensi = $this->totalAbsensi($row->id_siswa,$where['id_mata_pelajaran']);

            $sub_array = [];
            $sub_array[] = $nourut;           
            $sub_array[] = $row->nis_siswa;       
            $sub_array[] = $row->nisn_siswa;       
            $sub_array[] = $row->nama_siswa;       
            $sub_array[] = $row->jenis_kelamin_siswa;      
           
            $sub_array[] = $data_absensi['total_pertemuan'];
            $sub_array[] = $data_absensi['hadir'];
            $sub_array[] = $data_absensi['sakit'];
            $sub_array[] = $data_absensi['ijin'];
            $sub_array[] = $data_absensi['alpa'];
            $sub_array[] = $data_absensi['persen_hadir']." %";
            $data[] = $sub_array;

            $nourut++;
        }

        $output = [
            'draw'              =>  intval($_POST['draw']),
            'recordsTotal'      =>  $this->Rekap_absensi_model->getAllData($tabel,$where),
            'recordsFiltered'   =>  $this->Rekap_absensi_model->getFilteredData($tabel,$select_column,$order_column,$where),
            'data'              =>  $data
        ];

        echo json_encode($output);
      
    }




  

}