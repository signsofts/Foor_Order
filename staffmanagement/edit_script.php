<?php
    session_start();
    $auth=$_SESSION['auth'];
    $arr=array(1,2);
    if(!in_array($auth,$arr)){
        header('location:../login/login.php');
    }
    include('../DBConnection.php');
    if(isset($_GET['edit'])){
        $staff_id= $_GET['edit'];
        $editData= edit_data($conn, $staff_id);
    }
    if(isset($_POST['update']) && isset($_GET['edit'])){
        $id= $_GET['edit'];
        update_data($conn,$staff_id);
    } 
    function edit_data($conn, $staff_id)
    {
        $query= "SELECT * FROM staff WHERE staff_id= $staff_id";
        $exec = mysqli_query($conn, $query);
        //$row = mysqli_fetch_all($exec);
        $row=mysqli_fetch_assoc($exec);
        return $row;
    }
    // update data query
    function update_data($conn, $staff_id)
    {
        $staff_id=legal_input($_POST['staff_id']);
        $new_staff_id=legal_input($_POST['new_staff_id']);
        //check duplicate id
        $sql2="SELECT * FROM staff WHERE staff_id='$new_staff_id' AND staff_id<>'$staff_id'";
        $result = mysqli_query($conn,$sql2);
        $num_rows = mysqli_num_rows($result);
        if ($num_rows) {
            echo '<script>alert("รหัสพนักงานซ้ำ ลองใหม่อีกครั้ง")</script>';
        }
        if(!$num_rows){
            $staff_firstname= legal_input($_POST['staff_firstname']);
            $staff_lastname = legal_input($_POST['staff_lastname']); 
            $staff_email= legal_input($_POST['staff_email']);
            $staff_password = legal_input($_POST['staff_password']);
            $staff_tel = legal_input($_POST['staff_tel']);
            $staff_position = legal_input($_POST['staff_position']);
            $query="UPDATE staff
                SET staff_id='$new_staff_id',
                    staff_firstname='$staff_firstname',
                    staff_lastname='$staff_lastname',
                    staff_email='$staff_email', 
                    staff_password='$staff_password',
                    staff_tel='$staff_tel',
                    staff_position='$staff_position' WHERE staff_id=$staff_id";
            $exec= mysqli_query($conn,$query);
            if($exec){
                header('location:staffmanagement.php');
            }else{
                $msg= "Error: ".$query."<br>".mysqli_error($conn);
                echo $msg;  
            }
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