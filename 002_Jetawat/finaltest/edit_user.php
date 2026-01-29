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

// 2. ดึงข้อมูลเดิมมาแสดง (รับค่า ID จาก URL)
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
    $stmt->execute([$id]);
    $user_data = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$user_data) {
        die("ไม่พบข้อมูลผู้ใช้งาน");
    }
}

// 3. ระบบอัปเดตข้อมูลเมื่อกดบันทึก
if (isset($_POST['update_user'])) {
    $id = $_POST['id'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    $sql = "UPDATE users SET username = ?, email = ?, phone = ?, address = ? WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    
    if ($stmt->execute([$username, $email, $phone, $address, $id])) {
        echo "<script>alert('อัปเดตข้อมูลเรียบร้อย'); window.location='manage_customers.php';</script>";
    }
}
?>

<style>
    .edit-container { padding: 120px 10% 50px; font-family: 'Inter', sans-serif; }
    .card { background: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); max-width: 600px; margin: auto; }
    .form-control { width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 4px; margin-top: 8px; margin-bottom: 20px; box-sizing: border-box; }
    .btn-update { background: #1a1a1a; color: #fff; border: none; padding: 12px 30px; border-radius: 4px; cursor: pointer; font-weight: 600; width: 100%; }
    .btn-cancel { display: block; text-align: center; margin-top: 15px; color: #888; text-decoration: none; font-size: 0.9rem; }
</style>

<body>
    <?php include('include/navbar.php'); ?>

    <div class="edit-container">
        <div class="card">
            <h2 style="font-family: 'Playfair Display', serif; margin-bottom: 25px; text-align: center;">แก้ไขข้อมูลลูกค้า</h2>
            
            <form method="POST">
                <input type="hidden" name="id" value="<?= $user_data['id'] ?>">

                <label>ชื่อผู้ใช้งาน (Username)</label>
                <input type="text" name="username" class="form-control" value="<?= htmlspecialchars($user_data['username']) ?>" required>

                <label>อีเมล</label>
                <input type="email" name="email" class="form-control" value="<?= htmlspecialchars($user_data['email'] ?? '') ?>">

                <label>เบอร์โทรศัพท์</label>
                <input type="text" name="phone" class="form-control" value="<?= htmlspecialchars($user_data['phone'] ?? '') ?>">

                <label>ที่อยู่</label>
                <textarea name="address" class="form-control" rows="4"><?= htmlspecialchars($user_data['address'] ?? '') ?></textarea>

                <button type="submit" name="update_user" class="btn-update">บันทึกการแก้ไข</button>
                <a href="manage_customers.php" class="btn-cancel">ยกเลิกและกลับหน้าเดิม</a>
            </form>
        </div>
    </div>
</body>