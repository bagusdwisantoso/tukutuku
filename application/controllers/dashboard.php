<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller{ 

    public function __construct(){
        
        parent::__construct();

        if($this->session->userdata('role') != 'customer'){
            $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Anda Belum Login!
            </div>');
            redirect(base_url('auth/login'));
        }
    }
    public function index()
    {
		$customer = $this->db->get_where('tb_customer', ['email_customer' => $this->session->userdata('email_customer')])->row_array();
        if ($customer) {
			$kategori 				= $this->input->get('kat');
			$id_customer 			= $customer['id_customer'];
			$data['total_cart'] 	= $this->model_app->total_cart($id_customer)->row_array();
			$data['kategori'] 		= $this->model_app->tampil_kategori();
			$data['kategori2'] 		= $this->model_app->kategori($kategori)->result();
			$data['produk_dash'] 	= $this->model_produk->tampil_data_dashboard()->result();
			$data['banner'] 		= $this->model_app->tampil('tb_banner');
			$data['brand'] 			= $this->model_app->tampil('tb_brand');
			$data['terlaris']       = $this->model_app->terlaris()->result();

			$this->load->view('templates_new/new_header',$data);
			// $this->load->view('templates/sidebar');
			$this->load->view('dashboard',$data);
			$this->load->view('templates_new/new_footer');
		}else{
			$kategori 			= $this->input->get('kat');
			$data['kategori'] 	= $this->model_app->tampil_kategori();
			$data['kategori2'] 	= $this->model_app->kategori($kategori)->result();
			$data['produk_dash'] = $this->model_produk->tampil_data_dashboard()->result();
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
            $kategori           = $this->input->get('kat');
            $data['total_cart'] = $this->model_app->total_cart($customer['id_customer'])->row_array();
            $data['kategori']   = $this->model_app->tampil_kategori();
            $data['kategori2']     = $this->model_app->kategori($kategori)->result();
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

    public function checkout($id_toko){
        $customer = $this->db->get_where('tb_customer', ['email_customer' => $this->session->userdata('email_customer')])->row_array();
        if($customer){
            date_default_timezone_set('Asia/Jakarta');
            $this->form_validation->set_rules('provinsi','Provinsi', 'required', array(
                'required' => '%s Harus Diisi !!'
            ));
            $this->form_validation->set_rules('kota','Kota', 'required', array(
                'required' => '%s Harus Diisi !!'
            ));

            $this->form_validation->set_rules('expedisi','expedisi', 'required', array(
                'required' => '%s Harus Diisi !!'
            ));

            if ($this->form_validation->run() == FALSE){
                $data = array(
                    'tittle' => 'checkout_keranjang',
                    'isi' => 'v_checkout',
                );
                $kategori                   = $this->input->get('kat');
                $data['total_cart']         = $this->model_app->total_cart($customer['id_customer'])->row_array();
                $data['tampil_keranjang']   = $this->model_app->checkout_pertoko($customer['id_customer'],$id_toko)->result_array();
                $data['tampil_keranjang2']  = $this->model_app->checkout_idtoko($customer['id_customer'],$id_toko)->result_array();
                $data['tampil_keranjang3']  = $this->model_app->checkout_pertoko($customer['id_customer'],$id_toko)->result_array();
                $data['kategori']           = $this->model_app->tampil_kategori();
                $data['kategori2']             = $this->model_app->kategori($kategori)->result();

                $this->load->view('templates_new/new_header',$data);
                // $this->load->view('templates/sidebar');
                $this->load->view('v_checkout',$data);
                $this->load->view('templates_new/new_footer');
            }else{
                $data = array(
                    'id_customer'       =>  $this->session->userdata('id_customer'),
                    'tgl_pesan'         =>  date('Y-m-d H:i:s'),
                    'batas_bayar'       =>  date('Y-m-d H:i:s', mktime(date('H'), date('i'),date('s'),date('m'),date('d') + 1,date('y'))),
                    'nama_penerima'     =>  $this->input->post('nama_penerima'),
                    'no_tlpn_penerima'  =>  $this->input->post('no_tlpn_penerima'),
                    'provinsi'          =>  $this->input->post('provinsi'),
                    'kota'              =>  $this->input->post('kota'),
                    'alamat'            =>  $this->input->post('alamat'),
                    'kode_pos'          =>  $this->input->post('kode_pos'),
                    'expedisi'          =>  $this->input->post('expedisi'),
                    'paket'             =>  $this->input->post('paket'),
                    'estimasi'          =>  $this->input->post('estimasi'),
                    'ongkir'            =>  $this->input->post('ongkir'),
                    'berat'             =>  $this->input->post('berat'),
                    'grand_total'       =>  $this->input->post('grand_total'),
                    'total_bayar'       =>  $this->input->post('total_bayar'),
                    'status'            =>  '1',
                );
                $this->model_pesanan->simpan_transaksi($data);
                $id_order = $this->db->insert_id();

                foreach($this->model_app->checkout_pertoko($customer['id_customer'],$id_toko)->result_array() as $items ){  
                    $data_rinci = array(
                        'id_order'     => $id_order,
                        'id_produk'    => $items['id_produk'],
                        'harga'        => $items['harga'],
                        'qty'          => $this->input->post('qty'.$items['id_produk']),
                    );
                    $this->model_pesanan->simpan_rinci_transaksi($data_rinci);
                    $this->db->delete('tb_keranjang',  ['id_toko' => $id_toko]);
                }
                $this->session->set_flashdata('pesan','Pesanan Anda Berhasil diProses !!');
                // foreach($this->model_app->checkout_pertoko($customer['id_customer'],$id_toko)->result_array() as $items ){
                //     $this->db->delete('tb_keranjang',  ['id_toko' => $id_toko]);
                // }
                redirect(base_url('Pesanan_saya'));
            }
        }else{
            $kategori                   = $this->input->get('kat');
            $data['tampil_keranjang']   = $this->model_app->tampil_keranjang($customer['id_customer'])->result_array();
            $data['kategori']           = $this->model_app->tampil_kategori();
            $data['kategori2']             = $this->model_app->kategori($kategori)->result();

            $this->load->view('templates_new/new_header',$data);
            $this->load->view('v_checkout',$data);
            $this->load->view('templates_new/new_footer');
        }
    }

    public function kategori($kategori){
        $customer = $this->db->get_where('tb_customer', ['email_customer' => $this->session->userdata('email_customer')])->row_array();
        if ($customer) {
            // $kategori               = $this->input->get('kat');
            $data['total_cart']     = $this->model_app->total_cart($customer['id_customer'])->row_array();
            $data['kategori']       = $this->model_app->tampil_kategori();
            $data['kategori2'] 		= $this->model_app->kategori($kategori)->result();
            $data['banner']         = $this->model_app->tampil('tb_banner');
            $data['brand']          = $this->model_app->tampil('tb_brand');
            $data['terlaris']       = $this->model_app->terlaris();

            $this->load->view('templates_new/new_header', $data);
            $this->load->view('dashboard', $data);
            $this->load->view('templates_new/new_footer');
        }else{
            // $kategori           = $this->input->get('kat');
            $data['kategori']   = $this->model_app->tampil_kategori();
            $data['kategori2']  = $this->model_app->kategori($kategori)->result();
            $data['banner']     = $this->model_app->tampil('tb_banner');
            $data['brand']      = $this->model_app->tampil('tb_brand');
            $data['terlaris']   = $this->model_app->terlaris();

            $this->load->view('templates_new/new_header', $data);
            $this->load->view('dashboard', $data);
            $this->load->view('templates_new/new_footer');
        }
    }
    
    public function filter_harga(){
        $customer = $this->db->get_where('tb_customer', ['email_customer' => $this->session->userdata('email_customer')])->row_array();
        if ($customer) {
            $kategori               = $this->input->get('kat');
            $dari                   = $this->input->get('from');
            $sampai                 = $this->input->get('until');
            $data['total_cart']     = $this->model_app->total_cart($customer['id_customer'])->row_array();
            $data['kategori']       = $this->model_app->tampil_kategori();
            $data['kategori2'] 		= $this->model_app->kategori($kategori)->result();
            $data['produk']         = $this->model_app->filter_produk_harga($dari, $sampai)->result();
            $data['banner']         = $this->model_app->tampil('tb_banner');
            $data['brand']          = $this->model_app->tampil('tb_brand');

            $this->load->view('templates_new/new_header', $data);
            $this->load->view('dashboard', $data);
            $this->load->view('templates_new/new_footer');
        }else{
            $kategori           = $this->input->get('kat');
            $dari               = $this->input->get('from');
            $sampai             = $this->input->get('until');
            $data['kategori']   = $this->model_app->tampil_kategori();
            $data['kategori2']     = $this->model_app->kategori($kategori)->result();
            $data['produk']     = $this->model_app->filter_produk_harga($dari, $sampai)->result();
            $data['banner']     = $this->model_app->tampil('tb_banner');
            $data['brand']      = $this->model_app->tampil('tb_brand');

            $this->load->view('templates_new/new_header', $data);
            $this->load->view('dashboard', $data);
            $this->load->view('templates_new/new_footer');
        }
    }

    public function filter_harga_diatas(){
        $customer = $this->db->get_where('tb_customer', ['email_customer' => $this->session->userdata('email_customer')])->row_array();
        if ($customer) {
            $kategori               = $this->input->get('kat');
            $value                  = $this->input->get('val');
            $data['total_cart']     = $this->model_app->total_cart($customer['id_customer'])->row_array();
            $data['kategori']       = $this->model_app->tampil_kategori();
            $data['kategori2'] 		= $this->model_app->kategori($kategori)->result();
            $data['produk']         = $this->model_app->filter_produk_harga_diatas($value)->result();
            $data['banner']         = $this->model_app->tampil('tb_banner');
            $data['brand']          = $this->model_app->tampil('tb_brand');

            $this->load->view('templates_new/new_header', $data);
            $this->load->view('dashboard', $data);
            $this->load->view('templates_new/new_footer');
        }else{
            $kategori           = $this->input->get('kat');
            $value              = $this->input->get('val');
            $data['kategori']   = $this->model_app->tampil_kategori();
            $data['kategori']     = $this->model_app->kategori($kategori)->result();
            $data['produk']     = $this->model_app->filter_produk_harga_diatas($value)->result();
            $data['banner']     = $this->model_app->tampil('tb_banner');
            $data['brand']      = $this->model_app->tampil('tb_brand');

            $this->load->view('templates_new/new_header', $data);
            $this->load->view('dashboard', $data);
            $this->load->view('templates_new/new_footer');
        }
    }

    public function filter_harga_dibawah(){
        $customer = $this->db->get_where('tb_customer', ['email_customer' => $this->session->userdata('email_customer')])->row_array();
        if ($customer) {
            $kategori               = $this->input->get('kat');
            $value                  = $this->input->get('val');
            $data['total_cart']     = $this->model_app->total_cart($customer['id_customer'])->row_array();
            $data['kategori']       = $this->model_app->tampil_kategori();
            $data['kategori2'] 		= $this->model_app->kategori($kategori)->result();
            $data['produk']         = $this->model_app->filter_produk_harga_dibawah($value)->result();
            $data['banner']         = $this->model_app->tampil('tb_banner');
            $data['brand']          = $this->model_app->tampil('tb_brand');

            $this->load->view('templates_new/new_header', $data);
            $this->load->view('dashboard', $data);
            $this->load->view('templates_new/new_footer');
        }else{
            $kategori           = $this->input->get('kat');
            $value              = $this->input->get('val');
            $data['kategori']   = $this->model_app->tampil_kategori();
            $data['kategori2']     = $this->model_app->kategori($kategori)->result();
            $data['produk']     = $this->model_app->filter_produk_harga_dibawah($value)->result();
            $data['banner']     = $this->model_app->tampil('tb_banner');
            $data['brand']      = $this->model_app->tampil('tb_brand');

            $this->load->view('templates_new/new_header', $data);
            $this->load->view('dashboard', $data);
            $this->load->view('templates_new/new_footer');
        }
    }


    /////// KERANJANG TERBARU //////////////

    public function tambah_ke_keranjang($id_produk) //TAMBAH KERANJANG BARU
    {
        $produk     = $this->model_app->find_produk_byid($id_produk)->row();
        $customer   = $this->db->get_where('tb_customer', ['email_customer' => $this->session->userdata('email_customer')])->row_array();
        $keranjang  = $this->model_app->cek_keranjang($id_produk, $customer['id_customer'])->row_array();
        // $keranjang = $this->db->get_where('keranjang', ['id_produk' => $id_produk])->row_array();
        if ($keranjang) {
            // $this->cart->insert($data);
            $total_qty = $keranjang['qty'] + 1;
            $this->db->set('qty', $total_qty);
            $this->db->where('id_keranjang', $keranjang['id_keranjang']);
            $this->db->update('tb_keranjang');

            redirect(base_url('welcome'));
        } else {
            $data = array(
                'id_produk'      => $id_produk,
                'qty'            => 1,
                'id_customer'    => $customer['id_customer'],
                'id_toko'        => $produk->id_toko,
            );

            // $this->cart->insert($data);
            $this->db->insert('tb_keranjang', $data);
            redirect(base_url('welcome'));
        }
    }

    public function hapus_item_keranjang($id_keranjang)
    {
        // $this->db->where('id_keranjang', $id_keranjang);
        $this->db->delete('tb_keranjang',  ['id_keranjang' => $id_keranjang]);
        redirect(base_url('dashboard/keranjang'));
    }

    public function keranjang()
    {
        $customer = $this->db->get_where('tb_customer', ['email_customer' => $this->session->userdata('email_customer')])->row_array();
        if ($customer) {
            $data['title']      = 'Keranjang';
            $data['pertoko']    = $this->model_app->keranjang_pertoko($customer['id_customer'])->result_array();
            $data['total_cart'] = $this->model_app->total_cart($customer['id_customer'])->row_array();
            $data['tampil_keranjang'] = $this->model_app->tampil_keranjang($customer['id_customer'])->result_array();
            
            $this->load->view('templates_new/new_header', $data);
            $this->load->view('cart', $data);
            $this->load->view('templates_new/new_footer');
        } else {
            $data['title'] = 'Keranjang';
            $this->load->view('templates_new/new_header', $data);
            $this->load->view('cart', $data);
            $this->load->view('templates_new/new_footer');
        }
    }

    // public function updatekeranjang()
    // {
    //     $id_keranjang = $_POST['id_keranjang'];
    //     $qty = $_POST['qty'];
    //     // echo json_encode($this->model_app->update_keranjang($id_keranjang, $qty)->row_array());
    //     $query = "UPDATE tb_keranjang SET qty = $qty WHERE id_keranjang = $id_keranjang";

    //     echo json_encode($this->model_app->getharga($id_keranjang)->row_array());
    //     return $this->db->query($query);
    // }

    public function update_keranjang(){

        $customer   = $this->db->get_where('tb_customer', ['email_customer' => $this->session->userdata('email_customer')])->row_array();
        $keranjang  = $this->model_app->tampil_keranjang($customer['id_customer'])->result_array();
        $i=1;
        foreach ( $keranjang as $kr){
		$data = array(
            'id_keranjang' => $kr['id_keranjang'],
            'qty'          => $this->input->post($kr['id_keranjang']. 'qty'),
		);
		$where = array('id_keranjang' => $kr['id_keranjang']);
		$this->model_produk->update_data($where,$data,'tb_keranjang');
        $i++;
        }
		redirect(base_url('dashboard/keranjang'));
    }

}