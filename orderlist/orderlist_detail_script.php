<?php
    session_start();
    $auth=$_SESSION['auth'];
    $arr=array(1,2,4);
    if(!in_array($auth,$arr)){
        header('location:../login/login.php');
    }
    include('../DBConnection.php');
    $order_id=$_GET['edit'];
    $fetchData = fetch_data($conn,$order_id);
    function fetch_data($conn,$order_id){
        $query="SELECT table_order.order_id,order_detail.order_detail_id,table_order.table_id,stock.menu_name,order_detail.menu_quantity,order_detail.order_time from order_detail LEFT JOIN table_order ON order_detail.order_id=table_order.order_id LEFT JOIN stock ON order_detail.menu_id=stock.menu_id WHERE order_detail.order_id="."'".$order_id."'"." AND order_detail.order_status=0 ORDER BY order_detail.order_time ASC";
        $exec=mysqli_query($conn,$query);
        if(mysqli_num_rows($exec)>0){
            $row=mysqli_fetch_all($exec,MYSQLI_ASSOC);
            return $row;
        }else{
            return $row=[];
        }
    }
?>
