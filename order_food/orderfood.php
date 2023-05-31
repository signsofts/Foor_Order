<?php
include('./orderfood_script.php');
require('./mainAdd_script.php');
?>
<?php
$sum = 0;
if (isset($_POST['minus'])) {
    $sum = $_POST['sum'];
    $sum--;
}

if (isset($_POST['add'])) {
    $sum = $_POST['sum'];
    $sum++;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--=============== BOXICONS ===============-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <!--============== BUTTON(+,-) ================-->
    <link rel="stylesheet" herf="increment.css">

    <title>Order Food</title>
    <script src="./../jquery.min.js"></script>
    <style>
        /*=============== GOOGLE FONTS ===============*/
        @import url("https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&display=swap");

        /*=============== VARIABLES CSS ===============*/
        :root {
            --header-height: 3rem;
            --container-color: #ffff;
            /*========== Font and typography ==========*/
            --body-font: 'Open Sans', sans-serif;
            --h1-font-size: 1.5rem;
            --normal-font-size: .938rem;
            --tiny-font-size: .625rem;
        }

        main {
            background-color: #ffff;
        }

        .fix-h2 {
            margin: 0px;
            font-size: 15px;
            justify-content: center;
        }

        /*=========== BUTTON(+,-) =============*/
        .space {
            display: inline-block;
        }

        .card {
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 100%;
            padding: 10px;
            align-items: center;
            object-fit: cover;
            border-radius: 15px;
            background-color: #ffff;
        }

        h2 {
            margin: 0 15px;
            font-size: 10px;

        }

        h4 {
            text-align: center;

        }

        img {
            padding: 10px 0;
            width: 30%;
            height: 30%;
            object-fit: cover;
            /* border-radius: 15%; */

        }

        td {
            width: 130px;
            height: 70px;
            text-align: center;
        }



        @media screen and (min-width: 968px) {
            :root {
                --h1-font-size: 2.25rem;
                --normal-font-size: 1rem;
            }

        }

        /*=============== BASE ===============*/
        * {
            box-sizing: border-box;
            padding: 0;
            margin: 0;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            margin: var(--header-height) 0 0 0;
            font-family: var(--body-font);
            font-size: var(--normal-font-size);
            background-color: var(--body-color);
            color: var(--text-color);
        }

        ul {
            list-style: none;
        }

        img {
            max-width: 100%;
            height: auto;
        }

        /*=============== REUSABLE CSS CLASSES ===============*/
        .section__title {
            font-size: var(--h1-font-size);
            color: var(--title-color);
            text-align: center;
            margin-bottom: 1.5rem;
            margin-top: 0px;
        }

        .card {
            display: flex;
            justify-content: space-around;
            align-items: center;
            height: 102px;
            width: 350px;
            padding: 10px;
            /* align-items: center; */
            object-fit: cover;
            border-radius: 15px;

        }

        section {
            margin-bottom: 10px;

        }

        /*=============== LAYOUT ===============*/
        .container {
            max-width: 968px;
            margin-left: 1rem;
            margin-right: 1rem;

        }

        /*=============== HEADER ===============*/
        .header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background-color: var(--container-color);
            z-index: var(--z-fixed);
            transition: .4s;
        }

        /*=============== NAV ===============*/
        .nav {
            height: var(--header-height);
            display: flex;
            justify-content: space-between;
            align-items: center;

        }

        .nav_header {
            display: flex;
            align-items: center;
        }



        .nav__logo {
            color: var(--title-color);
            font-weight: 600;
        }

        .topnav a {
            float: left;
            display: block;
            color: black;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            font-size: 17px;

        }

        .topnav a:hover {
            background-color: #ddd;
            color: black;
        }

        .topnav a.active {
            background-color: #2196F3;
            color: white;
        }

        .topnav .search-container {
            margin-left: 30px;
            float: left;

        }

        .topnav input[type=text] {
            padding: 6px;
            margin-top: 8px;
            font-size: 17px;
            border: 10px;
            border-radius: 50px 0px 0px 50px;
            height: 37px;
        }

        .topnav .search-container button {
            float: right;
            padding: 6px 10px;
            margin-top: 8px;
            /* margin-right: 10px; */
            background: #ffff;
            /* font-size: 17px; */
            border: 10px;
            cursor: pointer;
            border-radius: 0px 50px 50px 0px;
            height: 37px;
        }

        .topnav .search-container button:hover {
            background: #ccc;
        }

        /*======================button: 0=========================================*/
        @media screen and (max-width: 767px) {
            .nav__menu {
                position: fixed;
                bottom: 0;
                left: 0;
                background-color: var(--container-color);
                box-shadow: 0 -1px 12px hsla(var(--hue), var(--sat), 15%, 0.15);
                width: 100%;
                height: 4rem;
                padding: 0 1rem;
                display: grid;
                align-content: center;
                border-radius: 1.25rem 1.25rem 0 0;
                transition: .4s;
            }
        }

        .nav__list,
        .nav__link {
            display: flex;
        }


        .nav__link {
            flex-direction: column;
            align-items: center;
            row-gap: 4px;
            color: var(--title-color);
            font-weight: 600;
        }

        .nav__list {
            justify-content: space-between;
        }

        .nav__name {
            font-size: var(--tiny-font-size);
            /* display: none;*/
            /* Minimalist design, hidden labels */
        }

        .nav__icon {
            font-size: 1.5rem;
        }

        /*Active link*/
        .active-link {
            position: relative;
            color: var(--first-color);
            transition: .3s;
        }

        /* Minimalist design, active link */
        /* .active-link::before{
    

        /* Change background header */
        .scroll-header {
            box-shadow: 0 1px 12px hsla(var(--hue), var(--sat), 15%, 0.15);
        }



        @media screen and (min-width: 767px) {
            body {
                margin: 0;
            }

            .section {
                padding: 7rem 0 2rem;
            }

            .nav {
                height: calc(var(--header-height) + 1.5rem);
                /* 4.5rem */
            }

            .nav__img {
                display: none;
            }

            .nav__icon {
                display: none;
            }

            .nav__name {
                font-size: var(--normal-font-size);
                /* display: block; */
                /* Minimalist design, visible labels */
            }

            .nav__link:hover {
                color: var(--first-color);
            }

            /* First design, remove if you choose the minimalist design */
            .active-link::before {
                content: '';
                position: absolute;
                bottom: -.75rem;
                width: 4px;
                height: 4px;
                background-color: var(--first-color);
                border-radius: 50%;
            }

            Minimalist design .active-link::before {
                bottom: -.75rem;
            }
        }

        .head_type {
            /* display:inline-block; */
            padding: 10px 30px 10px 30px;
            justify-content: center;
            color: #9A9A9D;
        }

        a:hover {
            color: #FF6915;
        }

        .space {
            display: inline-block;
        }

        .button-minus {
            width: 90px;
            height: 30px;
            border-radius: 20px;
            outline: none;
            border-style: none;
            font-size: 10px;
            background-color: #FF6915;
            box-shadow: 0px;
            color: #ffff;
        }





        a {
            width: 60px;
            justify-content: center;
            text-align: center;
            justify-content: center;

        }
    </style>
