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
        #display_image{
            display: none;
            margin: 5px;
            height: 200px;
            width: 220px;
            background-position: center;
            background-size: cover;
        }
    </style>
</head>
<body class="d-flex">
    <?php include '../sidebar/sidebar.php';?>
    <div class="content">
        <div class="d-flex justify-content-between">
            <h1>เพิ่มเมนูอาหาร</h1>
        </div>
        <div class="content_detail">
            <form method="post" action="" enctype="multipart/form-data">
                <div class="form-group">
                    <div id="display_image" class="mx-auto"></div>
                    <br>
                    <input class="form-control form-control-sm" name="file" type="file" id="image_input" accept=".png, .jpg">                      
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">รหัสอาหาร</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" name="menu_id" required value="<?php echo $rows; ?>" placeholder="กรอกรหัสอาหาร" min="1">
                    </div>                    
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">ชื่ออาหาร</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="menu_name" required placeholder="กรอกชื่ออาหาร">
                    </div> 
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">ราคาอาหาร</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" name="menu_cost" required placeholder="กรอกราคาอาหาร" min="0">
                    </div>                    
                </div>
                <fieldset class="form-group">
                    <div class="row">
                        <legend class="col-form-label col-sm-2 pt-0">สถานะอาหาร</legend>
                        <div class="col-sm-10">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="menu_status" value="0" required>
                                <label class="form-check-label">พร้อม</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="menu_status" value="1" required>
                                <label class="form-check-label">หมด</label>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <fieldset class="form-group">
                    <div class="row">
                        <legend class="col-form-label col-sm-2 pt-0">เพิ่มในคอร์ส A la cart</legend>
                        <div class="col-sm-10">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" name="course1_status" value="1">
                            </div>
                        </div>
                    </div>
                </fieldset>
                <fieldset class="form-group">
                    <div class="row">
                        <legend class="col-form-label col-sm-2 pt-0">เพิ่มในคอร์ส Buffet 199</legend>
                        <div class="col-sm-10">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" name="course2_status" value="1">
                            </div>
                        </div>
                    </div>
                </fieldset>
                <fieldset class="form-group">
                    <div class="row">
                        <legend class="col-form-label col-sm-2 pt-0">เพิ่มในคอร์ส Buffet 299</legend>
                        <div class="col-sm-10">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" name="course3_status" value="1">
                            </div>
                        </div>
                    </div>
                </fieldset>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary" name="create">ยืนยัน</button>
                        <button type="button" class="btn btn-danger" onclick="window.location.href='menumanagement.php'">ยกเลิก</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        const image_input = document.querySelector("#image_input");
        const image_input_edit = document.querySelector("#image_input_edit");
        let uploaded_image = "";
        image_input.addEventListener("change", function(){
            const reader = new FileReader();
            reader.addEventListener("load", () => {
                document.querySelector("#display_image").style.display = "block";
                uploaded_image = reader.result;
                document.querySelector("#display_image").style.backgroundImage = `url(${uploaded_image})`;
            });
            reader.readAsDataURL(this.files[0]);
        })
    </script>
</body>
</html>