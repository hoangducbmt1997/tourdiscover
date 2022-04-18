<?php

class User extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
    }

    /*
     * Kiểm tra email đã tồn tại chưa
     */
    function check_email()
    {
        $email = $this->input->post('email');
        $where = array(
            'email' => $email
        );
        // kiểm tra xem email đã tồn tại chưa
        if ($this->user_model->check_exists($where)) {
            // trả về thông báo lỗi
            $this->form_validation->set_message(__FUNCTION__, 'Email đã tồn tại');
            return false;
        }
        return true;
    }

    /*
     * Đăng ký thành viên
     */
    function register()
    {
        // nếu đăng nhập thì chuyển về trang thông tin thành viên
        if ($this->session->userdata('user_id_login')) {
            redirect(site_url('user'));
        }
        
        $this->load->library('form_validation');
        $this->load->helper('form');
        
        // nếu có dữ liệu post lên thì kiểm tra
        if ($this->input->post()) {
            $this->form_validation->set_rules('name', 'Name', 'required|min_length[8]');
            $this->form_validation->set_rules('email', 'Email ', 'required|valid_email|callback_check_email');
            $this->form_validation->set_rules('password', 'password', 'required|min_length[6]');
            $this->form_validation->set_rules('re_password', 'repassword', 'matches[password]');
            $this->form_validation->set_rules('agree-term', 'agree term', 'required');
            
            // nhập liệu chính xác
            if ($this->form_validation->run()) {
                // thêm vào csdl
                $password = $this->input->post('password');
                $password = md5($password);
                
                $data = array(
                    'name' => $this->input->post('name'),
                    'email' => $this->input->post('email'),
                    'password' => $password,
                    'created' => now()
                );
                if ($this->user_model->create($data)) {
                    $this->session->set_flashdata('message', 'Register account successfully!');
                    
                } else {
                    $this->session->set_flashdata('message', 'Register account fail!');
                }

                redirect(site_url('user/login'));
            }
        }
        
        // hiển thị form đăng kí ra view
        $this->data['temp'] = 'site/user/register';
        $this->load->view('site/layout', $this->data);
    }

    /*
     * Kiểm tra đăng nhập
     */
    function login()
    {
        // nếu đăng nhập thì chuyển về trang thông tin thành viên
        /*
        if ($this->session->userdata('user_id_login')) {
            redirect(site_url('user'));
        }*/
        
        $this->load->library('form_validation');
        $this->load->helper('form');
        
        if ($this->input->post()) {
            $this->form_validation->set_rules('email', 'Email đăng nhập', 'required|valid_email');
            $this->form_validation->set_rules('password', 'Mật khẩu', 'required|min_length[6]');
            $this->form_validation->set_rules('login', 'login', 'callback_check_login');
            if ($this->form_validation->run()) {
                // lấy thông tin thành viên
                $user = $this->_get_user_info();
                // gắn session id của thành viên đã đăng nhập
                $this->session->set_userdata('user_id_login', $user->id);               
                $this->session->set_flashdata('message', 'Đăng nhập thành công');
                redirect();
            }
        }
        
        //lấy nội dung của biến message
        $message=$this->session->flashdata('message');
        $this->data['message'] = $message;
        
        // hiển thị ra view
        $this->data['temp'] = 'site/user/login';
        $this->load->view('site/layout', $this->data);
    }

    /*
     * Kiểm tra email và password có chính xác hay không
     */
    function check_login()
    {
        $user = $this->_get_user_info();
        if ($user) {
            return true;
        }
        $this->form_validation->set_message(__FUNCTION__, 'Không đăng nhập thành công');
        return false;
    }

    /*
     * Lấy thông tin của thành viên
     */
    private function _get_user_info()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $password = md5($password);
        
        $where = array(
            'email' => $email,
            'password' => $password
        );
        $user = $this->user_model->get_info_rule($where);
        return $user;
    }

    /*
     * Chỉnh sửa thông tin thành viên
     */
    function edit()
    {
        if (! $this->session->userdata('user_id_login')) {
            redirect(site_url('user/login'));
        }
        // lấy thông tin của thành viên
        $user_id = $this->session->userdata('user_id_login');
        $user = $this->user_model->get_info($user_id);
        if (! $user) {
            redirect();
        }
        $this->data['user'] = $user;
        
        $this->load->library('form_validation');
        $this->load->helper('form');
        
        // nếu có dữ liệu post lên thì kiểm tra
        if ($this->input->post()) {
            $password = $this->input->post('password');
            
            $this->form_validation->set_rules('name', 'Tên', 'required|min_length[8]');
            if ($password) {
                $this->form_validation->set_rules('password', 'password', 'required|min_length[6]');
                $this->form_validation->set_rules('re_password', 'repassword', 'matches[password]');
            }
            
            // nhập liệu chính xác
            if ($this->form_validation->run()) {
                // them vao csdl
                $data = array(
                    'name' => $this->input->post('name')
                );
                if ($password) {
                    $data['password'] = md5($password);
                }
                if ($this->user_model->update($user_id, $data)) {
                    // tạo ra nội dung thông báo
                    $this->session->set_flashdata('message', 'Chỉnh sửa thông tin thành công');
                } else {
                    $this->session->set_flashdata('message', 'Không thành công');
                }
                // chuyển tới trang thông tin user
                redirect(site_url('user'));
            }
        }
        
        // hiển thị ra view
        $this->data['temp'] = 'site/user/edit';
        $this->load->view('site/layout', $this->data);
    }

    /*
     * Thông tin của thành viên
     */
    /*
    function index()
    {
        if (! $this->session->userdata('user_id_login')) {
            redirect();
        }
        $user_id = $this->session->userdata('user_id_login');
        $user = $this->user_model->get_info($user_id);
        if (! $user) {
            redirect();
        }
        $this->data['user'] = $user;
        
        // hiển thị ra view
        $this->data['temp'] = 'site/user/index';
        $this->load->view('site/layout', $this->data);
    }*/

    /*
     * Thực hiện đăng xuất
     */
    function logout()
    {
        if ($this->session->userdata('user_id_login')) {
            $this->session->unset_userdata('user_id_login');
        }
        $this->session->set_flashdata('message', 'Đăng xuất thành công');
        redirect();
    }
}

