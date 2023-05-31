<?php
    session_start();
    $auth=$_SESSION['auth'];
    $arr=array(1,2);
    if(!in_array($auth,$arr)){
        header('location:../login/login.php');
    }
    include('..//DBConnection.php');
    $month=$_GET['month'];
    $year=$_GET['year'];
    $fetchData_alacart = fetch_data_alacart($conn,$month,$year);
    $fetchData_pork = fetch_data_pork($conn,$month,$year);
    $fetchData_meat = fetch_data_meat($conn,$month,$year);
    $fetchData_customer = fetch_data_customer($conn,$month,$year);
    $fetchData_top_alacart = fetch_data_top_alacart($conn,$month,$year);
    $fetchData_top_buffet = fetch_data_top_buffet($conn,$month,$year);
    $fetchData_alacart_year = fetch_data_alacart_year($conn,$year);
    $fetchData_pork_year = fetch_data_pork_year($conn,$year);
    $fetchData_meat_year = fetch_data_meat_year($conn,$year);
    $fetchData_customer_year = fetch_data_customer_year($conn,$year);
    $fetchData_top_alacart_year = fetch_data_top_alacart_year($conn,$year);
    $fetchData_top_buffet_year = fetch_data_top_buffet_year($conn,$year);
    function fetch_data_alacart($conn,$month,$year){
        $query="SELECT stock.menu_cost,order_detail.menu_quantity from order_detail LEFT JOIN stock ON stock.menu_id=order_detail.menu_id WHERE order_detail.course_id=1 AND MONTH(order_time) =".$month." AND YEAR(order_time) =".$year;
        $exec=mysqli_query($conn,$query);
        if(mysqli_num_rows($exec)>0){
            $row=mysqli_fetch_all($exec,MYSQLI_ASSOC);
            return $row;
        }else{
            return $row=[];
        }
    }
    function fetch_data_pork($conn,$month,$year){
        
        $query="SELECT stock.menu_cost,order_detail.menu_quantity from order_detail LEFT JOIN stock ON stock.menu_id=order_detail.menu_id WHERE order_detail.course_id=2 AND MONTH(order_time) =".$month." AND YEAR(order_time) =".$year;
        
        $exec=mysqli_query($conn,$query);
        if(mysqli_num_rows($exec)>0){
            $row=mysqli_fetch_all($exec,MYSQLI_ASSOC);
            return $row;
        }else{
            return $row=[];
        }
    }
    function fetch_data_meat($conn,$month,$year){
        $query="SELECT stock.menu_cost,order_detail.menu_quantity from order_detail LEFT JOIN stock ON stock.menu_id=order_detail.menu_id WHERE order_detail.course_id=3 AND MONTH(order_time) =".$month." AND YEAR(order_time) =".$year;
        $exec=mysqli_query($conn,$query);
        if(mysqli_num_rows($exec)>0){
            $row=mysqli_fetch_all($exec,MYSQLI_ASSOC);
            return $row;
        }else{
            return $row=[];
        }
    }
    function fetch_data_customer($conn,$month,$year){
        $query="SELECT customer_number from table_order WHERE MONTH(open_date) =".$month." AND YEAR(open_date) =".$year;
        $exec=mysqli_query($conn,$query);
        if(mysqli_num_rows($exec)>0){
            $row=mysqli_fetch_all($exec,MYSQLI_ASSOC);
            return $row;
        }else{
            return $row=[];
        }
    }
