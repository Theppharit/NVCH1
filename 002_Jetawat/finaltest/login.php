<?php
session_start();
// 1. เชื่อมต่อฐานข้อมูล
$host = "localhost"; $db = "luxe_shop"; $user = "root"; $pass = "";
try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

$message = "";
$action = isset($_GET['action']) ? $_GET['action'] : 'login';

// 2. LOGIC สำหรับการสมัครสมาชิก (REGISTER)
if (isset($_POST['register_admin'])) {
    $u = $_POST['username'];
    $p = $_POST['password'];
    $c = $_POST['confirm_password'];
    $email = $_POST['email'];   // รับค่าอีเมล
    $phone = $_POST['phone'];   // รับค่าเบอร์โทร
    $addr  = $_POST['address']; // รับค่าที่อยู่

    if ($p !== $c) {
        $message = "Passwords do not match!";
    } else {
        try {
            // เพิ่มการบันทึก email, phone, address ลงใน SQL
            $stmt = $pdo->prepare("INSERT INTO users (username, password, email, phone, address, role) VALUES (?, ?, ?, ?, ?, 'customer')");
            $stmt->execute([$u, $p, $email, $phone, $addr]); 
            header("Location: login.php?action=login&success=1");
            exit;
        } catch (Exception $e) { 
            $message = "Username already exists or data error!"; 
        }
    }
}

// 3. LOGIC สำหรับการเข้าสู่ระบบ (LOGIN)
if (isset($_POST['login_admin'])) {
    $u = $_POST['username'];
    $p = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$u]);
    $user = $stmt->fetch();

    if ($user && $user['password'] === $p) { 
        $_SESSION['user_id'] = $user['id']; 
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role']; 

        if ($user['role'] === 'admin') {
            header("Location: admin_dashboard.php");
        } else {
            header("Location: index.php");
        }
        exit;
    } else {
        $message = "Invalid username or password!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LUXE | Login & Register</title>
    <link rel="stylesheet" href="assets-loginj/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        .msg { text-align: center; margin-bottom: 15px; padding: 10px; border-radius: 5px; font-size: 0.9rem; }
        .msg.error { background: #ffebeb; color: #d63031; border: 1px solid #fab1a0; }
        .msg.success { background: #ebfff0; color: #27ae60; border: 1px solid #b8e994; }
        /* ปรับแต่ง textarea ให้เข้ากับดีไซน์ */
        textarea { width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 5px; font-family: inherit; }
    </style>
</head>
<body class="auth-page">

<div class="auth-wrapper">
    <div class="auth-card" style="max-width: 500px;"> <div class="auth-tabs">
            <a href="?action=login" class="<?= ($action == 'login') ? 'active' : '' ?>">Login</a>
            <a href="?action=register" class="<?= ($action == 'register') ? 'active' : '' ?>">Register</a>
        </div>

        <?php if($message): ?> <div class="msg error"><?= $message ?></div> <?php endif; ?>
        <?php if(isset($_GET['success'])): ?> <div class="msg success">Account created! Please login.</div> <?php endif; ?>

        <?php if($action == 'login'): ?>
            <form action="login.php?action=login" method="POST">
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" placeholder="Enter Username" required>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" placeholder="••••••••" required>
                </div>
                <button type="submit" name="login_admin" class="auth-btn">Sign In</button>
            </form>
        <?php else: ?>
            <form action="login.php?action=register" method="POST">
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" placeholder="Create Username" required>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" placeholder="example@mail.com" required>
                </div>
                <div class="form-group">
                    <label>Phone Number</label>
                    <input type="text" name="phone" placeholder="08x-xxx-xxxx" required>
                </div>
                <div class="form-group">
                    <label>Address</label>
                    <textarea name="address" rows="3" placeholder="Enter your full address" required></textarea>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" placeholder="Create Password" required>
                </div>
                <div class="form-group">
                    <label>Confirm Password</label>
                    <input type="password" name="confirm_password" placeholder="Repeat Password" required>
                </div>
                <button type="submit" name="register_admin" class="auth-btn" style="background: #c5a059;">Create Account</button>
            </form>
        <?php endif; ?>
    </div>
</div>

</body>
</html>