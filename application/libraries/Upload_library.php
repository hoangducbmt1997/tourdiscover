<?php
Class Upload_library
{
    var $CI = '';
    function __construct()
    {
        $this->CI = & get_instance();
    }
    
    /*
     * Upload file
     * @$upload_path : Đường dẫn lưu file
     * @$file_name : Tên thẻ input upload file
     */
    function upload($upload_path = '', $file_name = '')
    {
        $config = $this->config($upload_path);
        //load thư viện upload
        $this->CI->load->library('upload', $config);
        //thực hiện upload
        if($this->CI->upload->do_upload($file_name))
        {
            //lưu thông tin upload
            $data = $this->CI->upload->data();
        }else{
            //upload không thành công
            $data = $this->CI->upload->display_errors();
        }
        return $data;
    }
    
    /*
     * Upload nhiều file
     * @$upload_path : Đường dẫn lưu file
     * @$file_name : Tên thẻ input upload file
     */
    function upload_file($upload_path = '', $file_name = '')
    {
        //lấy thông tin cấu hình upload
        $config = $this->config($upload_path);
        
        //lưu biến môi trường khi thực hiện upload
        $file  = $_FILES['image_list'];
        $count = count($file['name']);//lấy tổng số file được upload
        
        $image_list = array(); //lưu tên các file upload thành công
        for($i=0; $i<=$count-1; $i++) {
            
            $_FILES['userfile']['name']     = $file['name'][$i];  //khai báo tên của file thứ i
            $_FILES['userfile']['type']     = $file['type'][$i]; //khai báo kiểu của file thứ i
            $_FILES['userfile']['tmp_name'] = $file['tmp_name'][$i]; //khai báo đường dẫn tạm của file thứ i
            $_FILES['userfile']['error']    = $file['error'][$i]; //khai báo lỗi của file thứ i
            $_FILES['userfile']['size']     = $file['size'][$i]; //khai báo kích cỡ của file thứ i
            //load thư viện upload và cấu hình
            $this->CI->load->library('upload', $config);
            //thực hiện upload từng file
            if($this->CI->upload->do_upload())
            {
                //nếu upload thành công thì lưu toàn bộ dữ liệu
                $data = $this->CI->upload->data();
                //in cấu trúc dữ liệu của các file
                $image_list[] = $data['file_name'];
            }
        }
        return $image_list;
    }
    
    /*
     * cấu hình file upload
     */
    function config($upload_path = '')
    {
        //khai báo biến cấu hình
        $config = array();
        //thư mục chứa file
        $config['upload_path']   = $upload_path;
        //Định dạng file được phép tải
        $config['allowed_types'] = 'jpg|png|gif|jpeg';
        //Dung lượng tối đa
        $config['max_size']      = '4096';
        //Chiều rộng tối đa
        $config['max_width']     = '2048';
        //Chiều cao tối đa
        $config['max_height']    = '2048';
        
        return $config;
    }
}