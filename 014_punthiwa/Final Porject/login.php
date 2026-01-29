<?php
session_start();
include 'db.php';

if($_POST){
 $u = $_POST['username'];
 $p = $_POST['password'];

 $sql = "SELECT * FROM admin WHERE username='$u' AND password='$p'";
 $q = $conn->query($sql);

 if($q->rowCount()>0){
  $_SESSION['admin']=$u;
  header("Location: admin/dashboard.php");
 }else{
  echo "Login ผิด";
 }
}
?>

<form method="post">
Username <input name="username"><br>
Password <input name="password" type="password"><br>
<button>Login</button>
</form>
