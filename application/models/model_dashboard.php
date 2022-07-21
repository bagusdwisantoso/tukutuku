<?php 

class Model_dashboard extends CI_model{

    public function pendapatan_bulan($bulan,$tahun){
        $this->db->select('SUM(grand_total)');
        $this->db->from('tb_pesanan');
        $this->db->where('MONTH(tgl_pesan)',$bulan);
        $this->db->where('YEAR(tgl_pesan)',$tahun);
        $this->db->where('status=5');
        return $this->db->get()->result_array();
    }

    public function pendapatan_bulan_toko($bulan,$tahun){
        $this->db->select('SUM(grand_total)');
        $this->db->from('tb_detailpesanan');
        $this->db->from('tb_pesanan');
        $this->db->from('tb_produk');
        $this->db->from('tb_toko');
        $this->db->where('tb_detailpesanan.id_produk=tb_produk.id_produk');
        $this->db->where('tb_produk.id_toko=tb_toko.id_toko');
        $this->db->where('tb_pesanan.id_order=tb_detailpesanan.id_order');
        $this->db->where('MONTH(tgl_pesan)',$bulan);
        $this->db->where('YEAR(tgl_pesan)',$tahun);
        $this->db->where('status=5');
        $this->db->where('tb_toko.id_toko',$this->session->userdata('id_toko'));
        return $this->db->get()->result_array();
    }

    public function pendapatan_tahun($tahun){
        $this->db->select('SUM(grand_total)');
        $this->db->from('tb_pesanan');
        $this->db->where('YEAR(tgl_pesan)',$tahun);
        $this->db->where('status=5');
        return $this->db->get()->result_array();
    }

    public function pendapatan_tahun_toko($tahun){
        $this->db->select('SUM(grand_total)');
        $this->db->from('tb_detailpesanan');
        $this->db->from('tb_pesanan');
        $this->db->from('tb_produk');
        $this->db->from('tb_toko');
        $this->db->where('tb_detailpesanan.id_produk=tb_produk.id_produk');
        $this->db->where('tb_produk.id_toko=tb_toko.id_toko');
        $this->db->where('tb_pesanan.id_order=tb_detailpesanan.id_order');
        $this->db->where('YEAR(tgl_pesan)',$tahun);
        $this->db->where('status=5');
        $this->db->where('tb_toko.id_toko',$this->session->userdata('id_toko'));
        return $this->db->get()->result_array();
    }
    public function pendapatan_harian_toko($tanggal){
        $this->db->select('SUM(grand_total)');
        $this->db->from('tb_detailpesanan');
        $this->db->from('tb_pesanan');
        $this->db->from('tb_produk');
        $this->db->from('tb_toko');
        $this->db->where('tb_detailpesanan.id_produk=tb_produk.id_produk');
        $this->db->where('tb_produk.id_toko=tb_toko.id_toko');
        $this->db->where('tb_pesanan.id_order=tb_detailpesanan.id_order');
        $this->db->where('DATE(tgl_pesan)', $tanggal);
        $this->db->where('status=5');
        $this->db->where('tb_toko.id_toko',$this->session->userdata('id_toko'));
        return $this->db->get()->result_array();
    }
    

    public function jumlah_produk(){
        $this->db->select('COUNT(id_produk) as Jumlah');
        $this->db->from('tb_produk');
        $this->db->where('verifikasi_produk="Y"');
        return $this->db->get()->result_array();
    }
    public function jumlah_produk_toko(){
        $this->db->select('COUNT(id_produk) as Jumlah');
        $this->db->from('tb_produk');
        $this->db->from('tb_toko');
        $this->db->where('tb_produk.id_toko=tb_toko.id_toko');
        $this->db->where('tb_produk.id_toko',$this->session->userdata('id_toko'));
        return $this->db->get()->result_array();
    }
    public function publish_toko(){
        $this->db->select('COUNT(id_produk) as Jumlah');
        $this->db->from('tb_produk');
        $this->db->from('tb_toko');
        $this->db->where('tb_produk.id_toko=tb_toko.id_toko');
        $this->db->where('publish_produk="Y"');
        $this->db->where('tb_produk.id_toko',$this->session->userdata('id_toko'));
        return $this->db->get()->result_array();
    }
    public function verif_toko(){
        $this->db->select('COUNT(id_produk) as Jumlah');
        $this->db->from('tb_produk');
        $this->db->from('tb_toko');
        $this->db->where('tb_produk.id_toko=tb_toko.id_toko');
        $this->db->where('verifikasi_produk="Y"');
        $this->db->where('tb_produk.id_toko',$this->session->userdata('id_toko'));
        return $this->db->get()->result_array();
    }
    public function belum_verif_toko(){
        $this->db->select('COUNT(id_produk) as Jumlah');
        $this->db->from('tb_produk');
        $this->db->from('tb_toko');
        $this->db->where('tb_produk.id_toko=tb_toko.id_toko');
        $this->db->where('verifikasi_produk="N"');
        $this->db->where('tb_produk.id_toko',$this->session->userdata('id_toko'));
        return $this->db->get()->result_array();
    }

