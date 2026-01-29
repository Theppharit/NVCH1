<?php 
if (session_status() === PHP_SESSION_NONE) { session_start(); }
include('include/head.php');

// 1. เชื่อมต่อฐานข้อมูล (ใช้ตัวแปรเดียวกับระบบจัดการรถ)
$host = "localhost"; $db = "luxe_shop"; $user = "root"; $pass = "";
try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}

// 2. ระบบเพิ่มข้อมูลลูกค้า (CRM)
if (isset($_POST['save_customer'])) {
    $username = $_POST['username'];
    $password = password_hash("1234", PASSWORD_DEFAULT); // ใช้ Hash เพื่อความปลอดภัยขั้นสูง
    $role = "customer";
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    $sql = "INSERT INTO users (username, password, role, email, phone, address) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    if ($stmt->execute([$username, $password, $role, $email, $phone, $address])) {
        echo "<script>alert('ลงทะเบียนลูกค้าใหม่ในระบบเรียบร้อย'); window.location='manage_customers.php';</script>";
    }
}

// 3. ดึงข้อมูลเฉพาะคนที่เป็น customer
$stmt = $pdo->query("SELECT * FROM users WHERE role = 'customer' ORDER BY id DESC");
$customers = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<style>
    body { background-color: #0a0a0a; color: #fff; }
    .manage-container { padding: 120px 8% 50px; font-family: 'Inter', sans-serif; }
    
    /* การ์ดสไตล์พรีเมียม */
    .card { 
        background: #111; 
        padding: 30px; 
        border-radius: 12px; 
        border: 1px solid #222; 
        margin-bottom: 30px; 
        box-shadow: 0 10px 30px rgba(0,0,0,0.5); 
    }
    
    .form-control { 
        width: 100%; 
        padding: 12px; 
        background: #000; 
        border: 1px solid #333; 
        border-radius: 6px; 
        color: #fff; 
        margin-top: 8px; 
        transition: 0.3s;
    }
    .form-control:focus { border-color: #00f2ff; outline: none; box-shadow: 0 0 10px rgba(0,242,255,0.2); }
    
    label { font-size: 0.8rem; color: #888; text-transform: uppercase; letter-spacing: 1px; }

    .btn-save { 
        background: #00f2ff; 
        color: #000; 
        border: none; 
        padding: 12px 30px; 
        border-radius: 6px; 
        cursor: pointer; 
        font-weight: 700; 
        margin-top: 20px; 
        text-transform: uppercase;
        transition: 0.3s;
    }
    .btn-save:hover { background: #fff; transform: translateY(-2px); }

    /* ตารางข้อมูล */
    table { width: 100%; border-collapse: collapse; margin-top: 10px; }
    th { 
        background: #1a1a1a; 
        color: #00f2ff; 
        font-size: 0.75rem; 
        text-transform: uppercase; 
        padding: 15px; 
        border-bottom: 2px solid #222;
        letter-spacing: 1px;
    }
    td { padding: 15px; border-bottom: 1px solid #1a1a1a; font-size: 0.9rem; color: #ccc; }
    
    .status-badge {
        background: rgba(0, 242, 255, 0.1);
        color: #00f2ff;
        padding: 3px 10px;
        border-radius: 20px;
        font-size: 0.75rem;
        border: 1px solid #00f2ff;
    }

    .action-links a { font-weight: 600; font-size: 0.85rem; transition: 0.3s; }
    .action-links a:hover { opacity: 0.7; }
</style>

<body>
    <?php include('include/navbar.php'); ?>

    <div class="manage-container">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
            <h2 style="font-family: 'Inter', sans-serif; font-weight: 800; text-transform: uppercase; letter-spacing: -1px; color: #fff;">
                Customer <span style="color: #00f2ff;">Database</span>
            </h2>
            <p style="color: #555; font-size: 0.9rem;">JATAWAT AUTO GALLERY CRM SYSTEM</p>
        </div>

        <div class="card">
            <h3 style="margin-top:0; font-size: 1.1rem; color: #00f2ff; margin-bottom: 20px;">+ Register New VIP Member</h3>
            <form method="POST">
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px;">
                    <div>
                        <label>Customer Name (Username)</label>
                        <input type="text" name="username" class="form-control" placeholder="ชื่อ-นามสกุล หรือชื่อเรียก" required>
                    </div>
                    <div>
                        <label>Contact Number</label>
                        <input type="text" name="phone" class="form-control" placeholder="08X-XXX-XXXX">
                    </div>
                    <div>
                        <label>Email Address</label>
                        <input type="email" name="email" class="form-control" placeholder="example@mail.com">
                    </div>
                    <div>
                        <label>Membership Status</label>
                        <select class="form-control">
                            <option>VIP Member</option>
                            <option>Platinum Member</option>
                        </select>
                    </div>
                </div>
                <div style="margin-top: 20px;">
                    <label>Shipping / Billing Address</label>
                    <textarea name="address" class="form-control" rows="2" placeholder="ที่อยู่ในการจัดส่งเอกสารและรถยนต์"></textarea>
                </div>
                <div style="text-align: right;">
                    <button type="submit" name="save_customer" class="btn-save">Confirm Registration</button>
                </div>
            </form>
        </div>

        <div class="card">
            <h3 style="margin-top:0; font-size: 1.1rem; margin-bottom: 20px;">VIP Client List</h3>
            <div style="overflow-x: auto;">
                <table>
                    <thead>
                        <tr>
                            <th style="text-align: center;">ID</th>
                            <th>Client Info</th>
                            <th>Contact Details</th>
                            <th>Status</th>
                            <th>Address</th>
                            <th style="text-align: center;">Management</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($customers as $row): ?>
                        <tr onmouseover="this.style.background='#151515'" onmouseout="this.style.background='transparent'">
                            <td style="text-align: center; color: #555;">#<?= $row['id'] ?></td>
                            <td>
                                <div style="color: #fff; font-weight: 700;"><?= htmlspecialchars($row['username']) ?></div>
                                <div style="font-size: 0.75rem; color: #555;">UID: <?= md5($row['id']) ?></div>
                            </td>
                            <td>
                                <div><?= htmlspecialchars($row['email'] ?? '-') ?></div>
                                <div style="color: #888; font-size: 0.85rem;"><?= htmlspecialchars($row['phone'] ?? '-') ?></div>
                            </td>
                            <td><span class="status-badge">ACTIVE</span></td>
                            <td style="max-width: 200px; font-size: 0.8rem; color: #666; line-height: 1.4;">
                                <?= htmlspecialchars($row['address'] ?? 'No address provided') ?>
                            </td>
                            <td class="action-links" style="text-align: center;">
                                <a href="edit_user.php?id=<?= $row['id'] ?>" style="color: #00f2ff; text-decoration: none; margin-right: 15px;">EDIT</a>
                                <a href="delete_user.php?id=<?= $row['id'] ?>" onclick="return confirm('ยืนยันการลบข้อมูลลูกค้าคันนี้?')" style="color: #ff4d4d; text-decoration: none;">DELETE</a>
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