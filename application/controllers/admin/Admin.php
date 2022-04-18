<?php 

    //class Admin kế thừa từ MY_Controller
    class Admin extends MY_Controller
    {
        //phương thức khởi tạo
        function __construct(){
            //ưu tiên chạy phương thức construc() trước
            parent::__construct();
            //load các model admin
            $this->load->model('admin_model');
        }
        //mặc định sẽ hiển thị danh sách quản trị viên
        function index() {
      
            //load ra tổng số admin
            $total=$this->admin_model->get_total();
            $this->data['total']=$total; 
            
            //load ra thư viện phân trang
            $this->load->library('pagination');
            $config = array();
            $config['total_rows'] = $total;//tổng tất cả sản phẩm trên website
            $config['base_url']   = admin_url('admin/index'); //link hiển thị ra danh sách danh mục sản phẩm
            $config['per_page']   = 4;//số lượng danh mục sản phẩm hiển thị trên 1 trang
            $config['uri_segment'] = 4;//phân đoạn hiển thị số trang trên url
            $config['next_link']   = 'Trang kế tiếp';
            $config['prev_link']   = 'Trang trước';
            //khởi tạo cấu hình phân trang
            $this->pagination->initialize($config);
            
            $segment = $this->uri->segment(4);
            $segment = intval($segment);
            
            //biến mảng input
            $input = array();
            $input['limit'] = array($config['per_page'], $segment);
            
            // load ra danh sác dữ liệu
            $list=$this->admin_model->get_list($input);
            $this->data['list']=$list;
            
            //lấy ra nội dung của biến messenger
            $message=$this->session->flashdata('message');
            $this->data['message']=$message;
            
             
            $this->data['temp']='admin/admin/index';
            $this->load->view('admin/main',$this->data);
            
        }
        
        //hàm kiểu tra admin đã tồn tại     
        function check_username(){
            //kiểm tra username đã tồn tại trong csdl
            $username=$this->input->post('username');
            $where=array('username'=>$username);
            if($this->admin_model->check_exists($where)){
                //trả về thông báo lỗi
                $this->form_validation->set_message(__FUNCTION__,'Tài khoản đã tồn tại');
                return false;
            }
            else {
                return true;
            }
        }
        
        //phương thức thêm admin
        function add(){
            //load ra thư viện form + helper
            $this->load->library('form_validation');
            $this->load->helper('form');
            
            //nếu có dữ liệu POST nên thì kiểm tra
            if($this->input->post()){
                
                $this->form_validation->set_rules('name','tên','required|min_length[8]');
                $this->form_validation->set_rules('username','tài khoản đăng nhập','required|callback_check_username');
                $this->form_validation->set_rules('password','mật khẩu','required|min_length[6]');
                $this->form_validation->set_rules('re_password','nhập lại mật khẩu','matches[password]');
                
                //kiểm tra nhập liệu chính xác  
                if($this->form_validation->run()){
                    //thêm vào cơ sở dữ liệu
                    $name=$this->input->post('name');
                    $username=$this->input->post('username');
                    $password=$this->input->post('password');
                    
                    $data=array(
                        'name'=>$name,
                        'username'=>$username,
                        'password'=>md5($password)
                    );
                    if($this->admin_model->create($data)){
                        //tạo nội dung thông báo
                        $this->session->set_flashdata('message','Tạo tài khoản thành công !');
                    }else{
                        //tạo nội dung thông báo
                        $this->session->set_flashdata('message','Tạo tài khoản thất bại !');
                    }
                    //chuyển tới trang danh sách quản trị viên
                    redirect(admin_url('admin'));
                    
                }
            }
            //load view add
            $this->data['temp']='admin/admin/add';
            $this->load->view('admin/main',$this->data);
        }
        
        //Phương thức chỉnh sửa thông tin quản trị viên
        function edit() {
            
            //load ra thư viện form + helper
            $this->load->library('form_validation');
            $this->load->helper('form');
            
            //lấy id của quản trị viên cần chỉnh sửa
            $id=$this->uri->rsegment('3');
            //ép kiểu dữ liệu
            $id=intval($id);
                              
            //lấy thông tin của quản trị viên
            $info=$this->admin_model->get_info($id);
            if(!$info){
                $this->session->set_flashdata('message','Không tồn tại quản trị viên này !');
                redirect(admin_url('admin'));
            }
            //gửi giá trị biến info sang view
            $this->data['info']=$info;
            
            //nếu có dữ liệu POST lên
            if($this->input->post()){
                $this->form_validation->set_rules('name','tên','required|min_length[8]');
                $this->form_validation->set_rules('username','tài khoản đăng nhập','required');                       
                
                $password=$this->input->post('password');
                //nếu có biến password được POST lên
                if($password){
                    $this->form_validation->set_rules('password','mật khẩu','required|min_length[6]');
                    $this->form_validation->set_rules('re_password','nhập lại mật khẩu','matches[password]');
                }
                             
                //kiểm tra nhập liệu chính xác  
                if($this->form_validation->run()){
                    //thêm vào cơ sở dữ liệu
                    $name=$this->input->post('name');
                    $username=$this->input->post('username');                    
                                         
                    //nếu input username hiện tại nó khác với username của id hiện tại thì kiểm tra
                    if( $username <> $info->username)
                    {    
                        // kiểm tra có tồn tại username đó hay chưa nếu chưa thì nhập lại ,nhập đủ
                        $this->form_validation->set_rules('username', 'tài khoản đăng nhập', 'required|callback_check_username');
                    }
                    else
                    {
                        // kiểm tra có tồn tại username đó hay chưa nếu rồi thì chỉ cần nhập đủ
                        $this->form_validation->set_rules('username', 'tài khoản đăng nhập', 'required');
                    }
                    //nếu input username hiện tại nó trùng với username của id hiện tại thì update bình thường

                    //lưu nội dung của người dùng
                    $data=array(
                        'name'=>$name,
                        'username'=>$username
                    );
                    //nếu username có dữ liệu thì gán dữ liệu
                    if($username)
                    {
                        $data['username'] = $username;
                    }
                    //nếu password có dữ liệu thì mã hóa rồi gán dữ liệu
                    if($password){
                        $data['password']=md5($password);
                    }
                    if($this->admin_model->update($id,$data)){
                        //tạo nội dung thông báo
                        $this->session->set_flashdata('message','Cập nhật dữ liệu thành công !');
                    }else{
                        //tạo nội dung thông báo
                        $this->session->set_flashdata('message','Cập nhật dữ liệu thất bại !');
                    }
                    //chuyển tới trang danh sách quản trị viên
                    redirect(admin_url('admin'));
                }
            }
            //load view edit
            $this->data['temp']='admin/admin/edit';
            $this->load->view('admin/main',$this->data);
        }
        
        //Phương thức xóa quản trị viên
        function delete() {
            //lấy id của quản trị viên cần xóa
            $id=$this->uri->rsegment('3');
            //ép kiểu dữ liệu
            $id=intval($id);
            $info=$this->admin_model->get_info($id);
            
            if(!$info){
                $this->session->set_flashdata('message','Không tồn tại quản trị viên này !');
                redirect(admin_url('admin'));
            }
            //thực hiện xóa
            $this->admin_model->delete($id);
            
            $this->session->set_flashdata('message','Xóa quản trị viên thành công !');
            redirect(admin_url('admin'));
        }
        //Phương thức xuất ra tên login admin
        
        //Phương thức đăng xuất
        function logout(){
            //nếu người dùng đã đăng nhập
            if($this->session->userdata('login')){
                //hủy session của người dùng
               $this->session->unset_userdata('login');
            }
            //chuyển hướng về trang đăng nhập
            redirect(admin_url('login'));
        }
        
    }
        

?>