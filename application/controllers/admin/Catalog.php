<?php
class Catalog extends MY_Controller{
    //hàm khởi tạo
    function __construct(){
        //kế thừa từ MY_Controller
        parent::__construct();
        //load các model catalog
        $this->load->model('catalog_model');
    }
    //Mặc đinh sẽ xuất ra danh sách danh mục sản phẩm
    public function index()
    {
     
       //lấy ra tổng số lượng tất cả danh mục sản phẩn trong website
        
        $total_rows=$this->catalog_model->get_total();
        //gửi biến data['total_rows'] sang view
        $this->data['total_rows']=$total_rows;


         //load ra thư viện phân trang
         $this->load->library('pagination');
         $config = array();
         $config['total_rows'] = $total_rows;//tổng tất cả sản phẩm trên website
         $config['base_url']   = admin_url('catalog/index'); //link hiển thị ra danh sách danh mục sản phẩm
         $config['per_page']   = 10;//số lượng danh mục sản phẩm hiển thị trên 1 trang
         $config['uri_segment'] = 4;//phân đoạn hiển thị số trang trên url
         $config['next_link']   = 'Trang kế tiếp';
         $config['prev_link']   = 'Trang trước';
         //khởi tạo cấu hình phân trang
         $this->pagination->initialize($config);
         
         $segment = $this->uri->segment(4);
         $segment = intval($segment);
         
         $input = array();
         $input['limit'] = array($config['per_page'], $segment);
         $list = $this->catalog_model->get_list($input);
         
        //biến data list 
        $this->data['list']=$list;

        //lấy ra nội dung của biến messenger
        $message=$this->session->flashdata('message');
        $this->data['message']=$message;
        
        //load view + gửi biến list[data] và [temp] sang view (content)
        //biến data temp
        $this->data['temp']='admin/catalog/index'; 
        $this->load->view('admin/main',$this->data);
    }
    //Phương thức thêm mới danh mục sản phẩm
    function add(){
        //load ra thư viện form + helper
        $this->load->library('form_validation');
        $this->load->helper('form');
        
        
        //descrip_title_info
        //nếu có dữ liệu POST nên thì kiểm tra
        if($this->input->post()){
            //kiểm tra name
            $this->form_validation->set_rules('name','tên','required');
            $this->form_validation->set_rules('site_title','tiêu đề phụ','required');
            $this->form_validation->set_rules('title_info','mô tả tiêu đề phụ','required');
        
            //kiểm tra nhập liệu chính xác
            if($this->form_validation->run()){
                
                //thêm vào cơ sở dữ liệu
                $name               =$this->input->post('name');
                $site_title         =$this->input->post('site_title');
                $title_info         =$this->input->post('title_info');
                $parent_id          =$this->input->post('parent_id');
                $sort_order         =$this->input->post('sort_order');
                
                //lấy file ảnh minh họa được upload lên
                $this->load->library('upload_library');
                $upload_path = './public/upload/catalog';
                $upload_data = $this->upload_library->upload($upload_path,'image');
                $image_link='';
                if(isset($upload_data['file_name'])){
                    $image_link = $upload_data['file_name'];
                }
                //lưu dữ liệu
                $data=array(
                    'name'                  =>$name,
                    'parent_id'             =>$parent_id,
                    'sort_order'            =>intval($sort_order),
                    'site_title'            =>$site_title,
                    'title_info'            =>$title_info,
                    'image_link'            =>$image_link
                );
                //thêm vào cơ sở dữ liệu
                if($this->catalog_model->create($data)){
                    //tạo nội dung thông báo
                    $this->session->set_flashdata('message','Thêm danh mục sản phẩm thành công !');
                }else{
                    //tạo nội dung thông báo
                    $this->session->set_flashdata('message','Thêm danh mục sản phẩm thất bại !');
                }
                //chuyển tới trang danh sách danh mục sản phẩm
                redirect(admin_url('catalog'));
                
            }
        }
        
        //lấy ra danh sách danh mục cha
        $input=array();
        $input['where']= array('parent_id' => 0);
        $list=$this->catalog_model->get_list($input);
        //gửi biến data sang view
        $this->data['list']=$list;
        
        //load view add
        $this->data['temp']='admin/catalog/add';
        $this->load->view('admin/main',$this->data);
    }
    //Phương thức chỉnh sửa danh mục sản phẩm
    function edit(){
        //load ra thư viện form + helper
        $this->load->library('form_validation');
        $this->load->helper('form');
        
        $id=$this->uri->rsegment(3);
        $info=$this->catalog_model->get_info($id);
        if(!$info){
            //tạo nội dung thông báo
            $this->session->set_flashdata('message','Không tồn tại danh mục này !');
            redirect(admin_url('catalog'));
        }
        
        //gửi data sang view
        $this->data['info']=$info;
        
        //nếu có dữ liệu POST nên thì kiểm tra
        if($this->input->post()){
            //kiểm tra name
            $this->form_validation->set_rules('name','tên','required');
            
            //kiểm tra nhập liệu chính xác
            if($this->form_validation->run()){
                
                //thêm vào cơ sở dữ liệu
                $name               =$this->input->post('name');
                $site_title         =$this->input->post('site_title');
                $title_info         =$this->input->post('title_info');
                $parent_id          =$this->input->post('parent_id');
                $sort_order         =$this->input->post('sort_order');
                
                //lấy file ảnh minh họa được upload lên
                $this->load->library('upload_library');
                $upload_path = './public/upload/catalog';
                $upload_data = $this->upload_library->upload($upload_path,'image');
                $image_link='';
                if(isset($upload_data['file_name'])){
                    $image_link = $upload_data['file_name'];
                }
                
                //lưu dữ liệu
                $data=array(
                    'name'                  =>$name,
                    'parent_id'             =>$parent_id,
                    'sort_order'            =>intval($sort_order),
                    'site_title'            =>$site_title,
                    'title_info'            =>$title_info
                );
                
                if($image_link != ''){
                    $data['image_link']=$image_link;
                }
                //thêm vào cơ sở dữ liệu
                if($this->catalog_model->update($id,$data)){
                    //tạo nội dung thông báo
                    $this->session->set_flashdata('message','Thêm danh mục sản phẩm thành công !');
                }else{
                    //tạo nội dung thông báo
                    $this->session->set_flashdata('message','Thêm danh mục sản phẩm thất bại !');
                }
                //chuyển tới trang danh sách danh mục sản phẩm
                redirect(admin_url('catalog'));
                
            }
        }
        
        //lấy ra danh sách danh mục cha
        $input=array();
        $input['where']= array('parent_id' => 0);
        $list=$this->catalog_model->get_list($input);
        //gửi biến data sang view
        $this->data['list']=$list;
        
        //load view add
        $this->data['temp']='admin/catalog/edit';
        $this->load->view('admin/main',$this->data);
    }
    //phương thức xóa một danh mục
    function delete() {
        //lấy id của danh mục sản phẩm cần xóa
        $id=$this->uri->rsegment('3');
        //ép kiểu dữ liệu
        $id=intval($id);
        
        $this->_del($id);
        
        //xuất ra thông báo
        $this->session->set_flashdata('message','Xóa danh mục sản phẩm thành công !');
        redirect(admin_url('catalog'));
    }
    //phương thức xóa nhiều danh mục
    function delete_all() {
        //biến id lưu lại danh sách checkbox đc tích
        $ids=$this->input->post('ids');
        //thực hiện hiện vòng lặp xóa với các id tương ứng
        foreach ($ids as $id){
            $this->_del($id,false);
        }
    }
    
    //phương thức xóa 
    //$redirect thực hiện chuyển trang nếu không có ajax (true)
    private function _del($id,$redirect=true) {
        //lấy thông tin danh mục
        $info=$this->catalog_model->get_info($id);       
        if(!$info){
            $this->session->set_flashdata('message','Không tồn tại danh mục sản phẩm này !');
            if($redirect){
                redirect(admin_url('catalog'));
            }
            else {
                return false; 
            }
        }
            
        //load model product
        $this->load->model('product_model');
        
        //kiểm tra danh mục có chứa nhiều hơn 1 sản phẩm hay không
        $product=$this->product_model->get_info_rule(array('catalog_id'=>$id),'id');
        if($product){
            $this->session->set_flashdata('message','Không thể xóa danh mục '.$info->name.' ,bạn cần xóa hết sản phẩm trước khi xóa danh mục !');
            if($redirect){
                redirect(admin_url('catalog'));
            }
        }
        //thực hiện xóa danh mục theo id
        $this->catalog_model->delete($id);
        
        //xóa các ảnh của danh mục
        $image_link='./public/upload/catalog/'.$info->image_link;
        
        if(file_exists($image_link)){
            unlink($image_link);
        }
    }
}

?>