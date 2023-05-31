<?php
    session_start();
    $auth=$_SESSION['auth'];
    $arr=array(1,2);
    if(!in_array($auth,$arr)){
        header('location:../login/login.php');
    }
    include('../DBConnection.php');
    if(isset($_GET['edit'])){
        $menu_id= $_GET['edit'];
        $editData= edit_data($conn, $menu_id);
    }
    if(isset($_GET['edit'])){
        $id= $_GET['edit'];
        update_data($conn,$menu_id);
    } 
    function edit_data($conn, $menu_id)
    {
        $query= "SELECT * FROM stock WHERE menu_id= $menu_id";
        $exec = mysqli_query($conn, $query);
        //$row = mysqli_fetch_all($exec);
        $row=mysqli_fetch_assoc($exec);
        return $row;
    }
    // update data query
    function update_data($conn, $menu_id)
    {
        $course2_status=0;
        $query="UPDATE stock
            SET course2_status='$course2_status' WHERE menu_id=$menu_id";
            $exec= mysqli_query($conn,$query);
            if($exec){
                header('location:menumanagement.php');
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
