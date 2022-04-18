<?php 
    //khởi tạo class kế thừa từ MY_Controller
    class Login extends MY_Controller{
        function index(){
            //load ra thư viện form + helper
            $this->load->library('form_validation');
            $this->load->helper('form');
            
            $username=$this->input->post('username');
            
            //nếu dữ liệu login đc post lên
            if($this->input->post()){
                $this->form_validation->set_rules('login','login','callback_check_login');
                
                //kiểm tra phương thức run (thực hiện thành công)
                if($this->form_validation->run()){
                    //lấy ra thông tin của admin
                    $user=$this->_get_admin_info();
      
                    //gắn session id của admin 
                    $this->session->set_userdata('login',$user->id);
                    redirect(admin_url('home'));
                }
            }
            $this->load->view('admin/login/index.php');
        }
        //kiểm tra username và password có chính xác ko
        function check_login() {   
            $user=$this->_get_admin_info();
            if($user){      
                return true;            
            }
            else {
                $this->form_validation->set_message(__FUNCTION__,"Tài khoản hoặc mật khẩu không đúng !");
                return false;
            }
        }
        //hàm kiểm tra và lấy ra thông tin của admin
        private function _get_admin_info(){
            $username=$this->input->post('username');
            $password=$this->input->post('password');
            //mã hóa password để kiểm tra
            $password=md5($password);
            //load model admin
            $this->load->model('admin_model');
            $where= array('username'=>$username,'password'=>$password);  
            $user=$this->admin_model->get_info_rule($where);
            
            return $user;
        }
    }
?>