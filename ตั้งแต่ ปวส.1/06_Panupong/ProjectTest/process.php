<?php
include "db_config.php";

$name  = $_POST['name'];
$email = $_POST['email'];

$sql = "INSERT INTO contact_inquiries (name, email) VALUES (?, ?)";
$stmt = $conn->prepare($sql);

if (!$stmt) {
  die("PREPARE ERROR: " . $conn->error);
}

$stmt->bind_param("ss", $name, $email);

if (!$stmt->execute()) {
  die("EXECUTE ERROR: " . $stmt->error);
}

echo "success";
