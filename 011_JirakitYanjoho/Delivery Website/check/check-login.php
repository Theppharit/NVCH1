<?php
session_start();

require_once('../conn/conn.php');

$me_mail = $_POST['me_mail'];
$me_pass = $_POST['me_pass'];

$sql = "SELECT * FROM tbl_member WHERE me_mail = '$me_mail' AND me_pass = '$me_pass' ";
$result = mysqli_query( $conn, $sql);

if (mysqli_num_rows($result) == 1) {

    $row = mysqli_fetch_assoc($result);

    $_SESSION["me_id"] = $row["me_id"];
    $_SESSION["me_mail"] = $row["me_mail"];
    $_SESSION["me_pass"] = $row["me_pass"];
    $_SESSION["me_name"] = $row["me_name"];
    $me_id = $_SESSION['me_id'];

        header("Location: ../index.php");
        exit();

} else {
    header("Location: ../log-from.php");
    exit();
}