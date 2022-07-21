<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_admin extends CI_Controller {

    public function login()
    {
        $this->form_validation->set_rules('email_admin','email_admin', 'required', [
            'required'  =>  'Email wajib diisi'
        ]);
        $this->form_validation->set_rules('password_admin','password_admin', 'required', [
            'required'  =>  'Password wajib diisi'
        ]);
        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('templates_admin/header');
            $this->load->view('admin/form_login');
            // $this->load->view('templates_admin/footer');
        }else{
            $auth = $this->model_auth_admin->cek_login();

            if($auth == FALSE)
            {
                $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Email atau Password Anda Salah!
                </div>');
                redirect(base_url('admin/auth_admin/login'));
                }else {
                    $this->session->set_userdata('email_admin', $auth->email_admin);
                    $this->session->set_userdata('nama_admin', $auth->nama_admin);
                    $this->session->set_userdata('role', $auth->role);
                    redirect(base_url('admin/dashboard_admin'));
                }
            }
        }

        public function logout()
        {
            $this->session->sess_destroy();
            redirect(base_url('admin/auth_admin/login'));
        }
    }