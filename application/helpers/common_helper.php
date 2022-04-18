<?php 

    //in ra đường dẫn
    function public_url($url=''){
        //đường dẫn mặc định
        return base_url('public/'.$url);  
    }
    //in ra mảng hoặc đối tượng để xem
    function pre($list,$exit=true){
        echo "<pre>";
        print_r($list);
        if(exit())
        {
            die();
        }
    }
?>