<?php defined('BASEPATH') OR exit('No direct script access allowed');
    class Blog extends CI_Controller{
        public function __construct(){
            parent::__construct();
        }
        public function adminIndex(){
            $this->load->view('adminIndex.php');
        }

        public function index(){
            $search=$this->input->post('q');
            $this->load->model('Blog_model');
            $result=$this->Blog_model->get_article($search);
            $arr['blogs']=$result;

            $rs=$this->Blog_model->index_catalog();
            $arr['blog1']=$rs;

            $rst=$this->Blog_model->User_comments();
            $arr['blog2']=$rst;
            $this->load->view('index.php',$arr);
        }

        public function inbox(){
            $this->load->view('inbox.php');
        }

        public function viewPost_logined(){
            $this->load->view('viewPost_logined.php');
        }

        public function newBlog(){
            $this->load->model('Blog_model');
            $rs=$this->Blog_model->get_catalog();
            $arr['newcata']=$rs;
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

        public function profile(){
            $this->load->view('profile.php');
        }
    }
?>