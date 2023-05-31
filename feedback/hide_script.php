<?php
    session_start();
    $auth=$_SESSION['auth'];
    $arr=array(1,2);
    if(!in_array($auth,$arr)){
        header('location:../login/login.php');
    }
    include('../DBConnection.php');
    if(isset($_GET['edit'])){
        $feedback_id= $_GET['edit'];
        $editData= edit_data($conn, $feedback_id);
    }
    if(isset($_GET['edit'])){
        $id= $_GET['edit'];
        update_data($conn,$feedback_id);
    } 
    function edit_data($conn, $feedback_id)
    {
        $query= "SELECT * FROM feedback WHERE feedback_id= $feedback_id";
        $exec = mysqli_query($conn, $query);
        //$row = mysqli_fetch_all($exec);
        $row=mysqli_fetch_assoc($exec);
        return $row;
    }
    // update data query
    function update_data($conn, $feedback_id)
    {
        $feedback_status=0;
        $query="UPDATE feedback
            SET feedback_status='$feedback_status' WHERE feedback_id=$feedback_id";
            $exec= mysqli_query($conn,$query);
            if($exec){
                header('location:feedback.php');
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
