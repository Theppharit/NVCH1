<?php

$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'Panupong';

$conn = mysqli_connect($host,$user,$pass,$dbname );

$conn -> set_charset('utf8');