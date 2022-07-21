<?php

class Model_auth_toko extends CI_Model{     
    public function cek_login()
    {
        $email      =   set_value('email');
        $password   =   set_value('password');

        $result     =   $this->db->where('email',$email)
                                 ->where('password',$password)
                                 ->limit(1)
                                 ->get('tb_toko');
        if($result->num_rows() > 0){
            return $result->row();
        }else{
            return array();
        }
    }
}