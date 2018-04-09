<?php defined('BASEPATH') OR exit('No direct script access allowed');
    class Blog_model extends CI_model{
        public function get_article($search){//查询博文，并实现搜素
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
        //删除次级页面文章
        public function delsub_article($title){
            $query=$this->db->delete('t_blogs',array('TITLE' => $title));
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
        //操作viewPost_logined数据
        public function get_comments($id){
            $sql="select * from t_blogs where BLOG_ID='$id'";
            $query=$this->db->query($sql);
            return $query->row();
        }
        //显示下一篇文章
        public function show_next($time){
            $sql="select * from t_blogs 
                  where ADD_TIME<'$time' 
                  order by ADD_TIME desc LIMIT 1";
            $query=$this->db->query($sql);
            return $query->row();
        }
        //显示上一篇文章
        public function show_prev($time){
            $sql="select * from t_blogs 
                  where ADD_TIME>'$time' 
                  order by ADD_TIME LIMIT 1";
            $query=$this->db->query($sql);
            return $query->row();
        }
        //显示谁评论
        public function comment_person($id){
            $sql="select t_users.`NAME`,t_comments.CONTENT,t_comments.ADD_TIME 
                  from t_users,t_blogs,t_comments
                  where t_users.USER_ID=t_comments.COMMENTATOR 
                  and t_blogs.BLOG_ID=t_comments.BLOG_ID 
                  and t_comments.BLOG_ID='$id'
                  ORDER BY t_comments.ADD_TIME DESC";
            $query=$this->db->query($sql);
            return $query->result();
        }
        //进行评论操作
        public function add_announce($content,$id){
            $time=date('Y-m-d h-m-s',time());
            $uid=$this->session->userdata('uid');
            $arr=array(
                'COMMENTATOR'=>$uid,
                'BLOG_ID'=>$id,
                'CONTENT'=>$content,
                'ADD_TIME'=>$time
            );
            $query=$this->db->insert('t_comments',$arr);
            return $query;
        }
        //对评论条数计数
        public function comcount($id){
            $sql="select count(*) AS count from t_comments where BLOG_ID='$id'";
            $query=$this->db->query($sql);
            return $query->result();
        }
        //查询最新博文,只显示最近5条博文
        public function newArticle(){
            $sql="select * from t_blogs,t_blog_catalogs 
                  where t_blogs.CATALOG_ID=t_blog_catalogs.CATALOG_ID 
                  order by t_blogs.ADD_TIME DESC limit 5";
            $query=$this->db->query($sql);
            return $query->result();
        }

        public function alter_catalog($id){
            $sql="select * from t_blogs,t_blog_catalogs 
                  where t_blogs.CATALOG_ID=t_blog_catalogs.CATALOG_ID 
                  and t_blogs.BLOG_ID='$id'";
            $query=$this->db->query($sql);
            return $query->result();
        }

        /*个人信息管理*/
        public function all_msg(){
            $uid=$this->session->userdata('uid');
            $sql="SELECT t_users.NAME,t_messages.ADD_TIME,t_messages.CONTENT,t_messages.SENDER
                  from t_messages,t_users 
                  where t_messages.SENDER=t_users.USER_ID 
                  and RECEIVER='$uid'";
            $query=$this->db->query($sql);
            return $query->result();
        }
        //删除收到的留言
        public function del_Send($id){
            $query=$this->db->delete('t_messages',array('SENDER' => $id));
            return $query;
        }

        //查询收到的留言的条数
        public function send_count(){
            $uid=$this->session->userdata('uid');
            $sql="select count(*) AS count from t_messages where RECEIVER='$uid'";
            $query=$this->db->query($sql);
            return $query->row();
        }
        //已发送留言
        public function received_msg(){
            $uid=$this->session->userdata('uid');
            $sql="SELECT t_users.NAME,t_messages.ADD_TIME,t_messages.CONTENT,t_messages.SENDER
                  from t_messages,t_users 
                  where t_messages.SENDER=t_users.USER_ID 
                  and SENDER='$uid'";
            $query=$this->db->query($sql);
            return $query->result();
        }
        //删除发送的留言
        public function del_Receive($id){
            $query=$this->db->delete('t_messages',array('SENDER' => $id));
            return $query;
        }
        //查询发送的留言的条数
        public function receive_count(){
            $uid=$this->session->userdata('uid');
            $sql="select count(*) AS count from t_messages where SENDER='$uid'";
            $query=$this->db->query($sql);
            return $query->row();
        }
        //显示我的个人信息
        public function show_mydata(){
            $uid=$this->session->userdata('uid');
            $sql="select * from t_users where USER_ID='$uid'";
            $query=$this->db->query($sql);
            return $query->result();
        }

        //更新我的个人信息
        public function update_data($name,$gender,$y,$m,$d,$province,$city,$signature){
            $uid=$this->session->userdata('uid');
            $birthday=$y.'-'.$m.'-'.$d;
            $sql="update t_users
                  set ACCOUNT='$name',
                      GENDER='$gender',
                      BIRTHDAY='$birthday',
                      PROVINCE='$province',
                      CITY='$city',
                      SIGNATURE='$signature'
                  where USER_ID='$uid'";
            $query=$this->db->query($sql);
            return $query;
        }
        //更改密码
        public function updata_pass($pwd,$newpwd){
            $uid=$this->session->userdata('uid');
            $sql="update t_users
                  set t_users.PASSWORD='$newpwd'
                  where t_users.USER_ID='$uid' and t_users.PASSWORD='$pwd'";
            $query=$this->db->query($sql);
            return $query;
        }
        //更改心情
        public function set_mood($space){
            $uid=$this->session->userdata('uid');
            $sql="update t_users
                  set MOOD='$space'
                  where USER_ID='$uid'";
            $query=$this->db->query($sql);
            return $query;
        }

    }


?>