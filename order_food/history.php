<?php
    include('./history_script.php');
?>
<?php
$sum=0;
if(isset($_POST['minus'])){
	$sum=$_POST['sum'];
	$sum--;
}

if(isset($_POST['add'])){
	$sum=$_POST['sum'];
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

    <!--=============== CSS ===============-->
    <!-- <link rel="stylesheet" href="./style/style-menu-beef.css"> -->
    <!--============== BUTTON(+,-) ================-->
    <link rel="stylesheet" herf="increment.css">


    <title>History</title>
    <style>
            /*=============== GOOGLE FONTS ===============*/
            @import url("https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&display=swap");

            /*=============== VARIABLES CSS ===============*/
            :root {
                --header-height: 3rem;

                /*========== Colors ==========*/
                /* --hue: 174;
        --sat: 63%;
        --first-color: hsl(var(--hue), var(--sat), 40%);
        --first-color-alt: hsl(var(--hue), var(--sat), 36%);
        --title-color: hsl(var(--hue), 12%, 15%);
        --text-color: hsl(var(--hue), 8%, 35%);
        --body-color: hsl(var(--hue), 100%, 99%); */
                --container-color: #ffff;

                /*========== Font and typography ==========*/
                --body-font: 'Open Sans', sans-serif;
                --h1-font-size: 1.5rem;
                --normal-font-size: .938rem;
                --tiny-font-size: .625rem;

                /*========== z index ==========*/
                /* --z-tooltip: 10;
        --z-fixed: 100; */
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

            /* *{
        padding: 0;
        margin: 0;
        box-sizing: border-box;

        } */
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

            /* button{ น่าสนใจ---------------------------------------------------------
        width: 30px;
        height: 30px;
        border-radius: 50%;
        outline: none;
        border-style: none;
        font-size: 10px;
        background-color: #bababa;
        box-shadow: 0px;
        }
        button:hover{
        background-color: darkblue;
        color: red;
        border-color: #000;
        } */
            /* .menu_img {
        width: 0px;
        height: 0px;
        border-radius: 20%;
        padding: left;
        } */

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

            /* .button {
        background-color: #4CAF50; 
        border: none;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
        } */

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

            /* a {
        text-decoration: none;
        } */

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

            /*.section2__height {
        height: 100vh;
        }*/

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

            /* .nav_footer {
        display: flex;
        } */

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
        content: '';
        position: absolute;
        bottom: -.5rem;
        width: 4px;
        height: 4px;
        background-color: var(--first-color);
        border-radius: 50%;
        } */

            /* Change background header */
            .scroll-header {
                box-shadow: 0 1px 12px hsla(var(--hue), var(--sat), 15%, 0.15);
            }

            /*=============== MEDIA QUERIES ===============*/
            /* For small devices */
            /* Remove if you choose, the minimalist design */
            /* @media screen and (max-width: 320px) {
        .nav__name {
            display: none;
        }
        } */

            /* For medium devices */
            /* @media screen and (min-width: 576px) {
        .nav__list {
            justify-content: center;
            column-gap: 3rem;
        }
        } */

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
                /* border: none;
                    background-color: #FF6915;
                    border-radius: 0px;
                    justify-content:center; */
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

            form {
                width: 105px;
                height: 40px;
                display: inline-block;

            }

            /* For large devices */
            /* @media screen and (min-width: 1024px) {
        .container {
            margin-left: auto;
            margin-right: auto;
        }
        } */
        .bt-sub{
                    padding: 10px 0 0 120px;
                }
    </style>
</head>

<body>
    <!--=============== HEADER ===============-->
    <header class="header" id="header">
        <nav class="nav container">
            <div class="nav_header">
                <a href="../order_food/orderfood.php?order_id=<?php echo $order_id ?>"><img src="../SVG/back_logo.svg" alt=""></a>
                <a href="" class="d-flex mr1">History</a>
            </div>
        </nav>
    </header>

    <main>
        <!--=============================================== search ============================================-->
        <table>
            <div>
                <?php
                if(count($fetchData)>0){
                $no=1;
                foreach($fetchData as $data){   
                ?>
                <tr>
                    <td><img src="../menu_image/<?php echo $data['menu_id']; ?>.png" alt=""></td>
                    <td><h2 class="fix-h2"><?php echo $data['menu_name']; ?></h2></td>
                    <td><?php if($data['order_status']==0){
                            echo "<h4 style='color:red'>กำลังเตรียม</h4>";
                        }else{
                            echo "<h4 style='color:green'>เสร็จสิ้น</h4>";
                        } ?>
                    </td>
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
            
            </div>
            <br>
        </table>
         




        <br>
    </main>


    <!--=============== MAIN JS ===============-->
    <script src="./script/nav-menu.js"></script>




</body>

</html>