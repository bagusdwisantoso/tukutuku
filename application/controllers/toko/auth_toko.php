<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_toko extends CI_Controller {

    public function login()
    {
        $this->form_validation->set_rules('email','email', 'required', [
            'required'  =>  'Email wajib diisi'
        ]);
        $this->form_validation->set_rules('password','password', 'required', [
            'required'  =>  'Password wajib diisi'
        ]);
        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('templates_toko/header');
            $this->load->view('toko/form_login');
            // $this->load->view('templates_toko/footer');
        }else{
            $auth = $this->model_auth_toko->cek_login();

            if($auth == FALSE)
            {
                $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Email atau Password Anda Salah!
                </div>');
                redirect(base_url('toko/auth_toko/login'));
                }else {
                    $this->session->set_userdata('email', $auth->email);
                    $this->session->set_userdata('id_toko', $auth->id_toko);
                    $this->session->set_userdata('nama_toko', $auth->nama_toko);
                    $this->session->set_userdata('foto_toko', $auth->foto_toko);
                    $this->session->set_userdata('role', $auth->role);
                    redirect(base_url('toko/dashboard_toko'));
                }
            }
        }

        public function logout()
        {
            $this->session->sess_destroy();
            redirect(base_url('toko/auth_toko/login'));
        }
    }