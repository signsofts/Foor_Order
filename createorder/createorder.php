<?php
    include('./createorder_script.php');
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
            <h1>จัดการรายการออเดอร์ที่เปิด</h1>
            <div style="display: flex;">
                <form class="form-inline search-bt" action="" method="get">
                    <div class="form-group input-group mb-3">
                        <input type="text" class="form-control" placeholder="ค้นหาจากหมายเลขโต๊ะ" name="keyword">
                        <span class="input-group-text"><button type="submit" class="btn" name="search"><img src="../SVG/search_logo.svg" alt=""></button></span>  
                    </div>
                </form>
            </div>    
        </div>
        <div class="content_detail">
            <div class="table-responsive">
                <table class="table table-borderless text-center table-hover">
                    <thead class="table-light text-center">
                        <tr>
                            <th>รหัสออเดอร์</th>
                            <th>หมายเลขโต๊ะ</th>
                            <th>คอร์สอาหาร</th>
                            <th>จำนวนลูกค้า</th>
                            <th>เวลาที่เปิดโต๊ะ</th>
                            <th colspan="3">การจัดการ</th>
                            <th><a href="add.php"><img src="../SVG/add_logo.svg" alt="" class="bt_logo"></a></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if(count($fetchData)>0){
                                $no=1;
                                foreach($fetchData as $data){   
                        ?>
                        <tr>
                            <td><?php echo $data['order_id']; ?></td>
                            <td><?php echo $data['table_id']; ?></td>   
                            <td><?php echo $data['course_name']; ?></td>
                            <td><?php echo $data['customer_number']; ?></td>
                            <td><?php echo $data['open_date']; ?></td>
                            <td><a href="qrcode_script.php?gen=<?php echo $data['order_id']; ?>"><img src="../SVG/qrcode.svg" alt="แสดง QR code" class="bt_logo"></a></td>
                            <td><a href="order_detail.php?edit=<?php echo $data['order_id']; ?>"><img src="../SVG/edit_logo.svg" alt="แก้ไขเมนูอาหาร" class="bt_logo"></a></td>
                            <?php if($_SESSION['auth']=="1"||$_SESSION['auth']=="2"){?><td><a href="delete_script.php?delete=<?php echo $data['order_id'];?>"><img src="../SVG/delete_logo.svg" alt="ลบออเดอร์" class="bt_logo"></a></td><?php } ?>
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
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>