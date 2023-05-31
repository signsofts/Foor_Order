<?php
    //session_start();

    if(isset($_GET['order_id'])){
        $order_id= $_GET['order_id'];
}
    // $auth=$_SESSION['auth'];
    // $arr=array(1,2);
    // if(!in_array($auth,$arr)){
    //     header('location:../login/login.php');
    // }
    include('../DBConnection.php');  
    $fetchData = fetch_data($conn,$order_id);
    function fetch_data($conn,$order_id){
        $query="SELECT stock.menu_id,stock.menu_name,order_detail.order_status,order_detail.menu_quantity from order_detail INNER JOIN stock ON order_detail.menu_id=stock.menu_id WHERE order_id="."'".$order_id."'"." ORDER BY order_time ASC";
    
        $exec=mysqli_query($conn,$query);
        if(mysqli_num_rows($exec)>0){
            $row=mysqli_fetch_all($exec,MYSQLI_ASSOC);
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