    public function menunggu_verif(){
        $this->db->select('COUNT(id_order)');
        $this->db->from('tb_pesanan');
        $this->db->where('status=2');
        return $this->db->get()->result_array();
    }

    public function grafik_pendapatan($bulan,$tahun){
        $this->db->select('SUM(grand_total)');
        $this->db->from('tb_pesanan');
        $this->db->where('MONTH(tgl_pesan)',$bulan);
        $this->db->where('YEAR(tgl_pesan)',$tahun);
        $this->db->where('status=5');
        #$this->db->group_by('MONTH(tgl_pesan)');
        return $this->db->get()->result_array();
    }

    public function grafik($tahun){
        $this->db->select('SUM(grand_total) as Pendapatan');
        $this->db->select('MONTH(tgl_pesan) as Bulan');
        $this->db->from('tb_pesanan');
        $this->db->where('status = 5');
        $this->db->where('YEAR(tgl_pesan)',$tahun);
        $this->db->group_by('MONTH(tgl_pesan)');
        $result = $this->db->get();
        if($result->num_rows() > 0){
            foreach($result->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
    public function grafik_toko($tahun){
        $this->db->select('SUM(grand_total) as Pendapatan');
        $this->db->select('MONTH(tgl_pesan) as Bulan');
        $this->db->from('tb_pesanan');
        $this->db->from('tb_detailpesanan');
        $this->db->from('tb_produk');
        $this->db->from('tb_toko');
        $this->db->where('tb_detailpesanan.id_produk=tb_produk.id_produk');
        $this->db->where('tb_produk.id_toko=tb_toko.id_toko');
        $this->db->where('tb_pesanan.id_order=tb_detailpesanan.id_order');
        $this->db->where('status = 5');
        $this->db->where('YEAR(tgl_pesan)',$tahun);
        $this->db->group_by('MONTH(tgl_pesan)');
        $this->db->where('tb_produk.id_toko',$this->session->userdata('id_toko'));
        $result = $this->db->get();
        if($result->num_rows() > 0){
            foreach($result->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }

    public function terlaris(){
        $this->db->select('tb_produk.id_produk as ID');
        $this->db->select('nama_produk');
        $this->db->select('harga_produk');
        $this->db->select('gambar_produk');
        $this->db->select('SUM(qty) as Terjual');
        $this->db->from('tb_detailpesanan');
        $this->db->from('tb_produk');
        $this->db->from('tb_toko');
        $this->db->where('tb_detailpesanan.id_produk=tb_produk.id_produk');
        $this->db->where('tb_produk.id_toko=tb_toko.id_toko');
        $this->db->where('tb_produk.id_toko',$this->session->userdata('id_toko'));
        $this->db->group_by('nama_produk');
        $this->db->order_by('Terjual DESC');
        $this->db->limit('6');
        return $this->db->get()->result_array();
    }

    public function barchart(){
        $this->db->select('nama_kategori');
        $this->db->select('SUM(tb_detailpesanan.harga*tb_detailpesanan.qty) as Pendapatan');
        $this->db->from('tb_kategori');
        $this->db->from('tb_detailpesanan');
        $this->db->from('tb_produk');
        $this->db->where('tb_kategori.id_kategori=tb_produk.kategori_produk');
        $this->db->where('tb_detailpesanan.id_produk=tb_produk.id_produk');
        $this->db->group_by('nama_kategori');
        $result = $this->db->get();
        if($result->num_rows() > 0){
            foreach($result->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }   
    }

    public function piechart(){
        $this->db->select('nama_kategori');
        $this->db->select('SUM(qty) as Jumlah');
        $this->db->from('tb_kategori');
        $this->db->from('tb_detailpesanan');
        $this->db->from('tb_produk');
        $this->db->where('tb_kategori.id_kategori=tb_produk.kategori_produk');
        $this->db->where('tb_detailpesanan.id_produk=tb_produk.id_produk');
        $this->db->group_by('nama_kategori');
        $result = $this->db->get();
        if($result->num_rows() > 0){
            foreach($result->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }   
    }

}