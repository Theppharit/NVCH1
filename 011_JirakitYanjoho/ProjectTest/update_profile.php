<?php
session_start();
include "db_config.php";

if (!isset($_SESSION['user_name'])) {
  header("Location: login.html");
  exit;
}

$name = $_POST['name'];
$phone = $_POST['phone'];
$address = $_POST['address'];

$sql = "UPDATE users SET name=?, phone=?, address=? WHERE name=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $name, $phone, $address, $_SESSION['user_name']);
$stmt->execute();

/* อัปเดต session ถ้าเปลี่ยนชื่อ */
$_SESSION['user_name'] = $name;

header("Location: profile.php");
exit;
