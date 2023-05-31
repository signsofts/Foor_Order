<?php
    session_start();
    $auth=$_SESSION['auth'];
    $arr=array(1,2,5);
    if(!in_array($auth,$arr)){
        header('location:../login/login.php');
    }
    include('../DBConnection.php');
    require "../vendor/autoload.php";

    use Endroid\QrCode\QrCode;
    use Endroid\QrCode\Writer\PngWriter;
    $url=".http://localhost/Project/jrposms/unit/order_food/orderfood.php?order_id=".$_GET["gen"];
    $qr_code=QrCode::create($url);
    $writer=new PngWriter;
    $result=$writer->write($qr_code);
    header("Content-Type:".$result->getMimeType());
    echo $result->getstring();
?>