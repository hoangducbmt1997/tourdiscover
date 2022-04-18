<?php 
class Home extends MY_Controller{
    
    //mặc đinh sẽ load view admin index
    function index () {
       $this->data['temp']='admin/home/index.php';
       //load ra view index cố định + biến nội dung thay đổi trong view index
       $this->load->view('admin/main',$this->data);
       

    }
}



?>