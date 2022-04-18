<?php 

    class Product extends MY_Controller{
        function __construct(){
            parent::__construct();
            //load ra model product
            $this->load->model('product_model');
        }
        function catalog(){
            //lấy id của thể loại
            $id=intval($this->uri->rsegment(3));
            $this->load->model('catalog_model');
            //lấy danh sách danh mục thuộc sản phẩm đó
            $input = array();
            $input['where'] = array('catalog_id'=>$id);
            $catalog=$this->catalog_model->get_info($id);
            
            if(!$catalog){
                redirect();
            }
            $this->data['catalog']=$catalog;
            //load ra thư viện phân trang
            $this->load->library('pagination');
            $config = array();
            $config['base_url']   = base_url('product/catalog'.$id); //link hiển thị ra danh sách sản phẩm
            $config['per_page']   = 6;//số lượng sản phẩm hiển thị trên 1 trang
            $config['uri_segment'] = 4;//phân đoạn hiển thị số trang trên url
            $config['next_link']   = 'Trang kế tiếp';
            $config['prev_link']   = 'Trang trước';
            //khởi tạo cấu hình phân trang
            $this->pagination->initialize($config);
            
            $segment = $this->uri->segment(4);
            $segment = intval($segment);  
            $input['limit'] = array($config['per_page'], $segment);
            
            
            //lấy ra ds sản phẩm
            $list=$this->product_model->get_list($input);
            //gửi biến list qua view
            $this->data['list']=$list;

            //hiển thị ra view index
            $this->data['temp']='site/product/catalog';
            $this->load->view('site/layout',$this->data);
   
        }
        function view(){
            //lấy id của sản phẩm muốn xem
            $id=$this->uri->rsegment(3);
            $this->load->model('catalog_model');
            
            $product=$this->product_model->get_info($id);
            if(!$product){
                redirect();
            }
            //lấy ra danh sách ảnh kèm theo
            $image_list=json_decode($product->image_list);
            
            $this->data['image_list']=$image_list;

            $this->data['product']=$product;
            $catalog=$this->catalog_model->get_info($product->catalog_id);
            $this->data['catalog']=$catalog;
            
            //lấy ra lượt view của sản phẩm
            $data=array();
            $data['view']=$product->view+1;
            $this->product_model->update($product->id,$data);
            
            //hiển thị ra view index
            $this->data['temp']='site/product/view';
            $this->load->view('site/layout',$this->data);
        }
        
        //phương thức tìm kiếm theo keyword
        function search(){
            
            if($this->uri->rsegment('3')==1){
                //lấy dữ liêu từ autocomplate
                $key=$this->input->get('term');
            }else {
                $key=$this->input->get('key-search');
            }           
            $this->data['key']=trim($key);
            $input=array();
            $input['like']=array('name',$key);
            $list=$this->product_model->get_list($input);
            //trả kết quả trả về dưới danh sách
            $this->data['list']=$list;
            
            //nếu tìm kiếm gợi ý
            if($this->uri->rsegment('3')==1){
                //xử lý auto complete
               $result=array();
               foreach ($list as $row){
                   $item=array();
                   $item['id']=$row->id;
                   $item['label']=$row->name;
                   $item['label2']=$row->name;
                   $item['value']=$row->name;
                  
                   $result[]=$item;
               }
               //dữ liệu trả về dưới dạng json
               die(json_encode($result));
            }
            else {
                //load ra view
                $this->data['temp'] = 'site/product/search';
                $this->load->view('site/layout', $this->data);
            }
                 
        }
        //phương thức tìm kiếm tất cả sản phẩm theo giá
        function search_price()
        {
            $price_from = intval($this->input->get('price_from'));
            $price_to   = intval($this->input->get('price_to'));
            $this->data['price_from'] = $price_from;
            $this->data['price_to'] = $price_to;
            
            //lọc theo giá
            $input  = array();
            $input['where'] = array('price >= ' => $price_from, 'price <=' => $price_to);
            $list = $this->product_model->get_list($input);
   
            $this->data['list'] = $list;
            //load kết quả trả về ra view
            $this->data['temp'] = 'site/product/search';
            $this->load->view('site/layout', $this->data);
        }
        //phương thức tìm kiếm giá sản phẩm theo danh mục
        function search_price_catalog()
        {
            $this->load->model('catalog_model');
           

            $price_from = intval($this->input->get('price_from'));
            $price_to   = intval($this->input->get('price_to'));
            $catalog_id   = intval($this->input->get('catalog_id'));

            $this->data['price_from'] = $price_from;
            $this->data['price_to'] = $price_to;
            $this->data['catalog_id'] = $catalog_id;
            
            $catalog=$this->catalog_model->get_info($catalog_id);

            //lọc theo giá danh mục
            $input  = array();
            $input['like'] = array('catalog_id ', $catalog_id);
            $input['where'] = array('price >= ' => $price_from, 'price <=' => $price_to);
            $list = $this->product_model->get_list($input);
   
            $this->data['list'] = $list;
            $this->data['catalog'] = $catalog;


            //load kết quả trả về ra view
            $this->data['temp'] = 'site/product/search_catalog';
            $this->load->view('site/layout', $this->data);
        }
    }
?>