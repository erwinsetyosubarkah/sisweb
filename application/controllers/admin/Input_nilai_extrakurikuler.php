<?php 



class Input_nilai_extrakurikuler extends CI_Controller{
    
    
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
            $this->load->view('admin/input_nilai_extrakurikuler/input_nilai_extrakurikuler',$data); 
            $this->load->view('admin/templates/footer');
        
    }

 
    public function inputNilaiExtrakurikuler()
    {
        $data1 = $_POST['nilai'];
        
        $tabel = 'nilai_extrakurikuler';
        
        $this->load->model('admin/Input_nilai_extrakurikuler_model');       
        $status = $this->Input_nilai_extrakurikuler_model->inputNilaiExtrakurikuler($data1,$tabel);
       
       
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


    public function queryAllSiswaKelas()
    {
        $where = [
                    "id_kelas" => $_POST['id_kelas']
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
            'nilai_extrakurikuler.id_nilai_extrakurikuler',                         
            'nilai_extrakurikuler.nama_extrakurikuler',                       
            'nilai_extrakurikuler.nilai_extrakurikuler'                         
                                    
                   
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
      
        $this->load->model('admin/Input_nilai_extrakurikuler_model');
        $fetch_data = $this->Input_nilai_extrakurikuler_model->buatDataTables($tabel,$select_column,$order_column,$where);
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
                            
                            <input type="hidden" name="id_siswa" value="'.$row->id_siswa.'">
                            
                            <input type="text" name="nama_extrakurikuler" value="'.$row->nama_extrakurikuler.'" class="text-center">
                            
                            ';

                            if($row->nilai_extrakurikuler == ''){
                                $selected = '
                                    <option value="" selected></option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                    <option value="D">D</option>
                                ';
                            }else if($row->nilai_extrakurikuler == 'A'){
                                $selected = '
                                    <option value=""></option>
                                    <option value="A" selected>A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                    <option value="D">D</option>
                                ';
                            }else if($row->nilai_extrakurikuler == 'B'){
                                $selected = '
                                    <option value=""></option>
                                    <option value="A">A</option>
                                    <option value="B" selected>B</option>
                                    <option value="C">C</option>
                                    <option value="D">D</option>
                                ';
                            }else if($row->nilai_extrakurikuler == 'C'){
                                $selected = '
                                    <option value=""></option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C" selected>C</option>
                                    <option value="D">D</option>
                                ';
                            }else if($row->nilai_extrakurikuler == 'D'){
                                $selected = '
                                    <option value=""></option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                    <option value="D" selected>D</option>
                                ';
                            }
                                     

            $sub_array[] = ' 
                            <select name="nilai_extrakurikuler">
                            '.$selected.'
                            </select>
                            
                            ';
            $data[] = $sub_array;

            $nourut++;
        }

        $output = [
            'draw'              =>  intval($_POST['draw']),
            'recordsTotal'      =>  $this->Input_nilai_extrakurikuler_model->getAllData($tabel,$where),
            'recordsFiltered'   =>  $this->Input_nilai_extrakurikuler_model->getFilteredData($tabel,$select_column,$order_column,$where),
            'data'              =>  $data
        ];

        echo json_encode($output);
      
    }




  

}