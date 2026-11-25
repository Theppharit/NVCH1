<?php
session_start();
require 'db_config.php';

header('Content-Type: application/json; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  echo json_encode(['success' => false]);
  exit;
}

$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$message = $_POST['message'] ?? '';
$user_id = $_SESSION['user_id'];

$stmt = $conn->prepare("
  INSERT INTO messages (user_id, name, email, message)
  VALUES (?, ?, ?, ?)
");
$stmt->bind_param("isss", $user_id, $name, $email, $message);


echo json_encode(['success' => true]);
