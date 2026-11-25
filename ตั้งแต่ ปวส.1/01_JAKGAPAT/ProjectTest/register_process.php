<?php
include "db_config.php";

$name     = $_POST['name'];
$email    = $_POST['email'];
$password = $_POST['password'];
$confirm  = $_POST['confirm_password'];

if ($password !== $confirm) {
  die("password_not_match");
}

$hash = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);

if (!$stmt) {
  die("PREPARE ERROR: " . $conn->error);
}

$stmt->bind_param("sss", $name, $email, $hash);

if (!$stmt->execute()) {
  die("EXECUTE ERROR: " . $stmt->error);
}

header("Location: login.html");
exit;
