<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Toko extends CI_Controller{


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
        $data['toko'] = $this->model_toko->view_join('tb_toko','tb_kota','kota_id','kota_id');

        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar_daftartoko');
        $this->load->view('admin/data_toko', $data);
        $this->load->view('templates_admin/footer');
    }

    public function detail($id_toko){
        $data['toko'] = $this->model_toko->detail_toko($id_toko);

        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar_daftartoko');
        $this->load->view('admin/detail_toko',$data);
        $this->load->view('templates_admin/footer');
    }

    public function hapus($id_toko){
        
		$this->load->model('model_produk');
	    $detail = $this->model_toko->dapat_data($id_toko);
        $path   = './img/foto_toko/'.$detail->foto_toko;
        unlink($path); 

        $this->model_toko->hapus_data('tb_toko',array('id_toko'=>$id_toko));
        redirect(base_url('admin/toko'));
	}

	public function edit($id_toko)
	{
		$where              = array('id_toko' =>$id_toko);
		$data['toko']       = $this->model_toko->edit_toko($where,'tb_toko')->result();
        $data['kota']       = $this->model_app->tampil_kota();
        $data['provinsi']   = $this->model_app->tampil_data();
        
		$this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/edit_toko', $data);
        $this->load->view('templates_admin/footer');
	}

	public function update(){
		
		$id_toko			= $this->input->post('id_toko');
		$email              = $this->input->post('email');
		$password	        = $this->input->post('password');
        // $tgl_lahir	        = $this->input->post('tgl_lahir');
        // $kota               = $this->input->post('kota');
        $alamat_toko	    = $this->input->post('alamat_toko');
        $no_telp_owner	    = $this->input->post('no_telp_owner');
        $deskripsi_toko	    = $this->input->post('deskripsi_toko');

		$data = array(
			'email' 	       => $email,
			'password' 		   => $password,
            // 'tgl_lahir'        => $tgl_lahir,
            // 'kota'             => $kota,
            'alamat_toko'      => $alamat_toko,
            'no_telp_owner'    => $no_telp_owner,
            'deskripsi_toko'   => $deskripsi_toko
		);

		$where = array('id_toko' => $id_toko);

		$this->model_toko->update_data($where,$data,'tb_toko');
		redirect(base_url('admin/toko'));
	}

    public function update_gambar(){
        $id_toko                    = $this->input->post('id_toko');
        $config['upload_path']   	= './img/foto_toko/';
        $config['allowed_types'] 	= 'jpg|jpeg|png|gif|ico|jfif';
        $config['max_size']         = '2000';
        $this->upload->initialize($config);
        $field_name = 'foto_toko';
        if(!$this->upload->do_upload($field_name)){
            echo "Gagal tambah Toko !";
        }else{
            $detail     = $this->model_toko->dapat_data($id_toko);
            $path       = './img/foto_toko/'.$detail->foto_toko;
            unlink($path);
            $upload_data                = array('uploads' => $this->upload->data());
            $config['image_library']    = 'gd2';
            $config['source_image']     = './img/foto_toko/'.$upload_data['uploads']['file_name'];
            $this->load->library('image_lib', $config);
           
        
            $data = array(
                'foto_toko'             => $upload_data['uploads']['file_name'],
            );

            $where = array('id_toko' => $id_toko);

            $this->model_toko->update_data($where,$data,'tb_toko');
            redirect(base_url('admin/toko/edit/').$id_toko );
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