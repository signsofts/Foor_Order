<?php
include('./dashboard_script.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="icon" type="image/svg+xml" href="/src/favicon.svg" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../style/style.css">
    <style>
        .table_A {
            margin-left: 150px;
        }

        .table-responsive {
            max-height: 550px;
            overflow: auto;
        }

        .card-responsive {
            max-height: 150px;
            overflow: auto;
        }

        .content_detail {
            padding-top: 15px;
        }
    </style>
</head>

<body class="d-flex">
    <?php include('../sidebar/sidebar.php') ?>
    <div class="content">
        <div class="d-flex">
            <h1>DASHBOARD</h1>
        </div>
        <div class="content_detail">
            <div class="table-responsive">
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="d-flex">
                        <h3 style="color: #4E73DF;">ข้อมูลประจำเดือน: <?php
                                                                        if ($month == 1) {
                                                                            echo "มกราคม";
                                                                        } else if ($month == 2) {
                                                                            echo "กุมภาพันธ์";
                                                                        } else if ($month == 3) {
                                                                            echo "มีนาคม";
                                                                        } else if ($month == 4) {
                                                                            echo "เมษายน";
                                                                        } else if ($month == 5) {
                                                                            echo "พฤษภาคม";
                                                                        } else if ($month == 6) {
                                                                            echo "มิถุนายน";
                                                                        } else if ($month == 7) {
                                                                            echo "กรกฏาคม";
                                                                        } else if ($month == 8) {
                                                                            echo "สิงหาคม";
                                                                        } else if ($month == 9) {
                                                                            echo "กันยายน";
                                                                        } else if ($month == 10) {
                                                                            echo "ตุลาคม";
                                                                        } else if ($month == 11) {
                                                                            echo "พฤศจิกายน";
                                                                        } else if ($month == 12) {
                                                                            echo "ธันวาคม";
                                                                        }
                                                                        echo " " . $year;
                                                                        ?></h3>
                        <div class="dropdown dropend">
                            <button type="button" class="btn d-flex" data-bs-toggle="dropdown">
                                <div class="menu_management_bt d-flex">
                                    <img src="../SVG/calendar.svg" class="bt_logo" alt="">
                                    <h3 style="font-size:large;">เลือกเดือน</h3>
                                </div>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="../dashboard/dashboard.php?month=<?php echo "1"; ?>&year=<?php echo $year; ?>">มกราคม</a></li>
                                <li><a class="dropdown-item" href="../dashboard/dashboard.php?month=<?php echo "2"; ?>&year=<?php echo $year; ?>">กุมภาพันธ์</a></li>
                                <li><a class="dropdown-item" href="../dashboard/dashboard.php?month=<?php echo "3"; ?>&year=<?php echo $year; ?>">มีนาคม</a></li>
                                <li><a class="dropdown-item" href="../dashboard/dashboard.php?month=<?php echo "4"; ?>&year=<?php echo $year; ?>">เมษายน</a></li>
                                <li><a class="dropdown-item" href="../dashboard/dashboard.php?month=<?php echo "5"; ?>&year=<?php echo $year; ?>">พฤษภาคม</a></li>
                                <li><a class="dropdown-item" href="../dashboard/dashboard.php?month=<?php echo "6"; ?>&year=<?php echo $year; ?>">มิถุนายน</a></li>
                                <li><a class="dropdown-item" href="../dashboard/dashboard.php?month=<?php echo "7"; ?>&year=<?php echo $year; ?>">กรกฏาคม</a></li>
                                <li><a class="dropdown-item" href="../dashboard/dashboard.php?month=<?php echo "8"; ?>&year=<?php echo $year; ?>">สิงหาคม</a></li>
                                <li><a class="dropdown-item" href="../dashboard/dashboard.php?month=<?php echo "9"; ?>&year=<?php echo $year; ?>">กันยายน</a></li>
                                <li><a class="dropdown-item" href="../dashboard/dashboard.php?month=<?php echo "10"; ?>&year=<?php echo $year; ?>">ตุลาคม</a></li>
                                <li><a class="dropdown-item" href="../dashboard/dashboard.php?month=<?php echo "11"; ?>&year=<?php echo $year; ?>">พฤศจิกายน</a></li>
                                <li><a class="dropdown-item" href="../dashboard/dashboard.php?month=<?php echo "12"; ?>&year=<?php echo $year; ?>">ธันวาคม</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- Content Row -->
                    <div class="row">

                        <!-- ========================= A La Cart ============================ -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                A La Cart
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php
                                                if (count($fetchData_alacart) > 0) {
                                                    $sale_alacart = 0;
                                                    $no = 1;
                                                    foreach ($fetchData_alacart as $data_1) {
                                                        $sale_alacart = $sale_alacart + ($data_1['menu_cost'] * $data_1['menu_quantity']);


                                                        $no++;
                                                    }
                                                    echo $sale_alacart;
                                                } else {
                                                    echo "ไม่มีข้อมูล";
                                                }
                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- ========================= Buffet 199 ============================ -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Buffet 199
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php
                                                if (count($fetchData_pork) > 0) {
                                                    $sale_pork = 0;
                                                    $no = 1;
                                                    foreach ($fetchData_pork as $data_pork) {
                                                        $sale_pork = $sale_pork + ($data_pork['menu_cost'] * $data_pork['menu_quantity']);


                                                        $no++;
                                                    }
                                                    echo $sale_pork;
                                                } else {
                                                    echo "ไม่มีข้อมูล";
                                                }
                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- ========================= Buffet 299 ============================ -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Buffet 299
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php
                                                if (count($fetchData_meat) > 0) {
                                                    $sale_meat = 0;
                                                    $no = 1;
                                                    foreach ($fetchData_meat as $data_meat) {
                                                        $sale_meat = $sale_meat + ($data_meat['menu_cost'] * $data_meat['menu_quantity']);

                                                        $no++;
                                                    }
                                                    echo $sale_meat;
                                                } else {
                                                    echo "ไม่มีข้อมูล";
                                                }
                                                ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- ========================= Customer ============================ -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Customer</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php
                                                if (count($fetchData_customer) > 0) {
                                                    $sale_customer = 0;
                                                    $no = 1;
                                                    foreach ($fetchData_customer as $data_customer) {
                                                        $sale_customer = $sale_customer + $data_customer['customer_number'];
                                                        $no++;
                                                    }
                                                    echo $sale_customer;
                                                } else {
                                                    echo "ไม่มีข้อมูล";
                                                }
                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!--===================== Food Tier list===================== -->
                    <!-- Content Row -->
                    <div class="row">
                        <!-- Content Column -->
                        <div class="col-md-6 mb-4">
                            <!-- Project Card Example -->
                            <div class="card shadow mb-2">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Course: A la cart</h6>
                                </div>
                                <div class="card-body card-responsive">
                                    <?php
                                    if (count($fetchData_top_alacart) > 0) {
                                        $no = 1;
                                        foreach ($fetchData_top_alacart as $data) { ?>
                                            <h4 class="small font-weight-bold"><?php echo "ขายดีอันดับที่ " . $no . ": " ?>
                                                <span class="float-right"><img src="../menu_image/<?php echo $data['menu_id']; ?>.png" alt="" width="50px" height="75px"></span><?php echo $data['menu_name']; ?>
                                            </h4>
                                    <?php $no++;
                                        }
                                    } else {
                                        echo "ไม่มีข้อมูล";
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <!-- Project Card Example -->
                            <div class="card shadow mb-2">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Course: Buffet</h6>
                                </div>
                                <div class="card-body card-responsive">
                                    <?php
                                    if (count($fetchData_top_buffet) > 0) {
                                        $no = 1;
                                        foreach ($fetchData_top_buffet as $data) { ?>
                                            <h4 class="small font-weight-bold"><?php echo "ขายดีอันดับที่ " . $no . ": " ?>
                                                <span class="float-right"><img src="../menu_image/<?php echo $data['menu_id']; ?>.png" alt="" width="50px" height="75px"></span><?php echo $data['menu_name']; ?>
                                            </h4>
                                    <?php $no++;
                                        }
                                    } else {
                                        echo "ไม่มีข้อมูล";
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid">
                        <div class="d-flex">
                            <h3 style="color: #4E73DF;">ข้อมูลประจำปี: <?php
                                                                        echo " " . $year;
                                                                        ?></h3>
                            <div class="dropdown dropend">
                                <button type="button" class="btn d-flex" data-bs-toggle="dropdown">
                                    <div class="menu_management_bt d-flex">
                                        <img src="../SVG/calendar.svg" class="bt_logo" alt="">
                                        <h3 style="font-size:large;">เลือกปี</h3>
                                    </div>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="../dashboard/dashboard.php?month=<?php echo $month; ?>&year=<?php echo date('Y'); ?>"><?php echo date('Y'); ?></a></li>
                                    <li><a class="dropdown-item" href="../dashboard/dashboard.php?month=<?php echo $month; ?>&year=<?php echo date('Y') - 1; ?>"><?php echo date('Y') - 1; ?></a></li>
                                    <li><a class="dropdown-item" href="../dashboard/dashboard.php?month=<?php echo $month; ?>&year=<?php echo date('Y') - 2; ?>"><?php echo date('Y') - 2; ?></a></li>
                                    <li><a class="dropdown-item" href="../dashboard/dashboard.php?month=<?php echo $month; ?>&year=<?php echo date('Y') - 3; ?>"><?php echo date('Y') - 3; ?></a></li>
                                    <li><a class="dropdown-item" href="../dashboard/dashboard.php?month=<?php echo $month; ?>&year=<?php echo date('Y') - 4; ?>"><?php echo date('Y') - 4; ?></a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- Content Row -->
                        <div class="row">

                            <!-- ====================== A La Cart ============================= -->
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    A La Cart
                                                </div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    <?php
                                                    if (count($fetchData_alacart_year) > 0) {
                                                        $sale_alacart = 0;
                                                        $no = 1;
                                                        foreach ($fetchData_alacart_year as $data_1) {
                                                            $sale_alacart = $sale_alacart + ($data_1['menu_cost'] * $data_1['menu_quantity']);


                                                            $no++;
                                                        }
                                                        echo $sale_alacart;
                                                    } else {
                                                        echo "ไม่มีข้อมูล";
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- ================================== Buffet 199 ====================================== -->
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-success shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                    Buffet 199
                                                </div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    <?php
                                                    if (count($fetchData_pork_year) > 0) {
                                                        $sale_pork = 0;
                                                        $no = 1;
                                                        foreach ($fetchData_pork_year as $data_pork) {
                                                            $sale_pork = $sale_pork + ($data_pork['menu_cost'] * $data_pork['menu_quantity']);


                                                            $no++;
                                                        }
                                                        echo $sale_pork;
                                                    } else {
                                                        echo "ไม่มีข้อมูล";
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- ========================= Buffet 299 ========================== -->
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-info shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                    Buffet 299
                                                </div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    <?php
                                                    if (count($fetchData_meat_year) > 0) {
                                                        $sale_meat = 0;
                                                        $no = 1;
                                                        foreach ($fetchData_meat_year as $data_meat) {
                                                            $sale_meat = $sale_meat + ($data_meat['menu_cost'] * $data_meat['menu_quantity']);


                                                            $no++;
                                                        }
                                                        echo $sale_meat;
                                                    } else {
                                                        echo "ไม่มีข้อมูล";
                                                    }
                                                    ?></div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- ========================= Customer ========================================= -->
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-warning shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                    Customer</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    <?php
                                                    if (count($fetchData_customer_year) > 0) {
                                                        $sale_customer = 0;
                                                        $no = 1;
                                                        foreach ($fetchData_customer_year as $data_customer) {
                                                            $sale_customer = $sale_customer + $data_customer['customer_number'];
                                                            $no++;
                                                        }
                                                        echo $sale_customer;
                                                    } else {
                                                        echo "ไม่มีข้อมูล";
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-comments fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!--===================== Food Tier list===================== -->
                        <!-- Content Row -->
                        <div class="row">
                            <!-- Content Column -->
                            <div class="col-md-6 mb-4">
                                <!-- Project Card Example -->
                                <div class="card shadow mb-2">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">Course: A la cart</h6>
                                    </div>
                                    <div class="card-body card-responsive">
                                        <?php
                                        if (count($fetchData_top_alacart_year) > 0) {
                                            $no = 1;
                                            foreach ($fetchData_top_alacart_year as $data) { ?>
                                                <h4 class="small font-weight-bold"><?php echo "ขายดีอันดับที่ " . $no . ": " ?>
                                                    <span class="float-right"><img src="../menu_image/<?php echo $data['menu_id']; ?>.png" alt="" width="50px" height="75px"></span><?php echo $data['menu_name']; ?>
                                                </h4>
                                        <?php $no++;
                                            }
                                        } else {
                                            echo "ไม่มีข้อมูล";
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <!-- Project Card Example -->
                                <div class="card shadow mb-2">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">Course: Buffet</h6>
                                    </div>
                                    <div class="card-body card-responsive">
                                        <?php
                                        if (count($fetchData_top_buffet_year) > 0) {
                                            $no = 1;
                                            foreach ($fetchData_top_buffet_year as $data) { ?>
                                                <h4 class="small font-weight-bold"><?php echo "ขายดีอันดับที่ " . $no . ": " ?>
                                                    <span class="float-right"><img src="../menu_image/<?php echo $data['menu_id']; ?>.png" alt="" width="50px" height="75px"></span><?php echo $data['menu_name']; ?>
                                                </h4>
                                        <?php $no++;
                                            }
                                        } else {
                                            echo "ไม่มีข้อมูล";
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->

                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; jrposms</span>
                        </div>
                    </div>
                </footer>
                <!-- End of Footer -->
            </div>
            <!-- Core plugin JavaScript-->
            <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

            <!-- Custom scripts for all pages-->
            <script src="js/sb-admin-2.min.js"></script>

            <!-- Page level plugins -->
            <script src="vendor/chart.js/Chart.min.js"></script>

            <!-- Page level custom scripts -->
            <script src="js/demo/chart-area-demo.php"></script>
            <script src="js/demo/chart-pie-demo.php"></script>
        </div>
    </div>


</body>

</html>