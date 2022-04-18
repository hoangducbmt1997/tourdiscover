<?php 
class Home extends MY_Controller{
    ////mặc đinh sẽ load view home index
    function index(){
        
        //load ra model cuả slide (vì chỉ xuất hiện trong trang chủ nên chỉ viết trong home controller)
        $this->load->model('slide_model');
        //sắp xếp thứ tự hiển thị slide
        $input['order'] = array('sort_order','ASC');
        $slide_list=$this->slide_model->get_list($input);    
        $this->data['slide_list']=$slide_list;
        
        //lấy ra model product
        $this->load->model('product_model');
        
        //lấy ra sản phẩm nổi bật
        
        $input_hot_list=array();
        $input_hot_list['where'] = array('hot_product' => 1);
        $input_hot_list['limit'] = array('2','0');
        $product_hot_list=$this->product_model->get_list($input_hot_list);
        $this->data['product_hot_list']=$product_hot_list;
        
        //lây ra danh sách sản phẩm
        $input=array();
        $product_list=$this->product_model->get_list($input);
        $this->data['product_list']=$product_list;
        
        
        //load ra view index 
        $this->data['temp']='site/home/content_home';   
        $this->load->view('site/layout',$this->data);      
        
    }
} 
?>