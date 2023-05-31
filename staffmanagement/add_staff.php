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
            <h1>เพิ่มพนักงาน</h1>
        </div>
        <div class="content_detail">
            <form method="post" action="">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">รหัสพนักงาน</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" name="staff_id" required value="<?php echo $rows; ?>" placeholder="กรอกชื่อพนักงาน" min="1">
                    </div>                    
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">ชื่อ</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="staff_firstname" required placeholder="กรอกชื่อพนักงาน">
                    </div>                    
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">นามสกุล</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="staff_lastname" required placeholder="กรอกนามสกุลพนักงาน">
                    </div> 
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">E-mail</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" name="staff_email" required placeholder="กรอก E-mail พนักงาน">
                    </div> 
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">รหัสผ่าน</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="staff_password" required maxlength="16" minlength="6" placeholder="กรอกรหัสผ่านพนักงาน">    
                    </div> 
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">เบอร์โทรศัพท์</label>
                    <div class="col-sm-10">
                        <input type="tel" class="form-control" name="staff_tel" required pattern="[0]{1}[0-9]{29}" maxlength="10" minlength="10" min="0" placeholder="กรอกเบอร์โทรพนักงาน ตัวอย่าง: 0123456789">    
                    </div> 
                </div>
                <fieldset class="form-group">
                    <div class="row">
                    <legend class="col-form-label col-sm-2 pt-0">ตำแหน่ง</legend>
                    <div class="col-sm-10">
                        <?php if($_SESSION['auth']=="1"){?><div class="form-check">
                            <input class="form-check-input" type="radio" name="staff_position" value="เจ้าของร้าน" required>
                            <label class="form-check-label">เจ้าของร้าน</label>
                        </div> <?php } ?>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="staff_position" value="ผู้จัดการร้าน" required>
                            <label class="form-check-label">ผู้จัดการร้าน</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="staff_position" value="พนักงานคิดเงิน" required>
                            <label class="form-check-label">พนักงานคิดเงิน</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="staff_position" value="พนักงานครัว" required>
                            <label class="form-check-label">พนักงานครัว</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="staff_position" value="บริกร" required>
                            <label class="form-check-label">บริกร</label>
                        </div>
                    </div>
                    </div>
                </fieldset>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary" name="create">ยืนยัน</button>
                        <button type="button" class="btn btn-danger" onclick="window.location.href='staffmanagement.php'">ยกเลิก</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>