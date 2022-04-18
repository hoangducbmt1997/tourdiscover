<?php

// class MY_Controller kế thừa từ CI_Controller của hệ thống
class MY_Controller extends CI_Controller
{

    // biến gửi dữ liệu sang bên view
    public $data = array();

    /* function khởi tạo */
    function __construct()
    {
        // kế thừa từ CI_Controller
        parent::__construct();
        
        // in ra phân đoạn
        $controller = $this->uri->segment(1);
        // kiểm tra dữ liệu trong admin
        switch ($controller) {
            case 'admin':
                {
                      // xử lý dữ liệu khi truy cập vào admin (controller admin)
                    // gọi hàm kiểm tra đăng nhập
                    $this->load->helper('admin'); // load helper admin
                    $this->_check_login(); // kiểm tra đăng nhập
                    // lấy id của admin qua biến session
                    $admin_id_login = $this->session->userdata('login');
                    $this->data['login'] = $admin_id_login;
                    // kiểm tra admin đã đăng nhập chưa
                    if ($admin_id_login) {
                        $this->load->model('admin_model');
                        $admin_info = $this->admin_model->get_info($admin_id_login);
                        // gửi sang view
                        $this->data['admin_info'] = $admin_info;
                        
                    }
                   
                    break;
                }
            default:
                {
                    // xử lý dữ liệu ở trang ngoài (khác controller admin)
                    
                    // load ra model catalog
                    $this->load->model('catalog_model');
                    $input = array();
                    $input['where'] = array(
                        'parent_id' => 0
                    );
                    $catalog_list = $this->catalog_model->get_list($input);
                    foreach ($catalog_list as $row) {
                        //lấy ra danh mục có parent_id của danh mục cha
                        $input['where'] = array('parent_id' => $row->id);
                        //khi lấy ra sẽ lấy ra tất cả danh mục con
                        $subs = $this->catalog_model->get_list($input);
                        $row->subs = $subs;
                    }
                    $this->data['catalog_list'] = $catalog_list;
   
                    
                    //load ra model tin tức
                    $this->load->model('news_model');
                    $input=array();
                    $input['limit']=array(2,0);
                    $news_list=$this->news_model->get_list($input);
                    $this->data['news_list'] = $news_list;
                    
                    
                    //kiểm tra thành viên đã đăng nhập hay chưa
                    $user_id_login=$this->session->userdata('user_id_login');
                    $this->data['user_id_login']=$user_id_login;
                    
                    //nếu user đã đăng nhập thành công
                    if($user_id_login){
                        $this->load->model('user_model');
                        $user_info=$this->user_model->get_info($user_id_login);
                        $this->data['user_info']=$user_info;
                    }      
                   
                }
        }
    }

    // hàm kiểm tra đăng nhập
    private function _check_login()
    {
        $controller = $this->uri->rsegment('1');
        // ép kiểu về kiểu chữ thường
        $controller = strtolower($controller);
        
        $login = $this->session->userdata('login');
        
        // nếu chưa đăng nhập và truy cập controller khác controller login
        if (! $login && $controller != 'login') {
            // chuyển về trang login
            redirect(admin_url('login'));
        }
        // nếu admin đã đăng nhập thì ngăn không vào trang login
        if ($login && $controller == 'login') {
            // chuyển về trang chủ
            redirect(admin_url('home'));
        }
    }
}