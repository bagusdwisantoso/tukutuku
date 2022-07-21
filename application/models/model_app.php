<?php 

class Model_app extends CI_model{

    public function qty($idprod){ //qty di checkout
        $this->db->select('*');
        $this->db->from('tb_produk');
        $this->db->where('id_produk',$idprod);
        return $this->db->get()->result_array();
    }

    public function terlaris(){
        $this->db->select('tb_produk.id_produk as ID');
        $this->db->select('nama_produk');
        $this->db->select('harga_produk');
        $this->db->select('nama_toko');
        $this->db->select('gambar_produk');
        $this->db->select('SUM(qty) as Terjual');
        $this->db->from('tb_detailpesanan');
        $this->db->from('tb_produk');
        $this->db->from('tb_toko');
        $this->db->where('tb_detailpesanan.id_produk=tb_produk.id_produk');
        $this->db->where('tb_produk.id_toko=tb_toko.id_toko');
        $this->db->group_by('nama_produk');
        $this->db->order_by('Terjual DESC');
        $this->db->limit('6');
        return $this->db->get();
    }

    public function detail_kategori($id_kategori){
        $this->db->select('*');
        $this->db->from('tb_produk');
        $this->db->from('tb_toko');
        $this->db->from('tb_kategori');
        $this->db->WHERE('tb_toko.id_toko=tb_produk.id_toko');
        $this->db->where('tb_kategori.id_kategori=tb_produk.kategori_produk');
        $result = $this->db->where('tb_produk.kategori_produk',$id_kategori)->get();
        if($result->num_rows() > 0){
            return $result->result();
        }else{
            return false;
        }
    }
    public function kategori($kategori)//filter kategori dashboard
    {
        $this->db->select('*');
        $this->db->from('tb_produk');
        $this->db->from('tb_toko');
        $this->db->from('tb_kategori');
        $this->db->WHERE('tb_toko.id_toko=tb_produk.id_toko');
        $this->db->where('tb_kategori.id_kategori=tb_produk.kategori_produk');
        $this->db->where('tb_produk.kategori_produk',$kategori);
        return $this->db->get();
    }

    public function tampil_produk()//tampil produk
    {
        $this->db->select('*');
        $this->db->from('tb_produk');
        $this->db->join('tb_toko', 'tb_toko.id_toko=tb_produk.id_toko');
        $this->db->order_by('nama_produk');
        return $this->db->get();
    }

    public function filter_produk_harga($dari, $sampai)//filter harga dashboard
    {
        $this->db->select('*');
        $this->db->from('tb_produk');
        $this->db->join('tb_toko', 'tb_toko.id_toko=tb_produk.id_toko');
        $this->db->where("tb_produk.harga_produk BETWEEN '$dari' AND '$sampai'");
        return $this->db->get();
    }

    public function filter_produk_harga_diatas($value)//filter harga dashboard
    {
        $this->db->select('*');
        $this->db->from('tb_produk');
        $this->db->join('tb_toko', 'tb_toko.id_toko=tb_produk.id_toko');
        $this->db->where('tb_produk.harga_produk>=', $value);
        return $this->db->get();
    }

    public function filter_produk_harga_dibawah($value)//filter harga dashboard
    {
        $this->db->select('*');
        $this->db->from('tb_produk');
        $this->db->join('tb_toko', 'tb_toko.id_toko=tb_produk.id_toko');
        $this->db->where('tb_produk.harga_produk<=', $value);
        return $this->db->get();
    }

    public function total_cart($id_customer) //keranjang
    {
        $query = "SELECT count(qty) AS total_cart
                    FROM tb_keranjang, tb_customer, tb_toko, tb_produk
                     WHERE tb_customer.id_customer=tb_keranjang.id_customer AND tb_toko.id_toko=tb_keranjang.id_toko AND tb_keranjang.id_produk = tb_produk.id_produk AND tb_customer.id_customer = $id_customer";
        return $this->db->query($query);
    }

    public function find_produk_byid($id_produk) //keranjang
    {   
        $this->db->select('*');
        $this->db->from('tb_produk');
        $this->db->join('tb_toko', 'tb_toko.id_toko=tb_produk.id_toko');
        $this->db->where('tb_produk.id_produk', $id_produk);
        return $this->db->get();
    }
    public function tampil_keranjang($id_customer) // untuk keranjang baru
    {
        $query = "SELECT tb_toko.id_toko, tb_produk.id_produk, stok_produk, nama_produk, nama_toko, qty, harga_produk as harga, qty * harga_produk as total_harga, gambar_produk, id_keranjang
        FROM tb_keranjang, tb_customer, tb_toko, tb_produk
        WHERE tb_customer.id_customer=tb_keranjang.id_customer AND tb_toko.id_toko=tb_keranjang.id_toko AND tb_keranjang.id_produk = tb_produk.id_produk AND tb_customer.id_customer=$id_customer";
        return $this->db->query($query);
    }

    public function keranjang_pertoko($id_customer) // untuk keranjang baru
    {
        $query = "SELECT tb_toko.id_toko, nama_toko, tb_produk.id_produk, stok_produk, nama_produk, nama_toko, qty, harga_produk as harga, qty * harga_produk as total_harga, gambar_produk, id_keranjang
        FROM tb_keranjang, tb_customer, tb_toko, tb_produk
        WHERE tb_customer.id_customer=tb_keranjang.id_customer AND tb_toko.id_toko=tb_keranjang.id_toko AND tb_keranjang.id_produk = tb_produk.id_produk AND tb_customer.id_customer=$id_customer
        GROUP BY tb_toko.id_toko";
        return $this->db->query($query);
    }

