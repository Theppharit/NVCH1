<?php


session_start();
include_once('conn/conn.php');
 
 $me_name =$_SESSION['me_name'];

 ?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!--=============== FAVICON ===============-->
    <link
      rel="shortcut icon"
      href="assets/img/favicon.png"
      type="image/x-icon"
    />

    <!--=============== REMIXICONS ===============-->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.6.0/remixicon.min.css"
    />

    <!--=============== SWIPER CSS ===============-->
    <link rel="stylesheet" href="assets/css/swiper-bundle.min.css" />

    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="assets/css/styles.css" />

    <title>Punthiwa.com</title>
      <?php

      
      function shwoAlert($text,$locata): {
  echo"<script type='text/javascript'>";
  echo"alert( '$text' );";
  echo"window.location.href='$locata';";
  echo"</script>";
}
if($_GET['do'] == 'login'){
showAlert('เข้าสู่ระบบสำเร็จ','login.php');

}else if ($_GET['do'] == 'logout') {
showAlert('ออกจากระบบสำเร็จ','login.php');

     } elseif ($_GET['do'] == 'check') {
showAlert('ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง','login.php');
      }  else {
showAlert('กรุณาเข้าสู่ระบบก่อนใช้งาน','login.php');
      }


?>

  </head>