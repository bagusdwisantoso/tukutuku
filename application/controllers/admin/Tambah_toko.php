<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tambah_toko extends CI_Controller{


	public function __construct(){
        parent::__construct();

        if($this->session->userdata('role') != 'admin'){
            $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Anda Belum Login!
            </div>');
            redirect(base_url('admin/auth_admin/login'));
        }
    }
	
    public function index(){
        $data['kota']       = $this->model_app->tampil_kota();
        $data['provinsi']   = $this->model_app->tampil_data();
        
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar_tambahtoko');
        $this->load->view('admin/tambah_toko', $data);
        $this->load->view('templates_admin/footer');
    }

    public function tambah_toko()   
	{
        // $foto_toko          = $_FILES['foto_toko']['name'];
        $config['upload_path']   	= './img/foto_toko/';
        $config['allowed_types'] 	= 'jpg|jpeg|png|gif|ico|jfif';
        $config['max_size']         = '2000';
        $this->upload->initialize($config);
        $field_name = 'foto_toko';
        if(!$this->upload->do_upload($field_name)){
            echo "Gagal tambah Toko !";
        }else{
            $upload_data                = array('uploads' => $this->upload->data());
            $config['image_library']    = 'gd2';
            $config['source_image']     = './img/foto_toko/'.$upload_data['uploads']['file_name'];
            $this->load->library('image_lib', $config);
            $nama_toko		    = $this->input->post('nama_toko');
            $deskripsi_toko	    = $this->input->post('deskripsi_toko');
            $kota_id            = $this->input->post('kota_id');
            $alamat_toko	    = $this->input->post('alamat_toko');
            $nama_owner		    = $this->input->post('nama_owner');
            $jenis_kelamin		= $this->input->post('jenis_kelamin');
            $tgl_lahir		    = $this->input->post('tgl_lahir');
            $no_telp_owner		= $this->input->post('no_telp_owner');
            $nama_rekening	    = $this->input->post('nama_rekening');
            $no_rekening		= $this->input->post('no_rekening');
            $nama_bank		    = $this->input->post('nama_bank');
            $email		        = $this->input->post('email');
            $password		    = $this->input->post('password');
        
            $data = array(
                'nama_toko' 		    => $nama_toko,
                'kota_id'               => $kota_id,
                'alamat_toko'           => $alamat_toko,
                'tanggal_daftar_toko'   => date('Y-m-d H:i:s'),
                'deskripsi_toko'        => $deskripsi_toko,
                'foto_toko'             => $upload_data['uploads']['file_name'],
                'nama_owner'            => $nama_owner,
                'jenis_kelamin'         => $jenis_kelamin,
                'tgl_lahir'             => $tgl_lahir,
                'no_telp_owner'         => $no_telp_owner,
                'nama_rekening'         => $nama_rekening,      
                'no_rekening'           => $no_rekening,
                'nama_bank'             => $nama_bank,
                'email'                 => $email,
                'password'              => $password
            );
		    $this->model_toko->tambah_toko($data,'tb_toko');
		    redirect(base_url('admin/toko'));
        }
	}

    public function listKota(){
        // Ambil data ID Provinsi yang dikirim via ajax post
        $provinsi_id = $this->input->post('provinsi_id');
        
        $kota = $this->model_app->viewByProvinsi($provinsi_id);
        
        // Buat variabel untuk menampung tag-tag option nya
        // Set defaultnya dengan tag option Pilih
        $lists = "<option value=''>- Pilih -</option>";
        
        foreach($kota as $kta){
          $lists .= "<option value='".$kta->kota_id."'>".$kta->nama_kota."</option>"; // Tambahkan tag option ke variabel $lists
        }
        $callback = array('list_kota'=>$lists); // Masukan variabel lists tadi ke dalam array $callback dengan index array : list_kota
        echo json_encode($callback); // konversi varibael $callback menjadi JSON
    }
}