<?php
session_start();
include "db_config.php";

$email    = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT name, password FROM users WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows === 0) {
  echo "user_not_found";
  exit;
}

$user = $result->fetch_assoc();

if (!password_verify($password, $user['password'])) {
  echo "wrong_password";
  exit;
}

/* 🔥 ตรงนี้สำคัญ */
$_SESSION['user_name'] = $user['name'];

echo "success";
exit;
