<div class="sidebar">
    <h1 class="sidebar_bt mb-3">Jupiter Restaurant</h1>
    <div class="d-flex flex-column">
        <?php if($_SESSION['auth']=="1"||$_SESSION['auth']=="2"){?>
        <button type="button" class="btn">
            <a href="../dashboard/dashboard.php?month=<?php echo date('m'); ?>&year=<?php echo date('Y'); ?>"><div class="dashboard_bt d-flex">
                <img src="../SVG/dashboard_logo.svg" class="bt_logo" alt="">
                <h3 class="sidebar_bt">Dashboard</h3>
            </div></a>
        </button> 
        <hr class="hr hr-blurry" /><?php } ?>
        <?php if($_SESSION['auth']=="1"||$_SESSION['auth']=="2"){?>
        <button type="button" class="btn">
            <a href="../staffmanagement/staffmanagement.php"><div class="employee_management_bt d-flex">
                <img src="../SVG/management_employee_logo.svg" class="bt_logo" alt="">
                <h3 class="sidebar_bt">Employee Management</h3>
            </div></a>
        </button>
        <hr class="hr hr-blurry" /><?php } ?>
        <?php if($_SESSION['auth']=="1"||$_SESSION['auth']=="2"){?>
        <div class="dropdown dropend">
            <button type="button" class="btn d-flex" data-bs-toggle="dropdown">
                <div class="menu_management_bt d-flex">
                    <img src="../SVG/menu_management_logo.svg" class="bt_logo" alt="">
                    <h3 class="sidebar_bt">Menu Management</h3>
                    <img src="../SVG/arrow right.svg" class="bt_logo" alt="">
                </div>
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="../all_menumanegement/menumanagement.php">All Menu</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="../a_la_cartmanagement/menumanagement.php">A la cart</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="../buffet_199management/menumanagement.php">Buffet 199</a></li>
                <li><a class="dropdown-item" href="../buffet_299management/menumanagement.php">Buffet 299</a></li>
            </ul>
        </div>
        <hr class="hr hr-blurry" /><?php } ?>
        <?php if($_SESSION['auth']=="1"||$_SESSION['auth']=="2"){?>
        <button type="button" class="btn">
            <a href="../tablemanagement/tablemanagement.php"><div class="table_management_bt d-flex">
                <img src="../SVG/table_logo.svg" class="bt_logo" alt="">
                <h3 class="sidebar_bt">Table Management</h3>
            </div></a>
        </button>
        <hr class="hr hr-blurry" /><?php } ?>
        <?php if($_SESSION['auth']=="1"||$_SESSION['auth']=="2"||$_SESSION['auth']=="5"){?>
        <button type="button" class="btn">
            <a href="../createorder/createorder.php"><div class="create_order_bt d-flex">
                <img src="../SVG/create_order_logo.svg" class="bt_logo" alt="">
                <h3 class="sidebar_bt">Create Order</h3>
            </div></a>
        </button>
        <hr class="hr hr-blurry" /><?php } ?>
        <?php if($_SESSION['auth']=="1"||$_SESSION['auth']=="2"||$_SESSION['auth']=="4"){?>
        <button type="button" class="btn">
            <a href="../orderlist/orderlist.php"><div class="order_lists_bt d-flex">
                <img src="../SVG/order_list_logo.svg" class="bt_logo" alt="">
                <h3 class="sidebar_bt">Order lists</h3>
            </div></a>
        </button>
        <hr class="hr hr-blurry" /><?php } ?>
        <?php if($_SESSION['auth']=="1"||$_SESSION['auth']=="2"||$_SESSION['auth']=="3"){?>
        <button type="button" class="btn">
            <a href="../payment/payment.php"><div class="payment_bt d-flex">
                <img src="../SVG/payment_logo.svg" class="bt_logo" alt="">
                <h3 class="sidebar_bt">Payment</h3>
            </div></a>
        </button>
        <hr class="hr hr-blurry" /><?php } ?>
        <?php if($_SESSION['auth']=="1"||$_SESSION['auth']=="2"){?>
        <button type="button" class="btn">
            <a href="../feedback/feedback.php"><div class="feedback_bt d-flex">
                <img src="../SVG/feedback_logo.svg" class="bt_logo" alt="">
                <h3 class="sidebar_bt">Feedback</h3>
            </div></a>
        </button>
        <hr class="hr hr-blurry" /><?php } ?>
        <button type="button" class="btn">
            <a href="../login/logout_script.php"><div class="logout_bt d-flex">
                <img src="../SVG/logout_logo.svg" class="bt_logo" alt="">
                <h3 class="sidebar_bt">Sign out</h3>
            </div></a>
        </button>
    </div>
</div>