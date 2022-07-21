<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Registrasi extends CI_Controller{

    public function index()
    {
        $this->form_validation->set_rules('nama_customer',' nama_customer', 'required', [
            'required'  => "nama customer wajib diisi!"
        ]);
        $this->form_validation->set_rules('email_customer',' email_customer', 'required', [
            'required'  => "email customer wajib diisi!"
        ]);
        $this->form_validation->set_rules('password_1',' Password', 'required|matches[password_2]');
        $this->form_validation->set_rules('password_2',' Password', 'required|matches[password_1]', [
            'required'  => "Password wajib diisi!",
            'matches'   => "Password yang Anda masukan tidak sama!"
        ]);

        if($this->form_validation->run() == FALSE){
            $data['provinsi'] = $this->model_app->tampil_data();
            $this->load->view('templates/header');
            $this->load->view('registrasi',$data);
            // $this->load->view('templates/footer');
        } else{
            $data = array(
                'nama_customer'               =>  $this->input->post('nama_customer'),
                'email_customer'              =>  $this->input->post('email_customer'),
                'password_customer'           =>  $this->input->post('password_1'),
                'role'                        =>  "customer",
                'tanggal_daftar_customer'     =>  date('Y-m-d H:i:s')
            );
            $this->db->insert('tb_customer',$data);
            redirect(base_url('auth/login'));
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
          $lists .= "<option value='".$kta->kota_id."'>".$kta->nama_customer_kota."</option>"; // Tambahkan tag option ke variabel $lists
        }
        
        $callback = array('list_kota'=>$lists); // Masukan variabel lists tadi ke dalam array $callback dengan index array : list_kota
        echo json_encode($callback); // konversi varibael $callback menjadi JSON
    }
}