<?php

class Pesanan extends CI_Controller{

    public function __construct(){
        parent::__construct();

        if($this->session->userdata('role') != 'seller'){
            $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Anda Belum Login!
            </div>');
            redirect(base_url('toko/auth_toko/login'));
        }
    }

    public function index(){
        $data['invoice3'] = $this->model_pesanan->daftar_pesanan_toko_dikemas();
        $data['invoice4'] = $this->model_pesanan->daftar_pesanan_toko_dikirim();
        $data['invoice5'] = $this->model_pesanan->daftar_pesanan_toko_selesai();
        $data['jumlah3']  = count($data['invoice3']);
        $data['jumlah4']  = count($data['invoice4']);
        $data['jumlah5']  = count($data['invoice5']);
        $this->load->view('templates_toko/header');
        $this->load->view('templates_toko/sidebar');
        $this->load->view('toko/pesanan',$data);
        $this->load->view('templates_toko/footer');
    }

    public function detail($id_order){
        $data['invoice'] = $this->model_invoice->ambil_id_invoice($id_order);
        $data['pesanan'] = $this->model_invoice->ambil_id_pesanan($id_order);
        $this->load->view('templates_toko/header');
        $this->load->view('templates_toko/sidebar');
        $this->load->view('toko/detail_pesanan', $data);
        $this->load->view('templates_toko/footer');
    }

    public function dikirim($id_order){
        $data       = array(
            'id_order'      => $id_order,
			'status'        => '4'
		);
		$this->model_pesanan->update_status($data);
        $this->session->set_flashdata('pesan', 'Status Pesanan Menjadi Dikirim');
		redirect(base_url('toko/pesanan'));
    }
}