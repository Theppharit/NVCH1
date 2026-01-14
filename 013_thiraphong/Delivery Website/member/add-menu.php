<?php
session_start();
include_once('../conn/conn.php')

$me_id = $_GET['me_id'];
$m_name = $_POST['m_name'];
$m_amount = $_POST['m_amount'];
$m_price = $_POST['m_price'];

$sql = "INSERT INTO menu (m_name, m_amount, m_price, me_id)
VALUSE
('$m_name', '$m_amount', 

?>