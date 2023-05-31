<?php
    session_start();
    $auth=$_SESSION['auth'];
    $arr=array(1,2,4);
    if(!in_array($auth,$arr)){
        header('location:../login/login.php');
    }
    include('../DBConnection.php');
    $fetchData = fetch_data($conn);
    function fetch_data($conn){
        $query="SELECT table_order.order_id,table_order.table_id,order_detail.order_time from order_detail LEFT JOIN table_order ON table_order.order_id=order_detail.order_id WHERE order_status=0 GROUP BY order_detail.order_id ORDER BY order_time ASC";
        $exec=mysqli_query($conn,$query);
        if(mysqli_num_rows($exec)>0){
            $row=mysqli_fetch_all($exec,MYSQLI_ASSOC);
            return $row;
        }else{
            return $row=[];
        }
    }
?>
