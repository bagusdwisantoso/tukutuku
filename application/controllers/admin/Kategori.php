<?php

class Kategori extends CI_Controller{

	public function __construct(){
        parent::__construct();

        if($this->session->userdata('role') != 'admin'){
            $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Anda Belum Login!
            </div>');
            redirect(base_url('admin/auth_admin/login'));
        }
    }

    public function index()
    {
        $data['kategori'] = $this->model_app->tampil_kategori();
        
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar_kategori');
        $this->load->view('admin/kategori', $data);
        $this->load->view('templates_admin/footer');
    }

    public function tambah_aksi()
	{
		$nama_kategori          = $this->input->post('nama_kategori');
		$data = array(
            'nama_kategori'     => $nama_kategori
		);
		$this->model_app->tambah_data($data,'tb_kategori');
		redirect(base_url('admin/kategori'));
	}

    public function update(){   
		
		$id				 = $this->input->post('id_kategori');
		$nama_kategori   = $this->input->post('nama_kategori');
  
		$data = array(
			'nama_kategori'           => $nama_kategori
		);
		$where = array('id_kategori' => $id);
		$this->model_produk->update_data($where,$data,'tb_kategori');
		redirect(base_url('admin/kategori'));
	}

    public function hapus($id){
        $this->model_produk->hapus_data('tb_kategori',array('id_kategori'=>$id));
        redirect(base_url('admin/kategori'));
	}

}