<?php
    session_start();
    $auth=$_SESSION['auth'];
    $arr=array(1,2);
    if(!in_array($auth,$arr)){
        header('location:../login/login.php');
    }
    include('../DBConnection.php');
    if(isset($_GET['edit'])){
        $table_id= $_GET['edit'];
        $editData= edit_data($conn, $table_id);
    }
    if(isset($_POST['update']) && isset($_GET['edit'])){
        $id= $_GET['edit'];
        update_data($conn,$table_id);
    } 
    function edit_data($conn, $table_id)
    {
        $query= "SELECT * FROM table_list WHERE table_id=$table_id";
        $exec = mysqli_query($conn, $query);
        //$row = mysqli_fetch_all($exec);
        $row=mysqli_fetch_assoc($exec);
        return $row;
    }
    // update data query
    function update_data($conn, $table_id)
    {
        $table_id=legal_input($_POST['table_id']);
        $new_table_id=legal_input($_POST['new_table_id']);
        //check duplicate id
        $sql2="SELECT * FROM table_list WHERE table_id='$new_table_id' AND table_id<>'$table_id'";
        $result = mysqli_query($conn,$sql2);
        $num_rows = mysqli_num_rows($result);
        if ($num_rows) {
            echo '<script>alert("เลขโต๊ะซ้ำ ลองใหม่อีกครั้ง")</script>';
        }
        if(!$num_rows){
            $table_seat=legal_input($_POST['table_seat']);
            $table_zone = legal_input($_POST['table_zone']); 
            $table_status= legal_input($_POST['table_status']);
            $query="UPDATE table_list
                SET table_id=$new_table_id,
                    table_seat='$table_seat',
                    table_zone='$table_zone',
                    table_status='$table_status' WHERE table_id=$table_id";
            $exec= mysqli_query($conn,$query);
            if($exec){
                header('location:tablemanagement.php');
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