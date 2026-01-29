<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once "db_config.php";

if (!isset($_POST['name'], $_POST['email'], $_POST['password'], $_POST['confirm_password'])) {
    die("ข้อมูลไม่ครบ");
}

$name     = trim($_POST['name']);
$email    = trim($_POST['email']);
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
