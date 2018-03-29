<?php defined('BASEPATH') OR exit('No direct script access allowed');
    class Blog extends CI_Controller{
        public function __construct(){
            parent::__construct();

        }

        public function index(){
            $this->load->model('Blog_model');
            $result=$this->Blog_model->get_article();
            $arr['blogs']=$result;
            $this->load->view('index.php',$arr);
        }

        public function inbox(){
            $this->load->view('inbox.php');
        }

        public function viewPost_comment(){
            $this->load->view('viewPost_comment.php');
        }

        public function newBlog(){
            $this->load->view('newBlog.php');
        }

        public function blogCatalogs(){
            $this->load->view('blogCatalogs.php');
        }

        public function blogs(){
            $this->load->view('blogs.php');
        }

        public function blogComments(){
            $this->load->view('blogComments.php');
        }
    }
?>