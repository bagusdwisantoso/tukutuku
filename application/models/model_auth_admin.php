<?php

class Model_auth_admin extends CI_Model{     
    public function cek_login()
    {
        $email_admin      =   set_value('email_admin');
        $password_Admin   =   set_value('password_admin');

        $result     =   $this->db->where('email_admin',$email_admin)
                                 ->where('password_admin',$password_Admin)
                                 ->limit(1)
                                 ->get('tb_admin');
        if($result->num_rows() > 0){
            return $result->row();
        }else{
            return array();
        }
    }
}