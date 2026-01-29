<?php
session_start();
require 'db_config.php';

if (!isset($_SESSION['user_id'])) {
  die("กรุณา login ก่อน");
}

$user_id = $_SESSION['user_id'];

$stmt = $conn->prepare("
  SELECT message, reply, created_at
  FROM messages
  WHERE user_id = ?
  ORDER BY id DESC
");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="th">
<head>
<meta charset="UTF-8">
<title>ข้อความของคุณ</title>
</head>
<body>

<h2>📩 ข้อความของคุณ</h2>

<?php while ($row = $result->fetch_assoc()): ?>
  <div style="border:1px solid #ccc; padding:10px; margin-bottom:10px;">
    <b>คุณ:</b><br>
    <?= nl2br(htmlspecialchars($row['message'])) ?>

    <hr>

    <?php if (!empty($row['reply'])): ?>
      <b style="color:green;">แอดมินตอบ:</b><br>
      <?= nl2br(htmlspecialchars($row['reply'])) ?>
    <?php else: ?>
      <i style="color:gray;">⏳ รอการตอบจากแอดมิน</i>
    <?php endif; ?>
  </div>
<?php endwhile; ?>

</body>
</html>
