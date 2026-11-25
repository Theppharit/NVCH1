<?php
session_start();
include "db_config.php";

if (!isset($_SESSION['user_name'])) {
  header("Location: login.html");
  exit;
}

$edit = isset($_GET['edit']);

$sql = "SELECT name, email, phone, address FROM users WHERE name = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $_SESSION['user_name']);
$stmt->execute();
$user = $stmt->get_result()->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Profile</title>

<style>
body{
  background:#0f0f0f;
  color:#fff;
  font-family:Arial;
  display:flex;
  justify-content:center;
  align-items:center;
  height:100vh;
}
.box{
  background:#1a1a1a;
  padding:40px;
  border-radius:12px;
  width:360px;
}
label{ color:#aaa; font-size:14px; }
.value{ margin-bottom:15px; }
input, textarea{
  width:100%;
  padding:10px;
  border-radius:6px;
  border:none;
  margin-bottom:15px;
}
button{
  width:100%;
  padding:12px;
  background:red;
  color:#fff;
  border:none;
  border-radius:6px;
}
a{
  display:block;
  text-align:center;
  margin-top:10px;
  color:#aaa;
}
</style>
</head>

<body>
<div class="box">
<h2>โปรไฟล์</h2>

<?php if (!$edit): ?>
<!-- 🔹 โหมดแสดงข้อมูล -->
<label>ชื่อ</label>
<div class="value"><?= htmlspecialchars($user['name']) ?></div>

<label>Email</label>
<div class="value"><?= htmlspecialchars($user['email']) ?></div>

<label>เบอร์โทร</label>
<div class="value"><?= $user['phone'] ?: 'ยังไม่ได้กรอก' ?></div>

<label>ที่อยู่</label>
<div class="value"><?= $user['address'] ?: 'ยังไม่ได้กรอก' ?></div>

<a href="profile.php?edit=1">✏️ แก้ไขข้อมูล</a>
<a href="change_password.php">🔒 เปลี่ยนรหัสผ่าน</a>
<a href="index.php">← กลับหน้าหลัก</a>

<?php else: ?>
<!-- 🔹 โหมดแก้ไข -->
<form method="post" action="update_profile.php">

<label>ชื่อ (แก้ไขได้)</label>
<input type="text" name="name" value="<?= htmlspecialchars($user['name']) ?>">

<label>Email</label>
<input type="email" value="<?= htmlspecialchars($user['email']) ?>" disabled>

<label>เบอร์โทร</label>
<input type="text" name="phone" value="<?= htmlspecialchars($user['phone'] ?? '') ?>">

<label>ที่อยู่</label>
<textarea name="address"><?= htmlspecialchars($user['address'] ?? '') ?></textarea>

<button type="submit">บันทึก</button>
</form>

<a href="profile.php">❌ ยกเลิก</a>

<?php endif; ?>

</div>
</body>
</html>
