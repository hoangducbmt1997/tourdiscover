<?php
Class Cart extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('cart');
    }
    
    /*
     * Phương thức thêm sản phẩm vào đơn hàng
     */
    function add()
    {
        //lay ra san pham muon them vao gio hang
        $this->load->model('product_model');
        $id = $this->uri->rsegment(3);
        $product = $this->product_model->get_info($id);
        if(!$product)
        {
            redirect();
        }
        //tổng số thành viên
        $qty = 1;
        $price = $product->price;
        if($product->discount > 0)
        {
            $price = $product->price - $product->discount;
        }
        
        //thông tin thêm vào đơn hàng
        $data = array();
        $data['id'] = $product->id;
        $data['qty'] = $qty;
        $data['name'] = url_title($product->name);
        $data['image_link']  = $product->image_link;
        $data['price'] = $price;
        $this->cart->insert($data);
        //chuyển sang trang danh sách sản phẩm trong đơn hàng
        redirect(base_url('cart'));
       
    }
    
    /*
     * Hiển thị ra danh sách sản phẩm trong giỏ hàng
     */
    function index()
    {
   
        //Thông tin chi tiết của đơn hàng
        $carts = $this->cart->contents();
        $this->data['carts'] = $carts;
        $this->data['temp']  ='site/cart/index';
        $this->load->view('site/layout', $this->data);
        
    }
    
    /*
     * Cập nhật giỏ hàng
     */
    function update()
    {
        //thông tin đơn hàng
        $carts = $this->cart->contents();
        foreach ($carts as $key => $row)
        {
            //tổng số lượng sản phẩm
            $total_qty = $this->input->post('qty_'.$row['id']);
            $data = array();
            $data['rowid'] = $key;
            $data['qty'] = $total_qty;
            $this->cart->update($data);
        }
        
        //chuyển sang trang danh sách trong đơn hàng
        redirect(base_url('cart'));
    }
    
    /*
     * Xóa sản phẩm trong giỏ hàng
     */
    function del()
    {
        $id = $this->uri->rsegment(3);
        $id = intval($id);
        //trường hợp xóa 1 sản phẩm nào đó trong giỏ hàng
        if($id > 0)
        {
            //thông tin đơn hàng
            $carts = $this->cart->contents();
            foreach ($carts as $key => $row)
            {
                if($row['id'] == $id)
                {
                    //tổng số lượng thành viên trong sản phẩm
                    $data = array();
                    $data['rowid'] = $key;
                    $data['qty'] = 0;
                    $this->cart->update($data);
                }
            }
        }else{
            //xóa toàn bộ đơn hàng
            $this->cart->destroy();
        }
        
        //chuyển sang trang danh sách trong đơn hàng
        redirect(base_url('cart'));
    }
}


