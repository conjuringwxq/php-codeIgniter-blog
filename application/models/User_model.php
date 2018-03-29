<?php defined('BASEPATH') OR exit('No direct script access allowed');
    class User_model extends CI_model{
        public function reg_data($data){
            $query=$this->db->insert('t_users',$data);
            return $query;
        }

        public function sel_name($name,$pass){
            $this->db->where('ACCOUNT',$name);
            $this->db->where('PASSWORD',$pass);
            $query=$this->db->get('t_users');
            return $query->row();
        }

    }

?>