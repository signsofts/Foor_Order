<?php
    session_start();
    $auth=$_SESSION['auth'];
    $arr=array(1,2,5);
    if(!in_array($auth,$arr)){
        header('location:../login/login.php');
    }
    include('../DBConnection.php');
    $order_id=$_GET['edit'];
    if(isset($_GET['search'])){
        $keyword = $_GET['keyword'];
        $fetchData = fetch_data($conn,$keyword,$order_id);
    }else{
        $keyword = "";
        $fetchData = fetch_data($conn,$keyword,$order_id);
    }
    function fetch_data($conn,$keyword,$order_id){
        if(!empty($keyword)){
            $query="SELECT order_detail.order_detail_id,table_order.table_id,course_catagory.course_name,stock.menu_name,order_detail.menu_quantity,order_detail.order_time from order_detail LEFT JOIN table_order ON order_detail.order_id=table_order.order_id LEFT JOIN course_catagory ON order_detail.course_id=course_catagory.course_id LEFT JOIN stock ON order_detail.menu_id=stock.menu_id WHERE stock.menu_name like "."'%".$keyword."%'"." AND order_detail.order_id="."'".$order_id."'"." ORDER BY order_detail.order_time ASC";
        }else{
            $query="SELECT order_detail.order_detail_id,table_order.table_id,course_catagory.course_name,stock.menu_name,order_detail.menu_quantity,order_detail.order_time from order_detail LEFT JOIN table_order ON order_detail.order_id=table_order.order_id LEFT JOIN course_catagory ON order_detail.course_id=course_catagory.course_id LEFT JOIN stock ON order_detail.menu_id=stock.menu_id WHERE order_detail.order_id="."'".$order_id."'"." ORDER BY order_detail.order_time ASC";
        }
        $exec=mysqli_query($conn,$query);
        if(mysqli_num_rows($exec)>0){
            $row=mysqli_fetch_all($exec,MYSQLI_ASSOC);
            return $row;
        }else{
            return $row=[];
        }
    }
?>
