<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Dashboard_toko extends CI_Controller{

    public function __construct(){
        parent::__construct();

        if($this->session->userdata('role') != 'seller'){
            $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Anda Belum Login!
            </div>');
            redirect(base_url('toko/auth_toko/login'));
        }
    }

    public function index()
    {
        $tanggal                    = date("Y-m-d");
        $tahun                      = date('Y');
        $bulan                      = date('m');
        $data['pendapatan_harian']  = $this->model_dashboard->pendapatan_harian_toko($tanggal);
        $data['pendapatan_bulan']   = $this->model_dashboard->pendapatan_bulan_toko($bulan,$tahun);
        $data['pendapatan_tahun']   = $this->model_dashboard->pendapatan_tahun_toko($tahun);
        $data['jumlah_produk']      = $this->model_dashboard->jumlah_produk_toko();
        $data['produk_unverif']     = $this->model_dashboard->belum_verif_toko();
        $data['produk_verif']       = $this->model_dashboard->verif_toko();
        $data['produk_publish']     = $this->model_dashboard->publish_toko();
        $data['grafik']             = $this->model_dashboard->grafik_toko($tahun);
        $data['terlaris']           = $this->model_dashboard->terlaris();
        $this->load->view('templates_toko/header');
        $this->load->view('templates_toko/sidebar');
        $this->load->view('toko/dashboard',$data);
        $this->load->view('templates_toko/footer');
    }
}