    public function checkout_pertoko($id_customer,$id_toko) // untuk keranjang baru
    {
        $query = "SELECT tb_toko.id_toko, tb_produk.id_produk, stok_produk, nama_produk, nama_toko, qty, harga_produk as harga, qty * harga_produk as total_harga, gambar_produk, id_keranjang
        FROM tb_keranjang, tb_customer, tb_toko, tb_produk
        WHERE tb_customer.id_customer=tb_keranjang.id_customer AND tb_toko.id_toko=tb_keranjang.id_toko AND tb_keranjang.id_produk = tb_produk.id_produk AND tb_customer.id_customer=$id_customer
        AND tb_toko.id_toko = $id_toko";
        return $this->db->query($query);
    }

    public function checkout_idtoko($id_customer,$id_toko) // untuk keranjang baru
    {
        $query = "SELECT tb_toko.id_toko
        FROM tb_keranjang, tb_customer, tb_toko, tb_produk
        WHERE tb_customer.id_customer=tb_keranjang.id_customer AND tb_toko.id_toko=tb_keranjang.id_toko AND tb_keranjang.id_produk = tb_produk.id_produk AND tb_customer.id_customer=$id_customer
        AND tb_toko.id_toko = $id_toko
        limit 1";
        return $this->db->query($query);
    }

    public function cek_keranjang($id_produk, $id_customer) // untuk keranjang baru
    {
        $query = "SELECT *
        FROM tb_keranjang, tb_customer, tb_toko, tb_produk
        WHERE tb_customer.id_customer=tb_keranjang.id_customer AND tb_toko.id_toko=tb_keranjang.id_toko AND tb_keranjang.id_produk = tb_produk.id_produk AND tb_keranjang.id_customer=$id_customer AND tb_keranjang.id_produk=$id_produk";
        return $this->db->query($query);
    }

    public function getharga($id_keranjang)
    {
        $query = "SELECT harga_produk AS harga FROM tb_keranjang WHERE tb_keranjang.id_produk=tb_produk.id_produk AND tb_keranjang.id_keranjang = $id_keranjang";
        // $this->db->select('harga_produk');
        // $this->db->from('tb_keranjang');
        // $this->db->join('tb_produk', 'tb_keranjang.id_produk=tb_produk.id_produk');
        // $this->db->where('tb_keranjang.id_keranjang', $id_keranjang);
        return $this->db->get($query);
    }

    public function grafik_penjualan_pertahun(){
        $query = $this->db->query("SELECT SUM(grand_total) AS Pendapatan, MONTH(tgl_pesan) AS Bulan, YEAR(tgl_pesan) AS Tahun FROM tb_pesanan GROUP BY YEAR(tgl_pesan), MONTH(tgl_pesan)");
         
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
        // $query = "SELECT count(id_order) AS JumlahTransaksi, MONTH(tgl_pesan) AS TahunFROM tb_pesanan GROUP BY Tahun";
        // return $this->db->get($query);
    }

    public function tampil_data(){
        $query = $this->db->get('tb_provinsi');
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

    public function tampil($table){
        $query = $this->db->get($table);
        return $query->result_array();
    }

    public function tambah_data($data,$table){
        $this->db->insert($table,$data);
    }

    public function hapus_data($tabel,$data){
        $this->db->where($data);
        $this->db->delete($tabel);
    }
    
    public function tampil_kota(){
        $query = $this->db->get('tb_kota');
        return $query->result_array();
     }

    public function view_join($table1,$table2,$field){
        $this->db->select('*');
        $this->db->from($table1);
        $this->db->join($table2, $table1.'.'.$field.'='.$table2.'.'.$field);
        return $this->db->get()->result_array();
    }

    public function view_join_1($table1,$table2,$field1,$field2){
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

    public function del($id_kategori){
        $this->db->where('id_kategori' ,$id_kategori);
        $this->db->delete('tb_kategori');
    }

    public function hapus($id_toko){
        $this->db->where('id_toko' ,$id_toko);
        $this->db->delete('tb_toko');
    }

    public function delete($table, $where){
        return $this->db->delete($table, $where);
    }

    public function view_where($table,$data){
        $this->db->where($data);
        return $this->db->get($table);
    }

    public function view_ordering_limit($table,$order,$ordering,$baris,$dari){
        $this->db->select('*');
        $this->db->order_by($order,$ordering);
        $this->db->limit($dari, $baris);
        return $this->db->get($table);
    }

    public function view_where_ordering_limit($table,$data,$order,$ordering,$baris,$dari){
        $this->db->select('*');
        $this->db->where($data);
        $this->db->order_by($order,$ordering);
        $this->db->limit($dari, $baris);
        return $this->db->get($table);
    }
    
    public function view_ordering($table,$order,$ordering){
        $this->db->select('*');
        $this->db->from($table);
        $this->db->order_by($order,$ordering);
        return $this->db->get()->result_array();
    }

    public function view_where_ordering($table,$data,$order,$ordering){
        $this->db->where($data);
        $this->db->order_by($order,$ordering);
        $query = $this->db->get($table);
        return $query->result_array();
        
    }

    public function view_join_one($table1,$table2,$field,$order,$ordering){
        $this->db->select('*');
        $this->db->from($table1);
        $this->db->join($table2, $table1.'.'.$field.'='.$table2.'.'.$field);
        $this->db->order_by($order,$ordering);
        return $this->db->get()->result_array();
    }

    public function view_join_where($table1,$table2,$field,$where,$order,$ordering){
        $this->db->select('*');
        $this->db->from($table1);
        $this->db->join($table2, $table1.'.'.$field.'='.$table2.'.'.$field);
        $this->db->where($where);
        $this->db->order_by($order,$ordering);
        return $this->db->get()->result_array();
    }

}