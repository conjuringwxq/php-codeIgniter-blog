<?php defined('BASEPATH') OR exit('No direct script access allowed');
    class Message extends CI_Controller{
        public function __construct(){
            parent::__construct();
        }

        public function sendMsg(){
            $sid=$this->input->get('id');
            $this->load->model('Message_model');

            $rs=$this->Message_model->my_reply($sid);
            $arr['sendTo']=$rs;
            $result=$this->Message_model->new_art();
            $arr['new']=$result;
            $this->load->view('sendMsg.php',$arr);
        }

        public function do_sendMsg(){
            $rid=$this->input->get('id');//没取到
            $content=$this->input->post('content');
            $this->load->model('Message_model');
            $result=$this->Message_model->message_content($rid,$content);
            if($result){
                redirect('Message/sendMsgOK');
            }
        }

        public function sendMsgOK(){
            $this->load->model('Message_model');
            $result=$this->Message_model->new_art();
            $arr['new']=$result;
            $this->load->view('sendMsgOK.php',$arr);
        }
    }

?>