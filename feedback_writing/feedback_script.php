<?php
    // session_start();
    // $auth=$_SESSION['auth'];
    // $arr=array(1,2);
    // if(!in_array($auth,$arr)){
    //     header('location:../login/login.php');
    // }

    include('../DBConnection.php');
    
    $order_id= $_GET['order_id'];
    if(isset($_GET['order_id'])){
}
        $fetchData = fetch_data($conn);
    function fetch_data($conn){
            $order_id= $_GET['order_id'];
            $query="SELECT feedback,feedback_date from feedback WHERE feedback_status=1 OR order_id=1 ORDER BY feedback_date DESC";
           
       
        $exec=mysqli_query($conn,$query);
        
        if(mysqli_num_rows($exec)>0){
            $row=mysqli_fetch_all($exec,MYSQLI_ASSOC);
            return $row;
        }else{
            return $row=[];
        }
    }

    // =================================ADD=============================
    
    if(isset($_POST['create'])){
        $msg=insert_data($conn);
    }
    //insert query
    function insert_data($conn){
        $feedback= legal_input($_POST['feedback_input']);
        $feedback_order_id= legal_input($_POST['feedback_order_id']);
        
          $feedback_status=0; 
          $query="INSERT INTO feedback (order_id,feedback,feedback_status) VALUES ('$feedback_order_id','$feedback','$feedback_status')";
          $exec= mysqli_query($conn,$query);
          if($exec){
              
              
              header('location:../order_food/orderfood.php?order_id='.$feedback_order_id);
              echo '<script>alert("ขอบคุณค่ะสำหรับคำติชม");</script>';
              
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
