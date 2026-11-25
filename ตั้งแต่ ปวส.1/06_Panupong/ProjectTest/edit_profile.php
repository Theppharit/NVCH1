<?php
session_start();
include "db_config.php";

if (!isset($_SESSION['user_name'])) {
  header("Location: login.html");
  exit;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $new_name = $_POST['name'];

  $sql = "UPDATE users SET name = ? WHERE name = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("ss", $new_name, $_SESSION['user_name']);

  if ($stmt->execute()) {
    $_SESSION['user_name'] = $new_name; // อัปเดต session
    header("Location: profile.php");
    exit;
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit Profile</title>
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
    <h2>แก้ไขโปรไฟล์</h2>

    <form method="post">
      <input type="text" name="name"
        value="<?php echo htmlspecialchars($_SESSION['user_name']); ?>"
        required>

      <button type="submit">บันทึก</button>
    </form>
    <a href="change_password.php">เปลี่ยนรหัสผ่าน</a>


    <a href="profile.php">← กลับ</a>
  </div>

</body>
</html>
