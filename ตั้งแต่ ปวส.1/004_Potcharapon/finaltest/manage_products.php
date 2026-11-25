    <?php 
    session_start();
    // เชื่อมต่อ DB
    $host = "localhost"; $db = "luxe_shop"; $user = "root"; $pass = "";
    try {
        $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // --- 1. ส่วนการลบสินค้า ---
        if (isset($_GET['delete_id'])) {
            $id = $_GET['delete_id'];
            $sql = "DELETE FROM products WHERE id = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$id]);
            header("Location: manage_products.php");
            exit();
        }

        // --- 2. ส่วนการบันทึกข้อมูล (เพิ่ม stock และ status ใน SQL) ---
        // ส่วนการบันทึกข้อมูลใน manage_products.php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_product'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    $category = $_POST['category']; // เพิ่มการรับค่า category
    $status = $_POST['status'];
    $image_url = $_POST['image_url'];

    // ปรับคำสั่ง INSERT ให้ตรงตามจำนวนคอลัมน์ในรูป image_1a6610.png
    $sql = "INSERT INTO products (name, price, stock, category, status, image_url) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    
    // ส่งค่าไปให้ครบ 6 ตัวแปรตามลำดับ
    $stmt->execute([$name, $price, $stock, $category, $status, $image_url]);
    
    header("Location: manage_products.php");
    exit();
}

        $stmt = $pdo->query("SELECT * FROM products ORDER BY id DESC");
        $all_products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }
    ?>

    <?php include('include/head.php') ?>
    <link rel="stylesheet" href="assets/style.css">

    <body>
        <?php include('include/navbar.php') ?>

        <div class="manage-container" style="padding: 120px 5% 50px;">
            <h2 style="color: #c5a059; margin-bottom: 30px; font-family: 'Playfair Display', serif;">Inventory Management</h2>

            <div class="add-product-form" style="background: #1a1a1a; padding: 25px; border-radius: 8px; border: 1px solid #c5a059; margin-bottom: 50px;">
                <h3 style="color: #fff; margin-bottom: 20px;">+ Add New Product</h3>
                <form action="" method="POST" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 15px;">
                    <input type="text" name="name" placeholder="ชื่อสินค้า" required style="padding: 10px; background: #000; color: #fff; border: 1px solid #333;">
                    <input type="number" step="0.01" name="price" placeholder="ราคา ($)" required style="padding: 10px; background: #000; color: #fff; border: 1px solid #333;">
                    
                    <input type="number" name="stock" placeholder="จำนวนคงเหลือ" required style="padding: 10px; background: #000; color: #fff; border: 1px solid #333;">
                    
                    <input type="text" name="image_url" placeholder="URL รูปภาพ (assets/img/...)" required style="padding: 10px; background: #000; color: #fff; border: 1px solid #333;">
                    
                    <select name="status" style="padding: 10px; background: #000; color: #fff; border: 1px solid #333;">
                        <option value="active">พร้อมขาย (Active)</option>
                        <option value="inactive">ปิดการขาย (Inactive)</option>
                    </select>

                    <button type="submit" name="add_product" style="background: #c5a059; color: #000; border: none; padding: 10px; cursor: pointer; font-weight: bold; transition: 0.3s;">Save Product</button>
                </form>
            </div>

            <div style="overflow-x: auto;">
                <table style="width: 100%; border-collapse: collapse; color: #fff; background: #111; min-width: 800px;">
                    <thead>
                        <tr style="background: #c5a059; color: #000;">
                            <th style="padding: 15px; border: 1px solid #333;">รูป</th>
                            <th style="padding: 15px; border: 1px solid #333;">ชื่อสินค้า</th>
                            <th style="padding: 15px; border: 1px solid #333;">ราคา</th>
                            <th style="padding: 15px; border: 1px solid #333;">จำนวนคงเหลือ</th>
                            <th style="padding: 15px; border: 1px solid #333;">สถานะ</th>
                            <th style="padding: 15px; border: 1px solid #333;">จัดการ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($all_products as $p): ?>
                        <tr style="border-bottom: 1px solid #333;">
                            <td style="padding: 10px; text-align: center; border: 1px solid #333;">
                                <img src="<?= htmlspecialchars($p['image_url']) ?>" style="width: 50px; height: 50px; object-fit: cover; border: 1px solid #c5a059;">
                            </td>
                            <td style="padding: 10px; border: 1px solid #333;"><?= htmlspecialchars($p['name']) ?></td>
                            <td style="padding: 10px; text-align: right; border: 1px solid #333;">$<?= number_format($p['price'], 2) ?></td>
                            
                            <td style="padding: 10px; text-align: center; border: 1px solid #333; color: <?= $p['stock'] <= 0 ? '#ff4444' : '#fff' ?>;">
                                <?= $p['stock'] ?> <?= $p['stock'] <= 0 ? '(Out of stock)' : '' ?>
                            </td>

                            <td style="padding: 10px; text-align: center; border: 1px solid #333;">
                                <span style="background: <?= $p['status'] == 'active' ? '#4CAF50' : '#666' ?>; color: #fff; padding: 2px 8px; border-radius: 4px; font-size: 12px;">
                                    <?= strtoupper($p['status']) ?>
                                </span>
                            </td>

                            <td style="padding: 10px; text-align: center; border: 1px solid #333;">
                                <a href="manage_products.php?delete_id=<?= $p['id'] ?>" 
                                onclick="return confirm('คุณแน่ใจหรือไม่ว่าจะลบสินค้าชิ้นนี้?');" 
                                style="background: #ff4444; color: #fff; padding: 6px 12px; text-decoration: none; border-radius: 4px; font-size: 13px;">
                                Delete
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <?php include('include/footer.php') ?>
        <script src="assets/main.js"></script>
    </body>
    </html>