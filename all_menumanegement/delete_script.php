<?php
    session_start();
    $auth=$_SESSION['auth'];
    $arr=array(1,2);
    if(!in_array($auth,$arr)){
        header('location:../login/login.php');
    }
    include("../DBConnection.php");
    if(isset($_GET['delete'])){
        $id= $_GET['delete'];
        delete_data($conn, $id);
    }
    function delete_data($conn, $id){
        $query="DELETE from stock WHERE menu_id=$id";
        $exec= mysqli_query($conn,$query);
        if($exec){
            header('location:menumanagement.php');
        }else{
            $msg= "Error: ".$query."<br>".mysqli_error($conn);
            echo $msg;
        }
    }
?>
