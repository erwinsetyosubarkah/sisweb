<?php 



class Absensi_siswa extends CI_Controller{
    
    
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

        if(isset($_GET['id_agenda_mengajar'])){        
            $id_agenda_mengajar = ['id_agenda_mengajar' => $_GET['id_agenda_mengajar']];
            $this->load->model('admin/Agenda_mengajar_model');
            $data['agenda_mengajar'] = $this->Agenda_mengajar_model->queryById($id_agenda_mengajar);
            if($data['agenda_mengajar'] == null){
                redirect('akademik-absensi-siswa');
                die;
            }
            $this->load->view('admin/templates/header',$data);
            $this->load->view('admin/absensi_siswa/input_absensi',$data); 
            $this->load->view('admin/templates/footer');
        }else{       

            $this->load->view('admin/templates/header',$data);
            $this->load->view('admin/absensi_siswa/absensi_siswa',$data); 
            $this->load->view('admin/templates/footer');
        }
    }

    
 
    public function inputAbsensi()
    {
        $data = $_POST['absensi'];
        
        $tabel = 'absensi';
        
        $this->load->model('admin/Input_absensi_model');       
        $status = $this->Input_absensi_model->inputAbsensi($data,$tabel);
       
       
          if($status == 1 ){       
              
            $data = [
                'status' => 'success',
                'title' => 'Berhasil',
                'pesan' => 'Data berhasil Disimpan....!'
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
            'kompetensi_dasar.kode_kompetensi_dasar',
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
            $sub_array[] = $row->kode_kompetensi_dasar;       
            $sub_array[] = $row->nama_guru;       
            $sub_array[] = $row->keterangan_agenda_mengajar;      
                     
            $sub_array[] = '
                            <form action="akademik-absensi-siswa" method="get">
                            <input type="hidden" name="id_agenda_mengajar" value="'.$row->id_agenda_mengajar.'">
                            <button type="submit" class="badge badge-primary badge-sm border-0" style="margin: 2px;"title="Input Absensi"><i class="fa fa-fw fa-list"></i></button>
                            </form>
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

    public function queryAllSiswaKelas()
    {
        $where = [
                    "id_kelas" => $this->input->post('id_kelas'),
                    "id_agenda_mengajar" => $this->input->post('id_agenda_mengajar')
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
            'agenda_mengajar.id_agenda_mengajar',                         
            'agenda_mengajar.keterangan_agenda_mengajar',                         
            'absensi.id_absensi',                         
            'absensi.kehadiran_absensi'                         
                   
        ];

        $order_column = [
            null,
            'siswa.nis_siswa',  
            'siswa.nisn_siswa',  
            'siswa.nama_siswa',  
            'siswa.jenis_kelamin_siswa',
            null
        ];
      
        $this->load->model('admin/Input_absensi_model');
        $fetch_data = $this->Input_absensi_model->buatDataTables($tabel,$select_column,$order_column,$where);
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
            if($row->kehadiran_absensi == ''){
                $selected = '
                    <option value="" selected></option>
                    <option value="Hadir">Hadir</option>
                    <option value="Ijin">Ijin</option>
                    <option value="Sakit">Sakit</option>
                    <option value="Alpa">Alpa</option>
                ';
                $style = 'style="background-color:white;color:black;"';
            }else if($row->kehadiran_absensi == 'Hadir'){
                $selected = '
                    <option value=""></option>
                    <option value="Hadir" selected>Hadir</option>
                    <option value="Ijin">Ijin</option>
                    <option value="Sakit">Sakit</option>
                    <option value="Alpa">Alpa</option>
                ';
                $style = 'style="background-color:green;color:white"';
            }else if($row->kehadiran_absensi == 'Ijin'){
                $selected = '
                    <option value=""></option>
                    <option value="Hadir">Hadir</option>
                    <option value="Ijin" selected>Ijin</option>
                    <option value="Sakit">Sakit</option>
                    <option value="Alpa">Alpa</option>
                ';
                $style = 'style="background-color:orange;color:black;"';
            }else if($row->kehadiran_absensi == 'Sakit'){
                $selected = '
                    <option value=""></option>
                    <option value="Hadir">Hadir</option>
                    <option value="Ijin">Ijin</option>
                    <option value="Sakit" selected>Sakit</option>
                    <option value="Alpa">Alpa</option>
                ';
                $style = 'style="background-color:yellow;color:black"';
            }else if($row->kehadiran_absensi == 'Alpa'){
                $selected = '
                    <option value=""></option>
                    <option value="Hadir">Hadir</option>
                    <option value="Ijin">Ijin</option>
                    <option value="Sakit">Sakit</option>
                    <option value="Alpa" selected>Alpa</option>
                ';
                $style = 'style="background-color:red;color:white"';
            }
                     
            $sub_array[] = '
                            
                            <input type="hidden" name="id_siswa" value="'.$row->id_siswa.'">                          
                            <select name="kehadiran_absensi" id="select-'.$nourut.'" onChange="ubahWarna('.$nourut.')" '.$style.'>
                                '.$selected.'
                            </select>
                            
                            ';
            $sub_array[] = $row->keterangan_agenda_mengajar;
            $data[] = $sub_array;

            $nourut++;
        }

        $output = [
            'draw'              =>  intval($_POST['draw']),
            'recordsTotal'      =>  $this->Input_absensi_model->getAllData($tabel,$where),
            'recordsFiltered'   =>  $this->Input_absensi_model->getFilteredData($tabel,$select_column,$order_column,$where),
            'data'              =>  $data
        ];

        echo json_encode($output);
      
    }




  

}