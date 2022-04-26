<?php 



class Cetak_rapor_uts extends CI_Controller{
    
    
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

        $this->load->model('admin/Kelas_model');
        $data['kelas'] = $this->Kelas_model->getKelas(); 
        $this->load->model('admin/Semester_model');
        $data['semester'] = $this->Semester_model->getSemester(); 
        $this->load->model('admin/Tahun_pelajaran_model');
        $data['tahun_pelajaran'] = $this->Tahun_pelajaran_model->getTahunPelajaran(); 
        $this->load->model('admin/Pengaturan_model');
        $data['pengaturan'] = $this->Pengaturan_model->getPengaturanById();   

            $this->load->view('admin/templates/header',$data);
            $this->load->view('admin/cetak_rapor_uts/cetak_rapor_uts',$data); 
            $this->load->view('admin/templates/footer');
        
    }

 
    

    public function queryAllSiswaKelas()
    {
        $where = [
                    "id_kelas" => $_POST['id_kelas'],
                    "id_tahun_pelajaran" => $_POST['id_tahun_pelajaran'],
                    "id_semester" => $_POST['id_semester'],
                ];
                
        
        $tabel = 'siswa';
        $select_column = [              
            'kelas.id_kelas',   
            'kelas.kelas', 
            'siswa.id_siswa',  
            'siswa.nis_siswa',  
            'siswa.nisn_siswa',  
            'siswa.nama_siswa',  
            'siswa.jenis_kelamin_siswa',                        
                                    
                   
        ];

        $order_column = [
            null,
            'siswa.nis_siswa',  
            'siswa.nisn_siswa',  
            'siswa.nama_siswa',  
            'siswa.jenis_kelamin_siswa',
            null,
            null
        ];
      
        $this->load->model('admin/Cetak_rapor_uts_model');
        $fetch_data = $this->Cetak_rapor_uts_model->buatDataTables($tabel,$select_column,$order_column,$where);
        $data = [];
        $nourut = 1;
        foreach($fetch_data as $row)
        {
            $sub_array = [];
            $sub_array[] = $nourut;           
            $sub_array[] = $row->nis_siswa;       
            $sub_array[] = $row->nisn_siswa;       
            $sub_array[] = $row->nama_siswa;       
            $sub_array[] = $row->jenis_kelamin_siswa;       
                                 
            $sub_array[] = '
                    <form action="print-rapor-uts" method="get" target="_blank">
                    <input type="hidden" name="id_siswa" value="'.$row->id_siswa.'">                    
                    <input type="hidden" name="id_kelas" value="'.$row->id_kelas.'">
                    <input type="hidden" name="id_tahun_pelajaran" value="'.$where['id_tahun_pelajaran'].'">
                    <input type="hidden" name="id_semester" value="'.$where['id_semester'].'">
                    <button type="submit" class="badge badge-primary badge-sm border-0" style="margin: 2px;"title="Cetak Rapor Uts"><i class="fa fa-fw fa-print"></i></button>
                    </form>
                    ';
            $data[] = $sub_array;

            $nourut++;
        }

        $output = [
            'draw'              =>  intval($_POST['draw']),
            'recordsTotal'      =>  $this->Cetak_rapor_uts_model->getAllData($tabel,$where),
            'recordsFiltered'   =>  $this->Cetak_rapor_uts_model->getFilteredData($tabel,$select_column,$order_column,$where),
            'data'              =>  $data
        ];

        echo json_encode($output);
      
    }



    public function cetakRaporUts(){   
        $id_kelas = [
            'id_kelas' => $_GET['id_kelas']
        ];
        $id_tahun_pelajaran = [
            'id_tahun_pelajaran' => $_GET['id_tahun_pelajaran']
        ];
        $id_semester = [
            'id_semester' => $_GET['id_semester']
        ];

        $this->load->model('admin/Kelas_model');
        $kelas = $this->Kelas_model->queryById($id_kelas); 
        $data['kelas'] = $kelas;
        $this->load->model('admin/Semester_model');
        $data['semester'] = $this->Semester_model->queryById($id_semester); 
        $this->load->model('admin/Tahun_pelajaran_model');
        $data['tahun_pelajaran'] = $this->Tahun_pelajaran_model->queryById($id_tahun_pelajaran); 
        $this->load->model('admin/Pengaturan_model');
        $data['pengaturan'] = $this->Pengaturan_model->getPengaturanById(); 
        $this->load->model('admin/Pengguna_model');
        $siswa = [
            'id_siswa'=> $_GET['id_siswa'],
            'level'=> 'siswa'
        ];
       $data['siswa']= $this->Pengguna_model->queryById($siswa);

       $this->load->model('admin/Cetak_rapor_uts_model');
       $data['nilai_siswa'] = $this->Cetak_rapor_uts_model->queryNilai($_GET['id_kelas'],$_GET['id_siswa']);
       $data['predikat'] = $this->Cetak_rapor_uts_model->queryPredikat();
       $data['nilai_exkul'] = $this->Cetak_rapor_uts_model->queryExtrakurikuler($_GET['id_siswa']);
       $data['wali_kelas'] = $this->Cetak_rapor_uts_model->queryGuru($kelas['id_guru']);
       $data['tanggal'] = $this->Cetak_rapor_uts_model->tanggalIndonesia(date("Y-m-d"));

       $this->load->view('admin/cetak_rapor_uts/print_rapor_uts',$data);
     

      
       
    }
  

}