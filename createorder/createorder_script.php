<?php
    session_start();
    $auth=$_SESSION['auth'];
    $arr=array(1,2,5);
    if(!in_array($auth,$arr)){
        header('location:../login/login.php');
    }
    include('../DBConnection.php');
    if(isset($_GET['search'])){
        $keyword = $_GET['keyword'];
        $fetchData = fetch_data($conn,$keyword);
    }else{
        $keyword = "";
        $fetchData = fetch_data($conn,$keyword);
    }
    function fetch_data($conn,$keyword){
        if(!empty($keyword)){
            $query="SELECT table_order.order_id,table_order.table_id,course_catagory.course_name,table_order.open_date,table_order.customer_number from table_order LEFT JOIN course_catagory ON table_order.course_id=course_catagory.course_id WHERE table_order.table_id like "."'".$keyword."%'"." AND payment_status=0 ORDER BY table_order.open_date ASC";
        }else{
            $query="SELECT table_order.order_id,table_order.table_id,course_catagory.course_name,table_order.open_date,table_order.customer_number from table_order LEFT JOIN course_catagory ON table_order.course_id=course_catagory.course_id WHERE payment_status=0 ORDER BY table_order.table_id ASC";
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
