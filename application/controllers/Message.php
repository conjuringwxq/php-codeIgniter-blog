<?php defined('BASEPATH') OR exit('No direct script access allowed');
    class Message extends CI_Controller{
        public function __construct(){
            parent::__construct();
        }

        public function sendMsg(){
            $this->load->view('sendMsg.php');
        }
    }

?>