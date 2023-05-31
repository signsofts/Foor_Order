<?php
    include('./order_detail_script.php');
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
            max-height: 380px;
            overflow: auto;
        }
        .content_detail{
            height: 380px;
        }
        .payment_detail{
            background-color: #FFFFFF;
            width: 1140px;
            height: 195px;
            border-radius: 20px;
            margin-left: 20px;
            margin-top: 10px;
            padding-left: 10px;
            padding-right: 50px;
        }
        .vl {
            border-left: 6px solid green;
            height: 500px;
        }
    </style>
</head>
<body class="d-flex">
    <?php include '../sidebar/sidebar.php';?>
    <div class="content">
        <div class="d-flex d-inline justify-content-between">
            <div class="d-flex d-inline">
                <img src="../SVG/back.svg" alt="" class="bt_logo mt-4" onclick="window.history.back();">
                <h1>สรุปรายการอาหารที่สั่ง</h1>
            </div>
        </div>
        <div class="content_detail">
            <div class="table-responsive">
                <table class="table table-borderless text-center table-hover">
                    <thead class="table-light text-center">
                        <tr>
                            <th>หมายเลขโต๊ะ</th>
                            <th>คอร์สอาหาร</th>
                            <th>เมนูอาหาร</th>
                            <th>จำนวน</th>
                            <th>ราคา</th>
                            <th>เวลาที่สั่ง</th>
                            <th colspan="2">การจัดการ</th>
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
                            <td><?php echo $data['course_name']; ?></td>   
                            <td><?php echo $data['menu_name']; ?></td>
                            <td><?php echo $data['menu_quantity']; ?></td>
                            <td><?php if($data['course_name']!="a la cart"){
                                    echo "0";
                                    $cost_sum=$cost_sum+0;
                                }else{
                                    echo $data['menu_cost'];
                                    $cost_sum=$cost_sum+$data['menu_cost'];
                                } ?></td>
                            <td><?php echo $data['order_time']; ?></td>
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
        <div class="payment_detail position-relative">
            <form method="post" action="" enctype="multipart/form-data">
                <div class="d-flex">
                    <div style="width: 50%">
                        <h1>ยอดชำระเงิน</h1>
                        <div class="d-flex flex-column">
                            <div class="d-flex justify-content-between">
                                <input type="hidden" name="table_id" value="<?php echo $table_id; ?>  ">
                                <input type="hidden" name="order_id" value="<?php echo $order_id; ?>  ">
                                <label class="">ราคาอาหาร</label>
                                <div>
                                    <label class=""><?php echo "$cost_sum"  ?></label>
                                    <label class="">บาท</label>                                    
                                </div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <label class="">จำนวนลูกค้าที่มาทาน</label>
                                <div>
                                    <label class=""><?php echo $customer_number ?></label>
                                    <label class="">บาท</label>                                    
                                </div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <label class="">ราคาอาหารทั้งหมด</label>
                                <div>
                                    <label class=""><?php if($course_id=2){$cost_sum=$cost_sum+(199*$customer_number);}else if($course_id=3){$cost_sum=$cost_sum+(299*$customer_number);}echo "$cost_sum"  ?></label>
                                    <label class="">บาท</label>                                    
                                </div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <label class="">ภาษีมูลค่าเพิ่ม (VAT)</label>
                                <div class="">
                                    <?php $vat=($cost_sum*7)/100; ?>
                                    <label class=""><?php echo "$vat" ?></label>
                                    <label class="">บาท</label>
                                </div>                    
                            </div>
                            <div class="d-flex justify-content-between">
                                <label class="">ราคาอาหารสุทธิ (NET)</label>
                                <div class="">
                                    <?php $net=$cost_sum+$vat; ?>
                                    <label class=""><?php echo "$net" ?></label>
                                    <label class="">บาท</label>
                                </div>                    
                            </div>
                        </div>
                    </div>
                    <div style="width: 50%" class="position-relative">       
                        <div class="d-flex justify-content-evenly mt-5">
                            <button type="submit" class="btn btn-primary btn-lg" name="confirm">ยืนยันการชำระเงิน</button>
                            <button type="button" class="btn btn-danger btn-lg" onclick="window.history.back();">ยกเลิก</button>
                        </div>                
                    </div>                  
                </div>
            </form>
        </div>
    </div>
</body>
</html>