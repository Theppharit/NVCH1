<?php
$conn = new mysqli("localhost", "root", "", "saigon");
if ($conn->connect_error) die("DB error");

$name    = $_POST['name'];
$email   = $_POST['email'];
$message = $_POST['message'];
$stmt = $conn->prepare(
  "INSERT INTO messages (name, email, message) VALUES (?, ?, ?)"
);

$stmt->bind_param("sss", $name, $email, $message);
$stmt->execute();

echo "บันทึกข้อมูลเรียบร้อย";
