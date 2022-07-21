<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
    {
		$customer = $this->db->get_where('tb_customer', ['email_customer' => $this->session->userdata('email_customer')])->row_array();
        if ($customer) {
			// $kategori 				= $this->input->get('kat');
			$id_customer 			= $customer['id_customer'];
			$data['total_cart'] 	= $this->model_app->total_cart($id_customer)->row_array();
			$data['kategori'] 		= $this->model_app->tampil_kategori();
			// $data['kategori2'] 		= $this->model_app->kategori($kategori)->result();
			$data['produk'] 	= $this->model_produk->tampil_data_dashboard()->result();
			$data['banner'] 		= $this->model_app->tampil('tb_banner');
			$data['brand'] 			= $this->model_app->tampil('tb_brand');
			$data['terlaris']       = $this->model_app->terlaris()->result();

			$this->load->view('templates_new/new_header',$data);
			// $this->load->view('templates/sidebar');
			$this->load->view('dashboard',$data);
			$this->load->view('templates_new/new_footer');
		}else{
			// $kategori 			= $this->input->get('kat');
			$data['kategori'] 	= $this->model_app->tampil_kategori();
			// $data['kategori2'] 	= $this->model_app->kategori($kategori)->result();
			$data['produk'] = $this->model_produk->tampil_data_dashboard()->result();
			$data['banner'] 	= $this->model_app->tampil('tb_banner');
			$data['brand'] 		= $this->model_app->tampil('tb_brand');
			$data['terlaris']       = $this->model_app->terlaris()->result();

			$this->load->view('templates_new/new_header',$data);
			// $this->load->view('templates/sidebar');
			$this->load->view('dashboard',$data);
			$this->load->view('templates_new/new_footer');
		}
    }
	
	public function search(){//search barang
        $customer = $this->db->get_where('tb_customer', ['email_customer' => $this->session->userdata('email_customer')])->row_array();
        if ($customer) {
            // $kategori           = $this->input->get('kat');
            $data['total_cart'] = $this->model_app->total_cart($customer['id_customer'])->row_array();
            $data['kategori']   = $this->model_app->tampil_kategori();
            // $data['kategori2']     = $this->model_app->kategori($kategori)->result();
            $cari['search']     = $this->input->post('search');
            $cari["produk"]     = $this->model_search->search($cari['search'])->result();
            $cari["jumlah"]     = count($cari["produk"]);
            
            $this->load->view('templates_new/new_header',$data);
            // $this->load->view('templates/sidebar');
            $this->load->view("v_cari",$cari);
            $this->load->view('templates_new/new_footer');
        }else{
            $kategori         = $this->input->get('kat');
            $data['kategori'] = $this->model_app->tampil_kategori();
            $data['kategori2']   = $this->model_app->kategori($kategori)->result();
            $cari['search']   = $this->input->post('search');
            $cari["produk"]   = $this->model_search->search($cari['search'])->result();
            $cari["jumlah"]   = count($cari["produk"]);
            
            $this->load->view('templates_new/new_header',$data);
            // $this->load->view('templates/sidebar');
            $this->load->view("v_cari",$cari);
            $this->load->view('templates_new/new_footer');
        }
    }

	public function detail($id_produk){
        $customer = $this->db->get_where('tb_customer', ['email_customer' => $this->session->userdata('email_customer')])->row_array();
        if ($customer) {
			// $kategori 				= $this->input->get('kat');
            $data['total_cart'] 	= $this->model_app->total_cart($customer['id_customer'])->row_array();
            $data['kategori'] 		= $this->model_app->tampil_kategori();
            // $data['kategori2'] 		= $this->model_app->kategori($kategori)->result();
            $data['produk'] 		= $this->model_produk->detail_produk($id_produk);
			$data['penjualan']		= $this->model_produk->penjualan($id_produk);

            $this->load->view('templates_new/new_header',$data);
            $this->load->view('detail_produk',$data);
            $this->load->view('templates_new/new_footer');
        }else{
            // $kategori 			= $this->input->get('kat');
            $data['kategori'] 	= $this->model_app->tampil_kategori();
            // $data['kategori2'] 	= $this->model_app->kategori($kategori)->result();
            $data['produk'] 	= $this->model_produk->detail_produk($id_produk);
			$data['penjualan']		= $this->model_produk->penjualan($id_produk);
			
            $this->load->view('templates_new/new_header',$data);
            $this->load->view('detail_produk',$data);
            $this->load->view('templates_new/new_footer');
        }
    }
    public function kategori($kategori){
        $customer = $this->db->get_where('tb_customer', ['email_customer' => $this->session->userdata('email_customer')])->row_array();
        if ($customer) {
            // $kategori               = $this->input->get('kat');
            $data['total_cart']     = $this->model_app->total_cart($customer['id_customer'])->row_array();
            $data['kategori']       = $this->model_app->tampil_kategori();
            $data['kategori2'] 		= $this->model_app->detail_kategori($kategori);
            $data['ikon_kat'] 		= $this->model_app->detail_kategori($kategori);
            $data['jumlah']         = COUNT($data['ikon_kat']);

            $this->load->view('templates_new/new_header', $data);
            $this->load->view('kategori', $data);
            $this->load->view('templates_new/new_footer');
        }else{
            // $kategori           = $this->input->get('kat');
            $data['kategori']       = $this->model_app->tampil_kategori();
            $data['kategori2']      = $this->model_app->detail_kategori($kategori);
            $data['ikon_kat'] 		= $this->model_app->detail_kategori($kategori);
            $data['jumlah']         = COUNT($data['ikon_kat']);

            $this->load->view('templates_new/new_header', $data);
            $this->load->view('kategori', $data);
            $this->load->view('templates_new/new_footer');
        }
    }

	public function all()
    {
		$customer = $this->db->get_where('tb_customer', ['email_customer' => $this->session->userdata('email_customer')])->row_array();
        if ($customer) {
			// $kategori 				= $this->input->get('kat');
			$id_customer 			= $customer['id_customer'];
			$data['total_cart'] 	= $this->model_app->total_cart($id_customer)->row_array();
			$data['kategori'] 		= $this->model_app->tampil_kategori();
			// $data['kategori2'] 		= $this->model_app->kategori($kategori)->result();
			$data['produk'] 		= $this->model_app->tampil_produk()->result();
			$data["jumlah"]     	= count($data['produk']);
			#$data['banner'] 		= $this->model_app->tampil('tb_banner');
			#$data['brand'] 			= $this->model_app->tampil('tb_brand');
			#$data['terlaris']       = $this->model_app->terlaris()->result();

			$this->load->view('templates_new/new_header',$data);
			// $this->load->view('templates/sidebar');
			$this->load->view('all_produk',$data);
			$this->load->view('templates_new/new_footer');
		}else{
			// $kategori 			= $this->input->get('kat');
			$data['kategori'] 	= $this->model_app->tampil_kategori();
			// $data['kategori2'] 	= $this->model_app->kategori($kategori)->result();
			$data['produk'] 	= $this->model_app->tampil_produk()->result();
			$data["jumlah"]     = count($data['produk']);
			// $data['banner'] 	= $this->model_app->tampil('tb_banner');
			// $data['brand'] 		= $this->model_app->tampil('tb_brand');
			// $data['terlaris']       = $this->model_app->terlaris()->result();

			$this->load->view('templates_new/new_header',$data);
			// $this->load->view('templates/sidebar');
			$this->load->view('all_produk',$data);
			$this->load->view('templates_new/new_footer');
		}
    }
	public function filter_harga(){
        $customer = $this->db->get_where('tb_customer', ['email_customer' => $this->session->userdata('email_customer')])->row_array();
        if ($customer) {
            // $kategori               = $this->input->get('kat');
            $dari                   = $this->input->get('from');
            $sampai                 = $this->input->get('until');
            $data['total_cart']     = $this->model_app->total_cart($customer['id_customer'])->row_array();
            $data['kategori']       = $this->model_app->tampil_kategori();
            // $data['kategori2']         = $this->model_app->kategori($kategori)->result();
            $data['produk']         = $this->model_app->filter_produk_harga($dari, $sampai)->result();
            $data['banner']         = $this->model_app->tampil('tb_banner');
            $data['brand']          = $this->model_app->tampil('tb_brand');

            $this->load->view('templates_new/new_header', $data);
            $this->load->view('all_produk', $data);
            $this->load->view('templates_new/new_footer');
        }else{
            // $kategori           = $this->input->get('kat');
            $dari               = $this->input->get('from');
            $sampai             = $this->input->get('until');
            $data['kategori']   = $this->model_app->tampil_kategori();
            // $data['kategori2']     = $this->model_app->kategori($kategori)->result();
            $data['produk']     = $this->model_app->filter_produk_harga($dari, $sampai)->result();
            $data['banner']     = $this->model_app->tampil('tb_banner');
            $data['brand']      = $this->model_app->tampil('tb_brand');

            $this->load->view('templates_new/new_header', $data);
            $this->load->view('all_produk', $data);
            $this->load->view('templates_new/new_footer');
        }
    }

    public function filter_harga_diatas(){
        $customer = $this->db->get_where('tb_customer', ['email_customer' => $this->session->userdata('email_customer')])->row_array();
        if ($customer) {
            // $kategori               = $this->input->get('kat');
            $value                  = $this->input->get('val');
            $data['total_cart']     = $this->model_app->total_cart($customer['id_customer'])->row_array();
            $data['kategori']       = $this->model_app->tampil_kategori();
            // $data['kategori2']         = $this->model_app->kategori($kategori)->result();
            $data['produk']         = $this->model_app->filter_produk_harga_diatas($value)->result();
            $data['banner']         = $this->model_app->tampil('tb_banner');
            $data['brand']          = $this->model_app->tampil('tb_brand');

            $this->load->view('templates_new/new_header', $data);
            $this->load->view('all_produk', $data);
            $this->load->view('templates_new/new_footer');
        }else{
            // $kategori           = $this->input->get('kat');
            $value              = $this->input->get('val');
            $data['kategori']   = $this->model_app->tampil_kategori();
            // $data['kateori2']     = $this->model_app->kategori($kategori)->result();
            $data['produk']     = $this->model_app->filter_produk_harga_diatas($value)->result();
            $data['banner']     = $this->model_app->tampil('tb_banner');
            $data['brand']      = $this->model_app->tampil('tb_brand');

            $this->load->view('templates_new/new_header', $data);
            $this->load->view('all_produk', $data);
            $this->load->view('templates_new/new_footer');
        }
    }

    public function filter_harga_dibawah(){
        $customer = $this->db->get_where('tb_customer', ['email_customer' => $this->session->userdata('email_customer')])->row_array();
        if ($customer) {
            // $kategori               = $this->input->get('kat');
            $value                  = $this->input->get('val');
            $data['total_cart']     = $this->model_app->total_cart($customer['id_customer'])->row_array();
            $data['kategori']       = $this->model_app->tampil_kategori();
            // $data['kategori2']         = $this->model_app->kategori($kategori)->result();
            $data['produk']         = $this->model_app->filter_produk_harga_dibawah($value)->result();
            $data['banner']         = $this->model_app->tampil('tb_banner');
            $data['brand']          = $this->model_app->tampil('tb_brand');

            $this->load->view('templates_new/new_header', $data);
            $this->load->view('all_produk', $data);
            $this->load->view('templates_new/new_footer');
        }else{
            // $kategori           = $this->input->get('kat');
            $value              = $this->input->get('val');
            $data['kategori']   = $this->model_app->tampil_kategori();
            // $data['kategori2']     = $this->model_app->kategori($kategori)->result();
            $data['produk']     = $this->model_app->filter_produk_harga_dibawah($value)->result();
            $data['banner']     = $this->model_app->tampil('tb_banner');
            $data['brand']      = $this->model_app->tampil('tb_brand');

            $this->load->view('templates_new/new_header', $data);
            $this->load->view('all_produk', $data);
            $this->load->view('templates_new/new_footer');
        }
    }

    

}
