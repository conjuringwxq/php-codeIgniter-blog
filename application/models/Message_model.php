<?php
    class Message_model extends CI_Model{
        public function my_reply($sid){
            $sql="select t_users.NAME,t_messages.RECEIVER
                  from t_messages,t_users 
                  where RECEIVER='$sid' and t_messages.RECEIVER=t_users.USER_ID";
            $query=$this->db->query($sql);
            return $query->row();
        }
        //发送留言内容
        public function message_content($rid,$content){
            $time=date('Y-m-d h-m-s',time());
            $uid=$this->session->userdata('uid');
            $arr=array(
                'SENDER'=>$uid,
                'RECEIVER'=>$rid,
                'CONTENT'=>$content,
                'ADD_TIME'=>$time
            );//插入数据
            $query=$this->db->insert('t_messages',$arr);
            return $query;
        }
        //显示最新博文
        public function new_art(){
            $sql="select * from t_blogs,t_blog_catalogs 
                  where t_blogs.CATALOG_ID=t_blog_catalogs.CATALOG_ID 
                  order by t_blogs.ADD_TIME DESC limit 5";
            $query=$this->db->query($sql);
            return $query->result();
        }








    }


?>