<?php
class News extends MY_Controller{
    
    //hàm khởi tạo
    function __construct(){
        parent::__construct();
        //load các model news
        $this->load->model('news_model');
    }
    function index(){
        
        //lấy ra tổng số lượng tất cả bài viết trong website
        
        $total_rows=$this->news_model->get_total();
        //gửi biến data['total_rows'] sang view
        $this->data['total_rows']=$total_rows;
        
        //load ra thư viện phân trang
        $this->load->library('pagination');
        $config = array();
        $config['total_rows'] = $total_rows;//tổng tất cả bài viết trên website
        $config['base_url']   = admin_url('news/index'); //link hiển thị ra danh sách bài viết
        $config['per_page']   = 6;//số lượng bài viết hiển thị trên 1 trang
        $config['uri_segment'] = 4;//phân đoạn hiển thị số trang trên url
        $config['next_link']   = 'Trang kế tiếp';
        $config['prev_link']   = 'Trang trước';
        //khởi tạo cấu hình phân trang
        $this->pagination->initialize($config);
        
        $segment = $this->uri->segment(4);
        $segment = intval($segment);
        
        $input = array();
        $input['limit'] = array($config['per_page'], $segment);
        
        // kiểm tra nếu có id thì thực hiện lọc theo id
        $input['where']= array();
        $id = $this->input->get('id');
        $id = intval($id);
        //nếu có biến id
        if($id > 0)
        {
            //lọc theo id
            $input['where']['id'] = $id;
        }
        // kiểm tra nếu có id thì thực hiện lọc theo tên
        $title = $this->input->get('title');
        if($title)
        {
            //lọc theo tên
            $input['like'] = array('title', $title);
        }
                
        //lấy ra ds bài viết
        $list=$this->news_model->get_list($input);
        //gửi biến list qua view
        $this->data['list']=$list;
        
        //lấy ra nội dung của biến messenger
        $message=$this->session->flashdata('message');
        $this->data['message']=$message;
        
        //load view + gửi biến list[data] và [temp] sang view (content)
        //biến data temp
        $this->data['temp']='admin/news/index';
        $this->load->view('admin/main',$this->data);
    }
    //phương thức thêm mới bài viết
    function add (){
                
        //load ra thư viện form + helper
        $this->load->library('form_validation');
        $this->load->helper('form');
        
        //nếu có dữ liệu POST nên thì kiểm tra
        if($this->input->post()){
            //kiểm tra name
            $this->form_validation->set_rules('title','tiêu đề','required');    
            $this->form_validation->set_rules('content','nội dung bài viết','required');
            //kiểm tra nhập liệu chính xác
            if($this->form_validation->run()){
                
                //lấy file ảnh minh họa được upload lên
                $this->load->library('upload_library');
                $upload_path = './public/upload/news';
                $upload_data = $this->upload_library->upload($upload_path,'image');
                $image_link='';
                if(isset($upload_data['file_name'])){
                    
                    $image_link = $upload_data['file_name'];
                }
                
                //lưu dữ liệu
                $data=array(
                    'title'      => $this->input->post('title'),
                    'content'    => $this->input->post('content'),
                    'image_link' => $image_link,            
                    'meta_desc'  => $this->input->post('meta_desc'),
                    'meta_key'   => $this->input->post('meta_key'),
                    'created'    => now(),

                );
                //thêm vào cơ sở dữ liệu
                if($this->news_model->create($data)){
                    //tạo nội dung thông báo
                    $this->session->set_flashdata('message','Thêm bài viết thành công !');
                }else{
                    //tạo nội dung thông báo
                    $this->session->set_flashdata('message','Thêm bài viết thất bại !');
                }
                //chuyển tới trang danh sách danh mục bài viết
                redirect(admin_url('news'));
            }
        }
        //load view + gửi biến list[data] và [temp] sang view (content)
        $this->data['temp']='admin/news/add';
        $this->load->view('admin/main',$this->data);
    }
    //phương thức chỉnh sửa bài viết
    public function edit(){
        //lấy ra id của bài viết
        $id=$this->uri->rsegment('3');
        $news=$this->news_model->get_info($id);
        if(!$news){
            //tạo nội dung thông báo
            $this->session->set_flashdata('message','Không tồn tại bài viết này !');
            redirect(admin_url('news'));
        }
        $this->data['news']=$news;
        
        //load ra thư viện form + helper
        $this->load->library('form_validation');
        $this->load->helper('form');
        
        //nếu có dữ liệu POST nên thì kiểm tra
        if($this->input->post()){
            //kiểm tra name
            $this->form_validation->set_rules('title','tiêu đề','required');
            $this->form_validation->set_rules('content','nội dung bài viết','required');
            
            //kiểm tra nhập liệu chính xác
            if($this->form_validation->run()){
                
                //lấy file ảnh minh họa được upload lên
                $this->load->library('upload_library');
                $upload_path = './public/upload/news';
                $upload_data = $this->upload_library->upload($upload_path,'image');
                $image_link='';
                if(isset($upload_data['file_name'])){
                    $image_link = $upload_data['file_name'];
                }
   
                //lưu dữ liệu
                $data=array(
                    'title'      => $this->input->post('title'),
                    'content'    => $this->input->post('content'),
                    'meta_desc'  => $this->input->post('meta_desc'),
                    'meta_key'   => $this->input->post('meta_key'),
                    'created'    => now(),
                    
                );
                //nếu có cập nhật link ảnh
                if($image_link != ''){
                    //tiến hành cập nhật link
                    $data['image_link']=$image_link;
                }
    
                //thêm vào cơ sở dữ liệu
                if($this->news_model->update($news->id,$data)){
                    //tạo nội dung thông báo
                    $this->session->set_flashdata('message','Cập nhật bài viết thành công !');
                }else{
                    //tạo nội dung thông báo
                    $this->session->set_flashdata('message','Cập nhật bài viết thất bại !');
                }
                //chuyển tới trang danh sách danh mục bài viết
                redirect(admin_url('news'));
            }
        }
        //load view + gửi biến list[data] và [temp] sang view (content)
        $this->data['temp']='admin/news/edit';
        $this->load->view('admin/main',$this->data);
    }
    //phương thức xóa 1 bài viết
    function delete(){
        //lấy id của danh mục bài viết cần xóa
        $id=$this->uri->rsegment('3');
        //ép kiểu dữ liệu
        $this->_del($id);
        
        $this->session->set_flashdata('message','Xóa bài viết thành công !');
        redirect(admin_url('news'));
    }
    
    //phương thức xóa nhiều bài viết
    function delete_all() {
        $ids=$this->input->post('ids');
        //thực hiện lặp xóa id bài viết 
        foreach ($ids as $id){
            $this->_del($id);
        }
    }
    //phương thức xóa bài viết
    private function _del($id) {
        $news=$this->news_model->get_info($id);
        
        if(!$news){
            $this->session->set_flashdata('message','Không tồn tại bài viết này !');
            redirect(admin_url('news'));
        }
        //thực hiện xóa bài viết
        $this->news_model->delete($id);
        //xóa các ảnh của bài viết
        $image_link='./public/upload/news/'.$news->image_link;
        
        if(file_exists($image_link)){
            unlink($image_link);
        }
      
    }
}


?>