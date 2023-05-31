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
          $sql3="SELECT * FROM table_list WHERE table_id='$rows'";
          $result2 = mysqli_query($conn,$sql3);
          $num_rows1 = mysqli_num_rows($result2);
        }while($num_rows1!=0);
    //insert query
    function insert_data($conn){
        $query2="ALTER TABLE table_list AUTO_INCREMENT = 1";
        $exec2=mysqli_query($conn,"$query2");
        $table_id= legal_input($_POST['table_id']);
        //check duplicate id
        $sql2="SELECT * FROM table_list WHERE table_id='$table_id'";
        $result = mysqli_query($conn,$sql2);
        $num_rows = mysqli_num_rows($result);
        if ($num_rows) {
            echo '<script>alert("เลขโต๊ะซ้ำ ลองใหม่อีกครั้ง")</script>';
        }
        if(!$num_rows){
          $table_seat= legal_input($_POST['table_seat']);
          $table_zone = legal_input($_POST['table_zone']); 
          $table_status= legal_input($_POST['table_status']);
          $query="INSERT INTO table_list (table_id,table_seat,table_zone,table_status) VALUES ('$table_id','$table_seat','$table_zone','$table_status')";    
          $exec= mysqli_query($conn,$query);
          if($exec&&$exec2){
             $msg="Data was inserted sucessfully";
             header('location:tablemanagement.php');
           return $msg;         
          }else{
            $msg= "Error: ".$query."<br>".mysqli_error($conn);
          }
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