<?php
session_start();

// 1. เคลียร์ค่า Session ทั้งหมด
session_unset();

// 2. ทำลาย Session
session_destroy();

// 3. ส่งกลับไปที่หน้า index.php (หน้าหลัก) แทนหน้า login
header("Location: index.php");
exit;
?>