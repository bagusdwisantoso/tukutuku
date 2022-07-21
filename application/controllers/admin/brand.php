<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Brand extends CI_Controller {

    public function index(){

        $data['brand'] = $this->model_app->tampil('tb_brand');

        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/brand', $data);
        $this->load->view('templates_admin/footer');
    }

    public function tambah_aksi()
	{
		$config['upload_path']   	= './img/brand/';
        $config['allowed_types'] 	= 'jpg|jpeg|png|gif|ico|jfif';
        $config['max_size']         = '2000';

        $this->upload->initialize($config);
        $field_name = 'nama_brand';
        if(!$this->upload->do_upload($field_name)){
            echo "Gambar gagal diupload !";
        }else{
            $upload_data = array('uploads' => $this->upload->data());
            $config['image_library']    = 'gd2';
            $config['source_image']     = './img/brand/'.$upload_data['uploads']['file_name'];

            $this->load->library('image_lib', $config);
            $data = array(
                'nama_brand'   =>  $upload_data['uploads']['file_name'],
             );
        }
		$this->model_app->tambah_data($data,'tb_brand');
		redirect(base_url('admin/brand'));
	}

    public function hapus($id){
        $detail = $this->model_produk->dapat_data($id);
        $path   = './img/brand/'.$detail->nama_brand;
        unlink($path); 
        $this->model_produk->hapus_data('tb_brand',array('id_brand'=>$id));
        redirect(base_url('admin/brand'));
	}
}