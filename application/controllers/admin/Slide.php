<?php 
    class Slide extends MY_Controller{
        //hàm khởi tạo
        function __construct(){
            parent::__construct();
            //load ra model
            $this->load->model('slide_model');
        }
        
        function index(){
            //lấy ra số lượng tổng slide trong website
            $total_rows=$this->slide_model->get_total();
            //gửi biến total sang view
            $this->data['total_rows']=$total_rows;
            
            $input=array();
            //sắp xếp tăng dần theo sort_order
            $input['order'] = array('sort_order','ASC');
            
            //lấy ra ds slide
            $list=$this->slide_model->get_list($input);
            //gửi biến list qua view
            $this->data['list']=$list;
            
            //lấy ra nội dung của biến messenger
            $message=$this->session->flashdata('message');
            $this->data['message']=$message;
            
            //load view + gửi biến list[data] và [temp] sang view (content)
            //biến data temp
            $this->data['temp']='admin/slide/index';
            $this->load->view('admin/main',$this->data);
            
            
        }
        //phương thức thêm slide
        function add(){
            //load ra thư viện form + helper
            $this->load->library('form_validation');
            $this->load->helper('form');
            
            //nếu có dữ liệu POST nên thì kiểm tra
            if($this->input->post()){
                //kiểm tra name
                $this->form_validation->set_rules('name','tiêu đề slide','required');

                //kiểm tra nhập liệu chính xác
                if($this->form_validation->run()){
                    
                    //lấy file ảnh minh họa được upload lên
                    $this->load->library('upload_library');
                    $upload_path = './public/upload/slide';
                    $upload_data = $this->upload_library->upload($upload_path,'image');
                    $image_link='';
                    if(isset($upload_data['file_name'])){                      
                        $image_link = $upload_data['file_name'];
                    }
                    
                    //lưu dữ liệu
                    $data=array(
                        'name'       => $this->input->post('name'),
                        'image_link' => $image_link,
                        'link'       => $this->input->post('link'),
                        'info'       => $this->input->post('info'),
                        'sort_order' => $this->input->post('sort_order')
          
                    );
                    //thêm vào cơ sở dữ liệu
                    if($this->slide_model->create($data)){
                        //tạo nội dung thông báo
                        $this->session->set_flashdata('message','Thêm slide thành công !');
                    }else{
                        //tạo nội dung thông báo
                        $this->session->set_flashdata('message','Thêm slide thất bại !');
                    }
                    //chuyển tới trang danh sách danh mục slide
                    redirect(admin_url('slide'));
                }
            }
            //load view + gửi biến list[data] và [temp] sang view (content)
            $this->data['temp']='admin/slide/add';
            $this->load->view('admin/main',$this->data);
        }
        //phương thức cập nhật slide
        function edit(){
            //lấy ra id của slide
            $id=$this->uri->rsegment('3');
            $slide=$this->slide_model->get_info($id);
            if(!$slide){
                //tạo nội dung thông báo
                $this->session->set_flashdata('message','Không tồn tại slide này !');
                redirect(admin_url('slide'));
            }
            $this->data['slide']=$slide;
            
            //load ra thư viện form + helper
            $this->load->library('form_validation');
            $this->load->helper('form');
            
            //nếu có dữ liệu POST nên thì kiểm tra
            if($this->input->post()){
                //kiểm tra name
                $this->form_validation->set_rules('name','tiêu đề slide','required');
   
                //kiểm tra nhập liệu chính xác
                if($this->form_validation->run()){
                    
                    //lấy file ảnh minh họa được upload lên
                    $this->load->library('upload_library');
                    $upload_path = './public/upload/slide';
                    $upload_data = $this->upload_library->upload($upload_path,'image');
                    $image_link='';
                    if(isset($upload_data['file_name'])){
                        $image_link = $upload_data['file_name'];
                    }
                    
                    //lưu dữ liệu
                    //lưu dữ liệu
                    $data=array(
                        'name'       => $this->input->post('name'),
                        'link'       => $this->input->post('link'),
                        'info'       => $this->input->post('info'),
                        'sort_order' => $this->input->post('sort_order')
                        
                    );
                    //nếu có cập nhật link ảnh
                    if($image_link != ''){
                        //tiến hành cập nhật link
                        $data['image_link']=$image_link;
                    }
                    
                    //thêm vào cơ sở dữ liệu
                    if($this->slide_model->update($slide->id,$data)){
                        //tạo nội dung thông báo
                        $this->session->set_flashdata('message','Cập nhật slide thành công !');
                    }else{
                        //tạo nội dung thông báo
                        $this->session->set_flashdata('message','Cập nhật slide thất bại !');
                    }
                    //chuyển tới trang danh sách danh mục slide
                    redirect(admin_url('slide'));
                }
            }
            //load view + gửi biến list[data] và [temp] sang view (content)
            $this->data['temp']='admin/slide/edit';
            $this->load->view('admin/main',$this->data);
        }
        //phương thức xóa slide theo id
        function delete(){
            //lấy id của danh mục slide cần xóa
            $id=$this->uri->rsegment('3');
            //ép kiểu dữ liệu
            $this->_del($id);
            
            $this->session->set_flashdata('message','Xóa slide thành công !');
            redirect(admin_url('slide'));
            
        }
        //phương thức xóa tất cả slide theo id đã chọn
        function delete_all(){
            $ids=$this->input->post('ids');
            //thực hiện lặp xóa id slide
            foreach ($ids as $id){
                $this->_del($id);
            }
        }
        //phương thức xóa slide
        private function _del($id){
            $slide=$this->slide_model->get_info($id);
            
            if(!$slide){
                $this->session->set_flashdata('message','Không tồn tại slide này !');
                redirect(admin_url('slide'));
            }
            //thực hiện xóa slide
            $this->slide_model->delete($id);
            //xóa các ảnh của slide
            $image_link='./public/upload/slide/'.$slide->image_link;
            
            if(file_exists($image_link)){
                unlink($image_link);
            }
            
        }
        
        
    }

?>