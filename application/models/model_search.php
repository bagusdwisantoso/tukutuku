<?php

class Model_search extends CI_Model{

    function ambil_data($table){
        return $this->db->get($table);
    }

    function search($search){
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
        $this->db->like("nama_produk",$search);
        
        return $this->db->get();
    }
}