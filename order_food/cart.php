<?php
include('./history_script.php');
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

$order_id = $_GET['order_id'];
$query = "SELECT * from table_order WHERE order_id=" . "'" . $order_id . "'" . "";
$result = mysqli_query($conn, $query);
$account = mysqli_fetch_assoc($result);
$course_id = $account['course_id'];


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--=============== BOXICONS ===============-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <title>Cart</title>
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


        img {
            padding: 10px 0;
            width: 30%;
            height: 30%;
            object-fit: cover;
            /* border-radius: 15%; */

        }

        td {
            width: 150px;
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
            width: 30px;
            height: 30px;
            border-radius: 50%;
            outline: none;
            border-style: none;
            font-size: 10px;
            background-color: #FF6915;
            box-shadow: 0px;
            color: #ffff;
        }

        .button-add {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            outline: none;
            border-style: none;
            font-size: 10px;
            background-color: #FF6915;
            box-shadow: 0px;
            color: #ffff;
        }

        .num-sum {
            margin: 0px;
            text-align: center;
            border: none;
        }

        a {
            width: 60px;
            justify-content: center;
            text-align: center;
            justify-content: center;

        }

        .menu_list {
            width: 105px;
            height: 40px;
            display: inline-block;

        }

        .bt-sub {
            padding: 10px 0 0 120px;
        }
    </style>
</head>
<script>
    function add_item_btn(product_key, item, index) {
        var item = item.value;
        // alert(index + item + product_key)
        add_item(product_key, item, index);
    }

    function add_item_btn_add(product_key, item, index) {
        var item = parseInt(item.value) + 1;
        // alert(index + item + product_key)
        add_item(product_key, item, index);
    }

    function add_item_btn_delete(product_key, item, index) {
        var item = parseInt(item.value) - 1;
        // alert(index + item + product_key)
        add_item(product_key, item, index);
    }

    function product_item_all() {
        // alert('product_item_all')
        var tbody = "";

        const json = readCookie('product');
        const product = JSON.parse(json);

        console.log(json);
        var sum_total = 0;

        $('#tbb_product_item_all').empty();

        product.forEach(function(value, index) {

            let id_input = 'sst_' + value.product_key;
            let total = value.ordetail_item * value.product_price;
            sum_total += total;

            tbody += `
                        <tr>
                                    <td><img src="../menu_image/${value.product_picture}.png" alt=""></td>
                                    <td>
                                        <h2 class="fix-h2">${value.product_name}</h2>
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                            <input class="button-minus" type="button" onclick="add_item_btn_delete(${value.product_key},${id_input}, ${index} )"  value=" - "  />
                                            <input class="num-sum" type="text" onchange="add_item(${value.product_key}, this.value, ${index})" id="${id_input}" maxlength="12" value="${value.ordetail_item}" size="1" />
                                            <input name="foodlist" class="button-add" type="button"  onclick="add_item_btn_add(${value.product_key},${id_input}, ${index} )" value="+" />
                                        </div>
                                    </td>
                                </tr>
                       `;

            // $tbody += '<tr><td class="pro-thumbnail"><a href="#"><img width="350" height="350"src="assets/images/products/product01.webp" class="img-fluid" alt="Product"></a></td><td class="pro-title"><a href="#">สินค้ารายการที่ 1 สินค้ารายการที่ 1</a></td><td class="pro-price"><span>฿29.00</span></td><td class="pro-quantity"><div class="pro-qty"><input type="text" value="1"></div></td><td class="pro-subtotal"><span>฿29.00</span></td><td class="pro-remove"><a href="#"><i class="fa fa-trash-o"></i></a></td></tr>';
        });

        if (product == '') {
            // $("#div-product").html('<h4>ตะกร้าสินค้าของคุณ ไม่มีสินค้า <a href="./category.php">คลิ๊กเพื่อไปยังหน้ารายการสินค้า</a></h4>');
            // $("# ").css('display', 'none');
        }
        // 

        $(".sum_totallist").html(THB.format(sum_total));
        $('#tbb_product_item_all').html(tbody);

    }
</script>

<body>
    <!--=============== HEADER ===============-->
    <header class="header" id="header">
        <nav class="nav container">
            <div class="nav_header">
                <a href="../order_food/orderfood.php?order_id=<?php echo $order_id ?>"><img src="../SVG/back_logo.svg" alt=""></a>
                <a href="" class="d-flex mr1">Cart</a>
            </div>
        </nav>
    </header>
    <main>
        <!--=============================================== search =================================-->
        <form method="post" action="javascript:void(0)">
            <table>
                <div>
                    <thead>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody id="tbb_product_item_all">




                    </tbody>
                </div>
                <br>
            </table>
            <div class="bt-sub">
                <button type="button" onclick="submitOrder()" class="w3-btn w3-round" style="width:150px; height:50px; border-radius:10px; border:none; background-color:#FF6915;color:#ffff;" name="create">เสร็จสิ้น</button>
            </div>
            <br>
        </form>
    </main>


    <script>
        product_item_all()

        function submitOrder() {
            const json = readCookie('product');
            const product = JSON.parse(json)



            $.ajax({
                url: "./submitOrder.php",
                type: "POST",
                // dataType: "json",
                data: {
                    action: "submitOrder",
                    product: product,
                    order_id: <?php echo $order_id ?>,
                    course_id: <?php echo $course_id ?>
                },
                success: function(response, statusText, jqXHR) {
                    if (response == 'success') {
                        alert('สั่งทำออเดอร์เสร็จสิ้น')
                        removeCookie('product');
                        location.assign("./orderfood.php?order_id=<?php echo $order_id ?>")
                    }else{
                        alert('ระบบเกิดข้อผิดพลาดโปรลองใหม่อีกครั้ง')
                    }

                },
                error: function(jqXHR, textStatus, errorThrown) {
                    // errorSwal("ระบบตรวจพบข้อผิดจากระบบ!", false);
                    console.log("Error: " + textStatus + " - " + errorThrown);
                    // console.error(jqXHR)
                },
            });
        }
    </script>
    <!--=============== MAIN JS ===============-->
    <script src="./script/nav-menu.js"></script>
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
</body>

</html>