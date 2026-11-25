<?php
session_start();
require 'db.php'; // Connect to database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    // Prepared Statement to prevent SQL Injection
    $stmt = $pdo->prepare("SELECT * FROM admins WHERE username = ?");
    $stmt->execute([$user]);
    $admin = $stmt->fetch();

    if ($admin && password_verify($pass, $admin['password'])) {
        // Success: Create session
        $_SESSION['admin_id'] = $admin['id'];
        $_SESSION['admin_user'] = $admin['username'];
        header("Location: admin_dashboard.php");
    } else {
        // Failure
        echo "<script>alert('Invalid Username or Password'); window.location='login.php';</script>";
    }
}
?>