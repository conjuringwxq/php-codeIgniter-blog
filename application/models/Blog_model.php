<?php defined('BASEPATH') OR exit('No direct script access allowed');
    class Blog_model extends CI_model{
        public function get_article(){
            $this->db->where('t_blogs.CATALOG_ID=t_blog_catalogs.CATALOG_ID');
            $query=$this->db->get('t_blogs,t_blog_catalogs');
            return $query->result();
        }
    }


?>