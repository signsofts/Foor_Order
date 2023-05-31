<?php
    include('./tablemanagement_script.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JRPOSMS Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../style/style.css">
    <style>
        .table-responsive{
            max-height: 550px;
            overflow: auto;
        }
    </style>
</head>
<body class="d-flex">
    <?php include '../sidebar/sidebar.php';?>
    <div class="content">
        <div class="d-flex justify-content-between">
            <h1>จัดการโต๊ะอาหาร</h1>
            <form class="form-inline search-bt" action="" method="get">
                <div class="form-group input-group mb-3">
                    <input type="text" class="form-control" placeholder="ค้นหาจากหมายเลขโต๊ะ" name="keyword">
                    <span class="input-group-text"><button type="submit" class="btn" name="search"><img src="../SVG/search_logo.svg" alt=""></button></span>  
                </div>
            </form>
        </div>
        <div class="content_detail">
            <div class="table-responsive">
                <table class="table table-borderless text-center">
                    <thead class="table-light text-center">
                        <th>หมายเลขโต๊ะ</th>
                        <th>จำนวนที่นั่งของโต๊ะ</th>
                        <th>โซนของโต๊ะ</th>
                        <th>สถานะ</th>
                        <th colspan="2">การจัดการ</th>
                        <th><a href="add.php"><img src="../SVG/add_logo.svg" alt="" class="bt_logo"></a></th>
                    </thead>
                    <?php
                        if(count($fetchData)>0){
                            $no=1;
                            foreach($fetchData as $data){
                    ?>
                    <tr>
                        <td><?php echo $data['table_id']; ?></td>
                        <td><?php echo $data['table_seat']; ?></td>
                        <td><?php echo $data['table_zone']; ?></td>
                        <td><?php if($data['table_status']==0){
                            echo "<h4 style='color:green'>ว่าง</h4>";
                        }else{
                            echo "<h4 style='color:red'>ไม่ว่าง</h4>";
                        } ?></td>
                        <td><a href="edit.php?edit=<?php echo $data['table_id']; ?>"><img src="../SVG/edit_logo.svg" alt="" class="bt_logo"></a></td>
                        <td><a href="delete_script.php?delete=<?php echo $data['table_id'];?>"><img src="../SVG/delete_logo.svg" alt="" class="bt_logo"></a></td>
                    </tr> 
                    <?php
                            $no++;
                            }
                        }else{
                    ?>
                    <tr>
                        <td colspan="7">ไม่พบข้อมูล</td>
                    </tr>      
                    <?php
                        }
                    ?>
                </table>
            </div>
        </div>
    </div>
</body>
</html>