// ======================= Menu tier list ===============================
    function fetch_data_top_alacart($conn,$month,$year){
        $query="SELECT * from order_detail LEFT JOIN stock ON stock.menu_id=order_detail.menu_id WHERE order_detail.course_id=1 AND MONTH(order_time) =".$month." AND YEAR(order_time) =".$year." GROUP BY order_detail.menu_id ORDER BY menu_quantity ASC";
        $exec=mysqli_query($conn,$query);
        if(mysqli_num_rows($exec)>0){
            $row=mysqli_fetch_all($exec,MYSQLI_ASSOC);
            return $row;
        }else{
            return $row=[];
        }
    }
    function fetch_data_top_buffet($conn,$month,$year){
        $query="SELECT * from order_detail LEFT JOIN stock ON stock.menu_id=order_detail.menu_id WHERE order_detail.course_id=2 OR order_detail.course_id=3 AND MONTH(order_time) =".$month." AND YEAR(order_time) =".$year." GROUP BY order_detail.menu_id ORDER BY menu_quantity ASC";
        $exec=mysqli_query($conn,$query);
        if(mysqli_num_rows($exec)>0){
            $row=mysqli_fetch_all($exec,MYSQLI_ASSOC);
            return $row;
        }else{
            return $row=[];
        }
    }
    //year
    function fetch_data_alacart_year($conn,$year){
        $query="SELECT stock.menu_cost,order_detail.menu_quantity from order_detail LEFT JOIN stock ON stock.menu_id=order_detail.menu_id WHERE order_detail.course_id=1 AND YEAR(order_time) =".$year;
        $exec=mysqli_query($conn,$query);
        if(mysqli_num_rows($exec)>0){
            $row=mysqli_fetch_all($exec,MYSQLI_ASSOC);
            return $row;
        }else{
            return $row=[];
        }
    }
    function fetch_data_pork_year($conn,$year){
        $query="SELECT stock.menu_cost,order_detail.menu_quantity from order_detail LEFT JOIN stock ON stock.menu_id=order_detail.menu_id WHERE order_detail.course_id=2 AND YEAR(order_time) =".$year;
        $exec=mysqli_query($conn,$query);
        if(mysqli_num_rows($exec)>0){
            $row=mysqli_fetch_all($exec,MYSQLI_ASSOC);
            return $row;
        }else{
            return $row=[];
        }
    }
    function fetch_data_meat_year($conn,$year){
        $query="SELECT stock.menu_cost,order_detail.menu_quantity from order_detail LEFT JOIN stock ON stock.menu_id=order_detail.menu_id WHERE order_detail.course_id=3 AND YEAR(order_time) =".$year;
        $exec=mysqli_query($conn,$query);
        if(mysqli_num_rows($exec)>0){
            $row=mysqli_fetch_all($exec,MYSQLI_ASSOC);
            return $row;
        }else{
            return $row=[];
        }
    }
    function fetch_data_customer_year($conn,$year){
        $query="SELECT customer_number from table_order WHERE YEAR(open_date) =".$year;
        $exec=mysqli_query($conn,$query);
        if(mysqli_num_rows($exec)>0){
            $row=mysqli_fetch_all($exec,MYSQLI_ASSOC);
            return $row;
        }else{
            return $row=[];
        }
    }
// ======================= Menu tier list ===============================
    function fetch_data_top_alacart_year($conn,$year){
        $query="SELECT * from order_detail LEFT JOIN stock ON stock.menu_id=order_detail.menu_id WHERE order_detail.course_id=1 AND YEAR(order_time) =".$year." GROUP BY order_detail.menu_id ORDER BY menu_quantity ASC";
        $exec=mysqli_query($conn,$query);
        if(mysqli_num_rows($exec)>0){
            $row=mysqli_fetch_all($exec,MYSQLI_ASSOC);
            return $row;
        }else{
            return $row=[];
        }
    }
    function fetch_data_top_buffet_year($conn,$year){
        $query="SELECT * from order_detail LEFT JOIN stock ON stock.menu_id=order_detail.menu_id WHERE order_detail.course_id=2 OR order_detail.course_id=3 AND YEAR(order_time) =".$year." GROUP BY order_detail.menu_id ORDER BY menu_quantity ASC";
        $exec=mysqli_query($conn,$query);
        if(mysqli_num_rows($exec)>0){
            $row=mysqli_fetch_all($exec,MYSQLI_ASSOC);
            return $row;
        }else{
            return $row=[];
        }
    }
?>