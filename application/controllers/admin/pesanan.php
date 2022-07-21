<?php

class Pesanan extends CI_Controller{

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
        $data['invoice'] = $this->model_pesanan->view_join('tb_invoice','tb_status','status','id_status');
        
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/data_pesanan', $data);
        $this->load->view('templates_admin/footer');
    }

}