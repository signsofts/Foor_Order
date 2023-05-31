<?php
    session_start();
    $auth=$_SESSION['auth'];
    $arr=array(1,2,3);
    if(!in_array($auth,$arr)){
        header('location:../login/login.php');
    }
    include('../DBConnection.php');
    $order_id=$_GET['edit'];
    $fetchData = fetch_data($conn,$order_id);
    function fetch_data($conn,$order_id){
        $query="SELECT order_detail.order_detail_id,table_order.table_id,table_order.order_id,course_catagory.course_name,stock.menu_name,order_detail.menu_quantity,order_detail.order_time,stock.menu_cost from order_detail LEFT JOIN table_order ON order_detail.order_id=table_order.order_id LEFT JOIN course_catagory ON order_detail.course_id=course_catagory.course_id LEFT JOIN stock ON order_detail.menu_id=stock.menu_id WHERE order_detail.order_id="."'".$order_id."'"." ORDER BY order_detail.order_time ASC";
        $exec=mysqli_query($conn,$query);
        if(mysqli_num_rows($exec)>0){
            $row=mysqli_fetch_all($exec,MYSQLI_ASSOC);
            return $row;
        }else{
            return $row=[];
        }
    }
    $sql = "SELECT customer_number FROM table_order WHERE order_id='$order_id'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $customer_number=$row['customer_number'];
    }}

    if(isset($_POST['confirm'])){
        $table_id1=$_POST['table_id'];
        $order_id1=$_POST['order_id'];
        $query="UPDATE table_order SET payment_status=1 WHERE order_id=$order_id1";
        $query2="UPDATE table_list SET table_status=0 WHERE table_id=$table_id1";
        $exec= mysqli_query($conn,$query);
        $exec2= mysqli_query($conn,$query2);
        if($exec&&$exec2){
            header ("Location:payment.php");
        }else{
            $msg= "Error: ".$query."<br>".mysqli_error($conn);
            echo $msg;  
        }
    }
?>
