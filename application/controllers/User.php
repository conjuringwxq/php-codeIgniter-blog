<?php defined('BASEPATH') OR exit('No direct script access allowed');
    class User extends CI_Controller{
        public function __construct(){
            parent::__construct();
            $this->load->helper('captcha');
        }

        public function index(){
            $vals = array(
                'word'      => rand(1000,9999),
                'img_path'  => './captcha/',
                'img_url'   => base_url().'captcha/',
                // 'font_path' => './path/to/fonts/texb.ttf',
                'img_width' => '150',
                'img_height'    => 30,
                'expiration'    => 7200,
                'word_length'   => 8,
                'font_size' => 16,
                // 'img_id'    => 'Imageid',
                // 'pool'      => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',

                // White background and border, black text and red grid
                'colors'    => array(
                'background' => array(255, 255, 255),
                'border' => array(255, 255, 255),
                'text' => array(0, 0, 0),
                'grid' => array(255, 40, 40)
                )
            );
            $cap = create_captcha($vals);
            $data['capt']=$cap;
            if(isset($_GET['name'])){
                $_SESSION['word']=$cap['word'];
                echo json_encode($cap);
            }else{
                $this->load->view('reg.php',$data);
            }
        }

        public function reg(){
            $this->load->view('reg.php');
        }

        public function do_reg(){
            //接收数据
            $account=$this->input->post('email');
            $name=$this->input->post('name');
            $pass=$this->input->post('pwd');
            $pass2=$this->input->post('pwd2');
            $sex=$this->input->post('gender');
            $province=$this->input->post('province');
            $city=$this->input->post('city');
            //数据验证
            if($pass!=$pass2){
                $this->load->view('reg.php');
            }else{
                $data=array(
                    'ACCOUNT'=>$account,
                    'PASSWORD'=>$pass,
                    'NAME'=>$name,
                    'GENDER'=>$sex,
                    'PROVINCE'=>$province,
                    'CITY'=>$city
                );
                //访问数据库
                $this->load->model('User_model');
                $result=$this->User_model->reg_data($data);
                if($result){
                    redirect('User/login');
                }else{
                    $this->reg();
                }
            }
        }

        public function login(){
            $this->load->view('login.php');
        }

        public function do_login(){
            $name=$this->input->post('email');
            $pass=$this->input->post('pwd');

            $this->load->model('User_model');
            $result=$this->User_model->sel_name($name,$pass);
            if($result){
                $array=array(
                    'uid'=>$result->USER_ID,
                    'uname'=>$result->NAME
                );
                $this->session->set_userdata($array);
                redirect('Blog/index');
            }
        }

        public function unlogin(){
            unset($_SESSION['uid']);
            unset($_SESSION['uname']);
            redirect('User/unindex');
        }

        public function unindex(){
            $this->load->view('unindex');
        }

        public function checkcode(){
            $code=$this->input->post('code');
            if($code!=$_SESSION['word']){
                echo "error";
            }else{
                echo "success";
            }
        }
    }
?>