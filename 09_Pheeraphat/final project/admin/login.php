<?php
session_start();
include("../config/db.php");

if(isset($_POST['login'])){
    if($_POST['username']=="admin" && $_POST['password']=="1234"){
        $_SESSION['admin'] = true;
        header("Location: dashboard.php");
    }
}
?>
<form method="post">
    <input type="text" name="username" placeholder="Username">
    <input type="password" name="password" placeholder="Password">
    <button name="login">เข้าสู่ระบบ</button>
</form>
