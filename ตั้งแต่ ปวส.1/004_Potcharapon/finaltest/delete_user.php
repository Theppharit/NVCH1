<?php
session_start();
$pdo = new PDO("mysql:host=localhost;dbname=luxe_shop;charset=utf8", "root", "");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // ป้องกันการลบ Admin (เพื่อความปลอดภัย)
    $stmt = $pdo->prepare("DELETE FROM users WHERE id = ? AND role = 'customer'");
    if ($stmt->execute([$id])) {
        header("Location: manage_customers.php");
    }
}