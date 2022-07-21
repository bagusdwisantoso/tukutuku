<?php

class Model_invoice extends CI_Model{
    public function index(){
        date_default_timezone_set('Asia/Jakarta');
        $nama       = $this->input->post('nama');
        $alamat     = $this->input->post('alamat');
        $no_telp    = $this->input->post('no_telp');
        $status     = $this->db->query("SELECT 'status.tb_status' FROM tb_status, tb_invoice WHERE id_status.tb_status = status.tb_invoice");
        
        $invoice = array(
            'nama'          => $nama,
            'alamat'        => $alamat,
            'no_telp'       => $no_telp,
            'tgl_pesan'     => date('Y-m-d H:i:s'),
            'batas_bayar'   => date('Y-m-d H:i:s', mktime(date('H'), date('i'),date('s'),date('m'),date('d') + 1,date('y'))),
            'status'        => $status
            

        );

        $this->db->insert('tb_invoice', $invoice);
        $id_invoice = $this->db->insert_id();


        foreach ($this->cart->contents() as $item){
            $data = array(
                'id_invoice'        => $id_invoice,
                'id_brg'            => $item['id'],
                'nama_brg'          => $item['name'],
                'jumlah'            => $item['qty'],
                'harga'             => $item['price'],
            );  
            $this->db->insert('tb_pesanan',$data);
        }

        return TRUE;
    }

    public function view_join($table1,$table2,$field1,$field2){
        $this->db->select('*');
        $this->db->from($table1);
        $this->db->join($table2, $table1.'.'.$field1.'='.$table2.'.'.$field2);
        return $this->db->get()->result_array();
    }

    public function join_4tabel($table1,$table2,$table3,$table4,$field1,$field2,$field3,$field4,$field5){
        $this->db->select('*');
        $this->db->from($table1);
        $this->db->join($table2, $table1.'.'.$field1.'='.$table2.'.'.$field2);
        $this->db->join($table3, $table1.'.'.$field3.'='.$table3.'.'.$field4);
        $this->db->join($table4, $table1.'.'.$field5.'='.$table4.'.'.$field5);
        return $this->db->get()->result_array();
    }

    public function tampil_data(){
        $result = $this->db->get('tb_pesanan');
        if($result->num_rows() > 0){
            return $result->result();
        }else{
            return FALSE;
        }
    }

    public function pesanan_status($id_invoice){
        $this->db->select('*');
        $this->db->join('tb_status', 'tb_pesanan'.'.'.'status'.'='.'tb_status'.'.'.'id_status');
        $result = $this->db->where('id_order',$id_invoice)->get('tb_pesanan');
        if($result->num_rows() > 0){
            return $result->row();
        }else{
            return false;
        }
    }

    public function detail_produk($id_invoice){
        $this->db->select('*');
        $this->db->join('tb_pesanan', 'tb_detailpesanan'.'.'.'id_order'.'='.'tb_pesanan'.'.'.'id_order');
        $this->db->join('tb_produk', 'tb_detailpesanan'.'.'.'id_produk'.'='.'tb_produk'.'.'.'id_produk');
        $result = $this->db->where('tb_detailpesanan.id_order',$id_invoice)->get('tb_detailpesanan');
        if($result->num_rows() > 0){
            return $result->row();
        }else{
            return false;
        }
    }

    public function produk($id_produk){
        $this->db->select('*');
        $this->db->join('tb_produk', 'tb_detailpesanan'.'.'.'id_produk'.'='.'tb_produk'.'.'.'id_produk');
        $result = $this->db->where('id_produk',$id_produk)->get('tb_detailpesanan');
        if($result->num_rows() > 0){
            return $result->result();
        }else{
            return false;
        }
    }
    

    public function ambil_id_invoice($id_order){// untuk detail pesanan sisi admin
        
        $result = $this->db->where('id_order',$id_order)->limit(1)->get('tb_pesanan');
        if($result->num_rows() > 0){
            return $result->row();
        }else{
            return false;
        }   
    }

    public function ambil_id_pesanan($id_order){// untuk detail pesanan sisi admin
        $this->db->select('*');
        $this->db->from('tb_detailpesanan');
        $this->db->join('tb_produk', 'tb_detailpesanan'.'.'.'id_produk'.'='.'tb_produk'.'.'.'id_produk');
        $this->db->join('tb_pesanan', 'tb_detailpesanan'.'.'.'id_order'.'='.'tb_pesanan'.'.'.'id_order');
        $result = $this->db->where('tb_detailpesanan.id_order',$id_order)->get();
        if($result->num_rows() > 0){
            return $result->result();
        }else{
            return false;
        }
    }

    public function update_data($where,$data,$table){
        $this->db->where($where);
        $this->db->update($table,$data);
    }

}