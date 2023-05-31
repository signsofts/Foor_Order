<?php
    include('./orderlist_detail_script.php');
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
        <div class="d-flex d-inline justify-content-between">
            <div class="d-flex d-inline">
                <a href="./orderlist.php"><img src="../SVG/back.svg" alt="" class="bt_logo mt-4"></a>
                <h1>สรุปรายการอาหารที่สั่ง</h1>
            </div>
        </div>
        <div class="content_detail">
            <div class="table-responsive">
                <table class="table table-borderless text-center table-hover">
                    <thead class="table-light text-center">
                        <tr>
                            <th>หมายเลขโต๊ะ</th>
                            <th>เมนูอาหาร</th>
                            <th>จำนวน</th>
                            <th>เวลาที่สั่ง</th>
                            <th colspan="1">การจัดการ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $cost_sum=0;
                            if(count($fetchData)>0){
                                $no=1;
                                foreach($fetchData as $data){   
                        ?>
                        <tr>
                            <td><?php echo $data['table_id']; ?></td> 
                            <td><?php echo $data['menu_name']; ?></td>
                            <td><?php echo $data['menu_quantity']; ?></td>
                            <td><?php echo $data['order_time']; ?></td>
                            <td><a href="update_script.php?edit=<?php echo $data['order_detail_id']; ?>&order=<?php echo $data['order_id']; ?>"><img src="../SVG/done.svg" alt="ทำเสร็จ" class="bt_logo"></a></td>
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