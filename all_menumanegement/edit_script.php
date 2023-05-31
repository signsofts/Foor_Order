<?php
    session_start();
    $auth=$_SESSION['auth'];
    $arr=array(1,2);
    if(!in_array($auth,$arr)){
        header('location:../login/login.php');
    }
    include('../DBConnection.php');
    if(isset($_GET['edit'])){
        $menu_id= $_GET['edit'];
        $editData= edit_data($conn, $menu_id);
    }
    if(isset($_POST['update']) && isset($_GET['edit'])){
        $id= $_GET['edit'];
        update_data($conn,$menu_id);
    } 
    function edit_data($conn, $menu_id)
    {
        $query= "SELECT * FROM stock WHERE menu_id= $menu_id";
        $exec = mysqli_query($conn, $query);
        //$row = mysqli_fetch_all($exec);
        $row=mysqli_fetch_assoc($exec);
        return $row;
    }
    // update data query
    function update_data($conn, $menu_id)
    {
        $menu_id=legal_input($_POST['menu_id']);
        $new_menu_id=legal_input($_POST['new_menu_id']);
        $targetDir='../menu_image/';
        $statusMsg='';
        $backlink='<a href="./">ย้อนกลับ</a>';
        $filename=basename($_FILES["file"]["name"]);
        $targetFilePath=$targetDir.$filename;
        $fileType=pathinfo($targetFilePath,PATHINFO_EXTENSION);
        $allowTypes=array('jpg','png');
        if($_FILES["file"]["name"]){
            if(in_array($fileType,$allowTypes)){
                if(move_uploaded_file($_FILES["file"]["tmp_name"],$targetFilePath)){
                    $filename=rename("../menu_image/$filename","../menu_image/$menu_id.png");
                    //check duplicate id
                    $sql2="SELECT * FROM stock WHERE menu_id='$new_menu_id' AND menu_id<>'$menu_id'";
                    $result = mysqli_query($conn,$sql2);
                    $num_rows = mysqli_num_rows($result);
                    if ($num_rows) {
                        echo '<script>alert("รหัสอาหารซ้ำ ลองใหม่อีกครั้ง")</script>';
                    }
                    else{
                        $menu_name= legal_input($_POST['menu_name']);
                        $menu_cost = legal_input($_POST['menu_cost']); 
                        $menu_status= legal_input($_POST['menu_status']);
                        $course1_status= legal_input($_POST['course1_status']);
                        $course2_status= legal_input($_POST['course2_status']);
                        $course3_status= legal_input($_POST['course3_status']);   
                        $query="UPDATE stock
                            SET menu_id='$new_menu_id',
                                menu_name='$menu_name',
                                menu_cost='$menu_cost',
                                menu_status='$menu_status', 
                                course1_status='$course1_status',
                                course2_status='$course2_status',
                                course3_status='$course3_status' WHERE menu_id=$menu_id";
                        $exec= mysqli_query($conn,$query);
                        if($exec){
                            header('location:menumanagement.php');
                        }else{
                            $msg= "Error: ".$query."<br>".mysqli_error($conn);
                            echo $msg;  
                        }
                    }
                }
            }else{
                $statusMsg="Sorry, Only .JPG, .PNG files are allowed to upload.".$backlink;
            }
        }else{
            $menu_id=legal_input($_POST['menu_id']);
            $new_menu_id=legal_input($_POST['new_menu_id']);
            //check duplicate id
            $sql2="SELECT * FROM stock WHERE menu_id='$new_menu_id' AND menu_id<>'$menu_id'";
            $result = mysqli_query($conn,$sql2);
            $num_rows = mysqli_num_rows($result);
            if ($num_rows){
                echo '<script>alert("รหัสอาหารซ้ำ ลองใหม่อีกครั้ง")</script>';
            }else{
                $menu_name= legal_input($_POST['menu_name']);
                $menu_cost = legal_input($_POST['menu_cost']); 
                $menu_status= legal_input($_POST['menu_status']);
                $course1_status= legal_input($_POST['course1_status']);
                $course2_status= legal_input($_POST['course2_status']);
                $course3_status= legal_input($_POST['course3_status']);   
                $query="UPDATE stock
                    SET menu_id='$new_menu_id',
                        menu_name='$menu_name',
                        menu_cost='$menu_cost',
                        menu_status='$menu_status', 
                        course1_status='$course1_status',
                        course2_status='$course2_status',
                        course3_status='$course3_status' WHERE menu_id=$menu_id";
                $exec= mysqli_query($conn,$query);
                if($exec){
                    header('Refresh:0;menumanagement.php');
                }else{
                    $msg= "Error: ".$query."<br>".mysqli_error($conn);
                    echo $msg;  
                }
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