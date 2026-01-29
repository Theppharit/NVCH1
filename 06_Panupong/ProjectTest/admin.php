<?php
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
  header("Location: index.php");
  exit;
}
?>

<table border="1">
<tr>
  <th>ชื่อ</th>
  <th>อีเมล</th>
  <th>ข้อความ</th>
  <th>เวลา</th>
</tr>

<?php while($row = $result->fetch_assoc()): ?>
<tr>
  <td><?= htmlspecialchars($row['name']) ?></td>
  <td><?= htmlspecialchars($row['email']) ?></td>
  <td><?= htmlspecialchars($row['message']) ?></td>
  <td><?= $row['created_at'] ?></td>
</tr>
<?php endwhile; ?>
</table>
