<?php

class Model_auth extends CI_Model{     
    public function cek_login()
    {
        $email_customer   =   set_value('email_customer');
        $password_customer   =   set_value('password_customer');

        $result     =   $this->db->where('email_customer',$email_customer)
                                 ->where('password_customer',$password_customer)
                                 ->limit(1)
                                 ->get('tb_customer');
        if($result->num_rows() > 0){
            return $result->row();
        }else{
            return array();
        }
    }
}