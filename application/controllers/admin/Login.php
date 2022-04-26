<?php

class Login extends CI_Controller{
    
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        if($this->session->userdata('user') != null){
            redirect(base_url().'beranda-admin');
            die();
        }

        // $this->form_validation->set_rules('username','Username','trim|required');
        // $this->form_validation->set_rules('password','Password','trim|required');

        // if($this->form_validation->run() == false){

            $this->load->model('admin/Pengaturan_model');
            $data['pengaturan'] = $this->Pengaturan_model->getPengaturanById(); 
    
            $this->load->view('admin/templates/header_login',$data);
            $this->load->view('admin/login/login',$data); 
            $this->load->view('admin/templates/footer_login');
        // }else{
        //     cek_user();
        // }
        
    }

    public function cek_user(){
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $this->load->model('admin/Pengguna_model');        
        $user = $this->Pengguna_model->cekUser($username);

        if($user){
            if(password_verify($password,$user['password'])){
                $level = strtolower($user['level']);
                $dt = [
                    'level' => $level,
                    'id_'.$level => $user['id_grup_pengguna']
                ];
                $data = $this->Pengguna_model->queryById($dt);
                $insert = $this->Pengguna_model->setWaktuLogin($data);
                $userdata = [
                    'user' => $data
                ];                
                $this->session->set_userdata($userdata);
                $data = [
                    'status' => 'success',
                    'title' => 'Berhasil',
                    'pesan' => 'Anda berhasil login...!'
                ];

                //jika user adalah siswa
                if($_SESSION['user']['level'] == 'Siswa' ){
                    date_default_timezone_set('Asia/Jakarta');
                    $tgl=date('Y-m-d');
                    $kelas = $_SESSION['user']['kelas']; 
                    $id_siswa = $_SESSION['user']['id_siswa']; 
                    //cari agenda berdasarkan tanggal & kelas
                    $this->load->model('admin/Agenda_mengajar_model');
                    $id_agenda_mengajar = $this->Agenda_mengajar_model->getAgendaByTglAndKelas($tgl,$kelas);
                                        
                    $this->load->model('admin/Input_absensi_model');
                    $input_absensi = $this->Input_absensi_model->inputAbsensiWhenLogin($id_siswa,$id_agenda_mengajar);
                }
            }else{
                $data = [
                    'status' => 'error',
                    'title'  => 'Gagal',
                    'pesan' => 'Password salah...!'
                ];
            }
        }else{
            $data = [
                'status' => 'error',
                'title'  => 'Gagal',
                'pesan' => 'Username tidak ditemukan...!'
            ];
        }

        echo json_encode($data);
    }


    public function logout(){
        if($this->session->userdata('user') == null){
            redirect(base_url().'login-user');
            die();
        }

        $this->session->unset_userdata('user');        
        redirect('login-user');
    }


}