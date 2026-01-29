<?php
$host = "localhost";
$dbname = "final_test";
$user = "root";
$pass = "";

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "เชื่อมต่อฐานข้อมูลล้มเหลว";
}
?>
