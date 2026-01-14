<?php
session_start();
   include('conn/conn.php');

 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

   $email = trim($_POST['email']);
   $password = trim($_POST['password']);

    
   $sql = "SELECT * FROM tbl_member WHERE email = ?";
   $stmt = mysqli_prepare($conn, $sql);
   mysqli_stmt_bind_param($stmt, "s", $email);
   mysqli_stmt_execute($stmt);
   $result = mysqli_stmt_get_result($stmt);

   
   if ($user = mysqli_fetch_assoc($result)) {

      
      if ($password === $user['password']) {

         $_SESSION['member_id'] = $user['member_id'];
         $_SESSION['name'] = $user['name'];
         $_SESSION['email'] = $user['email'];

         header("Location: index.php");
         exit();
      } else {
         echo "<script>alert('รหัสผ่านไม่ถูกต้อง');</script>";
      }

   } else {
      echo "<script>alert('ไม่พบอีเมลนี้ในระบบ');</script>";
   }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <!--=============== REMIXICONS ===============-->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.6.0/remixicon.min.css">

   <!--=============== SWIPER CSS ===============-->
   <link rel="stylesheet" href="assets-login/css/swiper-bundle.min.css">

   <!--=============== CSS ===============-->
   <link rel="stylesheet" href="assets-login/css/styles.css">

   <title>Login</title>
</head>
<body>
   <div class="login container grid">
      <div class="login__container grid">
         <div class="login__swiper swiper">

            <div class="login__swiper-data">
               <p class="login__swiper-subtitle">Welcome Back</p>
               <h1 class="login__swiper-title">Hello Developer,<br> Sign In To Get Started</h1>
            </div>

            <div class="login__swiper-social">
               <p class="login__swiper-subtitle">Our Social Media</p>

               <div class="login__swiper-links">
                  <a href="#" class="login__swiper-link"><i class="ri-facebook-circle-line"></i></a>
                  <a href="#" class="login__swiper-link"><i class="ri-instagram-line"></i></a>
                  <a href="#" class="login__swiper-link"><i class="ri-twitter-x-line"></i></a>
               </div>
            </div>

            <div class="swiper-wrapper">
               <img src="assets-login/img/img-1.png" alt="image" class="login__swiper-img swiper-slide">
               <img src="assets-login/img/img-2.png" alt="image" class="login__swiper-img swiper-slide">
               <img src="assets-login/img/img-3.png" alt="image" class="login__swiper-img swiper-slide">
            </div>

            <div class="swiper-pagination"></div>
         </div>

         <!-- =========== RIGHT SIDE (FORM) ============== -->
         <div class="login__area grid">
            <div class="login__data">
               <h1 class="login__title">Welcome Back 👋</h1>
               <p class="login__description">Please enter your details.</p>
            </div>

            <span class="login__line">or</span>

            <!-- ================= LOGIN FORM ================= -->
            <form action="" method="POST" class="login__form">
               <div class="login__content grid">

                  <div class="login__box">
                     <input type="email" name="email" placeholder="Email" class="login__input" required>
                     <i class="ri-mail-line"></i>
                  </div>

                  <div class="login__box">
                     <input type="password" name="password" placeholder="Password" class="login__input" id="loginPass" required>
                     <i class="ri-eye-line login__eye" id="loginEye"></i>
                  </div>

               </div>

               <button type="submit" class="login__button">Log In</button>
            </form>

            <p class="login__switch">
               Don’t have an account? 
               <a href="#" class="login__sign">Sign Up</a>
            </p>
         </div>
      </div>
   </div>

   <!--=============== SWIPER JS ===============-->
   <script src="assets-login/js/swiper-bundle.min.js"></script>

   <!--=============== MAIN JS ===============-->
   <script src="assets-login/js/main.js"></script>
</body>
</html>
