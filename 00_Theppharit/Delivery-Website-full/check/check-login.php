<?php
session_start();

require_once('../conn/conn.php');

$me_mail = $_POST['me_mail'] ;
$me_pass = $_POST['me_pass'] ;

$sql = "SELECT * FROM tbl_member WHERE me_mail = '$me_mail' AND me_pass = '$me_pass'";
$result = mysqli_query( $conn, $sql);

