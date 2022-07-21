<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function login()
    {
        $this->form_validation->set_rules('email_customer','email_customer', 'required', [
            'required'  =>  'Email wajib diisi'
        ]);
        $this->form_validation->set_rules('password_customer','password_customer', 'required', [
            'required'  =>  'Password wajib diisi'
        ]);
        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('templates/header'); // CATATAN UNTUK BAGUS
            $this->load->view('form_login');
            // $this->load->view('templates/footer');
        }else{
            $auth = $this->model_auth->cek_login();

            if($auth == FALSE)
            {
                $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Email atau Password Anda Salah!
                </div>');
                redirect(base_url('auth/login'));
                }else {
                    $this->session->set_userdata('email_customer', $auth->email_customer);
                    $this->session->set_userdata('nama_customer', $auth->nama_customer);
                    $this->session->set_userdata('id_customer', $auth->id_customer);
                    $this->session->set_userdata('role', $auth->role);
                    redirect(base_url('welcome'));
                }
            }
        }

        public function logout()
        {
            $this->session->sess_destroy();
            redirect(base_url('auth/login'));
        }
    }