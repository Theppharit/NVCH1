<?php
session_start();

// 1. DATABASE CONNECTION (Change if your DB name is different)
$host = "localhost"; $db = "luxe_shop"; $user = "root"; $pass = "";
try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

$message = "";
$action = isset($_GET['action']) ? $_GET['action'] : 'login';

// 2. PHP LOGIC FOR LOGIN & REGISTER
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['register_admin'])) {
        $u = $_POST['username'];
        $p = $_POST['password'];
        $c = $_POST['confirm_password'];

        if ($p !== $c) {
            $message = "Passwords do not match!";
        } else {
            $hash = password_hash($p, PASSWORD_DEFAULT);
            try {
                $stmt = $pdo->prepare("INSERT INTO admins (username, password) VALUES (?, ?)");
                $stmt->execute([$u, $hash]);
                header("Location: login.php?action=login&success=1");
                exit;
            } catch (Exception $e) { $message = "Username already exists!"; }
        }
    }

    if (isset($_POST['login_admin'])) {
        $u = $_POST['username'];
        $p = $_POST['password'];
        $stmt = $pdo->prepare("SELECT * FROM admins WHERE username = ?");
        $stmt->execute([$u]);
        $user = $stmt->fetch();

        if ($user && password_verify($p, $user['password'])) {
            $_SESSION['admin_id'] = $user['id'];
            $_SESSION['admin_user'] = $user['username'];
            header("Location: admin_dashboard.php");
            exit;
        } else {
            $message = "Invalid username or password!";
        }
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
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        /* CSS specific to this page added here to ensure it doesn't break */
        .auth-wrapper { min-height: 100vh; display: flex; align-items: center; justify-content: center; background: #f9f9f9; padding: 20px; }
        .auth-card { background: #fff; width: 100%; max-width: 400px; padding: 40px; border-radius: 10px; box-shadow: 0 10px 30px rgba(0,0,0,0.05); }
        .auth-tabs { display: flex; gap: 20px; margin-bottom: 30px; border-bottom: 2px solid #eee; }
        .auth-tabs a { padding: 10px; color: #888; text-decoration: none; font-weight: 600; }
        .auth-tabs a.active { color: #1a1a1a; border-bottom: 2px solid #c5a059; }
        .form-group { margin-bottom: 20px; }
        .form-group label { display: block; margin-bottom: 8px; font-size: 0.8rem; font-weight: 600; text-transform: uppercase; }
        .form-group input { width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 5px; }
        .auth-btn { width: 100%; padding: 14px; background: #1a1a1a; color: #fff; border: none; border-radius: 5px; cursor: pointer; font-weight: 600; }
        .msg { text-align: center; margin-bottom: 15px; color: red; font-size: 0.9rem; }
        .success { color: green; }
    </style>
</head>
<body>

<div class="auth-wrapper">
    <div class="auth-card">
        <div class="auth-tabs">
            <a href="?action=login" class="<?php echo ($action == 'login') ? 'active' : ''; ?>">Login</a>
            <a href="?action=register" class="<?php echo ($action == 'register') ? 'active' : ''; ?>">Register</a>
        </div>

        <?php if($message): ?> <p class="msg"><?php echo $message; ?></p> <?php endif; ?>
        <?php if(isset($_GET['success'])): ?> <p class="msg success">Account created! Please login.</p> <?php endif; ?>

        <?php if($action == 'login'): ?>
            <form action="login.php?action=login" method="POST">
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" required>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" required>
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