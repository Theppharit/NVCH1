<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();
require 'db_config.php';

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
  die("❌ ไม่มีสิทธิ์เข้าหน้านี้");
}

$sql = "SELECT id, name, message, reply FROM messages ORDER BY id DESC";
$result = $conn->query($sql);

if (!$result) {
  die("❌ SQL Error: " . $conn->error);
}
?>



<!DOCTYPE html>
<html lang="th">
<head>
<meta charset="UTF-8">
<title>ตอบข้อความลูกค้า</title>
<style>
body { font-family: Arial; background:#f5f5f5; }
.box { background:#fff; padding:20px; margin:20px auto; width:600px; border-radius:8px; }
textarea { width:100%; height:80px; }
button { margin-top:10px; padding:8px 15px; }
</style>
</head>
<body>

<h2 style="text-align:center">📩 ข้อความจากลูกค้า</h2>

<?php while ($row = $result->fetch_assoc()): ?>
<div class="box">
  <b>ชื่อ:</b> <?= htmlspecialchars($row['name']) ?><br>
  <b>ข้อความ:</b> <?= nl2br(htmlspecialchars($row['message'])) ?>

  <form method="post" action="send_reply.php">
  <input type="hidden" name="id" value="<?= $row['id'] ?>">
  <textarea name="reply" placeholder="พิมพ์ตอบลูกค้า..."><?= htmlspecialchars($row['reply'] ?? '') ?></textarea>
  <button type="submit">ส่งคำตอบ</button>
</form>


</div>
<?php endwhile; ?>

</body>
</html>
