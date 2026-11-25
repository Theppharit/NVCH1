<?php 
session_start();
include('include/head.php');

// 1. เชื่อมต่อฐานข้อมูล
$host = "localhost"; $db = "luxe_shop"; $user = "root"; $pass = "";
try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}

// 2. ระบบเพิ่มข้อมูล (บันทึกลงตาราง users กำหนด role เป็น customer)
if (isset($_POST['save_customer'])) {
    $username = $_POST['username'];
    $password = "1234"; // กำหนดรหัสผ่านเริ่มต้นให้ลูกค้า
    $role = "customer";
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    $sql = "INSERT INTO users (username, password, role, email, phone, address) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    if ($stmt->execute([$username, $password, $role, $email, $phone, $address])) {
        echo "<script>alert('เพิ่มข้อมูลลูกค้าเรียบร้อย'); window.location='manage_customers.php';</script>";
    }
}

// 3. ดึงข้อมูลเฉพาะคนที่เป็น customer มาแสดง
$stmt = $pdo->query("SELECT * FROM users WHERE role = 'customer' ORDER BY id DESC");
$customers = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<style>
    .manage-container { padding: 120px 8% 50px; font-family: 'Inter', sans-serif; }
    .card { background: #fff; padding: 25px; border-radius: 8px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); margin-bottom: 30px; }
    .form-control { width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; margin-top: 5px; box-sizing: border-box; }
    .btn-save { background: #c5a059; color: #fff; border: none; padding: 12px 25px; border-radius: 4px; cursor: pointer; font-weight: 600; margin-top: 15px; }
    table { width: 100%; border-collapse: collapse; margin-top: 20px; }
    th, td { padding: 12px; border-bottom: 1px solid #eee; text-align: left; }
    th { background: #f9f9f9; color: #666; font-size: 0.8rem; }
</style>

<body>
    <?php include('include/navbar.php'); ?>

    <div class="manage-container">
        <h2 style="font-family: 'Playfair Display', serif; margin-bottom: 25px;">จัดการลูกค้า (Customers)</h2>

        <div class="card">
            <h3 style="margin-top:0; font-size: 1rem;">เพิ่มลูกค้าใหม่</h3>
            <form method="POST">
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px;">
                    <div>
                        <label>ชื่อผู้ใช้งาน (Username)</label>
                        <input type="text" name="username" class="form-control" required>
                    </div>
                    <div>
                        <label>เบอร์โทรศัพท์</label>
                        <input type="text" name="phone" class="form-control">
                    </div>
                </div>
                <div style="margin-top: 10px;">
                    <label>อีเมล</label>
                    <input type="email" name="email" class="form-control">
                </div>
                <div style="margin-top: 10px;">
                    <label>ที่อยู่</label>
                    <textarea name="address" class="form-control" rows="3"></textarea>
                </div>
                <button type="submit" name="save_customer" class="btn-save">บันทึกข้อมูล</button>
            </form>
        </div>

        <div class="card">
            <h3 style="margin-top:0; font-size: 1rem;">รายการลูกค้า</h3>
            <div style="overflow-x: auto;">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($customers as $row): ?>
                        <tr>
                            <td><?= $row['id'] ?></td>
                            <td><strong><?= htmlspecialchars($row['username']) ?></strong></td>
                            <td><?= htmlspecialchars($row['email'] ?? '-') ?></td>
                            <td><?= htmlspecialchars($row['phone'] ?? '-') ?></td>
                            <td style="font-size: 0.85rem; color: #666;"><?= htmlspecialchars($row['address'] ?? '-') ?></td>
                            <td>
                                <a href="edit_user.php?id=<?= $row['id'] ?>" style="color: #c5a059; text-decoration: none; margin-right: 10px;">แก้ไข</a>
                                <a href="delete_user.php?id=<?= $row['id'] ?>" onclick="return confirm('ลบลูกค้าคนนี้?')" style="color: #ff6b6b; text-decoration: none;">ลบ</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<script src="assets/main.js"></script>
</body>