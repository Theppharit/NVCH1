<?php
session_start();
require 'db_config.php';

/* เช็กสิทธิ์แอดมิน */
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
  die("no permission");
}

$id    = $_POST['id'] ?? null;
$reply = $_POST['reply'] ?? null;

if (!$id || !$reply) {
  die("ข้อมูลไม่ครบ");
}

$stmt = $conn->prepare("
  UPDATE messages
  SET reply = ?, is_read = 0
  WHERE id = ?
");

if (!$stmt) {
  die("prepare fail: " . $conn->error);
}

$stmt->bind_param("si", $reply, $id);
$stmt->execute();

if ($stmt->error) {
  $_SESSION['status'] = 'fail';
} else {
  $_SESSION['status'] = 'success';
}

header("Location: admin_reply.php");
exit;
