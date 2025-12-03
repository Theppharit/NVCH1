<?php

$host = '';
$user = '';
$pass = '';
$dbname = '';

$conn = mysqli_connect($host, $user, $pass,$dbname);
$conn -> set_charset('utf8');