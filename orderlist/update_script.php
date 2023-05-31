<?php
    session_start();
    $auth=$_SESSION['auth'];
    $arr=array(1,2,4);
    if(!in_array($auth,$arr)){
        header('location:../login/login.php');
    }
    include("../DBConnection.php");
    if(isset($_GET['edit'])){
        $id= $_GET['edit'];
        $order_id= $_GET['order'];
        delete_data($conn, $id,$order_id);
    }
    function delete_data($conn, $id,$order_id){
        $query="UPDATE order_detail
        SET order_status=1 WHERE order_detail_id=$id";
        $exec= mysqli_query($conn,$query);
        if($exec){
            header ("Location:orderlist_detail.php?edit=".$order_id);
        }else{
            $msg= "Error: ".$query."<br>".mysqli_error($conn);
            echo $msg;  
        }
    }
?>
