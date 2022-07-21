<?php 

class Model_pesanan extends CI_model{

    public function simpan_transaksi($data){
        $this->db->insert('tb_pesanan',$data);
    }

    public function simpan_rinci_transaksi($data_rinci){
        $this->db->insert('tb_detailpesanan',$data_rinci);
    }

    public function tampil_data(){
        $query = $this->db->get('tb_provinsi');
        return $query->result_array();
    }

    public function belum_bayar(){ //untuk pesanan saya di customer status 1
        $this->db->select('*');
        $this->db->from('tb_pesanan');
        $this->db->where('status=1');
        $this->db->where('id_customer',$this->session->userdata('id_customer'));
        // $this->db->join('tb_produk', 'tb_pesanan'.'.'.'id_produk'.'='.'tb_produk'.'.'.'id_produk');
        // $this->db->order_by('id_order', 'desc');
        return $this->db->get()->result_array();
    }   

    public function menunggu_verifikasi(){ //untuk pesanan saya di customer status 2
        $this->db->select('*');
        $this->db->from('tb_pesanan');
        $this->db->where('status=2');
        $this->db->where('id_customer',$this->session->userdata('id_customer'));
        // $this->db->join('tb_produk', 'tb_pesanan'.'.'.'id_produk'.'='.'tb_produk'.'.'.'id_produk');
        // $this->db->order_by('id_order', 'desc');
        return $this->db->get()->result_array();
    } 

    public function dikemas(){ //untuk pesanan saya di customer status 3
        $this->db->select('*');
        $this->db->from('tb_pesanan');
        $this->db->where('status=3');
        $this->db->where('id_customer',$this->session->userdata('id_customer'));
        // $this->db->join('tb_produk', 'tb_pesanan'.'.'.'id_produk'.'='.'tb_produk'.'.'.'id_produk');
        // $this->db->order_by('id_order', 'desc');
        return $this->db->get()->result_array();
    }

    public function dikirim(){ //untuk pesanan saya di customer status 4
        $this->db->select('*');
        $this->db->from('tb_pesanan');
        $this->db->where('status=4');
        $this->db->where('id_customer',$this->session->userdata('id_customer'));
        // $this->db->join('tb_produk', 'tb_pesanan'.'.'.'id_produk'.'='.'tb_produk'.'.'.'id_produk');
        // $this->db->order_by('id_order', 'desc');
        return $this->db->get()->result_array();
    }

    public function selesai(){ //untuk pesanan saya di customer status 5
        $this->db->select('*');
        $this->db->from('tb_pesanan');
        $this->db->where('status=5');
        $this->db->where('id_customer',$this->session->userdata('id_customer'));
        // $this->db->join('tb_produk', 'tb_pesanan'.'.'.'id_produk'.'='.'tb_produk'.'.'.'id_produk');
        // $this->db->order_by('id_order', 'desc');
        return $this->db->get()->result_array();
    }

    public function daftar_pesanan(){ //untuk daftar pesanan di admin
        $this->db->select('*');
        $this->db->from('tb_pesanan');
        // $this->db->where('status=1');
        // $this->db->where('id_customer',$this->session->userdata('id_customer'));
        // $this->db->join('tb_produk', 'tb_pesanan'.'.'.'id_produk'.'='.'tb_produk'.'.'.'id_produk');
        // $this->db->order_by('id_order', 'desc');
        return $this->db->get()->result_array();
    }

    public function daftar_pesanan_admin_belum_bayar(){ //untuk daftar pesanan di Admin belum bayar
        $this->db->select('*');
        $this->db->from('tb_detailpesanan');
        $this->db->where('status=1');
        $this->db->join('tb_pesanan','tb_detailpesanan.id_order = tb_pesanan.id_order');		
        $this->db->join('tb_produk','tb_detailpesanan.id_produk = tb_produk.id_produk');
        $this->db->order_by('tb_pesanan.id_order');
        // $this->db->group_by('tb_pesanan.id_order'));
        return $this->db->get()->result_array();
    }

    public function daftar_pesanan_admin_menunggu_verifikasi(){ //untuk daftar pesanan di Admin menunggu verifikasi
        $this->db->select('*');
        $this->db->from('tb_detailpesanan');
        $this->db->where('status=2');
        $this->db->join('tb_pesanan','tb_detailpesanan.id_order = tb_pesanan.id_order');		
        $this->db->join('tb_produk','tb_detailpesanan.id_produk = tb_produk.id_produk');
        $this->db->order_by('tb_pesanan.id_order');
        $this->db->group_by('tb_pesanan.id_order');
        return $this->db->get()->result_array();
    }

    public function daftar_pesanan_admin_dikemas(){ //untuk daftar pesanan di admin dikemas
        $this->db->select('*');
        $this->db->from('tb_detailpesanan');
        $this->db->where('status=3');
        $this->db->join('tb_pesanan','tb_detailpesanan.id_order = tb_pesanan.id_order');		
        $this->db->join('tb_produk','tb_detailpesanan.id_produk = tb_produk.id_produk');
        $this->db->order_by('tb_pesanan.id_order');
        $this->db->group_by('tb_pesanan.id_order');
        return $this->db->get()->result_array();
    }

    public function daftar_pesanan_admin_dikirim(){ //untuk daftar pesanan di admin dikirim
        $this->db->select('*');
        $this->db->from('tb_detailpesanan');
        $this->db->where('status=4');
        $this->db->join('tb_pesanan','tb_detailpesanan.id_order = tb_pesanan.id_order');		
        $this->db->join('tb_produk','tb_detailpesanan.id_produk = tb_produk.id_produk');
        $this->db->order_by('tb_pesanan.id_order');
        $this->db->group_by('tb_pesanan.id_order');
        return $this->db->get()->result_array();
    }

