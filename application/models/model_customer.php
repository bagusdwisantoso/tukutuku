<?php

class Model_customer extends CI_Model{
    
    public function tampil_data(){
        $result = $this->db->get('tb_customer');
        if($result->num_rows() > 0){
            return $result->result();
        }else{
            return FALSE;
        }
    }

    public function tambah_customer($data,$table){
        $this->db->insert($table,$data);
    }

    public function edit_customer($where,$table){
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

    public function dapat_data($id_customer = null){
        $query = $this->db->get_where('tb_customer',array('id_customer'=>$id_customer))->row();
        return $query;
    }

    public function find($id_customer){
        $result = $this->db->where('id_customer',$id_customer)
                            ->limit(1)
                            ->get('tb_customer');
        if($result->num_rows() > 0){
            return $result->row();
        }else{
            return array();
        }
    }

    public function detail($id_customer){
        $result = $this->db->where('id_customer',$id_customer)->get('tb_customer');
        if($result->num_rows() > 0){
            return $result->result();
        }else{
            return false;
        }
    }
}