<?php

class Data_produk extends CI_Controller{

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
        $data['produk']         = $this->model_produk->produk_menunggu_verifikasi();
        $data['produk2']        = $this->model_produk->produk_belum_publish();
        $data['produk3']        = $this->model_produk->produk_sedang_publish();
        $data['jumlah']         = count($data['produk']);
        $data['jumlah2']        = count($data['produk2']);
        $data['jumlah3']        = count($data['produk3']);
        $data['total_produk']   = $data['jumlah'] + $data['jumlah2'] + $data['jumlah3'];
        $data['toko']           = $this->model_toko->tampil_data();
        $data['kategori']       = $this->model_app->tampil_kategori();

        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar_daftarproduk');
        $this->load->view('admin/data_produk', $data);
        $this->load->view('templates_admin/footer');
    }

    public function tambah_aksi()
	{
		$config['upload_path']   	= './img/gambar_produk/';
        $config['allowed_types'] 	= 'jpg|jpeg|png|gif|ico|jfif';
        $config['max_size']         = '2000';
        $this->upload->initialize($config);
        $field_name = 'gambar_produk';
        if(!$this->upload->do_upload($field_name)){
            echo "Gagal tambah Produk !";
        }else{
            $upload_data                = array('uploads' => $this->upload->data());
            $config['image_library']    = 'gd2';
            $config['source_image']     = './img/gambar_produk/'.$upload_data['uploads']['file_name'];
            $this->load->library('image_lib', $config);
            $nama_toko          = $this->input->post('nama_toko');
            $nama_produk        = $this->input->post('nama_produk');
            $harga_produk       = $this->input->post('harga_produk');
            $berat_produk       = $this->input->post('berat_produk');
            $stok_produk        = $this->input->post('stok_produk');
            $kategori_produk    = $this->input->post('kategori_produk');
            $deskripsi_produk   = $this->input->post('deskripsi_produk');
        
            $data = array(
                'id_toko' 		     => $nama_toko,
                'nama_produk'        => $nama_produk,
                'harga_produk'       => $harga_produk,
                'berat_produk'       => $berat_produk,
                'stok_produk'        => $stok_produk,
                'kategori_produk'    => $kategori_produk,
                'deskripsi_produk'   => $deskripsi_produk,
                'gambar_produk'      => $upload_data['uploads']['file_name'],
            );
            $this->model_produk->tambah_produk($data,'tb_produk');
            redirect(base_url('admin/data_produk'));
        }
	}

	public function edit($id)
	{
		$where              = array('id_produk' =>$id);
        $data['toko']       = $this->model_app->view_join('tb_produk','tb_toko','id_toko');
		$data['produk']     = $this->model_produk->edit_produk($where,'tb_produk')->result();
        $data['kategori']   = $this->model_produk->tampil_kategori();

		$this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar_daftarproduk');
        $this->load->view('admin/edit_produk', $data);
        $this->load->view('templates_admin/footer');
	}

	public function update(){   
		
		$id				        = $this->input->post('id_produk');
		$nama_produk            = $this->input->post('nama_produk');
        $harga_produk           = $this->input->post('harga_produk');
        $berat_produk           = $this->input->post('berat_produk');
        $stok_produk            = $this->input->post('stok_produk');
		$kategori_produk        = $this->input->post('kategori_produk');
		$deskripsi_produk       = $this->input->post('deskripsi_produk');	
        $verifikasi_produk      = $this->input->post('verifikasi_produk');
		$publish_produk         = $this->input->post('publish_produk');
		$data = array(
			'nama_produk'           => $nama_produk,
            'harga_produk'          => $harga_produk,
            'berat_produk'          => $berat_produk,
            'stok_produk'           => $stok_produk,
            'kategori_produk'       => $kategori_produk,
			'deskripsi_produk'      => $deskripsi_produk,
            'verifikasi_produk'     => $verifikasi_produk,
            'publish_produk'        => $publish_produk
		);
		$where = array('id_produk' => $id);
		$this->model_produk->update_data($where,$data,'tb_produk');
		redirect(base_url('admin/data_produk'));
	}

    public function update_gambar(){
        
        $id_produk                  = $this->input->post('id_produk');
        $config['upload_path']   	= './img/gambar_produk/';
        $config['allowed_types'] 	= 'jpg|jpeg|png|gif|ico|jfif';
        $config['max_size']         = '2000';
        $this->upload->initialize($config);
        $field_name = 'gambar_produk';
        if(!$this->upload->do_upload($field_name)){
            echo "Gagal Update Gambar !";
        }else{
            $detail = $this->model_produk->dapat_data($id_produk);
            $path   = './img/gambar_produk/'.$detail->gambar_produk;
            unlink($path);
            $upload_data                = array('uploads' => $this->upload->data());
            $config['image_library']    = 'gd2';
            $config['source_image']     = './img/gambar_produk/'.$upload_data['uploads']['file_name'];
            $this->load->library('image_lib', $config);
        
            $data = array(
                'gambar_produk'      => $upload_data['uploads']['file_name'],
            );

            $where = array('id_produk' => $id_produk);

            $this->model_produk->update_data($where,$data,'tb_produk');
            redirect(base_url('admin/data_produk/edit/').$id_produk );
        }
    }

	public function hapus($id){
		$this->load->model('model_produk');
	    $detail = $this->model_produk->dapat_data($id);
        $path   = './img/gambar_produk/'.$detail->gambar_produk;
        unlink($path);  

        $this->model_produk->hapus_data('tb_produk',array('id_produk'=>$id));
        redirect(base_url('admin/data_produk'));
	}

	public function detail($id_produk){

        $data['produk'] = $this->model_produk->detail_produk($id_produk);
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar_daftarproduk');
        $this->load->view('admin/detail_produk',$data);
        $this->load->view('templates_admin/footer');
    }
}