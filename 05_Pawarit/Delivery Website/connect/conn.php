<?php
$host = 'localhost';
#user = 'root';
$pass = '';
$dbname = 'tplcompany';


$conn = mysqli_connect(hostname: $host, username: $user, password: $pass, database: $dbname);
$conn -> set_charset(charset: 'utf8');  

