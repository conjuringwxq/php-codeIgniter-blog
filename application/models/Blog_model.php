<?php defined('BASEPATH') OR exit('No direct script access allowed');
    class Blog_model extends CI_model{
        public function get_article($search){
            $sql="select * from t_blogs,t_blog_catalogs 
                  where t_blogs.CATALOG_ID=t_blog_catalogs.CATALOG_ID 
                  and TITLE like '%$search%' ESCAPE '!' 
                  order by t_blogs.ADD_TIME DESC";
            $query=$this->db->query($sql);
            return $query->result();
        }

        public function index_catalog(){
            $sql="select NAME , count(*) AS count 
                  from t_blogs,t_blog_catalogs 
                  where t_blogs.CATALOG_ID=t_blog_catalogs.CATALOG_ID 
                  group by NAME order by count DESC";
            $query=$this->db->query($sql);
            return $query->result();
        }

        public function addcata($cataname,$order){
            $arr=array(
                'NAME'=>$cataname,
                'CATALOG_ID'=>$order,
                'USER_ID'=>$this->session->userdata('uid')
            );
            $query=$this->db->insert('t_blog_catalogs',$arr);
            return $query;
        }

        public function get_catalog(){
//            $id=$this->session->userdata('uid');
            $sql="select * from t_blog_catalogs";
            $query=$this->db->query($sql);
            return $query->result();
        }
        //计数
        /*select CATALOG_ID,NAME,USER_ID,BLOG_COUNT, count(*) AS count
          from t_blog_catalogs,t_blogs
          where t_blog_catalogs.CATALOG_ID=t_blogs.CATALOG_ID and USER_ID=$id
          group by NAME order by CATALOG_ID*/

        public function get_catalogid($id){
            $sql="select * from t_blog_catalogs where CATALOG_ID='$id'";
            $query=$this->db->query($sql);
            return $query->row();
        }


        public function amend_catalog($editarr){
//            $uid=$this->session->userdata('uid');
            $sql="update t_blog_catalogs 
                  set NAME=\"$editarr[0]\" 
                  where CATALOG_ID='$editarr[1]'";
            $query=$this->db->query($sql);
            return $query;
        }

        public function add_pass($title,$cid,$content,$type){
            $time=date('Y-m-d h-m-s',time());
            $uid=$this->session->userdata('uid');
            $arr=array(
                'TITLE'=>$title,
                'CATALOG_ID'=>$cid,
                'CONTENT'=>$content,
                'ADD_TIME'=>$time,
                'IS_YOURS'=>$type,
                'WRITER'=>$uid
            );
            $query=$this->db->insert('t_blogs',$arr);
            return $query;
        }

        public function my_blogs(){
            $this->db->order_by('ADD_TIME','DESC');
            $query=$this->db->get('t_blogs');
            return $query->result();
        }


        public function del_essay($id){
            $query=$this->db->delete('t_blogs',array('BLOG_ID' => $id));
            return $query;
        }

        public function del_article($delarr){
            for($i=0;$i<count($delarr);$i++){
                $query=$this->db->delete('t_blogs', array('TITLE' => $delarr[$i]));
            }
            return $query;
        }

        public function del_cata($bid){
            $query=$this->db->delete('t_blog_catalogs',array('CATALOG_ID' => $bid));
            return $query;
        }

        public function del_com($comid){
            $query=$this->db->delete('t_comments',array('COMMENT_ID' => $comid));
            return $query;
        }

        public function del_comall($tator){
            $query=$this->db->delete('t_comments',array('COMMENTATOR' => $tator));
            return $query;
        }

        public function User_comments(){
            $sql="select t_users.ACCOUNT,t_blogs.TITLE,t_comments.CONTENT,
                         t_comments.ADD_TIME,t_comments.COMMENT_ID,t_comments.COMMENTATOR
                  from t_comments,t_users,t_blogs 
                  where t_comments.COMMENTATOR=t_users.USER_ID 
                  and t_comments.BLOG_ID=t_blogs.BLOG_ID
                  ORDER BY t_comments.ADD_TIME DESC";
            $query=$this->db->query($sql);
            return $query->result();
        }

    }

?>