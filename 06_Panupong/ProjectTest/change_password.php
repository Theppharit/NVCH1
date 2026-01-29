<?php
session_start();
include "db_config.php";

if (!isset($_SESSION['user_name'])) {
  header("Location: login.html");
  exit;
}

$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $old = $_POST['old_password'];
  $new = $_POST['new_password'];
  $confirm = $_POST['confirm_password'];

  if ($new !== $confirm) {
    $error = "รหัสใหม่ไม่ตรงกัน";
  } else {
    /* ดึงรหัสผ่านเดิมจาก DB */
    $sql = "SELECT password FROM users WHERE name = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $_SESSION['user_name']);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if (!password_verify($old, $user['password'])) {
      $error = "รหัสผ่านเดิมไม่ถูกต้อง";
    } else {
      /* update password */
      $hash = password_hash($new, PASSWORD_DEFAULT);
      $update = $conn->prepare(
        "UPDATE users SET password = ? WHERE name = ?"
      );
      $update->bind_param("ss", $hash, $_SESSION['user_name']);
      $update->execute();

      header("Location: profile.php");
      exit;
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Change Password</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <style>
    body {
      background: #0f0f0f;
      color: #fff;
      font-family: Arial, sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .login-box {
      background: #1a1a1a;
      padding: 40px;
      border-radius: 12px;
      width: 320px;
      text-align: center;
    }

    .login-box input {
      width: 100%;
      padding: 12px;
      margin-bottom: 15px;
      border-radius: 6px;
      border: none;
    }

    .login-box button {
      width: 100%;
      padding: 12px;
      background: #ff0000;
      border: none;
      color: #fff;
      border-radius: 6px;
      cursor: pointer;
    }

    .error {
      color: #ff4444;
      margin-bottom: 10px;
    }

    .login-box a {
      display: block;
      margin-top: 15px;
      color: #aaa;
      text-decoration: none;
    }
  </style>
</head>

<body>

<div class="login-box">
  <h2>เปลี่ยนรหัสผ่าน</h2>

  <?php if ($error): ?>
    <div class="error"><?php echo $error; ?></div>
  <?php endif; ?>

  <form method="post">
    <input type="password" name="old_password" placeholder="รหัสผ่านเดิม" required>
    <input type="password" name="new_password" placeholder="รหัสใหม่" required>
    <input type="password" name="confirm_password" placeholder="ยืนยันรหัสใหม่" required>

    <button type="submit">บันทึก</button>
  </form>

  <a href="profile.php">← กลับ</a>
</div>

</body>
</html>
