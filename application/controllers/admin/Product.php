<?php 
class Product extends MY_Controller{
    
    //hàm khởi tạo
    function __construct(){
        parent::__construct();
        //load các model product
        $this->load->model('product_model');
    }
    function index(){
        
        //lấy ra tổng số lượng tất cả sản phẩn trong website
        
        $total_rows=$this->product_model->get_total();
        //gửi biến data['total_rows'] sang view
        $this->data['total_rows']=$total_rows;

        //load ra thư viện phân trang
        $this->load->library('pagination');
        $config = array();
        $config['total_rows'] = $total_rows;//tổng tất cả sản phẩm trên website
        $config['base_url']   = admin_url('product/index'); //link hiển thị ra danh sách sản phẩm
        $config['per_page']   = 6;//số lượng sản phẩm hiển thị trên 1 trang
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
        $name = $this->input->get('name');
        if($name)
        {
            //lọc theo tên
            $input['like'] = array('name', $name);
        }
        
        /* 
        @ lọc theo tên danh mục
        @ kiểm tra nếu có catalog thì thực hiện lọc theo catalog
        */
        $catalog_id = $this->input->get('catalog');
        
        $catalog_id = intval($catalog_id);
        if($catalog_id > 0)
        {
            $input['where']['catalog_id'] = $catalog_id;
        }
        
        //lấy ra ds sản phẩm
        $list=$this->product_model->get_list($input);
        //gửi biến list qua view
        $this->data['list']=$list;
                    
        //lấy ra danh sách danh mục sản phẩm 
        $this->load->model('catalog_model');
        $input          = array();
        $input['where'] = array('parent_id' => 0);
        $catalogs       = $this->catalog_model->get_list($input);
        foreach ($catalogs as $row)
        {
            $input['where'] = array('parent_id' => $row->id);
            $subs           = $this->catalog_model->get_list($input);
            $row->subs      = $subs;
        }
        //truyền biến sang view
        $this->data['catalogs']=$catalogs;

        //lấy ra nội dung của biến messenger
        $message=$this->session->flashdata('message');
        $this->data['message']=$message;
        
        //load view + gửi biến list[data] và [temp] sang view (content)
        //biến data temp
        $this->data['temp']='admin/product/index';
        $this->load->view('admin/main',$this->data);
    }
    function add (){

        //lấy ra danh sách danh mục sản phẩm 
        $this->load->model('catalog_model');
        $input          = array();
        $input['where'] = array('parent_id' => 0);
        $catalogs       = $this->catalog_model->get_list($input);
        foreach ($catalogs as $row)
        {
            $input['where'] = array('parent_id' => $row->id);
            $subs = $this->catalog_model->get_list($input);
            $row->subs = $subs;
        }
        //truyền biến sang view
        $this->data['catalogs']=$catalogs;

                //load ra thư viện form + helper
                $this->load->library('form_validation');
                $this->load->helper('form');
                
                //nếu có dữ liệu POST nên thì kiểm tra
                if($this->input->post()){
                    //kiểm tra name,thể loại,giá
                    $this->form_validation->set_rules('name','tên','required');
                    $this->form_validation->set_rules('catalog','danh mục','required');
                    $this->form_validation->set_rules('price','giá','required');
                    $this->form_validation->set_rules('content_decrip','mô tả phụ sản phẩm','required');
                    //kiểm tra nhập liệu chính xác
                    if($this->form_validation->run()){
                        
                        //thêm vào cơ sở dữ liệu
                        $name           = $this->input->post('name');
                        $catalog_id     = $this->input->post('catalog');
                        $price          = $this->input->post('price');
                        $discount       = $this->input->post('discount');
                        $hot_product    = $this->input->post('hot_product');
                        $content_decrip = $this->input->post('content_decrip');
                        
                        //lấy file ảnh minh họa được upload lên
                        $this->load->library('upload_library');
                        $upload_path = './public/upload/product';
                        $upload_data = $this->upload_library->upload($upload_path,'image');
                        $image_link='';
                        if(isset($upload_data['file_name'])){
                            $image_link = $upload_data['file_name'];
                        }
                        //bỏ dấu ','  
                        $price      = str_replace(',','',$price);
                        $discount      = str_replace(',','',$discount);
                        //upload ảnh kèm theo
                        $image_list = '';
                        $image_list = $this->upload_library->upload_file($upload_path,'image_list');
                        //chuyển mảng dữ liệu về dạng json để lưu vào csdl vì k lưu mảng đc
                        $image_list = json_encode($image_list);

                        //lưu dữ liệu
                        $data=array(
                            'name'          => $name,
                            'catalog_id'    => $catalog_id,
                            'price'         => $price,
                            'image_link'    => $image_link,
                            'image_list'    => $image_list,
                            'discount'      => $discount,
                            'content_decrip'=> $content_decrip,
                            'hot_product'   => $this->input->post('hot_product'),
                            'gifts'         => $this->input->post('gifts'),
                            'site_title'    => $this->input->post('site_title'),
                            'meta_desc'     => $this->input->post('meta_desc'),
                            'meta_key'      => $this->input->post('meta_key'),
                            'content'       => $this->input->post('content')
                        );
                        //thêm vào cơ sở dữ liệu
                        if($this->product_model->create($data)){
                            //tạo nội dung thông báo
                            $this->session->set_flashdata('message','Thêm sản phẩm thành công !');
                        }else{
                            //tạo nội dung thông báo
                            $this->session->set_flashdata('message','Thêm sản phẩm thất bại !');
                        }
                        //chuyển tới trang danh sách danh mục sản phẩm
                        redirect(admin_url('product'));                      
                    }
                }
        //load view + gửi biến list[data] và [temp] sang view (content)
        $this->data['temp']='admin/product/add';
        $this->load->view('admin/main',$this->data);
    }
    public function edit(){
        //lấy ra id của sản phẩm
        $id=$this->uri->rsegment('3');
        $product=$this->product_model->get_info($id);
        if(!$product){
            //tạo nội dung thông báo
            $this->session->set_flashdata('message','Không tồn tại sản phẩm này !');
            redirect(admin_url('product'));
        }
        $this->data['product']=$product;

        //lấy ra danh sách danh mục sản phẩm 
        $this->load->model('catalog_model');
        $input          = array();
        $input['where'] = array('parent_id' => 0);
        $catalogs       = $this->catalog_model->get_list($input);
        foreach ($catalogs as $row)
        {
            $input['where'] = array('parent_id' => $row->id);
            $subs = $this->catalog_model->get_list($input);
            $row->subs = $subs;
        }
        //truyền biến sang view
        $this->data['catalogs']=$catalogs;

                //load ra thư viện form + helper
                $this->load->library('form_validation');
                $this->load->helper('form');
                
                //nếu có dữ liệu POST nên thì kiểm tra
                if($this->input->post()){
                    //kiểm tra name
                    $this->form_validation->set_rules('name','tên','required');
                    //kiểm tra nhập liệu chính xác
                    if($this->form_validation->run()){
                        
                        //thêm vào cơ sở dữ liệu
                        $name           = $this->input->post('name');
                        $catalog_id     = $this->input->post('catalog');
                        $price          = $this->input->post('price');
                        $discount       = $this->input->post('discount');
                        $hot_product    = $this->input->post('hot_product');
                        $content_decrip = $this->input->post('content_decrip');

                        //lấy file ảnh minh họa được upload lên
                        $this->load->library('upload_library');
                        $upload_path = './public/upload/product';
                        $upload_data = $this->upload_library->upload($upload_path,'image');
                        $image_link='';
                        if(isset($upload_data['file_name'])){
                            $image_link = $upload_data['file_name'];
                        }
                        //bỏ dấu ','  
                        $price      = str_replace(',','',$price);
                        $discount      = str_replace(',','',$discount);


                        //upload ảnh kèm theo
                        $image_list = '';
                        $image_list = $this->upload_library->upload_file($upload_path,'image_list');
                        //chuyển mảng dữ liệu về dạng json để lưu vào csdl vì k lưu mảng đc
                        $image_list_json = json_encode($image_list);

                        //lưu dữ liệu
                        $data=array(
                            'name'           => $name,
                            'catalog_id'    => $catalog_id,
                            'price'         => $price,
                            'discount'      => $discount,
                            'content_decrip'=> $content_decrip,
                            'hot_product'   => $this->input->post('hot_product'),
                            'gifts'         => $this->input->post('gifts'),
                            'site_title'    => $this->input->post('site_title'),
                            'meta_desc'     => $this->input->post('meta_desc'),
                            'meta_key'      => $this->input->post('meta_key'),
                            'content'       => $this->input->post('content'),
                            'created'       => now()
                        );

                        if($image_link != ''){
                            $data['image_link']=$image_link;
                        }
                        if(!empty($image_list)){
                            $data['image_list']=$image_list_json;
                        }
                        //thêm vào cơ sở dữ liệu
                        if($this->product_model->update($product->id,$data)){
                            //tạo nội dung thông báo
                            $this->session->set_flashdata('message','Cập nhật sản phẩm thành công !');
                        }else{
                            //tạo nội dung thông báo
                            $this->session->set_flashdata('message','Cập nhật sản phẩm thất bại !');
                        }
                        //chuyển tới trang danh sách danh mục sản phẩm
                        redirect(admin_url('product'));                      
                    }
                }
        //load view + gửi biến list[data] và [temp] sang view (content)
        $this->data['temp']='admin/product/edit';
        $this->load->view('admin/main',$this->data);
    }
    //phương thức xóa 1 sản phẩm
    function delete(){
        //lấy id của danh mục sản phẩm cần xóa
        $id=$this->uri->rsegment('3');
        //ép kiểu dữ liệu
       $this->_del($id);
   
        $this->session->set_flashdata('message','Xóa sản phẩm thành công !');
        redirect(admin_url('product'));
    }
    
    //phương thức xóa nhiều sản phẩm 
    function delete_all() {
        $ids=$this->input->post('ids');
        foreach ($ids as $id){
            $this->_del($id);
        }
    }
    //phương thức xóa sản phẩm 
    private function _del($id) {
        $product=$this->product_model->get_info($id);
        
        if(!$product){
            $this->session->set_flashdata('message','Không tồn tại sản phẩm này !');
            redirect(admin_url('product'));
        }
        //thực hiện xóa sản phẩm theo id
        $this->product_model->delete($id);
        //xóa các ảnh của sản phẩm
        $image_link='./public/upload/product/'.$product->image_link;
        
        if(file_exists($image_link)){
            unlink($image_link);
        }
        //xóa tất cả các ảnh kèm theo
        $image_list = json_decode($product->image_list);
        if(is_array($image_list)){
            foreach($image_list as $img){
                $image_link='./public/upload/product/'.$img;
                if(file_exists($image_link)){
                    unlink($image_link);
                }
            }
        }
    }
}


?>