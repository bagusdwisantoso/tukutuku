<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Banner extends CI_Controller {

    public function index(){

        $data['banner'] = $this->model_app->tampil('tb_banner');

        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/banner', $data);
        $this->load->view('templates_admin/footer');
    }

    public function tambah_aksi()
	{
		$config['upload_path']   	= './img/banner/';
        $config['allowed_types'] 	= 'jpg|jpeg|png|gif|ico|jfif';
        $config['max_size']         = '2000';
        
        $this->upload->initialize($config);
        $field_name = 'nama_banner';
        if(!$this->upload->do_upload($field_name)){
            echo "Gambar gagal diupload !";
        }else{
            $upload_data                = array('uploads' => $this->upload->data());
            $config['image_library']    = 'gd2';
            $config['source_image']     = './img/banner/'.$upload_data['uploads']['file_name'];

            $this->load->library('image_lib', $config);
            $data = array(
                'nama_banner'   =>  $upload_data['uploads']['file_name'],
             );
        }
		$this->model_app->tambah_data($data,'tb_banner');
		redirect(base_url('admin/banner'));
	}

    public function hapus($id){
        $detail = $this->model_produk->dapat_data($id);
        $path   = './img/banner/'.$detail->nama_banner;
        unlink($path); 
        $this->model_produk->hapus_data('tb_banner',array('id_banner'=>$id));
        redirect(base_url('admin/banner'));
	}
}