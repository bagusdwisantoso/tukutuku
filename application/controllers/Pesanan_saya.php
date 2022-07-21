<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pesanan_saya extends CI_Controller{

    public function __construct(){
        parent::__construct();

        if($this->session->userdata('role') != 'customer'){
            $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Anda Belum Login!
            </div>');
            redirect(base_url('auth/login'));
        }
    }

    public function index(){
        $customer = $this->db->get_where('tb_customer', ['email_customer' => $this->session->userdata('email_customer')])->row_array();
        if($customer){
            $kategori           = $this->input->get('kat');
            $data['total_cart'] = $this->model_app->total_cart($customer['id_customer'])->row_array();
            $data['kategori']   = $this->model_app->tampil_kategori();
            $data['produk']     = $this->model_app->kategori($kategori)->result();
            $data['invoice']    = $this->model_pesanan->belum_bayar();
            $data['invoice2']   = $this->model_pesanan->menunggu_verifikasi();
            $data['invoice3']   = $this->model_pesanan->dikemas();
            $data['invoice4']   = $this->model_pesanan->dikirim();
            $data['invoice5']   = $this->model_pesanan->selesai();
            $data['jumlah']     = count($data['invoice']);
            $data['jumlah2']    = count($data['invoice2']);
            $data['jumlah3']    = count($data['invoice3']);
            $data['jumlah4']    = count($data['invoice4']);
            $data['jumlah5']    = count($data['invoice5']);

            $this->load->view('templates_new/new_header',$data);
            // $this->load->view('templates/sidebar');
            $this->load->view('v_pesanan_saya', $data);
            $this->load->view('templates_new/new_footer');
        }else{
            $kategori           = $this->input->get('kat');
            $data['kategori']   = $this->model_app->tampil_kategori();
            $data['produk']     = $this->model_app->kategori($kategori)->result();
            $data['invoice']    = $this->model_pesanan->belum_bayar();
            $data['invoice2']   = $this->model_pesanan->menunggu_verifikasi();
            $data['invoice3']   = $this->model_pesanan->dikemas();
            $data['invoice4']   = $this->model_pesanan->dikirim();
            $data['invoice5']   = $this->model_pesanan->selesai();
            $data['jumlah']     = count($data['invoice']);
            $data['jumlah2']    = count($data['invoice2']);
            $data['jumlah3']    = count($data['invoice3']);
            $data['jumlah4']    = count($data['invoice4']);
            $data['jumlah5']    = count($data['invoice5']);

            $this->load->view('templates_new/new_header',$data);
            // $this->load->view('templates/sidebar');
            $this->load->view('v_pesanan_saya', $data);
            $this->load->view('templates_new/new_footer');
        }
    }

    public function bayar($id_order){   

        $customer = $this->db->get_where('tb_customer', ['email_customer' => $this->session->userdata('email_customer')])->row_array();
        if($customer){
            $this->form_validation->set_rules('atas_nama','Atas Nama','required', array(
                'required' => '%s Harus Diisi !!'
            ));
            $config['upload_path']   	= './assets/bukti_bayar/';
            $config['allowed_types'] 	= 'jpg|jpeg|png|gif|ico|jfif';
            $config['max_size']         = '2000';
            $this->upload->initialize($config);
            $field_name = 'bukti_bayar';
            if(!$this->upload->do_upload($field_name)){
                $kategori               = $this->input->get('kat');
                $data['total_cart']     = $this->model_app->total_cart($customer['id_customer'])->row_array();
                $data['kategori']       = $this->model_app->tampil_kategori();
                $data['produk']         = $this->model_app->kategori($kategori)->result();
                $data['pesanan']        = $this->model_pesanan->detail_pesanan($id_order);
                $data['rekening']       = $this->model_pesanan->rekening();
                $data['error_upload']   = $this->upload->display_errors();

                $this->load->view('templates_new/new_header',$data);
                // $this->load->view('templates/sidebar');
                $this->load->view('v_bayar', $data);
                $this->load->view('templates_new/new_footer');
            }else{
                $upload_data                = array('uploads' => $this->upload->data());
                $config['image_library']    = 'gd2';
                $config['source_image']     = './assets/bukti_bayar/'.$upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);
                $nama_bank       = $this->input->post('nama_bank');
                $no_rek          = $this->input->post('no_rek');
                $atas_nama       = $this->input->post('atas_nama');
                $data = array(
                    'id_order'      =>  $id_order,
                    'nama_bank'     =>  $nama_bank,
                    'no_rek'        =>  $no_rek,
                    'atas_nama'     =>  $atas_nama,
                    'status'        =>  2,
                    'bukti_bayar'   =>  $upload_data['uploads']['file_name'],
                );
                $this->model_pesanan->upload_buktibayar($data);
                $this->session->set_flashdata('pesan','Bukti Pembayaran Berhasil di Upload !');
                redirect(base_url('pesanan_saya'));
            }
        }else{
            $kategori               = $this->input->get('kat');
            $data['kategori']       = $this->model_app->tampil_kategori();
            $data['produk']         = $this->model_app->kategori($kategori)->result();
            $data['pesanan']        = $this->model_pesanan->detail_pesanan($id_order);
            $data['rekening']       = $this->model_pesanan->rekening();
            $data['error_upload']   = $this->upload->display_errors();

            $this->load->view('templates_new/new_header',$data);
            // $this->load->view('templates/sidebar');
            $this->load->view('v_bayar', $data);
            $this->load->view('templates_new/new_footer');
        }
    }

    public function detail($id_order){ // detail pesanan Customer
        $customer = $this->db->get_where('tb_customer', ['email_customer' => $this->session->userdata('email_customer')])->row_array();
        if($customer){
            $kategori           = $this->input->get('kat');
            $data['total_cart'] = $this->model_app->total_cart($customer['id_customer'])->row_array();
            $data['kategori']   = $this->model_app->tampil_kategori();
            $data['produk']     = $this->model_app->kategori($kategori)->result();
            $data['invoice']    = $this->model_invoice->ambil_id_invoice($id_order);
            $data['pesanan']    = $this->model_invoice->ambil_id_pesanan($id_order);
            // $data['invoice'] = $this->model_pesanan->detail_pesanan_join($id_order);

            $this->load->view('templates_new/new_header',$data);
            // $this->load->view('templates/sidebar');
            $this->load->view('v_invoice', $data);
            $this->load->view('templates_new/new_footer');
        }else{
            $kategori           = $this->input->get('kat');
            $data['kategori']   = $this->model_app->tampil_kategori();
            $data['produk']     = $this->model_app->kategori($kategori)->result();
            $data['invoice']    = $this->model_invoice->ambil_id_invoice($id_order);
            $data['pesanan']    = $this->model_invoice->ambil_id_pesanan($id_order);
            // $data['invoice'] = $this->model_pesanan->detail_pesanan_join($id_order);
            
            $this->load->view('templates_new/new_header',$data);
            // $this->load->view('templates/sidebar');
            $this->load->view('v_invoice', $data);
            $this->load->view('templates_new/new_footer');
        }

    }

    public function pesanan_diterima($id_order){

		$data       = array(
            'id_order'      => $id_order,
			'status'        => '5'
		);
		$this->model_pesanan->update_status($data);
        $this->session->set_flashdata('pesan', 'Status Pesanan Anda Menjadi Selesai');
		redirect(base_url('pesanan_saya'));
    }
}