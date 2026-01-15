<?php

error_reporting(0);

$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'sommai';

$conn = mysqli_connect($host,$user,$pass,$dbname );

$conn -> set_charset('utf8');