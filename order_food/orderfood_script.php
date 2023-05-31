<?php
    //session_start();  
    // $auth=$_SESSION['auth'];
    // $arr=array(1,2);
    // if(!in_array($auth,$arr)){
    //     header('location:../login/login.php');
    // }
    include('../DBConnection.php');
        $order_id= $_GET['order_id'];
        $fetchData = fetch_data($conn);
        $fetchDataAlacart = fetch_data_alacart($conn);
    //Buffet 
    function fetch_data($conn){
        $order_id= $_GET['order_id'];
        $query1="SELECT * from table_order WHERE order_id="."'".$order_id."'"."";
        $result = mysqli_query($conn,$query1);
        $account=mysqli_fetch_assoc($result);
        $course_id=$account['course_id'];
        $query="";
        if(($course_id==2)){
            $query="SELECT * from stock WHERE course2_status=1 AND menu_status=0 ORDER BY menu_name ASC";
        }else if(($course_id==3)){
            $query="SELECT * from stock WHERE course3_status=1 AND menu_status=0 ORDER BY menu_name ASC";
        }else{
            $query="SELECT * from stock WHERE course1_status=0 AND course2_status=1 AND course3_status=1 AND menu_status=0 ORDER BY menu_name ASC";
        }
        $exec=mysqli_query($conn,$query);
        if(mysqli_num_rows($exec)>0){
            $row=mysqli_fetch_all($exec,MYSQLI_ASSOC);
            return $row;
        }else{
            return $row=[];
        }
    }
    //A la cart
    function fetch_data_alacart($conn){
        $order_id= $_GET['order_id'];
        $query="SELECT * from table_order WHERE order_id="."'".$order_id."'"."";
        $result = mysqli_query($conn,$query);
        $account=mysqli_fetch_assoc($result);
        $course_id=$account['course_id'];
        $query2=" ";
        if((($course_id==2)||($course_id==3))){
            $query2="SELECT * from stock WHERE course1_status=1 AND course".$course_id."_status=0 AND menu_status=0 ORDER BY menu_name ASC";
        }else{
            $query2="SELECT * from stock WHERE course1_status=1 AND menu_status=0 ORDER BY menu_name ASC";
        }
        $exec2=mysqli_query($conn,$query2);
        if(mysqli_num_rows($exec2)>0){
            $row=mysqli_fetch_all($exec2,MYSQLI_ASSOC);
            return $row;
        }else{
            return $row=[];
        }
    }

    // ==========================Add=============================
    if(isset($_POST['create'])){
        $msg=insert_data($conn);
    }
    //insert query
    function insert_data($conn){
        $order= legal_input($_POST['order_input']);
        $menuID= legal_input($_POST['menu_id']);
        
          $order_status=0; 
          $query="INSERT INTO order_detail (order_id,menu_id,menu_quantity,order_status) VALUES ('$order_id','$menu_id','$menu_quantity','$order_status')";
          $exec= mysqli_query($conn,$query);
          if($exec){
 
          }else{
              $msg= "Error: ".$query."<br>".mysqli_error($conn); 
          }
        
    }
?>