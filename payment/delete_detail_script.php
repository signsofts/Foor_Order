<?php
    session_start();
    $auth=$_SESSION['auth'];
    $arr=array(1,2,3);
    if(!in_array($auth,$arr)){
        header('location:../login/login.php');
    }
    include("../DBConnection.php");
    if(isset($_GET['delete'])){
        $id= $_GET['delete'];
        delete_data($conn, $id);
    }
    function delete_data($conn, $id){
        $query="DELETE from order_detail WHERE order_detail_id=$id";
        $exec= mysqli_query($conn,$query);
        if($exec){
            htmlspecialchars($_SERVER['HTTP_REFERER']);
        }else{
            $msg= "Error: ".$query."<br>".mysqli_error($conn);
            echo $msg;
        }
    }
?>