</head>

<script>
    
</script>

<body>
    <!--=============== HEADER ===============-->
    <header class="header" id="header">
        <nav class="nav container">
            <div class="nav_header">
                <!-- <a href="../navbar_f/navbar_f.html"><img src="../SVG/front/nav_logo.svg" alt=""></a> -->
            </div>

            <div class="container">
                <a href="./cart.php?order_id=<?php echo $order_id; ?>"><img style="width:30px; height:48px;" src="../SVG/front/cart_logo.svg" alt=""></a>
            </div>
            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list">
                    <a href="./orderfood.php?order_id=<?php echo $order_id ?>">
                        <img src="../SVG/front/home_logo.svg" alt="">
                    </a>
                    <a href="../feedback_writing/feedback_writing.php?order_id=<?php echo $order_id ?>">
                        <img src="../SVG/front/user_logo.svg" alt="">
                    </a>
                    <a href="../order_food/history.php?order_id=<?php echo $order_id ?>">
                        <img src="../SVG/front/history_logo.svg" alt="">
                    </a>
            </ul>
            </div>
        </nav>
    </header>
    <main>
        <!--=============================================== search =================================-->
        <section class="container section">
            <div class="container">
                <h3> Delicious food for you </h3>
            </div>

            
    
            <br><br><br>
        </section>
        <table>
            <!--=============== Buffet ===============-->
            <div class="list">
                <form medthod="post" action="javascript:void(0)">
                    <?php
                    $sums = []; // Array to store the updated values
                    if (count($fetchData) > 0) {
                        $no = 1;
                        foreach ($fetchData as $data) {
                            $menuID = $data['menu_id'];

                            // Update the value of $sum based on button clicks
                            if (isset($_POST['minus' . $menuID])) {
                                $sums[$menuID] = isset($sums[$menuID]) ? $sums[$menuID] - 1 : 0;
                            }
                            if (isset($_POST['add' . $menuID])) {
                                $sums[$menuID] = isset($sums[$menuID]) ? $sums[$menuID] + 1 : 0;
                            }

                            // Set the initial value or get the updated value from the array
                            $sum = isset($sums[$menuID]) ? $sums[$menuID] : 0;

                            $maxValue = 7;
                    ?>
                            <tr>
                                <td><img src="../menu_image/<?php echo $data['menu_id']; ?>.png" alt=""></td>
                                <td>
                                    <h2 class="fix-h2"><?php echo $data['menu_name']; ?></h2>
                                </td>
                                <input id="idInPutValue" type="hidden" value='1'>
                                <td>
                                    <div class="container">
                                        <button class="button-minus listCard" onclick="addCartProduct('<?php echo $data['menu_id']; ?>', '<?php echo $data['menu_cost']; ?>', '<?php echo $data['menu_name']; ?>', '<?php echo $data['menu_id']; ?>', 'idInPutValue')">Add to cart</button>
                                    </div>
                            </tr>
                        <?php
                            $no++;
                        }
                    } else {
                        ?>
                        <tr>
                        </tr>
                    <?php
                    }
                    ?>
            </div>
            </div>
            <br>
        </table>
        </form>


        <table>

            <!--==================================== A la cart =============================-->
            <div class="">
                <br>
                <h4>A La Cart</h4>
                <?php
                $sums = []; // Array to store the updated values

                if (count($fetchDataAlacart) > 0) {
                    $no = 1;
                    foreach ($fetchDataAlacart as $dataalacart) {
                        $menuID = $dataalacart['menu_id'];

                        // Update the value of $sum based on button clicks
                        if (isset($_POST['minus' . $menuID])) {
                            $sums[$menuID] = isset($sums[$menuID]) ? $sums[$menuID] - 1 : 0;
                        }
                        if (isset($_POST['add' . $menuID])) {
                            $sums[$menuID] = isset($sums[$menuID]) ? $sums[$menuID] + 1 : 0;
                        }

                        // Set the initial value or get the updated value from the array
                        $sum = isset($sums[$menuID]) ? $sums[$menuID] : 0;

                        $maxValue = 7;
                ?>
                        <tr>
                            <td><img src="../menu_image/<?php echo $dataalacart['menu_id']; ?>.png" alt=""></td>
                            <td>
                                <h2 class="fix-h2"><?php echo $dataalacart['menu_name']; ?></h2>
                            </td>
                            <td style="width:50px; ">
                                <h2 class="fix-h2"><?php echo $dataalacart['menu_cost']; ?></h2>
                            </td>
                            <input id="idInPutValue1" type="hidden" value='1'>
                            <td>
                                <button class="button-minus" onclick="addCartProduct('<?php echo $dataalacart['menu_id']; ?>', '<?php echo $dataalacart['menu_cost']; ?>', '<?php echo $dataalacart['menu_name']; ?>', '<?php echo $dataalacart['menu_id']; ?>', 'idInPutValue1')">Add to cart</button>
                            </td>
                        </tr>
                    <?php
                        $no++;
                    }
                } else {
                    ?>
                    <tr>
                        <td colspan="7">ไม่พบข้อมูล</td>
                    </tr>
                <?php
                }
                ?>
            </div>
            </div>
            <br>

        </table>

        <!-- <div class="container">
                <a href="./cart.php?order_id=1"><h3> ไปที่ตะกร้าสินค้า </h3></a>
            </div> -->

        <!--=============== MAIN JS ===============-->
        <script src="./script/nav-menu.js"></script>
        <script src="app.js"></script>
        <script>
            var values = <?php echo json_encode($sums); ?>;

            function decreaseValue(menuID) {
                var input = document.getElementById('sum' + menuID);
                var value = parseInt(input.value);
                if (value > 0) {
                    value--;
                }
                input.value = value;
                values[menuID] = value; // Store the updated value in the values object
            }


            function increaseValue(menuID) {
                var input = document.getElementById('sum' + menuID);
                var value = parseInt(input.value);
                value++;
                input.value = value;
                values[menuID] = value; // Store the updated value in the values object
            }

            // You can access the updated values using the values object
            // For example, to get the value of menuID 123: values['123']
        </script>
        <script>

        </script>

</body>

</html>