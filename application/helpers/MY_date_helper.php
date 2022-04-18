<?php
/*
    lấy ngày từ dạng int
    @$time :int -thời gian muốn hiển thị ngày 
    @$full_time : kiểu muốn lấy là : giờ, phút,giây
 */
function get_date($time,$full_time=true){
    $format= '%d-%m-%y';
    if($full_time){
        $format=$format.' - %h:%i:%s';
    }
    $date=mdate($format,$time); 
    return $date;
}
function get_date_vn($time){
    $format= '%d %M %Y';
    $date=mdate($format,$time);
    return $date;
}
?>