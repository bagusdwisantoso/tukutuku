<?php

class Model_produk extends CI_Model{
    public function tampil_data_dashboard(){
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
        $this->db->where('verifikasi_produk','Y');
        $this->db->where('publish_produk','Y');
        $this->db->group_by('nama_produk');
        $this->db->order_by('nama_produk');
        $this->db->limit('30');
        return $this->db->get();
    }

    public function tampil_data(){
        $this->db->select('tb_produk.id_produk as ID');
        $this->db->select('nama_produk');
        $this->db->select('harga_produk');
        $this->db->select('nama_toko');
        $this->db->select('gambar_produk');
        $this->db->from('tb_produk');
        $this->db->from('tb_toko');
        $this->db->where('tb_produk.id_toko=tb_toko.id_toko');
        $this->db->where('verifikasi_produk','Y');
        $this->db->where('publish_produk','Y');
        $this->db->order_by('nama_produk');
        return $this->db->get();
    }

    public function produk_menunggu_verifikasi_toko(){ //untuk daftar produk di Admin belum publish
        $this->db->select('*');
        $this->db->from('tb_produk');
        $this->db->join('tb_toko','tb_toko.id_toko = tb_produk.id_toko');
        $this->db->join('tb_kategori','tb_produk.kategori_produk = tb_kategori.id_kategori');
        $this->db->where('verifikasi_produk','N');
        $this->db->where('publish_produk','N');
        $this->db->where('tb_produk.id_toko',$this->session->userdata('id_toko'));
        return $this->db->get()->result_array();
    }

    public function produk_belum_publish_toko(){ //untuk daftar produk di Admin belum publish
        $this->db->select('*');
        $this->db->from('tb_produk');
        $this->db->join('tb_toko','tb_toko.id_toko = tb_produk.id_toko');
        $this->db->join('tb_kategori','tb_produk.kategori_produk = tb_kategori.id_kategori');
        $this->db->where('verifikasi_produk','Y');
        $this->db->where('publish_produk','N');
        $this->db->where('tb_produk.id_toko',$this->session->userdata('id_toko'));
        return $this->db->get()->result_array();
    }

    public function produk_sedang_publish_toko(){ //untuk daftar produk di Toko sedang publish
        $this->db->select('*');
        $this->db->from('tb_produk');
        $this->db->join('tb_toko','tb_toko.id_toko = tb_produk.id_toko');
        $this->db->join('tb_kategori','tb_produk.kategori_produk = tb_kategori.id_kategori');
        $this->db->where('verifikasi_produk','Y');
        $this->db->where('publish_produk','Y');
        $this->db->where('tb_produk.id_toko',$this->session->userdata('id_toko'));
        return $this->db->get()->result_array();
    }

    public function produk_menunggu_verifikasi(){ //untuk daftar produk di Admin menunggu verifikasi
        $this->db->select('*');
        $this->db->from('tb_produk');
        $this->db->where('verifikasi_produk','N');		
        $this->db->join('tb_toko','tb_toko.id_toko = tb_produk.id_toko');
        $this->db->join('tb_kategori','tb_produk.kategori_produk = tb_kategori.id_kategori');
        $this->db->order_by('tb_produk.id_produk');
        $this->db->group_by('tb_produk.id_produk');
        return $this->db->get()->result_array();
    }

    public function produk_belum_publish(){ //untuk daftar produk di Admin belum publish
        $this->db->select('*');
        $this->db->from('tb_produk');
        $this->db->where('verifikasi_produk','Y');
        $this->db->where('publish_produk','N');
        $this->db->join('tb_toko','tb_toko.id_toko = tb_produk.id_toko');
        $this->db->join('tb_kategori','tb_produk.kategori_produk = tb_kategori.id_kategori');
        $this->db->order_by('tb_produk.id_produk');
        $this->db->group_by('tb_produk.id_produk');
        return $this->db->get()->result_array();
    }

    public function produk_sedang_publish(){ //untuk daftar produk di Admin sedang publish
        $this->db->select('*');
        $this->db->from('tb_produk');
        $this->db->where('verifikasi_produk','Y');
        $this->db->where('publish_produk','Y');
        $this->db->join('tb_toko','tb_toko.id_toko = tb_produk.id_toko');
        $this->db->join('tb_kategori','tb_produk.kategori_produk = tb_kategori.id_kategori');
        $this->db->order_by('tb_produk.id_produk');
        $this->db->group_by('tb_produk.id_produk');
        return $this->db->get()->result_array();
    }

    public function view_join($table1,$table2,$field){
        $this->db->select('*');
        $this->db->from($table1);
        $this->db->join($table2, $table1.'.'.$field.'='.$table2.'.'.$field);
        return $this->db->get()->result_array();
    }

    public function produk(){   
        $this->db->select('*');
        $this->db->from('tb_produk');
        $this->db->join('tb_toko','tb_produk.id_toko = tb_toko.id_toko');
        $this->db->join('tb_kategori','tb_produk.kategori_produk = tb_kategori.id_kategori');
        return $this->db->get()->result_array();
    }

    public function detail_produk($id_produk){
        $this->db->select('*');
        $this->db->from('tb_produk');
        $this->db->from('tb_kota');
        $this->db->from('tb_toko');
        $this->db->from('tb_kategori');
        $this->db->where('tb_produk.id_toko = tb_toko.id_toko');
        $this->db->where('tb_produk.kategori_produk = tb_kategori.id_kategori');
        $this->db->where('tb_toko.kota_id = tb_kota.kota_id');
        $result = $this->db->where('id_produk',$id_produk)->get();
        if($result->num_rows() > 0){
            return $result->result();
        }else{
            return false;
        }
    }

    public function detail_barang($id_produk){
        $this->db->select('*');
        $this->db->from('tb_produk');
        $this->db->where('id_produk',$id_produk);
        return $this->db->get()->row();
    }
    public function penjualan($id_produk){
        $this->db->select('SUM(qty) as Terjual');
        $this->db->from('tb_produk');
        $this->db->from('tb_detailpesanan');
        $this->db->where('tb_produk.id_produk = tb_detailpesanan.id_produk');
        $result = $this->db->where('tb_produk.id_produk',$id_produk)->get();
        if($result->num_rows() > 0){
            return $result->result();
        }else{
            return false;
        }
    }

    public function tampil_kategori(){
        $query = $this->db->get('tb_kategori');
        return $query->result_array();
     }

    public function tampil_toko(){
        $query = $this->db->get('tb_toko'); 
        return $query->result_array();
    }

    public function tambah_produk($data,$table){
        $this->db->insert($table,$data);
    }

    public function edit_produk($where,$table){
        return $this->db->get_where($table,$where);
    }

    public function update_data($where,$data,$table){
        $this->db->where($where);
        $this->db->update($table,$data);
    }

    public function hapus_data($tabel,$data){
        $this->db->where($data);
        $this->db->delete($tabel);
    }

    public function dapat_data($id_produk = null){
        $query = $this->db->get_where('tb_produk',array('id_produk'=>$id_produk))->row();
        return $query;
    }

    public function find($id){
        $result = $this->db->where('id_produk',$id)
                            ->limit(1)
                            ->get('tb_produk');
        if($result->num_rows() > 0){
            return $result->row();
        }else{
            return array();
        }
    }

}