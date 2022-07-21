<?php 

class Model_laporan extends CI_model{

    public function getTahun(){
        $data= $this->db->query("SELECT YEAR(tgl_pesan) AS Tahun 
        FROM tb_pesanan 
        GROUP BY YEAR(tgl_pesan) 
        ORDER BY YEAR(tgl_pesan) ASC");
        return $data->result();
    }

    public function getFotoToko($toko){
        $this->db->select('foto_toko');
        $this->db->from('tb_toko');
        $this->db->where('nama_toko',$toko);
        return $this->db->get()->row()->foto_toko;
    }

    public function tampil_toko(){
        $this->db->select('*');
        $this->db->from('tb_toko');
        $this->db->join('tb_kota','tb_toko.kota_id = tb_kota.kota_id');
        $this->db->where('id_toko',$this->session->userdata('id_toko'));
        return $this->db->get()->row();
    }

    public function toko(){
        $this->db->select('*');
        $this->db->from('tb_toko');
        return $this->db->get()->result_array();
    }

    public function filterTanggal_toko($awal,$akhir){ //laporan toko

        $this->db->select('*');
        $this->db->from('tb_detailpesanan');
        $this->db->join('tb_pesanan','tb_detailpesanan.id_order = tb_pesanan.id_order');		
        $this->db->join('tb_produk','tb_detailpesanan.id_produk = tb_produk.id_produk');
        $this->db->where('status=5');
        $this->db->where("tgl_pesan BETWEEN '$awal' AND '$akhir'");
        $this->db->where('id_toko',$this->session->userdata('id_toko'));
        return $this->db->get()->result_array();

    }

    public function filterBulan_toko($tahun,$bulanawal,$bulanakhir){ // laporan toko

        $this->db->select('*');
        $this->db->from('tb_detailpesanan');
        $this->db->join('tb_pesanan','tb_detailpesanan.id_order = tb_pesanan.id_order');		
        $this->db->join('tb_produk','tb_detailpesanan.id_produk = tb_produk.id_produk');
        $this->db->where('status=5');
        $this->db->where("YEAR(tgl_pesan)=", $tahun);
        $this->db->where("MONTH(tgl_pesan) BETWEEN '$bulanawal' AND '$bulanakhir'");
        $this->db->where('id_toko',$this->session->userdata('id_toko'));
        return $this->db->get()->result_array();
    }

    public function filterTanggal_admin($toko,$awal,$akhir){ // laporan admin

        $this->db->select('*');
        $this->db->select('SUM(qty*tb_detailpesanan.harga) as Pendapatan');
        $this->db->from('tb_detailpesanan');
        $this->db->join('tb_pesanan','tb_detailpesanan.id_order = tb_pesanan.id_order');		
        $this->db->join('tb_produk','tb_detailpesanan.id_produk = tb_produk.id_produk');
        $this->db->join('tb_toko','tb_toko.id_toko = tb_produk.id_toko');
        $this->db->where('status=5');
        $this->db->where("tgl_pesan BETWEEN '$awal' AND '$akhir'");
        $this->db->where('nama_toko',$toko);
        $this->db->order_by('Pendapatan');
        return $this->db->get()->result_array();
    }

    public function filterBulan_admin($toko,$tahun,$bulanawal,$bulanakhir){ // laporan admin

        $this->db->select('*');
        $this->db->from('tb_detailpesanan');
        $this->db->join('tb_pesanan','tb_detailpesanan.id_order = tb_pesanan.id_order');		
        $this->db->join('tb_produk','tb_detailpesanan.id_produk = tb_produk.id_produk');
        $this->db->join('tb_toko','tb_toko.id_toko = tb_produk.id_toko');
        $this->db->where('status=5');
        $this->db->where("YEAR(tgl_pesan)=", $tahun);
        $this->db->where("MONTH(tgl_pesan) BETWEEN '$bulanawal' AND '$bulanakhir'");
        $this->db->where('nama_toko',$toko);
        return $this->db->get()->result_array();
    }

    public function filterTanggal_admin_rekap($awal,$akhir){ // laporan admin rekap pendapatan semua toko

        $this->db->select('*, SUM(tb_detailpesanan.harga*tb_detailpesanan.qty) AS pendapatan');
        $this->db->from('tb_detailpesanan');
        $this->db->join('tb_pesanan','tb_detailpesanan.id_order = tb_pesanan.id_order');		
        $this->db->join('tb_produk','tb_detailpesanan.id_produk = tb_produk.id_produk');
        $this->db->join('tb_toko','tb_toko.id_toko = tb_produk.id_toko');
        $this->db->where('status=5');
        $this->db->where("tgl_pesan BETWEEN '$awal' AND '$akhir'");
        $this->db->group_by("tb_toko.id_toko");
        $this->db->order_by("pendapatan DESC");
        return $this->db->get()->result_array();
    }

    public function filterBulan_admin_rekap($tahun,$bulanawal,$bulanakhir){ // laporan admin rekap pendapatan semua toko

        $this->db->select('*, SUM(tb_detailpesanan.harga*tb_detailpesanan.qty) AS pendapatan');
        $this->db->from('tb_detailpesanan');
        $this->db->join('tb_pesanan','tb_detailpesanan.id_order = tb_pesanan.id_order');		
        $this->db->join('tb_produk','tb_detailpesanan.id_produk = tb_produk.id_produk');
        $this->db->join('tb_toko','tb_toko.id_toko = tb_produk.id_toko');
        $this->db->where('status=5');
        $this->db->where("YEAR(tgl_pesan)=", $tahun);
        $this->db->where("MONTH(tgl_pesan) BETWEEN '$bulanawal' AND '$bulanakhir'");
        $this->db->group_by("tb_toko.id_toko");
        return $this->db->get()->result_array();
    }
}