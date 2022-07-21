<?php

class Invoice extends CI_Controller{

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
        $data['invoice']    = $this->model_pesanan->daftar_pesanan_admin_belum_bayar(); 
        $data['invoice2']   = $this->model_pesanan->daftar_pesanan_admin_menunggu_verifikasi();
        $data['invoice3']   = $this->model_pesanan->daftar_pesanan_admin_dikemas();
        $data['invoice4']   = $this->model_pesanan->daftar_pesanan_admin_dikirim();
        $data['invoice5']   = $this->model_pesanan->daftar_pesanan_admin_selesai();
        $data['jumlah']     = count($data['invoice']);
        $data['jumlah2']    = count($data['invoice2']);
        $data['jumlah3']    = count($data['invoice3']);
        $data['jumlah4']    = count($data['invoice4']);
        $data['jumlah5']    = count($data['invoice5']);

        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/invoice', $data);
        $this->load->view('templates_admin/footer');
    }
    
    public function detail($id_order){
        $data['invoice'] = $this->model_invoice->ambil_id_invoice($id_order);
        $data['pesanan'] = $this->model_invoice->ambil_id_pesanan($id_order);
        // $data['invoice'] = $this->model_pesanan->detail_pesanan_join($id_order);
        
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/detail_aksi_invoice', $data);
        $this->load->view('templates_admin/footer');

    }

    public function update_status(){
        $id_order	= $this->input->post('id_order');
		$data       = array(
			'status'        => '2'
		);
		$where = array('id_order' => $id_order);
		$this->model_invoice->update_data($where,$data,'tb_pesanan');
		redirect(base_url('admin/invoice'));
    }

    public function verifikasi_pembayaran($id_order){

		$data       = array(
            'id_order'      => $id_order,
			'status'        => '3'
		);
		$this->model_pesanan->update_status($data);
        $this->session->set_flashdata('pesan', 'Pembayaran Berhasil Di Verifikasi');
		redirect(base_url('admin/invoice'));
    }
}