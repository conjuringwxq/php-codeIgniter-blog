<?php defined('BASEPATH') OR exit('No direct script access allowed');
    class Blog extends CI_Controller{
        public function __construct(){
            parent::__construct();
        }
        public function adminIndex(){
            $this->load->view('adminIndex.php');
        }

        public function index(){
            $search=$this->input->post('q');//搜索功能
            $this->load->model('Blog_model');
            $result=$this->Blog_model->get_article($search);
            $arr['blogs']=$result;//查询到的数据动态传给页面

            $rs=$this->Blog_model->index_catalog();
            $arr['blog1']=$rs;

            $rst=$this->Blog_model->User_comments();
            $arr['blog2']=$rst;
            $this->load->view('index.php',$arr);
        }

        //跳转到评论页面
        public function viewPost_logined(){
            $urltext=$this->input->get('id');
            //截取字符串 第一部分
            $id=substr($urltext,0,strrpos($urltext,"?"));
            //截取字符串 第二部分
            $time=substr($urltext,-19);

            $this->load->model('Blog_model');

            $rs=$this->Blog_model->get_comments($id);
            $arr['userRatings']=$rs;
            $res=$this->Blog_model->show_next($time);
            $arr['next']=$res;
            $resu=$this->Blog_model->show_prev($time);
            $arr['prev']=$resu;
            $resul=$this->Blog_model->comment_person($id);
            $arr['ator']=$resul;
            //显示评论条数
            $result=$this->Blog_model->comcount($id);
            $arr['cou']=$result;
            $rst=$this->Blog_model->newArticle();
            $arr['nArticle']=$rst;


            $this->load->view('viewPost_logined.php',$arr);
        }
        //发表评论
        public function announce(){
            $content=$this->input->post('content');
            $id=$this->input->post('id');

            $this->load->model('Blog_model');
            $rs=$this->Blog_model->add_announce($content,$id);
            if($rs){
                echo json_encode($id);
            }
        }

        public function newBlog(){
            $id=$this->input->get('id');
            $this->load->model('Blog_model');

            $rs=$this->Blog_model->get_catalog();
            $arr['newcata']=$rs;
            $result=$this->Blog_model->alter_catalog($id);
            $arr['alter']=$result;

            $this->load->view('newBlog.php',$arr);
        }

        public function do_add(){
            $title=$this->input->post('title');
            $cid=$this->input->post('catalog');
            $content=$this->input->post('content');
            $type=$this->input->post('type');
//            $preivacy=$this->input->post('privacy');
//            $deny=$this->input->post('deny_comment');
//            $astop=$this->input->post('as_top');

//            $arr=array($title,$catalog,$content,$type,$preivacy,$deny,$astop);
            $this->load->model('Blog_model');
            $result=$this->Blog_model->add_pass($title,$cid,$content,$type);
            if($result){
                redirect('Blog/newBlog');
            }
        }

        public function blogCatalogs(){
            $this->load->model('Blog_model');
            $result=$this->Blog_model->get_catalog();
            $arr['cata']=$result;
            $this->load->view('blogCatalogs.php',$arr);
        }

        public function add_catalog(){
            $cataname=$this->input->post('cata');
            $order=$this->input->post('sort_order');

            $this->load->model('Blog_model');
            $result=$this->Blog_model->addcata($cataname,$order);
            if($result){
                redirect('Blog/blogCatalogs');
            }
        }

        //博客设置/分类管理
        public function editCatalog(){
            $this->load->model('Blog_model');
            $rs=$this->Blog_model->get_catalog();
            $arr['cata']=$rs;

            $id=$this->input->get('id');
            $result=$this->Blog_model->get_catalogid($id);
            $arr['amd']=$result;

            $editarr=$this->input->post('editarr');
            $res=$this->Blog_model->amend_catalog($editarr);
            if($res){
                echo json_encode();
            }else{
                echo '修改数据失败，代码:404，请稍候再试';
            }

            $this->load->view('editCatalog.php',$arr);
        }

        public function blogs(){
            $this->load->model('Blog_model');
            $rs=$this->Blog_model->my_blogs();
            $arr['mbk']=$rs;
            $this->load->view('blogs.php',$arr);
        }

        public function blogComments(){
            $this->load->model('Blog_model');
            $rs=$this->Blog_model->User_comments();
            $arr['ucom']=$rs;
            $this->load->view('blogComments.php',$arr);
        }

        public function delete(){
            $delarr=$this->input->post('delarr');

            $this->load->model('Blog_model');
            $rs=$this->Blog_model->del_article($delarr);
            if($rs){
                echo json_encode($delarr);
            }else{
                echo 'error';
            }
        }

        public function del(){
            $id=$this->input->get('id');

            $this->load->model('Blog_model');
            $result=$this->Blog_model->del_essay($id);
            if($result){
                echo json_encode($id);
            }else{
                echo '删除数据失败，代码:404，请稍候再试';
            }
        }

        public function blogdel(){
            $bid=$this->input->get('bid');

            $this->load->model('Blog_model');
            $rs=$this->Blog_model->del_cata($bid);
            if($rs){
                echo json_encode($bid);
            }else{
                echo '删除数据失败，代码:404，请稍候再试';
            }
        }

        public function comdel(){
            $comid=$this->input->get('comid');

            $this->load->model('Blog_model');
            $rs=$this->Blog_model->del_com($comid);
            if($rs){
                echo json_encode($comid);
            }else{
                echo '删除数据失败，代码:404，请稍候再试';
            }
        }

        public function all_comdel(){
            $tator=$this->input->get('commentator');

            $this->load->model('Blog_model');
            $rs=$this->Blog_model->del_comall($tator);
            if($rs){
                echo json_encode($tator);
            }else{
                echo '删除数据失败，代码:404，请稍候再试';
            }
        }
        //次级删除该文章
        public function delsub(){
            $title=$this->input->post('title');
            $this->load->model('Blog_model');
            $rs=$this->Blog_model->delsub_article($title);
            if($rs){
                echo json_encode($title);
            }else{
                echo '删除数据失败，代码:404，请稍候再试';
            }
        }

        /*个人信息管理*/
        public function inbox(){//所有留言
            $this->load->model('Blog_model');

            $rs=$this->Blog_model->all_msg();
            $arr['receive']=$rs;
            $result=$this->Blog_model->send_count();
            $arr['send_count']=$result;

            $this->load->view('inbox.php',$arr);
        }
        public function outbox(){//已发送留言
            $this->load->model('Blog_model');

            $rs=$this->Blog_model->received_msg();
            $arr['send']=$rs;
            $result=$this->Blog_model->receive_count();
            $arr['receive_count']=$result;

            $this->load->view('outbox.php',$arr);
        }
        //删除已经收到的留言
        public function delsend_msg(){
            $id=$this->input->post('del');
            $this->load->model('Blog_model');
            $rs=$this->Blog_model->del_Send($id);
            if($rs){
                echo json_encode($id);
            }else{
                echo '删除数据失败，代码:404，请稍候再试';
            }
        }
        //删除已发送的留言
        public function delreceive_msg(){
            $id=$this->input->post('del');
            $this->load->model('Blog_model');
            $rs=$this->Blog_model->del_Receive($id);
            if($rs){
                echo json_encode($id);
            }else{
                echo '删除数据失败，代码:404，请稍候再试';
            }
        }

        public function profile(){
            $this->load->model('Blog_model');
            $rs=$this->Blog_model->show_mydata();
            $arr['mydata']=$rs;
            $this->load->view('profile.php',$arr);
        }

        public function do_profile(){
            $name=$this->input->post('name');
            $gender=$this->input->post('gender');
            $y=$this->input->post('y');
            $m=$this->input->post('m');
            $d=$this->input->post('d');
            $province=$this->input->post('province');
            $city=$this->input->post('city');
            $signature=$this->input->post('signature');

            $this->load->model('Blog_model');
            $rs=$this->Blog_model->update_data($name,$gender,$y,$m,$d,$province,$city,$signature);
            if($rs){
                redirect('Blog/adminIndex');
            }
        }
        //查询旧密码
        public function chpwd(){
            $this->load->view('chpwd.php');
        }
        //更改密码
        public function do_chpwd(){
            $pwd=$this->input->post('pwd');
            $newpwd=$this->input->post('newpwd');
            $newpwd2=$this->input->post('newpwd2');

            if($newpwd!=$newpwd2){
                redirect('Blog/chpwd');
            }else{
                $this->load->model('Blog_model');
                $rs=$this->Blog_model->updata_pass($pwd,$newpwd);
                if($rs){
                    redirect('Blog/adminIndex');
                }
            }
        }
        //修改心情
        public function update_userSettings(){
            $space=$this->input->post('space_name');
            $this->load->model('Blog_model');
            $rs=$this->Blog_model->set_mood($space);//更改心情
            if($rs){
                redirect('Blog/userSettings');//正常应该跳到adminIndex
            }
        }
        //设置心情session,读取心情
        public function userSettings(){
            $this->load->model('Blog_model');
            $rs=$this->Blog_model->show_mood();//查询心情
            if($rs){
                $array=array(
                    'umood'=>$rs[0]->MOOD,
                );
                $this->session->set_userdata($array);
            }
            $arr['myMOOD']=$rs;
            $this->load->view('userSettings.php',$arr);
        }
    }
?>