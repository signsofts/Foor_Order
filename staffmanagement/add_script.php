<?php
    session_start();
    $auth=$_SESSION['auth'];
    $arr=array(1,2);
    if(!in_array($auth,$arr)){
        header('location:../login/login.php');
    }
    include('../DBConnection.php');
    if(isset($_POST['create'])){
        $msg=insert_data($conn);
    }
    //generate id
    $rows=0;
    do{
      $rows++;
      $sql3="SELECT * FROM staff WHERE staff_id='$rows'";
      $result2 = mysqli_query($conn,$sql3);
      $num_rows1 = mysqli_num_rows($result2);
    }while($num_rows1!=0);
    //insert query
    function insert_data($conn){
        $staff_id= legal_input($_POST['staff_id']);
        $staff_firstname= legal_input($_POST['staff_firstname']);
        $staff_lastname = legal_input($_POST['staff_lastname']); 
        $staff_email= legal_input($_POST['staff_email']);
        $staff_password = legal_input($_POST['staff_password']);
        $staff_tel = legal_input($_POST['staff_tel']);
        $staff_position = legal_input($_POST['staff_position']);
        $query="INSERT INTO staff (staff_id,staff_firstname,staff_lastname,staff_email,staff_password,staff_tel,staff_position) VALUES ('$staff_id','$staff_firstname','$staff_lastname','$staff_email','$staff_password','$staff_tel','$staff_position')";    
        $exec= mysqli_query($conn,$query);
        if($exec){
           $msg="Data was inserted sucessfully";
           header('location:staffmanagement.php');
         return $msg;         
        }else{
          $msg= "Error: ".$query."<br>".mysqli_error($conn);
        }
    }    
    //convert illegal input to legal input
    function legal_input($value){
      $value = trim($value);
      $value = stripslashes($value);
      $value = htmlspecialchars($value);
      return $value;
    }
?>