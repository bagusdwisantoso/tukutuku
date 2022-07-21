<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Dashboard_admin extends CI_Controller{

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
        $tahun                      = date('Y');
        $bulan                      = date('m');
        $data['pendapatan_bulan']   = $this->model_dashboard->pendapatan_bulan($bulan,$tahun);
        $data['pendapatan_tahun']   = $this->model_dashboard->pendapatan_tahun($tahun);
        $data['jumlah_produk']      = $this->model_dashboard->jumlah_produk();
        $data['data_verif']         = $this->model_dashboard->menunggu_verif();
        $data['grafik']             = $this->model_dashboard->grafik($tahun);
        $data['bar']                = $this->model_dashboard->barchart();
        $data['pie']                = $this->model_dashboard->piechart();  

        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/dashboard',$data);
        $this->load->view('templates_admin/footer');
    }
}