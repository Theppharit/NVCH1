<?php
session_start();
$host = "localhost"; $db = "luxe_shop"; $user = "root"; $pass = "";
try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

$message = "";
$action = isset($_GET['action']) ? $_GET['action'] : 'login';

// Register Logic
if (isset($_POST['register_admin'])) {
    $u = $_POST['username'];
    $p = $_POST['password'];
    $c = $_POST['confirm_password'];

    if ($p !== $c) {
        $message = "Passwords do not match!";
    } else {
        try {
            $stmt = $pdo->prepare("INSERT INTO admins (username, password) VALUES (?, ?)");
            $stmt->execute([$u, $p]); 
            header("Location: login.php?action=login&success=1");
            exit;
        } catch (Exception $e) { $message = "Username already exists!"; }
    }
}

// Login Logic
if (isset($_POST['login_admin'])) {
    $u = $_POST['username'];
    $p = $_POST['password'];
    $stmt = $pdo->prepare("SELECT * FROM admins WHERE username = ?");
    $stmt->execute([$u]);
    $user = $stmt->fetch();

    if ($user && $user['password'] === $p) { 
        $_SESSION['admin_id'] = $user['id'];
        $_SESSION['admin_user'] = $user['username'];
        header("Location: admin_dashboard.php");
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
    <title>Admin Access | LUXE</title>
    <link rel="stylesheet" href="assets-loginj/style.css">
</head>
<body class="auth-page">

<div class="auth-wrapper">
    <div class="auth-card">
        <div class="auth-tabs">
            <a href="?action=login" class="<?= ($action == 'login') ? 'active' : '' ?>">Login</a>
            <a href="?action=register" class="<?= ($action == 'register') ? 'active' : '' ?>">Register</a>
        </div>

        <?php if($message): ?> <p class="msg error"><?= $message ?></p> <?php endif; ?>
        <?php if(isset($_GET['success'])): ?> <p class="msg success">Account created! Please login.</p> <?php endif; ?>

        <?php if($action == 'login'): ?>
            <form action="login.php?action=login" method="POST">
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" placeholder="Admin Username" required>
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
                    <label>New Username</label>
                    <input type="text" name="username" required>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" required>
                </div>
                <div class="form-group">
                    <label>Confirm Password</label>
                    <input type="password" name="confirm_password" required>
                </div>
                <button type="submit" name="register_admin" class="auth-btn" style="background: #c5a059;">Create Admin</button>
            </form>
        <?php endif; ?>
    </div>
</div>

</body>
</html>