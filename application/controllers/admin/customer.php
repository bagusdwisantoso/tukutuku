<?php
defined('BASEPATH') or exit('No direct script access allowed');

class customer extends CI_Controller{


	public function __construct(){
        parent::__construct();

        if($this->session->userdata('role') != 'admin'){
            $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Anda Belum Login!
            </div>');
            redirect(base_url('admin/auth_admin/login'));
        }
    }
	
    public function index(){
        $data['customer'] = $this->model_customer->tampil_data();
        $data['provinsi'] = $this->model_app->tampil_data();

        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/customer', $data);
        $this->load->view('templates_admin/footer');
    }

    public function tambah_aksi()
	{
		$nama_customer		    = $this->input->post('nama_customer');
		$email_customer	        = $this->input->post('email_customer');
		$password_customer	    = $this->input->post('password_customer');
        $jenis_kelamin_customer = $this->input->post('jenis_kelamin_customer');
        $tanggal_lahir_customer	= $this->input->post('tanggal_lahir_customer');
        $no_tlpn_customer	    = $this->input->post('no_tlpn_customer');
        $id_kota                = $this->input->post('id_kota');
        $alamat_customer	    = $this->input->post('alamat_customer');

		$data = array(
			'nama_customer' 		    => $nama_customer,
			'email_customer' 	        => $email_customer,
			'password_customer' 		=> $password_customer,
            'jenis_kelamin_customer'    => $jenis_kelamin_customer,
            'tanggal_lahir_customer'    => $tanggal_lahir_customer,
            'id_kota'                   => $id_kota,
            'alamat_customer'           => $alamat_customer,
            'no_tlpn_customer'          => $no_tlpn_customer,
            'role'                      => 'customer'
		);
		$this->model_customer->tambah_customer($data,'tb_customer');
		redirect(base_url('admin/customer'));
	}

	public function edit($id_customer)
	{
		$where = array('id_customer' =>$id_customer);
		$data['customer'] = $this->model_customer->edit_customer($where,'tb_customer')->result();
        $data['provinsi'] = $this->model_app->tampil_data();
        
		$this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/edit_customer', $data);
        $this->load->view('templates_admin/footer');
	}

	public function update(){
		
		$id_customer			= $this->input->post('id_customer');
		$nama_customer		    = $this->input->post('nama_customer');
		$email_customer	        = $this->input->post('email_customer');
		$password_customer	    = $this->input->post('password_customer');
        $tanggal_lahir_customer	= $this->input->post('tanggal_lahir_customer');
        $id_kota                = $this->input->post('id_kota');
        $alamat_customer	    = $this->input->post('alamat_customer');
        $no_tlpn_customer	    = $this->input->post('no_tlpn_customer');

		$data = array(
			'nama_customer' 		    => $nama_customer,
			'email_customer' 	        => $email_customer,
			'password_customer' 		=> $password_customer,
            'tanggal_lahir_customer'    => $tanggal_lahir_customer,
            'id_kota'                   => $id_kota,
            'alamat_customer'           => $alamat_customer,
            'no_tlpn_customer'          => $no_tlpn_customer
		);

		$where = array('id_customer' => $id_customer);

		$this->model_customer->update_data($where,$data,'tb_customer');
		redirect(base_url('admin/customer'));
	}

	public function hapus($id_customer){
		$where = array('id_customer' => $id_customer);
		$this->model_customer->hapus_data($where, 'tb_customer');
		redirect(base_url('admin/customer'));
	}

	public function detail($id_customer){
        $data['customer'] = $this->model_customer->detail($id_customer);
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/detail_customer',$data);
        $this->load->view('templates_admin/footer');
    }

    public function listKota(){
        // Ambil data ID Provinsi yang dikirim via ajax post
        $provinsi_id = $this->input->post('provinsi_id');
        
        $kota = $this->model_app->viewByProvinsi($provinsi_id);
        
        // Buat variabel untuk menampung tag-tag option nya
        // Set defaultnya dengan tag option Pilih
        $lists = "<option value='<?php echo $kota->id_kota ?>'>- Pilih -</option>";
        
        foreach($kota as $kta){
          $lists .= "<option value='".$kta->kota_id."'>".$kta->nama_kota."</option>"; // Tambahkan tag option ke variabel $lists
        }
        
        $callback = array('list_kota'=>$lists); // Masukan variabel lists tadi ke dalam array $callback dengan index array : list_kota
        echo json_encode($callback); // konversi varibael $callback menjadi JSON
    }
}