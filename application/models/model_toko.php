<?php

class Model_toko extends CI_Model{
    
    public function tampil_data(){
        $result = $this->db->get('tb_toko');
        if($result->num_rows() > 0){
            return $result->result();
        }else{
            return FALSE;
        }
    }

    public function tampil_asal(){ //untuk proses checkout kurir
        $query = $this->db->get('tb_toko');
        return $query->row();
    }

    public function view_join_where($table1,$table2,$field,$milik,$order,$ordering){
        $this->db->select('*');
        $this->db->from($table1);
        $this->db->join($table2, $table1.'.'.$field.'='.$table2.'.'.$field);
        $this->db->where($table1.'.'.$field, $milik);
        $this->db->order_by($order,$ordering);
        return $this->db->get()->result_array();
    }

    public function view_join($table1,$table2,$field){
        $this->db->select('*');
        $this->db->from($table1);
        $this->db->join($table2, $table1.'.'.$field.'='.$table2.'.'.$field);
        return $this->db->get()->result_array();
    }

    public function join_3tabel($table1,$table2,$table3,$field1,$field2,$field3,$field4){
        $this->db->select('*');
        $this->db->from($table1);
        $this->db->join($table2, $table1.'.'.$field1.'='.$table2.'.'.$field2);
        $this->db->join($table3, $table1.'.'.$field3.'='.$table3.'.'.$field4);
        return $this->db->get()->result_array();
    }


    public function detail_toko($id_toko){
        $this->db->select('*');
        $this->db->from('tb_toko');
        $this->db->join('tb_kota','tb_toko.kota_id = tb_kota.kota_id');
        $result = $this->db->where('id_toko',$id_toko)->get();
        if($result->num_rows() > 0){
            return $result->result();
        }else{
            return false;
        }
    }

    public function del($id_kategori){ //perlu digantiiii
        $this->db->where('id_kategori' ,$id_kategori);
        $this->db->delete('tb_kategori');
    }

    public function hapus_data($tabel,$data){
        $this->db->where($data);
        $this->db->delete($tabel);
    }
    

    public function tambah_toko($data,$table){
        $this->db->insert($table,$data);
    }

    public function edit_toko($where,$table){
        return $this->db->get_where($table,$where);
    }

    public function update_data($where,$data,$table){
        $this->db->where($where);
        $this->db->update($table,$data);
    }

    public function dapat_data($id_toko = null){
        $query = $this->db->get_where('tb_toko',array('id_toko'=>$id_toko))->row();
        return $query;
    }

    public function find($id_toko){
        $result = $this->db->where('id_toko',$id_toko)
                            ->limit(1)
                            ->get('tb_toko');
        if($result->num_rows() > 0){
            return $result->row();
        }else{
            return array();
        }
    }

    public function tampil_kota(){
        $query = $this->db->get('tb_toko'); 
        return $query->result_array();
    }

    
}