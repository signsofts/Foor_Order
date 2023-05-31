<?php
    session_start();
    $auth=$_SESSION['auth'];
    $arr=array(1,2,5);
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
      $sql3="SELECT * FROM table_order WHERE order_id='$rows'";
      $result = mysqli_query($conn,$sql3);
      $num_rows1 = mysqli_num_rows($result);
    }while($num_rows1!=0);

    //insert query
    function insert_data($conn){
        $order_id= legal_input($_POST['order_id']);
        $table_id= legal_input($_POST['table_id']);
        //check duplicate id
        $sql2="SELECT * FROM table_order WHERE order_id='$order_id'";
        $sql3="SELECT * FROM table_list WHERE table_id='$table_id' AND table_status<>1";
        $result2 = mysqli_query($conn,$sql2);
        $result3 = mysqli_query($conn,$sql3);
        $num_rows2 = mysqli_num_rows($result2);
        $num_rows3 = mysqli_num_rows($result3);
        if ($num_rows2||!$num_rows3) {
            echo '<script>alert("ข้อมูลผิดพลาด ลองใหม่อีกครั้ง")</script>';
        }
        else{
          $query2="UPDATE table_list
          SET table_status=1 WHERE table_id=$table_id";
          $course_id= legal_input($_POST['course_id']);
          $customer_number= legal_input($_POST['customer_number']);
          $payment_status=0; 
          $query="INSERT INTO table_order (order_id,course_id,table_id,customer_number,payment_status) VALUES ('$order_id','$course_id','$table_id','$customer_number','$payment_status')";    
          $exec= mysqli_query($conn,$query);
          $exec2=mysqli_query($conn,$query2);
          if($exec&&$exec2){
              $msg="Data was inserted sucessfully";
              header('location:createorder.php');
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
    function update_data($conn){
      
      $query2="UPDATE table_list LEFT JOIN table_order ON table_list.table.id=table_order.table_id
          SET table_list.table_status=0 WHERE table_id=$table_id";
      $exec= mysqli_query($conn,$query,$query2);
      if($exec){
          header ("Location:payment.php");
      }else{
          $msg= "Error: ".$query."<br>".mysqli_error($conn);
          echo $msg;  
      }
  }
?>