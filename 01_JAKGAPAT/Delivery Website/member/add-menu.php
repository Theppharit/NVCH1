<?php
session_start();
include_once('../conn/conn.php');

$m_name = $_POST['m_name'];
$m_amount = $_POST['m_amount'];
$m_price = $_POST['m_price'];

$sql = "INSERT INTO tbl_menu (m_name, m_amount, m_price)
VALUES
('$m_name', '$m_amount', '$m_price')";
$result = mysqli_query($conn, $sql);

if ($result) {

    header("Location: ../menu.php");
    exit();
    
} else {

    header("Location: member/dashboard.php");
    exit();



}

?>