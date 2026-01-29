<?php
session_start();
require 'db_config.php';

$email    = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT id, name, password, role FROM users WHERE email = ?";
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

/* ✅ เก็บ session */
$_SESSION['user_id']   = $user['id'];
$_SESSION['user_name'] = $user['name'];
$_SESSION['role']      = $user['role'];

echo "success";
exit;
