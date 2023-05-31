<?php
    include('./add_script.php');
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
        form{
            padding: 15px;
        }
    </style>
</head>
<body class="d-flex">
    <?php include '../sidebar/sidebar.php';?>
    <div class="content">
        <div class="d-flex justify-content-between">
            <h1>เปิดออเดอร์โต๊ะ</h1>
        </div>
        <div class="content_detail">
            <form method="post" action="" enctype="multipart/form-data">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">รหัสออเดอร์</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" name="order_id" required value="<?php echo $rows; ?>" placeholder="กรอกรหัสออเดอร์" min="1">
                    </div>                    
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">เลขโต๊ะ</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" name="table_id" min="1" required placeholder="กรอกเลขโต๊ะ">
                    </div> 
                </div>
                <fieldset class="form-group">
                    <div class="row">
                        <legend class="col-form-label col-sm-2 pt-0">คอร์สอาหาร</legend>
                        <div class="col-sm-10">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="course_id" value="1" required>
                                <label class="form-check-label">A la cart</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="course_id" value="2" required>
                                <label class="form-check-label">Buffet 199</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="course_id" value="3" required>
                                <label class="form-check-label">Buffet 299</label>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">จำนวนลูกค้าที่มาทาน</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" name="customer_number" required placeholder="กรอกจำนวนลูกค้า" min="1">
                    </div>                    
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary" name="create">ยืนยัน</button>
                        <button type="button" class="btn btn-danger" onclick="window.location.href='createorder.php'">ยกเลิก</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>