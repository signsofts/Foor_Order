<?php
    session_start();
    $auth=$_SESSION['auth'];
    $arr=array(1,2,3);
    if(!in_array($auth,$arr)){
        header('location:../login/login.php');
    }
    include('../DBConnection.php');
    if(isset($_GET['edit'])){
        $order_detail_id= $_GET['edit'];
        $editData= edit_data($conn, $order_detail_id);
    }
    if(isset($_POST['update']) && isset($_GET['edit'])){
        $id= $_GET['edit'];
        update_data($conn,$order_detail_id);
    } 
    function edit_data($conn, $order_detail_id)
    {
        $query= "SELECT order_detail.order_detail_id,stock.menu_name,course_catagory.course_name,order_detail.menu_quantity FROM order_detail LEFT JOIN stock ON order_detail.menu_id=stock.menu_id LEFT JOIN course_catagory ON course_catagory.course_id=order_detail.course_id WHERE order_detail_id=$order_detail_id";
        $exec = mysqli_query($conn, $query);
        //$row = mysqli_fetch_all($exec);
        $row=mysqli_fetch_assoc($exec);
        return $row;
    }
    // update data query
    function update_data($conn, $order_detail_id)
    {
        $order_detail_id=legal_input($_POST['order_detail_id']);
        $menu_quantity= legal_input($_POST['menu_quantity']);
        $query="UPDATE order_detail
            SET menu_quantity=$menu_quantity WHERE order_detail_id=$order_detail_id";
        $exec= mysqli_query($conn,$query);
        if($exec){
            header ("Location:order_detail.php?edit=".$order_detail_id);
        }else{
            $msg= "Error: ".$query."<br>".mysqli_error($conn);
            echo $msg;  
        }
    }
    // convert illegal input to legal input
    function legal_input($value) {
    $value = trim($value);
    $value = stripslashes($value);
    $value = htmlspecialchars($value);
    return $value;
    }
?>