<?php
    session_start();
    $auth=$_SESSION['auth'];
    $arr=array(1,2,5);
    if(!in_array($auth,$arr)){
        header('location:../login/login.php');
    }
    include('../DBConnection.php');
    if(isset($_GET['edit'])){
        $order_id= $_GET['edit'];
        $editData= edit_data($conn, $order_id);
    }
    if(isset($_POST['update']) && isset($_GET['edit'])){
        $id= $_GET['edit'];
        update_data($conn,$order_id);
    } 
    function edit_data($conn, $order_id)
    {
        $query= "SELECT table_order.order_id,table_order.table_id,course_catagory.course_name,table_order.customer_number FROM table_order LEFT JOIN course_catagory ON course_catagory.course_id=table_order.course_id WHERE order_id=$order_id";
        $exec = mysqli_query($conn, $query);
        //$row = mysqli_fetch_all($exec);
        $row=mysqli_fetch_assoc($exec);
        return $row;
    }
    // update data query
    function update_data($conn, $order_id)
    {
        $order_id=legal_input($_POST['order_id']);
        $old_table_id= legal_input($_POST['old_table_id']);
        $table_id= legal_input($_POST['table_id']);
        //check duplicate id
        $sql3="SELECT * FROM table_list WHERE table_id='$table_id' AND table_status<>1";
        $result3 = mysqli_query($conn,$sql3);
        $num_rows3 = mysqli_num_rows($result3);
        if (!$num_rows3) {
            echo '<script>alert("ข้อมูลผิดพลาด ลองใหม่อีกครั้ง")</script>';
        }
        else{
        $course_id= legal_input($_POST['course_id']);
        $customer_number= legal_input($_POST['customer_number']);
        $query="UPDATE table_order
            SET table_id=$table_id,
                course_id=$course_id, 
                customer_number=$customer_number WHERE order_id=$order_id";
        $query2="UPDATE table_list
                SET table_status=1 WHERE table_id=$table_id";
        $query3="UPDATE table_list
                SET table_status=0 WHERE table_id=$old_table_id";
        $exec= mysqli_query($conn,$query);
        $exec2= mysqli_query($conn,$query2);
        $exec3= mysqli_query($conn,$query3);
        if($exec&&$exec2&&$exec3){
            header ("Location:createorder.php");
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