    public function daftar_pesanan_admin_selesai(){ //untuk daftar pesanan di admin selesai
        $this->db->select('*');
        $this->db->from('tb_detailpesanan');
        $this->db->where('status=5');
        $this->db->join('tb_pesanan','tb_detailpesanan.id_order = tb_pesanan.id_order');		
        $this->db->join('tb_produk','tb_detailpesanan.id_produk = tb_produk.id_produk');
        $this->db->order_by('tb_pesanan.id_order');
        $this->db->group_by('tb_pesanan.id_order');
        return $this->db->get()->result_array();
    }

    public function daftar_pesanan_toko_dikemas(){ //untuk daftar pesanan di Toko dikemas
        $this->db->select('*');
        $this->db->from('tb_detailpesanan');
        $this->db->where('status=3');
        $this->db->join('tb_pesanan','tb_detailpesanan.id_order = tb_pesanan.id_order');		
        $this->db->join('tb_produk','tb_detailpesanan.id_produk = tb_produk.id_produk');
        $this->db->where('id_toko',$this->session->userdata('id_toko'));
        $this->db->group_by('tb_pesanan.id_order');
        // $this->db->order_by('id_order', 'desc');
        return $this->db->get()->result_array();
    }

    public function daftar_pesanan_toko_dikirim(){ //untuk daftar pesanan di Toko dikirim
        $this->db->select('*');
        $this->db->from('tb_detailpesanan');
        $this->db->where('status=4');
        $this->db->join('tb_pesanan','tb_detailpesanan.id_order = tb_pesanan.id_order');		
        $this->db->join('tb_produk','tb_detailpesanan.id_produk = tb_produk.id_produk');
        $this->db->where('id_toko',$this->session->userdata('id_toko'));
        $this->db->group_by('tb_pesanan.id_order');
        // $this->db->order_by('id_order', 'desc');
        return $this->db->get()->result_array();
    }

    public function daftar_pesanan_toko_selesai(){ //untuk daftar pesanan di Toko selesai
        $this->db->select('*');
        $this->db->from('tb_detailpesanan');
        $this->db->where('status=5');
        $this->db->join('tb_pesanan','tb_detailpesanan.id_order = tb_pesanan.id_order');		
        $this->db->join('tb_produk','tb_detailpesanan.id_produk = tb_produk.id_produk');
        $this->db->where('id_toko',$this->session->userdata('id_toko'));
        $this->db->group_by('tb_pesanan.id_order');
        // $this->db->order_by('id_order', 'desc');
        return $this->db->get()->result_array();
    }

    public function detail_pesanan($id_order){//untuk pembayaran (upload bukti bayar)
        $this->db->select('*');
        $this->db->from('tb_pesanan');
        $this->db->where('id_order', $id_order);
        return $this->db->get()->row();
    }

    public function detail_pesanan_join($id_order){//untuk detail invoice tampilan admin.. NOTE perlu perbaikan
        $this->db->select('*');
        $this->db->from('tb_detailpesanan');
        $this->db->join('tb_pesanan','tb_detailpesanan.id_order = tb_pesanan.id_order');		
        $this->db->join('tb_produk','tb_detailpesanan.id_produk = tb_produk.id_produk');
        $this->db->where('tb_pesanan.id_order', $id_order);
        $this->db->order_by('tb_pesanan.id_order',$id_order);
        $result = $this->db->get();
        if($result->num_rows() > 0){
            return $result->result();
        }else{
            return FALSE;
        }
    }

    public function rekening(){ //tampilan rekening di pembayaran
        $this->db->select('*');
        $this->db->from('tb_bank');
        return $this->db->get()->result();
    }

    public function update_status($data){ // Update Status Pesanan di toko dan Admin
        $this->db->where('id_order', $data['id_order']);
        $this->db->update('tb_pesanan', $data);
    }

    public function upload_buktibayar($data){ // upload bukti bayar customer
        $this->db->where('id_order', $data['id_order']);
        $this->db->update('tb_pesanan', $data);
    }

    public function tampil($table){
        $query = $this->db->get($table);
        return $query->result_array();
    }

    public function viewByProvinsi($provinsi_id){
        $this->db->where('provinsi_id', $provinsi_id);
        $query = $this->db->get('tb_kota')->result();
        return $query; 
    }

    public function tampil_kategori(){
        $query = $this->db->get('tb_kategori');
        return $query->result_array();
    }
    
    public function tampil_kota(){
        $query = $this->db->get('tb_kota');
        return $query->result_array();
    }

    public function view_join($table1,$table2,$field1,$field2){
        $this->db->select('*');
        $this->db->from($table1);
        $this->db->join($table2, $table1.'.'.$field1.'='.$table2.'.'.$field2);
        return $this->db->get()->result_array();
    }

    public function view($table){
        return $this->db->get($table);
    }

    public function insert($table,$data){
        return $this->db->insert($table, $data);
    }

    public function edit($table, $data){
        return $this->db->get_where($table, $data);
    }
 
    public function update($table, $data, $where){
        return $this->db->update($table, $data, $where); 
    }

    public function delete($table, $where){
        return $this->db->delete($table, $where);
    }

    public function view_where($table,$data){
        $this->db->where($data);
        return $this->db->get($table);
    }

}