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
      $sql3="SELECT * FROM stock WHERE menu_id='$rows'";
      $result2 = mysqli_query($conn,$sql3);
      $num_rows1 = mysqli_num_rows($result2);
    }while($num_rows1!=0);

    //insert query
    function insert_data($conn){
        $menu_id= legal_input($_POST['menu_id']);
        $targetDir='../menu_image/';
        $statusMsg='';
        $backlink='<a href="./">ย้อนกลับ</a>';
        $filename=basename($_FILES["file"]["name"]);
        $targetFilePath=$targetDir.$filename;
        $fileType=pathinfo($targetFilePath,PATHINFO_EXTENSION);
        $allowTypes=array('jpg','png');
        if(in_array($fileType,$allowTypes)){
            if(move_uploaded_file($_FILES["file"]["tmp_name"],$targetFilePath)){
              $filename=rename("../menu_image/$filename","../menu_image/$menu_id.png");
              $menu_name= legal_input($_POST['menu_name']);
              $menu_cost = legal_input($_POST['menu_cost']); 
              $menu_status= legal_input($_POST['menu_status']);
              $course1_status= legal_input($_POST['course1_status']);
              $course2_status= legal_input($_POST['course2_status']);
              $course3_status= legal_input($_POST['course3_status']);
              $query="INSERT INTO stock (menu_id,menu_name,menu_cost,menu_status,course1_status,course2_status,course3_status) VALUES ('$menu_id','$menu_name','$menu_cost','$menu_status','$course1_status','$course2_status','$course3_status')";    
              $exec= mysqli_query($conn,$query);
              if($exec){
                $msg="Data was inserted sucessfully";
                header('location:menumanagement.php');
              return $msg;         
              }else{
                $msg= "Error: ".$query."<br>".mysqli_error($conn);
              }
            }else{
              $statusMsg="File upload failed, Please try again.".$backlink;
            }
        }else{
            $statusMsg="Sorry, Only .JPG, .PNG files are allowed to upload.".$backlink;
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